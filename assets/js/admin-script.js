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


Vue.directive("click-outside", {
  bind(el, binding, vnode) {
    el.clickOutsideEvent = (event) => {
      if (!(el === event.target || el.contains(event.target))) {
        vnode.context[binding.expression](event);
      }
    };
    document.body.addEventListener("click", el.clickOutsideEvent);
  },
  unbind(el) {
    document.body.removeEventListener("click", el.clickOutsideEvent);
  },
});

Vue.directive('sortable', {
  bind: function (el, binding) {
    var $el = jQuery(el);

    $el.sortable({
      items: '> li',
      connectWith: ".sections",


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
    }).disableSelection();;
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

    quickEdit: function (doc, event) {
      var parentEvent = event;

      Swal.fire({
        title: finestDocs.quickedit,
        html: '<label class="swal2-input-label" for="fddocs-input-title">' + finestDocs.title + '</label><input name="fddocs-input-title" id="fddocs-input-title" class="swal2-input" value="' + doc.post.title + '">' +
          '<label class="swal2-input-label" for="fddocs-input-slug">' + finestDocs.slug + '</label><input name="fddocs-input-slug" id="fddocs-input-slug" class="swal2-input" value="' + doc.post.slug + '"> ',
        showCancelButton: true,
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
        var updatedTitle = document.getElementById('fddocs-input-title').value,
          updatedSlug = document.getElementById('fddocs-input-slug').value

        wp.ajax.send({
          data: {
            action: 'fddocs_quick_edit',
            title: updatedTitle,
            slug: updatedSlug,
            post_id: doc.post.id,
            status: 'publish',
            order: doc.child.length,
            _wpnonce: finestDocs.nonce,
          },
          success: function (res) {
            var articles = jQuery(parentEvent.target).parents('.fddocs-row-actions')
              .siblings('a').find('.fddoc-title')
            articles.text(updatedTitle);

            doc.post.title = updatedTitle
            doc.post.slug = updatedSlug

            Swal.fire({
              title: 'Updated!',
              // text: message,
              icon: 'success',
            });
            // if (articles.hasClass('collapsed')) {
            //   articles.removeClass('collapsed');
            // }
          },
          error: function (error) {
            alert(error);
          },
        });
      });
    },

    showCondition: function (doc, event) {
      var parentEvent = event
      that = this;

      Swal.fire({
        title: finestDocs.quickedit,
        html: '<label class="swal2-input-label" for="include_pages">' + finestDocs.include_title + '</label>' + doc.post.include_pages +
          '<label class="swal2-input-label" for="exclude_pages">' + finestDocs.exclude_title + '</label>' + doc.post.exclude_pages,
        showCancelButton: true,
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

        var include_ids = jQuery('#include_pages_' + doc.post.id + '').val(),
          exclude_ids = jQuery('#exclude_pages_' + doc.post.id + '').val()

        var found = false;
        var current_doc = filterByProperty(that.docs, 'id', doc.post.id);

        // console.log(current_doc)
        include_ids.forEach(function (item) {
          var page_exist = filterByProperty(that.docs, 'include_page_id', item, true)

          if (0 != page_exist.length) {


            for (var i = 0; i < page_exist.length; i++) {


              if (page_exist[i] != current_doc[0]) {
                found = true;
                break;
              }
            }

            if (found) {
              return;
            }
          }

        })


        if (found) {
          Swal.fire({
            title: 'Error! ',
            text: 'A page already included in antoher doc!',
            icon: 'error',
          });
          return;
        }
        // for (var i = 0; i < include_ids.length; i++) {
        //   var page_exist = filterByProperty(that.docs, 'include_page_id', include_ids.i)
        //   console.log(include_ids);
        //   if (0 != page_exist.length) {
        //     return;
        //   }
        // }
        wp.ajax.send({
          data: {
            action: 'fddocs_save_include_exclude',
            include_ids: include_ids,
            exclude_ids: exclude_ids,
            post_id: doc.post.id,
            order: doc.child.length,
            _wpnonce: finestDocs.nonce,
          },
          success: function (res) {
            // var articles = jQuery(parentEvent.target).parents('.fddocs-row-actions')
            //   .siblings('a').find('.fddoc-title')
            // articles.text(updatedTitle);
            // console.log(res);
            doc.post.include_pages = res.include_pages;
            doc.post.exclude_pages = res.exclude_pages;

            Swal.fire({
              title: 'Updated!',
              // text: message,
              icon: 'success',
            });
            // if (articles.hasClass('collapsed')) {
            //   articles.removeClass('collapsed');
            // }
          },
          error: function (error) {
            console.log(error);
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
    actionMenu: function (event) {

      jQuery('span.fddocs-row-actions li.active').removeClass('active');
      jQuery(event.path[0]).parent('li').toggleClass('active');
      jQuery(event.path[0]).parent().parent('li').toggleClass('active');

    },
    onClickOutside() {
      jQuery('span.fddocs-row-actions li.active').removeClass('active');

    },
  },
});



insertShortcode = function (name) {
  var win = window.dialogArguments || opener || parent || top;
  var shortcode = '[testcode name=' + name + ']';
  win.send_to_editor(shortcode);
}

jQuery(document).ready(function ($) {
  $('#insert_shortcode').bind('click', function () {
    var name = $('#name').val();
    insertShortcode(name);
  });



  var selectedval = $('#ia_show_all_doc');
  if (selectedval.is(':checked')) {
    console.log('ok')
    $('.fddocs-ia-select-doc').hide();
  } else {
    $('.fddocs-ia-select-doc').show();

  }
  $('#ia_show_all_doc').on('change', function () {
    var selectedval = $(this);
    if (selectedval.is(':checked')) {
      $('.fddocs-ia-select-doc').hide();
    } else {
      $('.fddocs-ia-select-doc').show();

    }

  });


  var selectedval = $('#ia_doc_show_type').val();
  if ('condition' == selectedval) {
    $('.fddoc-setting-info').show();
    $('.ia-show-type-normal').hide();
    console.log('ok');
  } else {
    $('.fddoc-setting-info').hide();
    $('.ia-show-type-normal').show();
  }


  $('#ia_doc_show_type').on('change', function () {
    var selectedval = $(this).val();
    if ('condition' == selectedval) {
      $('.fddoc-setting-info').show();
      $('.ia-show-type-normal').hide();
    } else {
      $('.fddoc-setting-info').hide();
      $('.ia-show-type-normal').show();
    }
  });


  // var limen = jQuery('.fddocs-row-actions li .toggler');
  // $(document).on('click', '.fddocs-row-actions li .toggler', function (e) {
  //   limen.parent('li.active').removeClass('active');


  //   jQuery(this).parent('li').toggleClass('active');
  // })

  // jQuery('body').on('click', function () {
  //   limen.parent('li.active').removeClass('active');
  // })

});

function filterByProperty(array, prop, value, third_level = false) {
  var filtered = [];
  for (var i = 0; i < array.length; i++) {

    var obj = array[i];

    for (var key in obj) {
      if (typeof (obj[key] == "object")) {
        var item = obj[key];


        if (third_level && typeof (item[prop] == 'object')) {

          for (var keyy in item[prop]) {


            var itemm = item[prop][keyy];

            if (itemm == value) {
              filtered.push(item);
            }

          }
        } else if (item[prop] == value) {
          filtered.push(item);
        }


      }
    }

  }

  return filtered;

}