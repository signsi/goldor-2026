@php
    $idLightbox = App\getLightboxIdentifier();
    $isCroppedSlider = block_value( 'cropped-stil');
    $additional_classes = block_value( 'cropped-stil') ? '  cropped-stil' : ' ';
@endphp

@extends('blocks.helpers.block-wrapper', ['element_classes' => $additional_classes])

@section('content-section')
    <div class="content-slider">
        @while ( block_rows('slide') )
            @php block_row('slide') @endphp
            <div class="">
                @include('blocks.helpers.image',
                [
                    'name_ImageField' => 'image',
                    'additionalClasses' => array('class' => 'nolazyload'),
                    'thumbnail' => 'full-width',
                    'isRepeaterElement' => true,
                    'identifierLightbox' => $idLightbox
                ])
            </div>
        @endwhile
        {{ reset_block_rows('slide') }}
    </div>
@overwrite

