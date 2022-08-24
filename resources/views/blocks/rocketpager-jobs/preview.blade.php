@php
    $args = array(
        'post_type' => 'jobs',
        'post_status' => 'publish',
        'orderby' => 'menu_order ID',
        'order' => 'ASC',
        'nopaging' => true,
    );
    $the_query = new WP_Query( $args );
@endphp


@extends('blocks.helpers.block-wrapper', ['ignoreAnimation' => true])

@section('content-section')
    @if ($the_query->have_posts())
        @while ($the_query->have_posts())
            @php
                $the_query->the_post();
                global $post;

                $beschreibung = App\get_jobs_option('beschreibung');
                $beschreibung_safe = App\sanitize_out($beschreibung, 'text_area');
                $job_details_url = get_permalink($post);
            @endphp

            <div class="job-wrapper flex flex-col md:flex-row space-x-0 md:space-x-8 space-y-4 md:space-y-0 md:items-center md:justify-between border-t last:border-b border-darkgrey py-4">
                <div class="flex md:items-center md:justify-between flex-col md:flex-row space-x-0 md:space-x-8 space-y-4 md:space-y-0">
                    <div><a href="{{ $job_details_url }}" class="no-underline" target="_blank"><strong class="hover:text-primary transition-colors">{{ the_title() }}</strong></a> | {{ App\get_jobs_option('pensum') }}</div>
                    <div><div class="wp-block-button is-style-outline"><a class="wp-block-button__link whitespace-pre">Viva Luzern Eichhof</a></div></div>
                </div>
                <div class="md:basis-60 md:text-right">
                    <div><a class="wp-block-button__link" href="{{ $job_details_url }}" target="_blank" title="Jobdetailseite" alt="Link zur Jobdetailseite - {{ the_title() }}">Jetzt bewerben</a></div>
                </div>
            </div>
        @endwhile
    @endif
    {{-- Restore original Post Data --}}
    @php wp_reset_postdata(); @endphp
@overwrite
