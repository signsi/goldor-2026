@php
    $attachment_id = block_value( 'marker-icon' );
    $image_attributes = wp_get_attachment_image_src($attachment_id);
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div
        id="map"
        class="mapsize--{{ block_value('mapsize') }}"
        data-map-id="{{ block_value('mapID') }}"
        data-center-lat="{{ block_value('centerLat') }}" data-center-lng="{{ block_value('centerLng') }}"
        data-marker-lat="{{ block_value('markerLat') }}" data-marker-lng="{{ block_value('markerLng') }}"
        data-zoom="{{ block_value('zoomlevel') }}"
        data-zoom-active="{{ block_field('zoom-active') }}"
        data-controls-active="{{ block_field('controls-active') }}"
        @if ($image_attributes)
            data-marker-icon="{{ $image_attributes[0] }}"
            data-icon-aspect-ratio="{{ $image_attributes[1]/$image_attributes[2] }}"
        @endif
    >
    </div>
    @if ( block_value('content') )
        <div id="data-content">
            {!! App\sanitize_out(block_value('content'), 'text_area') !!}
        </div>
    @endif
@overwrite
