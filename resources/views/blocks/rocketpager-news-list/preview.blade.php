@php
    //Variables
    $category = block_value( 'category' );
    $category_name = $category && !is_wp_error( $category ) ? $category->name : '';
    $flex_type = App\setColumns(true);

    // The Query
    $the_query = new WP_Query(
        array(
            'post_type' => 'post',
            'category_name' => $category_name
        )
    );
@endphp

@extends('blocks.helpers.preview-wrapper', ['flex_type' => $flex_type])

@section('flex-item-content')

        {{-- The Loop --}}
        @if ($the_query->have_posts())
            @while ($the_query->have_posts())
                @php $the_query->the_post(); @endphp

                @include('partials.content.content-post')
            @endwhile
        @else
            {{-- no posts found --}}
        @endif

        {{-- Restore original Post Data --}}
        @php wp_reset_postdata(); @endphp
@overwrite
