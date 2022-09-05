@php

    //Variables
    $animation = App\getAnimation();
    $preview_size = block_value('preview-size');
    $post_category = block_value('category');
    $category_name = $post_category ? $post_category->name : '';
    $post_type = 'events';

    $block_args = [
        'preview_size' => $preview_size,
    ];

    $args = array(
        'post_type' => 'events',
        'post_status' => 'publish',
        'category_name' => $category_name,
        'orderby' => 'menu_order ID',
        'order' => 'ASC',
        'nopaging' => true,
    );
    $the_query = new WP_Query($args);

    $block_args = [
        'animation' => $animation,
        'preview_size' => $preview_size,
    ];

    //  🐈 🐈‍⬛
    $cats = App\get_categories_by_post_type($post_type, [
        'orderby' => 'id',
        'order' => 'ASC',
    ]);

    $categories = [];
    foreach ($cats as $cat) {
        array_push($categories, $cat);
    }


@endphp


@extends('blocks.helpers.block-wrapper', ['ignoreAnimation' => true])

@section('content-section')

    {{-- Filter --}}
    @if (!empty($categories) & empty($category_name))
        <div class="filter-button-group w-full my-6 md:my-8 lg:my-12 xl:my-16 ml-0 mr-auto lg:max-w-[75%]">
            <ul class="list-none grid grid-cols-2 lg:grid-cols-3 gap-2 lg:gap-4 m-0">
                @foreach ($categories as $category)
                    <a class="more-link group no-underline hover:cursor-pointer" data-filter={{ $category->slug }}
                        alt='{!! App\pl_e('Kategorie') !!} "{{ $category->name }}"'>
                        <li
                            class="relative pl-2 min-w-[12ch] md:min-w-fit transition-colors duration-300 before:absolute before:text-darkgray before:font-icon before:content-square before:font-light before:-left-6 group-hover:text-primary">
                            {{ $category->name }}</li>
                    </a>
                @endforeach
            </ul>
        </div>
    @endif


    @if ($the_query->have_posts())
        @while ($the_query->have_posts())
            @php
                $the_query->the_post();
                global $post;
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
                <div class="basis-full md:basis-8/12 lg:basis-auto xl:basis-1/2">
                    <h4>{{ the_title() }}</h4>
                    {{ the_excerpt() }}
                    <a class="no-underline transition-transform hover:no-underline group-hover:origin-center group-hover:text-primary group-hover:translate-x-2 !mb-3 block text-base" href="{{ the_permalink() }}">Weiterlesen <i class="fa-light fa-arrow-right-long"></i></a>
                </div>
                <div class="basis-auto md: md:basis-1/4 lg:basis-auto">
                    <div class="wp-block-buttons flex gap-2 flex-wrap items-center">
                        @if (!empty($categories) & empty($category_name))
                            @foreach ($categories as $category)
                                <div class="wp-block-button is-style-outline inline-block">
                                    <span class="wp-block-button__link whitespace-pre group-hover:border-orange group-hover:bg-orange group-hover:text-white">{{ $category->name }}</span>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

        @endwhile
    @endif

    {{-- Restore original Post Data --}}
    @php wp_reset_postdata(); @endphp
@overwrite