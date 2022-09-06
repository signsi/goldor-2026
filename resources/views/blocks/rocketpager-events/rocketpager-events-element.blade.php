@php
    $categories = get_the_category( $post->ID );
@endphp

<div class="event-wrapper flex flex-col md:flex-row space-y-4 md:space-y-0 space-x-0 md:space-x-8 border-t-2 border-darkgrey-400 py-6 md:py-4 group">
    <div class="basis-full md:basis-1/3 lg:basis-2/5 xl:basis-1/3">
        <div class="flex flex-col-reverse xl:flex-row">
            <div class="basis-full md:basis-1/2">
                <div class="text-base">{{ get_the_date() }}</div>
            </div>
            <div class="basis-full lg:basis-1/2">
                <div class="image-wrapper not-prose overflow-hidden">
                    <a href="{{ the_permalink() }}">{{ the_post_thumbnail( $preview_size, ['class' => 'transition-transform duration-300 ease-in-out md:group-hover:scale-110 mb-4']) }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="basis-full md:basis-8/12 xl:basis-1/2">
        <h4>{{ the_title() }}</h4>
        {{ the_excerpt() }}
        <a class="no-underline transition-transform hover:no-underline group-hover:origin-center group-hover:text-primary group-hover:translate-x-2 !mb-3 block text-base" href="{{ the_permalink() }}">Weiterlesen <i class="fa-light fa-arrow-right-long"></i></a>
    </div>
    <div class="flex basis-auto md: md:basis-1/4 lg:basis-1/4  lg:justify-end">
        <div class="wp-block-buttons flex gap-2 flex-wrap items-start">
            @if (!empty($categories))
                @foreach ($categories as $category)
                    <div class="wp-block-button is-style-outline inline-block">
                        <span class="wp-block-button__link whitespace-pre group-hover:border-orange group-hover:bg-orange group-hover:text-white">{{ $category->name }}</span>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
