@extends('blocks.helpers.preview-wrapper')

@section('content-section-before-flex')
    @if ( block_value('animation-shortcode') )
        <div class="animation-shortcode">
            <h3 class="text-center">Lottie-Animation-Shortcode</h3>
            <p>{!! App\sanitize_out(block_value('animation-shortcode'), 'shortcode') !!}</p>
        </div>
        @if ( block_value( 'animation-figcaption', false))
            <div class="animation-figcaption">{{ block_value('animation-figcaption') }}</div>
        @endif
    @endif
@overwrite