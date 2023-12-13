@php
    $post_type = get_post_type();

    $args = [
        'post_type' => $post_type,
        'post_status' => 'publish',
        'posts_per_page' => '5',
        'post__not_in' => array( $post->ID ),
        'orderby' => 'post_date',
        'order' => 'DESC',
    ];
    $the_query = new WP_Query($args);
    $args['max_num_pages'] = $the_query->max_num_pages;

@endphp

@if ($the_query->have_posts())
    <x-container w="default" class="bg-greylight">
        <h3 class="mb-large">{{ App\pl__('Aktuelle &' . $post_type) }}</h3>

        <ul class="is-style-liststyle-icon-start--arrow-right-long mb-0">
            @while ($the_query->have_posts())
                @php
                    $the_query->the_post();
                    global $post;
                @endphp
                <li class="before:mt-1 !items-start border-b border-dotted border-b-primary pb-medium mt-0 mb-medium last:border-0 last:mb-0 last:pb-0">
                    <a href="{{ the_permalink() }}">
                        <h5>{{ the_title() }}</h5>
                        <div class="text-wrapper text-sm [&_*]:text-sm mb-small">
                            {!! wp_trim_words( get_the_excerpt(), 15, '...' ) !!}
                        </div>
                        <span class="no-underline text-xs transition-transform hover:no-underline group-hover:origin-center group-hover:text-primary group-hover:translate-x-2 block">{{ App\pl__('Weiterlesen') }} <i class="fa-light fa-arrow-right-long"></i></span>
                    </a>
                </li>
            @endwhile
            {{-- Restore original Post Data --}}
            @php wp_reset_postdata(); @endphp
        </ul>

    </x-container>
@endif