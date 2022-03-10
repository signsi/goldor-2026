@extends('blocks.helpers.block-wrapper')

@section('content-section')
    @if ( block_value('animation-shortcode') )
        <figure class="wp-block-image size-large">
            {!! App\sanitize_out(block_value('animation-shortcode'), 'shortcode') !!}
            @if ( block_value('animation-figcaption') )
                <figcaption>{{ block_value('animation-figcaption') }}</figcaption>
            @endif
        </figure>
    @endif
@overwrite