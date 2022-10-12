@php
    $categories = get_the_category( $post->ID );
@endphp

<div class="event-wrapper flex flex-col md:flex-row space-y-4 md:space-y-0 space-x-0 md:space-x-8 border-t-2 border-darkgrey-400 py-6 md:py-4 group">
    <div class="basis-full md:basis-1/3 lg:basis-2/5 xl:basis-1/3">
        <div class="flex flex-col">
            <div class="image-wrapper not-prose overflow-hidden">
                <a href="{{ the_permalink() }}">{{ the_post_thumbnail( $preview_size, ['class' => 'transition-transform duration-300 ease-in-out md:group-hover:scale-110']) }}</a>
            </div>
        </div>
    </div>
    <div class="basis-full md:basis-8/12 xl:basis-1/2">
        <a href="{{ the_permalink() }}" class="no-underline"><h4 class="group-hover:text-primary">{{ the_title() }}</h4></a>
        <div class="text-base">{{ get_the_date() }}</div>
        {{ the_excerpt() }}
        <a class="no-underline transition-transform hover:no-underline group-hover:origin-center group-hover:text-primary group-hover:translate-x-2 !mb-3 block text-base" href="{{ the_permalink() }}">Weiterlesen <i class="fa-light fa-arrow-right-long"></i></a>
    </div>
    <div class="flex basis-auto md: md:basis-1/4 lg:basis-1/4  items-start content-start">
        <div class="wp-block-buttons">
            @if (!empty($categories))
                @foreach ($categories as $category)
                    <div class="wp-block-button is-style-outline">
                        <a href="{{ the_permalink() }}" class="wp-block-button__link whitespace-pre group-hover:border-primary group-hover:bg-primary group-hover:text-white">{{ $category->name }}</a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
