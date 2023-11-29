@php
    $direction = App\existsReturnKey('order', 'flex-row-reverse');
    $idLightbox = App\getLightboxIdentifier();
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="flex flex-wrap md:flex-nowrap gap-medium {{ $direction }}">
        <div class="flex flex-col justify-start basis-full md:basis-1/2 lg:basis-5/12 bg-white">
            @include('blocks.helpers.background-image',
            [
                'name_ImageField' => 'image',
                'class_object_fill_breakpoint' => 'md:bg-object-wrapper',
                'class_object_fit' => array('class' => 'object-contain object-center'),
                'thumbnail' => 'medium-width',
                'isRepeaterElement' => false,
                'identifierLightbox' => $idLightbox
            ])
        </div>
        @if ( block_value( 'quote'))
            <div class="flex flex-col justify-start basis-full md:basis-1/2 lg:basis-7/12 bg-primary">
                <div class="text-wrapper pt-4 px-4 lg:pt-6 lg:px-6 text-white">
                    {!! App\sanitize_out(block_value( 'quote' ), 'inner_block') !!}
                </div>
                @include('blocks.helpers.audio',
                [
                    'name_AudioField' => 'audio'
                ])
            </div>
        @endif
    </div>
@overwrite