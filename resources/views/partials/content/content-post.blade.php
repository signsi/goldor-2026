<div class="group bg-primarylight">
    <a href="{{ the_permalink() }}" class="no-underline text-font">
        <div class="image-wrapper  overflow-hidden">
            {{ the_post_thumbnail( '4-3-thumb', ['class' => 'transition-transform duration-300 ease-in-out group-hover:scale-110']) }}
        </div>
        <div class="content-wrapper p-gutter lg:py-gutter lg:px-gutter">
            <div class="date-wrapper text-sm">
                @include('partials.meta.entry-meta-date')
            </div>
            <div class="title-wrapper mt-1 mb-typography">
                <h4>{{ the_title() }}</h4>
            </div>
            <div class="text-wrapper text-sm mb-typography [&_*]:text-sm">
                {{ the_excerpt() }}
            </div>
            <span class="no-underline text-sm transition-transform hover:no-underline group-hover:origin-center group-hover:text-primary group-hover:translate-x-2 block" href="{{ the_permalink() }}">{{ App\pl__('Weiterlesen') }} <i class="fa-light fa-arrow-right-long"></i></span>
        </div>
    </a>
</div>