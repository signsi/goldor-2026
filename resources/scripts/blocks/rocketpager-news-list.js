import PQueue from 'p-queue';

window.useAjax = true;

// Dieses Objekt enthält einen Teil der nötigen Funktionen.
const RocketPagerAjaxLoad = ($rocketpager_container) => {
    return {
        _rocketpager_container: $rocketpager_container,
        _container: $rocketpager_container.children('div.ajax-container'),
        _loadingImage: $rocketpager_container.find('.loading-image img'),
        _loadButton: $rocketpager_container.find('.wp-block-button .wp-block-button__link'),
        _query_args: $rocketpager_container.children('div.ajax-container').first().data("query-args"),
        _block_args: $rocketpager_container.children('div.ajax-container').first().data("block-args"),
        _page: 0,
        _lastPage: false,
        _queue: new PQueue(),
        _delay: 500,
        // Die init-Methode startet die Scroll-Detektion und triggert den Event `did-interval-scroll`.
        init() {
            this._query_args.paged = this._page;
            console.log(load_more_posts.ajaxurl);

            this.reset();
            this.handleCategorySelection(this);
            this._loadButton.on('click', () => {
                this.loadPosts();
            });
        },
        reset() {
            this._container.empty();
            this._loadButton.hide();

            if(!this._loadingImage.attr('src')){
                const image_src = this._loadingImage.data('src');
                this._loadingImage.attr('src', image_src);
                this._loadingImage.removeAttr('data-src');
            }
            this._loadingImage.show();

            this._page = 0;
            this._query_args.paged = this._page;
            this._lastPage = false;

            const json_query_args = JSON.stringify(this._query_args);
            this.getNumOfPosts(json_query_args);
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
            const json_args = JSON.stringify(args);
            this.getPosts(json_args);
        },
        addPostToQueue: (post, curr_object) => {
            //P-Queue needed?
            const task = setTimeout(() => {
                curr_object._container.append(post);
            }, curr_object._delay)

            curr_object._queue.add(() => task)
        },
        handleResponsePosts(json_posts_array, curr_object) {
            curr_object._loadingImage.hide();
            // ist die Antwort leer, brechen wir ab
            if (!json_posts_array.length) {
                curr_object._container.addClass('no-results');
            } else {
                // haben wir Beiträge erhalten, parsen wir das JSON und fahren mit der Verarbeitung fort
                const posts_array = JSON.parse(json_posts_array)
                curr_object._container.removeClass('no-results');

                // Haben wir die letzte Seite erreicht, setzen wir die ensprechende Variable
                if (curr_object._query_args.paged == curr_object._query_args.max_num_pages) {
                    curr_object._lastPage = true;
                    if(curr_object._loadButton.is(':visible')){
                        curr_object._loadButton.fadeOut(200);
                    }
                }
                else{
                    if(!curr_object._loadButton.is(':visible')){
                        curr_object._loadButton.fadeIn(200);
                    }
                }
                // Wir gehen alle Beiträge durch, und laden die Beiträge verspätet nacheinander
                // Auf der letzten Seite zeigen wir zusätzlich die Endbox an.
                posts_array.map(post => $(post.content))
                    .forEach((post, i) => {

                        if (window.useAjax) {
                            curr_object.addPostToQueue(post, curr_object)
                        }

                    })
            }

        },
        handleResponseNumOfPosts(json_posts_array, curr_object) {
            // ist die Antwort leer, brechen wir ab
            if (json_posts_array.length)  {
                // haben wir Beiträge erhalten, parsen wir das JSON und fahren mit der Verarbeitung fort
                curr_object._query_args.max_num_pages = parseInt(json_posts_array);
            }

            curr_object.loadPosts();
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
        getNumOfPosts(json_query_args) {
            const requestOptions = {
                url: load_more_posts.ajaxurl,
                type: 'post',
                data: {
                    action: 'rocket_ajax_get_max_num_pages',
                    json_data: json_query_args
                }
            }
            $.ajax({
                ...requestOptions,
                success: (data) => {
                    this.handleResponseNumOfPosts(data, this)
                },

                error: (jqXHR, exception) => {
                    console.error('AJAX Call for getNumOfPosts() not successfull:\n', jqXHR, exception);
                }
            });
        },
    };
}

$('.rocketpager-news-list').each(function() {
    const rocketpagerNewsList = RocketPagerAjaxLoad($(this).first());
    rocketpagerNewsList.init();
});
