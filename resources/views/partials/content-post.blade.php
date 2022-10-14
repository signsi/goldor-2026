<div class="group break-inside-avoid mb-4 lg:mb-6 bg-secondary">
    <a href="{{ the_permalink() }}" class="no-underline text-font">
        <div class="image-wrapper  overflow-hidden">
            {{ the_post_thumbnail( '4-3-thumb', ['class' => 'transition-transform duration-300 ease-in-out group-hover:scale-110']) }}
        </div>
        <div class="content-wrapper p-4 lg:py-gutter lg:px-gutter">
            <div class="date-wrapper mb-2">
                <span class="entry-date block text-sm">{{ get_the_date() }}</span>
            </div>
            <div class="title-wrapper mb-6">
                <h3>{{ the_title() }}</h3>
            </div>
            <div class="text-wrapper mb-4 md:mb-6 lg:mb-8">
                {{ the_excerpt() }}
            </div>
            <span class="no-underline transition-transform hover:no-underline group-hover:origin-center group-hover:text-primary group-hover:translate-x-2 !mb-3 block" href="{{ the_permalink() }}">Weiterlesen <i class="fa-light fa-arrow-right-long"></i></span>
        </div>
    </a>
</div>