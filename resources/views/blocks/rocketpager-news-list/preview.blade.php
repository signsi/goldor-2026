@php
    //Variables
    $category = block_value( 'category' );
    $category_name = $category->name ?? '';
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

                <div class="col">
                        @if ( has_post_thumbnail() )
                            <div class="image-wrapper">
                                {{ the_post_thumbnail( block_value('preview-size') ) }}
                            </div>
                        @endif
                    <div class="text-wrapper">
                        <strong>{{ the_title() }}</strong><br><br>
                        {{ the_excerpt() }}
                    </div>
                </div>
            @endwhile
        @else
            {{-- no posts found --}}
        @endif

        {{-- Restore original Post Data --}}
        @php wp_reset_postdata(); @endphp
@overwrite
