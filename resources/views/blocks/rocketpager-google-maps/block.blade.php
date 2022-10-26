@extends('blocks.helpers.block-wrapper', ['element_classes' => 'h-full'])

@section('content-section')
    <div
        id="map"
        class="map mapsize--{{ block_value('mapsize') }} not-prose"
        data-map-id="{{ block_value('mapID') }}"
        data-center-lat="{{ block_value('centerLat') }}" data-center-lng="{{ block_value('centerLng') }}"
        data-zoom="{{ block_value('zoomlevel') }}"
        data-zoom-active="{{ block_field('zoom-active') }}"
        data-controls-active="{{ block_field('controls-active') }}"
    >
    </div>

    @while ( block_rows('markers') )
        @php
            block_row('markers');
            $attachment_id = block_sub_value( 'marker-icon' );
            $image_attributes = wp_get_attachment_image_src($attachment_id, 'full');
        @endphp
        <div
            class="marker"
            data-marker-lat="{{ block_sub_value('markerLat') }}" data-marker-lng="{{ block_sub_value('markerLng') }}"
            @if ($image_attributes)
                data-marker-icon="{{ $image_attributes[0] }}"
                data-icon-aspect-ratio="{{ $image_attributes[1]/$image_attributes[2] }}"
            @endif
        >
            @if ( block_sub_value('content') )
                <div class="data-content">
                    {!! App\sanitize_out(block_sub_value('content'), 'inner_block') !!}
                </div>
            @endif
        </div>
    @endwhile
    {{ reset_block_rows( 'markers' ) }}
@overwrite
