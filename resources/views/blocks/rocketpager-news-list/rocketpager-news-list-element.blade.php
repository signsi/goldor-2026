<div class="group hover:shadow-lg bg-secondary has-background hover:bg-primary transition-all {{ $animation }}">
    <a href="{{ the_permalink() }}" class="no-underline group-hover:text-white">
        <div class="image-wrapper  overflow-hidden">
            {{ the_post_thumbnail( $preview_size, ['class' => 'transition-transform duration-300 ease-in-out group-hover:scale-110']) }}
        </div>
        <div class="content-wrapper group-hover:text-white p-4 lg:py-gutter lg:px-gutter">
            <div class="date-wrapper mb-2">
                @if ( !$disable_meta_date )
                    <span class="entry-date block text-white text-sm">{{ get_the_date() }}</span>
                @endif
            </div>
            <div class="title-wrapper mb-6">
                <h3 class="group-hover:text-white">{{ the_title() }}</h3>
            </div>
            <div class="text-wrapper mb-4 md:mb-6 lg:mb-8">
                {{ the_excerpt() }}
            </div>
            <span class="text-white text-sm no-underline transition-transform hover:no-underline group-hover:origin-center group-hover:text-white group-hover:translate-x-2 !mb-3 block" href="{{ the_permalink() }}">Weiterlesen <i class="fa-light fa-arrow-right-long"></i></span>
        </div>
    </a>
</div>