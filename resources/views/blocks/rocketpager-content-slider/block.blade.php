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
                <svg class="w-auto h-[30px] mx-auto mb-2" id="Ebene_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 44 31"><defs><style>.cls-1{fill:none;}.cls-2{fill:#e6eddb;}.cls-3{fill:#7ca048;}</style></defs><path class="cls-1" d="M42,13.02c0-1.66-1.35-3.02-3.02-3.02H19v7h23v-3.98Z"/><circle class="cls-1" cx="11.5" cy="11.5" r="2.5"/><path class="cls-2" d="M4,18V3c0-.55-.45-1-1-1s-1,.45-1,1V29h2v-5c0-.55,.45-1,1-1H39c.55,0,1,.45,1,1v5h2v-10H5c-.55,0-1-.45-1-1Z"/><path class="cls-3" d="M43,19h-1v10h-2v-5c0-.55-.45-1-1-1H5c-.55,0-1,.45-1,1v5H2V3c0-.55,.45-1,1-1s1,.45,1,1v15c0,.55,.45,1,1,1h13c-.55,0-1-.45-1-1v-1H6V3c0-1.65-1.35-3-3-3S0,1.35,0,3V30c0,.55,.45,1,1,1H5c.55,0,1-.45,1-1v-5H38v5c0,.55,.45,1,1,1h4c.55,0,1-.45,1-1v-12c0,.55-.45,1-1,1Z"/><path class="cls-3" d="M38.98,8H18c-.55,0-1,.45-1,1v9c0,.55,.45,1,1,1h25c.55,0,1-.45,1-1v-4.98c0-2.77-2.25-5.02-5.02-5.02Zm-19.98,2h19.98c1.66,0,3.02,1.35,3.02,3.02v3.98H19v-7Z"/><path class="cls-3" d="M11.5,16c2.48,0,4.5-2.02,4.5-4.5s-2.02-4.5-4.5-4.5-4.5,2.02-4.5,4.5,2.02,4.5,4.5,4.5Zm0-7c1.38,0,2.5,1.12,2.5,2.5s-1.12,2.5-2.5,2.5-2.5-1.12-2.5-2.5,1.12-2.5,2.5-2.5Z"/></svg>
                <span class="text-primary text-sm xl:text-base text-center leading-tight">Freie<br>Zimmer</span>
            </div>
        </div>
    @endif
@overwrite

