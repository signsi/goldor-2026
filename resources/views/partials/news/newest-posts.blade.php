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
    <x-container w="wide" class="bg-greylight">
        <h3>{{ App\pl__('Aktuelle &' . $post_type) }}</h3>

        <ul class="is-style-liststyle-icon-start--arrow-right-long mb-0">
            @while ($the_query->have_posts())
                @php
                    $the_query->the_post();
                    global $post;
                @endphp
                <li class="">
                    <a href="{{ the_permalink() }}">
                        {{ the_title() }}
                    </a>
                </li>
            @endwhile
            {{-- Restore original Post Data --}}
            @php wp_reset_postdata(); @endphp
        </ul>

    </x-container>
@endif