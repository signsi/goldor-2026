@php
use function Roots\asset;

//Variables
$element_path = App\getAjaxElementPath();
$animation = App\getAnimation();
$preview_size = block_value('preview-size');
$number_of_posts = block_value('number-of-posts');
$post_category = block_value('category');
$category_name = $post_category && !is_wp_error( $post_category ) ? $post_category->name : '';
$row_per_col = App\setColumns();
$post_type = 'post';

$args = [
    'post_type' => $post_type,
    'post_status' => 'publish',
    'posts_per_page' => $number_of_posts,
    'category_name' => $category_name,
];

$the_query = new WP_Query($args);
$args['max_num_pages'] = $the_query->max_num_pages;

$block_args = [
    'element_path' => $element_path,
    'animation' => $animation,
    'preview_size' => $preview_size,
];

$json_query_args = wp_json_encode($args, JSON_FORCE_OBJECT);
$json_block_args = wp_json_encode($block_args, JSON_FORCE_OBJECT);

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

@extends('blocks.helpers.block-wrapper', ['element_classes' => 'rocketpager-has-ajax', 'ignoreAnimation' => true])

@section('content-section')
    {{-- Filter --}}
    @if (block_value('enableFilter'))
        @if (!empty($categories) & empty($category_name))
            <div class="filter-button-group">
                <ul class="wp-block-buttons flex-wrap !pl-0 items-center justify-start my-xl hidden lg:flex">
                    @foreach ($categories as $category)
                        <a class="more-link group no-underline hover:cursor-pointer wp-block-button" data-filter={{ $category->slug }}
                            alt='{!! App\pl_e('Kategorie') !!} "{{ $category->name }}"'>
                            <li
                                class="wp-block-button__link wp-element-button my-0">
                                {{ $category->name }}</li>
                        </a>
                    @endforeach
                </ul>

                <div id="menu-button" class="relative flex justify-end text-right mb-rp-20 lg:hidden">
                    <div>
                        <button type="button" id="openFilterMenu" class="inline-flex w-full justify-center gap-x-1.5 bg-white px-3 py-2 text-sm font-semibold text-font shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        {!! App\pl_e('Filter anwenden') !!}
                        <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                        </button>
                    </div>
                    <div id="filterMenu" class="absolute right-0 z-10 mt-0 top-full mt-rp-20 origin-top-right bg-white p-2.5 shadow-lg focus:outline-none transition ease-in duration-75 hidden transform opacity-0 scale-95" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <ul class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex my-0 lg:hidden !gap-1 !pl-0">
                            @foreach ($categories as $category)
                                <a class="more-link group no-underline hover:cursor-pointer wp-block-button w-full" data-filter={{ $category->slug }}
                                    alt='{!! App\pl_e('Kategorie') !!} "{{ $category->name }}"'>
                                    <li
                                        class="wp-block-button__link wp-element-button my-0 block">
                                        {{ $category->name }}</li>
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    @endif

    <div class="ajax-container grid{{ $row_per_col }} gap-gutter" data-query-args="{{ $json_query_args }}" data-block-args="{{ $json_block_args }}">
        @if ($the_query->have_posts())
            @while ($the_query->have_posts())
                @php
                    $the_query->the_post();
                    global $post;
                @endphp
                @relativeInclude('element')
            @endwhile
        @endif
        {{-- Restore original Post Data --}}
        @php wp_reset_postdata(); @endphp
        <!-- Elemente werden über AJAX geladen -->
    </div>

    {{-- Loading Image --}}
    <div class="loading-image flex items-center justify-center my-medium">
        <img data-src="{{ asset('images/puff.svg') }}" />
    </div>

    {{-- Load More Button --}}
    <div class="wp-block-button wp-block-button is-style-outline flex items-center justify-center mt-xl">
        <a class="wp-block-button__link ajax-load-more">{{ App\pl__('Mehr laden') }}</a>
    </div>
@overwrite
