@php
    $post_type = get_post_type();

    $args = [
        'post_type' => $post_type,
        'post_status' => 'publish',
        'posts_per_page' => '3',
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

        <div class="mt-8 grid flex flex-col">
            @while ($the_query->have_posts())
                @php
                    $the_query->the_post();
                    global $post;
                @endphp
                <a href="{{ the_permalink() }}" class="group flex flex-col md:flex-row border-b border-dotted border-b-primary pb-medium mt-0 mb-medium">
                    <div class="w-full md:w-1/2 lg:w-1/4 overflow-hidden">
                        @if (has_post_thumbnail())
                            {{ the_post_thumbnail( '4-3-thumb', ['class' => 'object-cover']) }}
                        @else
                            <img src="https://placehold.co/800x600?text=Platzhalter" alt="Platzhalterbild" class="object-cover">
                        @endif
                    </div>
                    <div class="w-full md:w-1/2 lg:w-3/4 mt-small md:mt-0 md:ml-small">
                        <h5 class="mb-0">{{ the_title() }}</h5>
                        <div class="text-xs mt-0">
                            @include('partials.meta.entry-meta-date')
                        </div>
                        <p class="text-sm">{!! wp_trim_words( get_the_excerpt(), 15, '...' ) !!}</p>
                        <span class="no-underline text-xs transition-transform hover:no-underline group-hover:origin-center group-hover:text-primary group-hover:translate-x-2 block">{{ App\pl__('Weiterlesen') }} <i class="fa-light fa-arrow-right-long"></i></span>
                    </div>
                </a>
            @endwhile
            {{-- Restore original Post Data --}}
            @php wp_reset_postdata(); @endphp
        </div>

        {{-- Link setzen zur Kategorienübersicht --}}
        {{-- <div class="wp-block-buttons is-layout-flex wp-block-buttons-is-layout-flex">
            <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/">{{ App\pl_e('Weitere &post') }}</a></div>
        </div> --}}

    </x-container>
@endif