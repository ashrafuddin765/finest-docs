new Vue({
    el: '#fddocs-ia',
    data: {
        editurl: '',
        viewurl: '',
        docs: [],
        componentKey: 0,
    },

    mounted: function () {
        var self = this,
            dom = jQuery(self.$el);

        dom.find('ul.docs').removeClass('not-loaded').addClass('loaded');

        jQuery.post(
            fddocs_vars.ajaxurl, {
                action: 'fddocs_get_articles',
                _wpnonce: fddocs_vars.nonce,
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

        searchArticle: function (el) {
            var that = this;
            this.docs = this.docs || [],
                form = el.path[0],
                doc_search = jQuery(form).find('[name=doc_search]').val(),
                article_search = jQuery(form).find('[name=article_search]').val();

            var data = {
                action: 'fddocs_search_article',
                doc_search: doc_search,
                article_search: article_search,
                _wpnonce: fddocs_vars.nonce,
            }

            jQuery.post(fddocs_vars.ajaxurl, data, function (resp) {

                that.docs = resp.data
            });

        },
        getChildren: function (el) {
            var that = this;
            this.docs = this.docs || [],
                form = el.path[0],
                searchVal = jQuery(form).find('[name=s]').val();
         
            var data = {
                action: 'fddocs_doc_children',
                _wpnonce: fddocs_vars.nonce,
            }

            jQuery.post(fddocs_vars.ajaxurl, data, function (resp) {

                that.docs = resp.data
                console.log(resp);
            });

        },
        showArticle: function (el, id) {
            var wrap = el.path[0]

         
            var data = {
                action: 'fddocs_show_article',
                id: id,
                _wpnonce: fddocs_vars.nonce,
            }

            jQuery.post(fddocs_vars.ajaxurl, data, function (resp) {
                jQuery(wrap).parent().find('.full-article .entry-content').html(resp.data.post_content);
                jQuery(wrap).parent().find('.full-article').fadeIn(300);
            });

        },
        hideArticle: function(el){
            jQuery(el.path[0]).parent().fadeOut(300);
            jQuery(el.path[0]).siblings('.entry-content').html('');
        },
        showArticles: function (el, id) {
            var wrap = el.path[0]

                jQuery(wrap).siblings('.sections').addClass('active');

        },

        hideArticles: function(el){

            var wrap = el.path[0]
            jQuery(wrap).parent('.sections').removeClass('active');
        }


    },
});