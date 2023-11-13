<div class="wp-block-group is-style-layout-full">
    <div class="wp-block-group scroll-reveal anim__fadeInUp">
    <h1>{{ App\pl__('Archiv - Titel') }}</h1>
        <div class="grid grid-col-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
            @while(have_posts()) @php(the_post())
                @includeFirst(['partials.content.content-' . get_post_type(), 'partials.content.content'])
            @endwhile
        </div>
    </div>
    <div class="wp-block-group mt-element">
        @include('partials.components.postnavigation')
    </div>
</div>