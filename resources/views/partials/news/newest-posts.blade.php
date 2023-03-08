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
    <div class="wp-block-group has-grey-background-color has-background is-style-layout-full">
        <div class="wp-block-group is-style-layout-small">
            <h3>{{ App\pl__('Aktuelle &' . $post_type) }}</h3>
            <ul class='newest-posts list-none pl-0'>
                @while ($the_query->have_posts())
                    @php
                        $the_query->the_post();
                        global $post;
                    @endphp
                    <li class='pl-0 my-2'>
                        <a class="text-primary hover:text-font" href="{{ the_permalink() }}">{{ the_title() }}</a>
                    </li>
                @endwhile
                {{-- Restore original Post Data --}}
                @php wp_reset_postdata(); @endphp
            </ul>
        </div>
    </div>
@endif