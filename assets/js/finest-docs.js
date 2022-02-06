+(function ($) {
  var is_active = false;

  var finestDocs = {
    init: function () {
      this.toc();
      $('.fddocs-container, .fddocs-container-fluid').parents('.ast-container').removeClass('ast-container');
      $('.fddocs-footer-feedback').on('click', 'span.like, span.dislike', this.feedback);
      $('ul.fddocs-nav-list .page_item_has_children').append('<span class="toggle-menu dashicons dashicons-arrow-up-alt2"></span>');
      $('ul.fddocs-nav-list .page_item_has_children.current_page_parent').addClass('active');

      $('ul.fddocs-nav-list .page_item_has_children').on(
        'click',
        function (event) {
          // event.preventDefault();
          var self = $(this),
            parent = self.closest('.page_item');
          parent.siblings('li').removeClass('active');
          parent.toggleClass('active');
          parent.children('.children').slideToggle(300).parent('li').siblings('li').children('.children').slideUp();

        }
      );

      // doc grid masonry 
      if ($.fn.masonry) {
        $('.fddocs-masonry').masonry({
          // options
          itemSelector: '.fddocs-masonry>div',

        });

        $('.fddoc-print').click(function (e) {
          e.preventDefault();


        }, this.docPrint)
      }


    },

    docPrint: function () {

      var title = document.querySelector('.fddoc-single-title');
      var content = document.querySelector('.fddocs-entry-content');
      var newWin = window.open('', 'Print-Window');

      newWin.document.open();

      newWin.document.write('<html ><body onload="window.print()">' + title.innerHTML + content.innerHTML + '</body></html>');

      newWin.document.close();

      setTimeout(function () {
        newWin.close();
      }, 10);

    },
    feedback: function (e) {
      e.preventDefault();

      // return if any request is in process already
      if (is_active) {
        return;
      }
      var self = $(this),
        wrap = self.closest('.fddocs-footer-feedback'),
        data = {
          post_id: self.data('id'),
          type: self.data('type'),
          action: 'fddocs_feedback',
          _wpnonce: fddocs_vars.nonce,
        };

      $.post(fddocs_vars.ajaxurl, data, function (resp) {

        wrap.addClass('disabled');
        wrap.find('.feedback-text').html(resp.data);
        wrap.find('span.like,span.dislike').remove();
        is_active = false;
      });
    },

    toc: function () {

      var $autoc = $(".autoc");
      var $content = $('.fddocs-entry-content');
      var stopAt = $autoc.data("stopat");
      var hs = [];
      switch (stopAt) {
        case "h6":
          hs.push("h6");
        case "h5":
          hs.push("h5");
        case "h4":
          hs.push("h4");
        case "h3":
          hs.push("h3");
        case "h2":
          hs.push("h2");
          break;
      }

      hs = hs.join();
      var $heads = $content.find(hs);
      if ($heads.length === 0) {
        $autoc.parent('.fddocs-autoc-wrap').hide();
        return;
      }
      var toc = "";
      toc += "<h2>Table of Contents</h2><ul>";
      $heads.each(function () {
        var $this = $(this);
        var tag = $this[0].tagName;
        var txt = $this.text();
        var slug = slugify(txt);
        $this.attr("data-linked", slug);
        toc += '<li class="autoc-level-' + tag + '">';
        toc += '<a href="#" data-linkto="' + slug + '">' + txt + "</a></li>";
      });
      toc += "</ul>";
      $autoc.append(toc);
      $(".autoc ul").on("click", "a", function (e) {
        e.preventDefault();
        $([document.documentElement, document.body]).animate({
          scrollTop: $content.find('[data-linked="' + $(this)
              .attr("data-linkto") + '"]').offset()
            .top - parseInt($autoc.attr("data-offset"), 10)
        }, 2000);
      });

    }

  };

  function slugify(text) {
    return text.toString().toLowerCase()
      .replace(/\s+/g, "-") // Replace spaces with -
      .replace(/[^\w\-]+/g, "") // Remove all non-word chars
      .replace(/\-\-+/g, "-") // Replace multiple - with single -
      .replace(/^-+/, "") // Trim - from start of text
      .replace(/-+$/, ""); // Trim - from end of text
  }
  $(function () {
    finestDocs.init();
  });


  $('.fddoc-sidebar-trigger').on('click', function (event) {
    $('#mainnav .fddoc-nav-inner').toggleClass('active');
  });

  $(window).resize(function () {
    var w = $(window).width();
    if (w > 768) {
      $('#mainnav .fddoc-nav-inner').removeAttr('style');
    }
  });

})(jQuery);