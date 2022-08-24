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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                @while ($the_query->have_posts())
                    @php
                        $the_query->the_post();
                        global $post;

                        $beschreibung = App\get_jobs_option('beschreibung');
                        $beschreibung_safe = App\sanitize_out($beschreibung, 'text_area');
                        $job_details_url = get_permalink($post);
                    @endphp

                    <div class="p-5 border border-theme/50 rounded no-underline flex flex-col xl:aspect-square justify-between group hover:bg-theme transition-colors" href="{{ $job_details_url }}" title="Jobdetailseite" alt="Link zur Jobdetailseite - {{ the_title() }}">
                        <h3 class="mt-0 text-theme text-3xl mb-8 md:mb-16 lg:mb-20 xl:mb-0 group-hover:hidden">{{ the_title() }}</h3>
                        <div class="flex justify-between items-center group-hover:hidden">
                            <div>
                                <div class="w-0 h-0 rotate-[360deg] border-solid border-t-[16px] border-r-0 border-b-[16px] border-l-[30px] lg:border-t-[28px] lg:border-b-[28px] lg:border-l-[51px] border-t-transparent border-b-transparent border-r-transparent border-l-secondary group-hover:border-l-theme"></div>
                            </div>
                            <div class=" text-2xl md:text-3xl lg:text-4xl xl:text-6xl text-slate-300">{{ App\get_jobs_option('pensum') }}</div>
                        </div>
                        <div class="hidden p-5 transition-colors group-hover:flex flex-col justify-center h-full group-hover:text-white text-center">
                            <div class="-m-5 mb-1.5">{!! $beschreibung_safe !!}</div>
                            <span class="underline">Erfahren Sie mehr</span>
                        </div>
                    </div>
                @endwhile
            </div>
    @endif
    {{-- Restore original Post Data --}}
    @php wp_reset_postdata(); @endphp
@overwrite
