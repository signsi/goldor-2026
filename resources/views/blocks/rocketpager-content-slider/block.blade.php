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
            <div class="not-prose">
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
    @if(block_value('btn-available-rooms'))
        <div class="w-24 h-24 lg:w-28 lg:h-28 xl:w-32 xl:h-32 bg-white rounded-full drop-shadow-md absolute bottom-12 md:bottom-14 xl:bottom-16 right-0 md:right-4 xl:right-28">
            <div class="flex flex-col justify-center items-center h-full p-1.5 lg:p-2 xl:p-3">
                <i class="fa-solid fa-bed text-2xl xl:text-4xl text-primary"></i>
                <span class="text-primary text-sm xl:text-base text-center leading-tight">Freie<br>Zimmer</span>
            </div>
        </div>
    @endif
@overwrite

