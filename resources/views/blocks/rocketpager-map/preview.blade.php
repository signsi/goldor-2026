@extends('blocks.helpers.preview-wrapper')

@section('content-section-before-flex')  
    @if ( block_value('map-type') == 'google-map' )
        <iframe src="{{ block_value('google-map-iframelink') }}" width="100%" height="585" style="border:0;" class="mapsize--{{ block_value('map-size') }} allowfullscreen=" loading="lazy"></iframe>
    @else
        <iframe src="https://snazzymaps.com/embed/{{ block_value('snazzymap-id') }}" width="100%" height="585" style="border:none;" class="mapsize--{{ block_value('map-size') }}"></iframe>
    @endif
@overwrite