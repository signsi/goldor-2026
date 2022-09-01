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
                <div class="job-wrapper flex flex-col md:flex-row space-y-8 md:space-y-0 space-x-0 md:space-x-8 md:items-center md:justify-between border-t-2 border-darkgrey-400 py-6 md:py-4">
                    <div class="flex md:items-center md:justify-between flex-col md:flex-row space-x-0 md:space-x-8">
                        <div class="hidden md:block"><strong class="group-hover:text-primary transition-colors">
                            {{ the_title() }}</strong>
                            @if($pensum)
                            | {{ $pensum }}
                            @endif
                        </div>
                        <div class="flex flex-col md:hidden">
                            <div class="title-job">
                                <strong class="group-hover:text-primary transition-colors">
                                    {{ the_title() }}
                                </strong>
                            </div>
                            @if($pensum)
                                <div class="pensum">
                                    Pensum: {{ $pensum }}
                                </div>
                            @endif
                        </div>
                        @if ($category_name != 'Initiativbewerbung')
                            <div>
                                <div class="hidden md:block wp-block-button is-style-outline"><span class="wp-block-button__link whitespace-pre group-hover:border-orange group-hover:bg-orange group-hover:text-white">{{ App\get_jobs_option('standort') }}</span></div>
                                <div class="md:hidden">Standort: {{ App\get_jobs_option('standort') }}</div>
                            </div>
                        @endif
                    </div>
                    <div class="md:basis-64 md:text-right">
                        <div>
                            @if ($category_name == 'Initiativbewerbung')
                                <div class="hidden md:block wp-block-button is-style-outline"><span class="wp-block-button__link whitespace-pre group-hover:border-orange group-hover:bg-orange group-hover:text-white" title="Jobdetailseite" alt="Link zur Jobdetailseite - {{ the_title() }}">Jetzt bewerben</span></div>
                                <span class="md:hidden wp-block-button__link group-hover:bg-darkgreen w-full md:w-auto" title="Jobdetailseite" alt="Link zur Jobdetailseite - {{ the_title() }}">Jetzt bewerben</span>
                            @else
                                <span class="wp-block-button__link group-hover:bg-darkgreen w-full md:w-auto" title="Jobdetailseite" alt="Link zur Jobdetailseite - {{ the_title() }}">Jetzt bewerben</span>
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
