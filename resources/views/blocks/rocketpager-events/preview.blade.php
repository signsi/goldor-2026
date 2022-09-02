@php

    //Variables
    $post_category = block_value( 'category' );
    $category_name = $post_category ? $post_category->name : '';
    $preview_size = block_value('preview-size');

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

@endphp


@extends('blocks.helpers.block-wrapper', ['ignoreAnimation' => true])

@section('content-section')
    <div class="sticky top-0">
    @if ($the_query->have_posts())
        @while ($the_query->have_posts())
            @php
                $the_query->the_post();
                global $post;
            @endphp

            <div class="event-wrapper flex flex-col md:flex-row space-y-8 md:space-y-0 space-x-0 md:space-x-8 border-t-2 border-darkgrey-400 py-6 md:py-4 group">
                <div class="basis-1/3">
                    <div class="flex flex-row">
                        <div class="basis-1/2">
                            <div class="text-sm">{{ get_the_date() }}</div>
                        </div>
                        <div class="basis-1/2">
                            <div class="image-wrapper not-prose overflow-hidden">
                                <a href="{{ the_permalink() }}">{{ the_post_thumbnail( $preview_size, ['class' => 'transition-transform duration-300 ease-in-out group-hover:scale-110']) }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="basis-1/3">
                    <h4>{{ the_title() }}</h4>
                    {{ the_excerpt() }}
                    <a class="no-underline transition-transform hover:no-underline group-hover:origin-center group-hover:text-primary group-hover:translate-x-2 !mb-3 block" href="{{ the_permalink() }}">Weiterlesen <i class="fa-light fa-arrow-right-long"></i></a>
                </div>
                <div class="basis-1/3">
                    <div class=" wp-block-button is-style-outline">
                        <span class="wp-block-button__link whitespace-pre group-hover:border-orange group-hover:bg-orange group-hover:text-white">Standort</span>
                    </div>
                </div>
            </div>

        @endwhile
    @endif
    </div>

    {{-- Restore original Post Data --}}
    @php wp_reset_postdata(); @endphp
@overwrite