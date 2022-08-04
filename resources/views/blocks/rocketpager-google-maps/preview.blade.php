@php
    $API_KEY = App\getThemeOption('google_api_key');
@endphp

@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'grid-cols-4'])

@section('content-section-before-flex')
    <div class="wp-block-columns">
        <div class="wp-block-column" style="flex-basis:33.33%">
            <h2>Google Maps</h2>
            {!! App\sanitize_out(block_value('content'), 'text_area') !!}
            <p><strong>Zentrum</strong></p>
            <p>Lat: {{ block_value('centerLat') }}, Lng: {{ block_value('centerLng') }}</p>
            <p><strong>Zoom: </strong>{{ block_value('zoomlevel') }}</p>
        </div>
        <div class="wp-block-column" style="flex-basis:66.66%">
            <iframe src="https://www.google.com/maps/embed/v1/place?key={{ $API_KEY }}&q={{ block_value('centerLat') }},{{ block_value('centerLng') }}&zoom={{ block_value('zoomlevel') }}" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
@overwrite

@section('flex-item-content')
    @while (block_rows('markers'))
        @php block_row('markers') @endphp
            <div>
                <p><strong>Markierung {{ block_row_index() + 1 }}</strong></p>
                <p>
                    Lat: {{ block_sub_value('markerLat') }}<br>
                    Lng: {{ block_sub_value('markerLng') }}
                </p>
                @include('blocks.helpers.image',
                [
                    'name_ImageField' => 'marker-icon',
                    'thumbnail' => Array(40,40),
                    'isRepeaterElement' => true
                ])
            </div>
    @endwhile
    {{ reset_block_rows('markers') }}
@overwrite
