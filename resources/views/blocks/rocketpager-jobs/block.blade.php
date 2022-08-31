@php

    //Variables
    $post_category = block_value( 'category' );
    $category_name = $post_category ? $post_category->name : '';

    $args = array(
        'post_type' => 'jobs',
        'post_status' => 'publish',
        'category_name' => $category_name,
        'orderby' => 'menu_order ID',
        'order' => 'ASC',
        'nopaging' => true,
    );
    $the_query = new WP_Query($args);

@endphp


@extends('blocks.helpers.block-wrapper', ['ignoreAnimation' => true])

@section('content-section')
    <div class="sticky top-0">
    @if ($the_query->have_posts())
        @while ($the_query->have_posts())
            @php
                $the_query->the_post();
                global $post;
                $pensum = App\get_jobs_option('pensum');
            @endphp

            <a href="{{ App\get_jobs_option('link_bewerbung') }}" class="no-underline group" target="_blank">
                <div class="job-wrapper flex flex-col md:flex-row space-x-0 md:space-x-8 space-y-4 md:space-y-0 md:items-center md:justify-between border-t-2 border-darkgrey-400 py-4">
                    <div class="flex md:items-center md:justify-between flex-col md:flex-row space-x-0 md:space-x-8 space-y-4 md:space-y-0">
                        <div><strong class="group-hover:text-primary transition-colors">
                            {{ the_title() }}</strong>
                            @if($pensum)
                            | <span class=="lg:hidden">Pensum: </span>{{ $pensum }}
                            @endif
                        </div>
                        @if ($category_name != 'Initiativbewerbung')
                            <div><div class="wp-block-button is-style-outline"><span class="wp-block-button__link whitespace-pre group-hover:border-orange group-hover:bg-orange group-hover:text-white">{{ App\get_jobs_option('standort') }}</span></div></div>
                        @endif
                    </div>
                    <div class="md:basis-64 md:text-right">
                        <div>
                            @if ($category_name == 'Initiativbewerbung')
                                <div class="wp-block-button is-style-outline"><span class="wp-block-button__link whitespace-pre group-hover:border-orange group-hover:bg-orange group-hover:text-white" title="Jobdetailseite" alt="Link zur Jobdetailseite - {{ the_title() }}">Jetzt bewerben</span></div>
                            @else
                                <span class="wp-block-button__link group-hover:bg-darkgreen" title="Jobdetailseite" alt="Link zur Jobdetailseite - {{ the_title() }}">Jetzt bewerben</span>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        @endwhile
    @endif
    </div>

    {{-- Restore original Post Data --}}
    @php wp_reset_postdata(); @endphp
@overwrite
