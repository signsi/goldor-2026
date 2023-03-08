import PQueue from 'p-queue';

window.useAjax = true;

// Dieses Objekt enthält einen Teil der nötigen Funktionen.
const RocketPagerAjaxLoad = ($rocketpager_container) => {
    return {
        _rocketpager_container: $rocketpager_container,
        _container: $rocketpager_container.children('div.ajax-container'),
        _loadingImage: $rocketpager_container.find('.loading-image img'),
        _loadButton: $rocketpager_container.find('.ajax-load-more'),
        _query_args: $rocketpager_container.children('div.ajax-container').first().data("query-args"),
        _block_args: $rocketpager_container.children('div.ajax-container').first().data("block-args"),
        _page: 1,
        _lastPage: false,
        _queue: new PQueue(),
        _delay: 0,
        _initial: true,
        init() {
            this._query_args.paged = this._page;
            if(this._page >= this._query_args.max_num_pages){
                this._lastPage = true;
                this._loadButton.hide();
            }

            this.handleCategorySelection(this);
            this._loadButton.on('click', () => {
                this.loadPosts();
            });

            if(!this._loadingImage.attr('src')){
                const image_src = this._loadingImage.data('src');
                this._loadingImage.attr('src', image_src);
                this._loadingImage.removeAttr('data-src');
            }
            this._loadingImage.hide();
        },
        reset() {
            this._container.empty();
            this._loadButton.hide();
            this._loadingImage.show();

            this._page = 0;
            this._query_args.paged = this._page;
            this._lastPage = false;

            this.loadPosts();
        },
        changeCategory(category_slug) {
            this._query_args.category_name = category_slug;

            this.reset();
        },
        handleCategorySelection(curr_object) {
            curr_object._rocketpager_container.find(".more-link").on("click", function() {
                $(this).toggleClass("is-checked");

                var categories = '';

                curr_object._rocketpager_container.find(".more-link").each(function(){
                    if($(this).hasClass('is-checked')){
                        categories += categories == '' ? '' : ', ';
                        categories += $(this).attr("data-filter");
                    }
                })

                curr_object.changeCategory(categories);
           });
        },
        loadPosts() {
            // Wir sind jetzt am Laden neuer Beiträge
            this._loadingImage.show();
            // Hier zählen wir die bereits geladenen Seiten hoch, pro Aufruf fragen wir eine Seite à 3 Beiträge an
            this._page = this._page + 1;
            this._query_args.paged = this._page;
            // Die Parameter geben wir dem Ajax-Request mit
            const args = {};
            args.query_args = this._query_args;
            args.block_args = this._block_args;
            args.meta_query = args.query_args.hasOwnProperty('meta_query') ? args.query_args.meta_query[0] : {};
            const json_args = JSON.stringify(args);
            this.getPosts(json_args);
        },
        handleResponsePosts(json_res, curr_object) {
            const res = JSON.parse(json_res);
            const elements = res.elements;
            curr_object._query_args.max_num_pages = res.max;
            curr_object._loadingImage.hide();
            // ist die Antwort leer, brechen wir ab
            if (elements == '') {
                curr_object._container.addClass('no-results');
            } else {
                // haben wir Beiträge erhalten, parsen wir das JSON und fahren mit der Verarbeitung fort
                curr_object._container.removeClass('no-results');

                // Haben wir die letzte Seite erreicht, setzen wir die ensprechende Variable
                if (curr_object._query_args.paged == curr_object._query_args.max_num_pages) {
                    curr_object._lastPage = true;
                    if(curr_object._loadButton.is(':visible')){
                        curr_object._loadButton.hide();
                    }
                }
                else{
                    if(!curr_object._loadButton.is(':visible')){
                        curr_object._loadButton.show();
                    }
                }
                // Die neuen Beiträge werden angehängt
                curr_object._container.append(elements);
            }

        },
        getPosts(json_args) {
            const requestOptions = {
                url: load_more_posts.ajaxurl,
                type: 'post',
                data: {
                    action: 'rocket_ajax_load_more',
                    json_data: json_args,
                }
            }
            $.ajax({
                ...requestOptions,
                success: (data) => {
                    this.handleResponsePosts(data, this)
                },

                error: (jqXHR, exception) => {
                    console.error('AJAX Call for getPosts() not successfull:\n', jqXHR, exception);
                }
            });
        },
    };
}

$('.rocketpager-has-ajax').each(function() {
    const rocketpagerNewsList = RocketPagerAjaxLoad($(this).first());
    rocketpagerNewsList.init();
});
