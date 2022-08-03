@php
    use function Roots\asset;

    //Variables
    $animation = App\getAnimation();
    $preview_size = block_value('preview-size');
    $disable_meta = block_value('disable-meta');
    $disable_meta_date = block_value('disable-meta-date');
    $disable_meta_author = block_value('disable-meta-author');
    $disable_meta_category = block_value('disable-meta-category');
    $number_of_posts = block_value( 'number-of-posts' );
    $post_category = block_value( 'category' );
    $category_name = $post_category ? $post_category->name : '';
    $row_per_col = App\setColumns();

    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $number_of_posts,
        'category_name' => $category_name,
    ];
    $the_query = new WP_Query($args);
    $args['max_num_pages'] = $the_query->max_num_pages;

    $block_args = [
        'animation' => $animation,
        'preview_size' => $preview_size,
        'disable_meta' => $disable_meta,
        'disable_meta_date' => $disable_meta_date,
        'disable_meta_author' => $disable_meta_author,
        'disable_meta_category' => $disable_meta_category,
    ];

    $json_query_args = wp_json_encode($args);
    $json_block_args = wp_json_encode($block_args);


    $cats = get_categories( array(
        'orderby' => 'id',
        'order'   => 'ASC',
    ));
    $categories = array();
    foreach( $cats as $cat ) {
        array_push($categories, $cat);
    }
@endphp

@extends('blocks.helpers.block-wrapper', ['ignoreAnimation' => true])

@section('content-section')
    {{-- Filter --}}
    @if ( !empty($categories) & empty($category_name))
        <div class="filter-button-group max-w-slim w-full mb-element mx-auto px-gutter">
            <ul class="list-none flex flex-wrap gap-x-12 justify-evenly m-0 pl-7 border-b-2 border-primary">
                @foreach($categories as $category)
                    <a class="more-link group no-underline hover:cursor-pointer" data-filter={{ $category->slug }} alt='{!! App\pl_e('Kategorie') !!} "{{ $category->name }}"'>
                        <li class="relative pl-2 min-w-[12ch] md:min-w-fit before:absolute before:text-primary before:font-icon before:content-check-circle before:font-normal before:-left-6 group-hover:text-secondary">{{ $category->name }}</li>
                    </a>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="ajax-container grid gap-gutter{{ $row_per_col }}" data-query-args="{{ $json_query_args }}" data-block-args="{{ $json_block_args }}">
        <!-- Elemente werden über AJAX geladen -->
    </div>

    {{-- Loading Image --}}
    <div class="loading-image flex items-center justify-center my-gutter">
        <img data-src="{{ asset('images/puff.svg') }}">
    </div>

    {{-- Load More Button --}}
    <div class="wp-block-button flex items-center justify-center mt-element">
        <a class="wp-block-button__link">{!! App\pl_e('Mehr laden') !!}</a>
    </div>
@overwrite