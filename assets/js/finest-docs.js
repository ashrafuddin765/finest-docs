+(function ($) {
  var pending_ajax = false;

  var finestDocs = {
    init: function () {
      this.toc();

      $('ul.finest-nav-list .page_item_has_children> a').append('<span class="toggle-menu dashicons dashicons-arrow-up-alt2"></span>');


      $('ul.finest-nav-list .page_item_has_children .toggle-menu').on(
        'click',
        function (event) {
          event.preventDefault();
          var self = $(this),
            parent = self.closest('.page_item');

            parent.children('.children').slideToggle(300).parent('li').siblings('li').children('.children').slideUp();

        }
      );



      // jQuery('ul.finest-nav-list .page_item_has_children ').on("click", ".togle-menu", function (e) {
      //   e.preventDefault();
      //   alert();
      //   var self = $(this);
      // });


    },

    toc: function () {

      var $autoc = $(".autoc");
      var $content = $('.entry-content');
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
      console.log(hs);
      hs = hs.join();
      var $heads = $content.find(hs);
      if ($heads.length === 0) {
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

  // // initialize anchor.js
  // anchors.options = {
  //   icon: '#',
  // };
  // anchors.add(
  //   '.finestDocs-single-content .entry-content > h2, .finestDocs-single-content .entry-content > h3'
  // );
})(jQuery);