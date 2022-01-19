/* 
jshint devel:true
global Vue 
global finestDocs 
global wp 
global swal 
global ajaxurl
 */

function fddocsTabs(evt, cityName) {
  evt.preventDefault();
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("fddocs-tab-content");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("fddocs-tab-link");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";

}


Vue.directive('sortable', {
  bind: function (el, binding) {
    var $el = jQuery(el);

    $el.sortable({
      // handle: '.fddocs-btn-reorder',
      stop: function (event, ui) {
        var ids = [];

        jQuery(ui.item.closest('ul'))
          .children('li')
          .each(function (index, el) {
            ids.push(jQuery(el).data('id'));
          });

        wp.ajax.post({
          action: 'fddocs_sortable_docs',
          ids: ids,
          _wpnonce: finestDocs.nonce,
        });
      },
      cursor: 'move',
      // connectWith: ".connectedSortable"
    });
  },
});

new Vue({
  el: '#fddocs-app',
  data: {
    editurl: '',
    viewurl: '',
    docs: [],
  },

  mounted: function () {
    var self = this,
      dom = jQuery(self.$el);

    this.editurl = finestDocs.editurl;
    this.viewurl = finestDocs.viewurl;

    dom.find('ul.docs').removeClass('not-loaded').addClass('loaded');

    jQuery.get(
      ajaxurl, {
        action: 'fddocs_admin_get_docs',
        _wpnonce: finestDocs.nonce,
      },
      function (data) {
        dom.find('.spinner').remove();
        dom.find('.no-docs').removeClass('not-loaded');

        self.docs = data.data;
      }
    );
  },

  methods: {
    onError: function (error) {
      alert(error);
    },

    swalInputValidator: function (value) {
      if (!value) {
        return 'You need to write something';
      }
    },

    addDoc: function () {
      var that = this;
      this.docs = this.docs || [];

      Swal.fire({
        title: finestDocs.enter_doc_title,
        input: 'text',
        showCancelButton: true,
        inputPlaceholder: finestDocs.write_something,
        confirmButtonText: finestDocs.confirmBtn,
        cancelButtonText: finestDocs.cancelBtn,
        inputValidator: this.swalInputValidator,
      }).then(function (input) {
        if (input.isDismissed) {
          return;
        }

        wp.ajax.send({
          data: {
            action: 'fddocs_create_doc',
            title: input.value.trim(),
            parent: 0,
            _wpnonce: finestDocs.nonce,
          },
          success: function (res) {
            that.docs.unshift(res);
          },
          error: this.onError,
        });
      });
    },

    copyDoc: function (post) {


      wp.ajax.send({
        data: {
          action: 'fddocs_duplicate_doc',
          post_id: post.post.id,
          parent: 0,
          _wpnonce: finestDocs.nonce,
        },
        success: function (res) {
          // that.docs.unshift(res);
          console.log(res);
        },
        error: this.onError,
      });

    },

    removeDoc: function (doc, docs) {
      var self = this;

      Swal.fire({
        title: 'Are you sure?',
        text: 'Are you sure to delete the entire documentation? Sections and articles inside this doc will be deleted too!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: finestDocs.delConfirmBtn,
        cancelButtonText: finestDocs.cancelBtn,
      }).then(function (action) {
        if (action.isConfirmed) {
          self.removePost(doc, docs, 'The doc has been deleted.');
        }
      });
    },

    addSection: function (doc) {
      Swal.fire({
        title: finestDocs.enter_section_title,
        input: 'text',
        showCancelButton: true,
        confirmButtonColor: '#2271b1',
        inputPlaceholder: finestDocs.write_something,
        confirmButtonText: finestDocs.confirmBtn,
        cancelButtonText: finestDocs.cancelBtn,
        inputValidator: this.swalInputValidator,
      }).then(function (input) {
        if (input.isDismissed) {
          return;
        }

        if (input.value) {
          wp.ajax.send({
            data: {
              action: 'fddocs_create_doc',
              title: input.value.trim(),
              parent: doc.post.id,
              order: doc.child.length,
              _wpnonce: finestDocs.nonce,
            },
            success: function (res) {
              doc.child.push(res);
            },
            error: this.onError,
          });
        }
      });
    },

    removeSection: function (section, sections) {
      var self = this;

      Swal.fire({
        title: finestDocs.delConfirm,
        text: finestDocs.delConfirmTxt,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: finestDocs.delConfirmBtn,
        cancelButtonText: finestDocs.cancelBtn,
      }).then(function (action) {
        if (action.isDismissed) {
          return;
        }

        if (action.isConfirmed) {
          self.removePost(section, sections);
        }
      });
    },

    addArticle: function (section, event) {
      var parentEvent = event;

      Swal.fire({
        title: finestDocs.enter_doc_title,
        input: 'text',
        showCancelButton: true,
        inputPlaceholder: finestDocs.write_something,
        confirmButtonText: finestDocs.confirmBtn,
        cancelButtonText: finestDocs.cancelBtn,
        inputValidator: this.swalInputValidator,
      }).then(function (input) {
        if (input.isDismissed) {
          return;
        }

        if (input.value === false || input.value === '') {
          return false;
        }

        wp.ajax.send({
          data: {
            action: 'fddocs_create_doc',
            title: input.value,
            parent: section.post.id,
            status: 'draft',
            order: section.child.length,
            _wpnonce: finestDocs.nonce,
          },
          success: function (res) {
            section.child.push(res);

            var articles = jQuery(parentEvent.target)
              .closest('.section-title')
              .next();

            if (articles.hasClass('collapsed')) {
              articles.removeClass('collapsed');
            }
          },
          error: function (error) {
            alert(error);
          },
        });
      });
    },


    removeArticle: function (article, articles) {
      var self = this;

      Swal.fire({
        title: finestDocs.delConfirm,
        text: finestDocs.delConfirmTxt,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#DD6B55',
        confirmButtonText: finestDocs.delConfirmBtn,
        cancelButtonText: finestDocs.cancelBtn,
      }).then(function (action) {
        if (action.isConfirmed) {
          self.removePost(article, articles);
        }
      });
    },

    removePost: function (index, items, message) {
      message = message || 'This post has been deleted';

      wp.ajax.send({
        data: {
          action: 'fddocs_remove_doc',
          id: items[index].post.id,
          _wpnonce: finestDocs.nonce,
        },
        success: function () {
          Vue.delete(items, index);
          Swal.fire({
            title: 'Deleted!',
            text: message,
            icon: 'success',
          });
        },
        error: function (error) {
          alert(error);
        },
      });
    },

    toggleCollapse: function (event) {
      jQuery(event.target).siblings('ul.articles').slideToggle().toggleClass('collapsed').parent('li').siblings('li').children('ul.articles').slideUp();
    },
  },
});



insertShortcode = function (name) {
  var win = window.dialogArguments || opener || parent || top;
  var shortcode = '[testcode name=' + name + ']';
  win.send_to_editor(shortcode);
}

jQuery(function ($) {
  $('#insert_shortcode').bind('click', function () {
    var name = $('#name').val();
    insertShortcode(name);
  });
});