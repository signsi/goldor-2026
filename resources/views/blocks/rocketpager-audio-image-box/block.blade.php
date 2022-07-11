@php
    $direction = App\existsReturnKey('order', 'flex-row-reverse');
    $idLightbox = App\getLightboxIdentifier();
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="flex flex-wrap md:flex-nowrap gap-gutter {{ $direction }}">
        <div class="flex flex-col justify-start basis-full md:basis-1/2 lg:basis-5/12">
            @include('blocks.helpers.background-image',
            [
                'name_ImageField' => 'image',
                'class_object_fill_breakpoint' => 'bg-object-wrapper--mediumUp',
                'class_object_fit' => array('class' => 'bg-object--contain'),
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