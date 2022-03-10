@php
    //Variables
    $number_of_posts = block_value( 'number-of-posts' );
    $category = block_value( 'category' );
    $row_per_col = App\setColumns();

    // The Query
    $the_query = new WP_Query(
        array(
            'post_type' => 'post',
            'posts_per_page' => $number_of_posts,
            'category_name' => $category->name
        )
    );
@endphp

@extends('blocks.helpers.block-wrapper', ['ignoreAnimation' => true])

@section('content-section')
    <div class="grid-x grid-margin-x{{ $row_per_col }}">


        {{-- The Loop --}}
        @if ($the_query->have_posts())
            @while ($the_query->have_posts())
                @php
                    $the_query->the_post();

                    // Variables
                    $categories = get_the_category();
                @endphp


                <div class="cell{{ App\getAnimation() }}">
                    <a href="{{ the_permalink() }}">
                        <div class="image-wrapper">
                            {{ the_post_thumbnail( block_value('preview-size') ) }}
                        </div>
                    </a>
                    @if ( !block_value('disable-meta') )
                        <div class="meta-wrapper">
                            @if ( !block_value( 'disable-meta-date'))
                                <span class="entry-date"><i class="fal fa-calendar-alt"></i> {{ get_the_date() }}</span>
                            @endif
                            @if ( !block_value('disable-meta-author') )
                                    <span class="entry-author"><i class="fal fa-user"></i> {{ get_the_author() }}</span>
                            @endif
                        </div>
                    @endif
                    <div class="title-wrapper">
                        @if ( !block_value('disable-meta') )
                            @if ( !block_value('disable-meta-category') )
                                <span class="entry-category">
                                    @foreach($categories as $cat)
                                        {{ $cat->name }}
                                    @endforeach
                                </span>
                            @endif
                        @endif
                        <h3>{{ the_title() }}</h3>
                    </div>
                    <div class="text-wrapper">{{ the_excerpt() }}</div>

                    <div class="linklist-wrapper">
                        <ul>
                            <li><a href="{{ the_permalink() }}">Weiterlesen</a></li>
                        </ul>
                    </div>
                </div>
            @endwhile
        @else
            {{-- no posts found --}}
        @endif

        {{-- Restore original Post Data --}}
        @php wp_reset_postdata(); @endphp

    </div>
@overwrite
