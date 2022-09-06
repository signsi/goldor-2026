@php
use function Roots\asset;

//Variables
$animation = App\getAnimation();
$preview_size = block_value('preview-size');
$number_of_posts = block_value('number-of-posts');
$post_category = block_value('category');
$category_name = $post_category ? $post_category->name : '';
$row_per_col = App\setColumns();
$post_type = 'events';

$args = [
    'post_type' => $post_type,
    'post_status' => 'publish',
    'posts_per_page' => $number_of_posts,
    'category_name' => $category_name,
    'order' => 'ASC',
    // 'nopaging' => true,
];

$the_query = new WP_Query($args);

$block_args = [
    'animation' => $animation,
    'preview_size' => $preview_size,
];

$json_query_args = wp_json_encode($args);
$json_block_args = wp_json_encode($block_args);

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

    <div class="ajax-container" data-query-args="{{ $json_query_args }}"
        data-block-args="{{ $json_block_args }}">
        <!-- Elemente werden über AJAX geladen -->
    </div>

    {{-- Loading Image --}}
    <div class="loading-image flex items-center justify-center my-gutter">
        <img data-src="{{ asset('images/puff.svg') }}">
    </div>

    {{-- Load More Button --}}
    <div class="wp-block-button is-style-outline flex items-center justify-center mt-element">
        <a class="wp-block-button__link">{!! App\pl_e('Weitere Veranstaltungen') !!}</a>
    </div>


    {{-- Restore original Post Data --}}
    @php wp_reset_postdata(); @endphp
@overwrite