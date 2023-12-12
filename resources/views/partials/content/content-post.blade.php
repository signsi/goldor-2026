<a href="{{ the_permalink() }}" class="group bg-secondary">
    <div class="image-wrapper overflow-hidden">
        {{ the_post_thumbnail( '4-3-thumb', ['class' => 'transition-transform duration-300 ease-in-out group-hover:scale-110']) }}
    </div>
    <div class="content-wrapper p-medium flex flex-col space-y-small">

        <div class="title-wrapper">
            <div class="text-xs">
                @include('partials.meta.entry-meta-date')
            </div>
            <h4 class="my-0">{{ the_title() }}</h4>
        </div>
        <div class="text-wrapper text-sm [&_*]:text-sm">
            {!! wp_trim_words( get_the_excerpt(), 20, '...' ) !!}
        </div>
        <span class="no-underline text-xs transition-transform hover:no-underline group-hover:origin-center group-hover:text-primary group-hover:translate-x-2 block">{{ App\pl__('Weiterlesen') }} <i class="fa-light fa-arrow-right-long"></i></span>
    </div>
</a>