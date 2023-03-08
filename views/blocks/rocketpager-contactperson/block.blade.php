@php
    $idLightbox = App\getLightboxIdentifier();
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="contact-container flex flex-col-reverse lg:flex-row justify-center items-center h-full gap-gutter">
        <div class="info-container text-center px-gutter">
            @if ( block_value( 'info-slogan') )
                <p class="info-slogan uppercase font-bold mb-0">{{ block_value('info-slogan') }}</p>
            @endif
            @if ( block_value( 'info-title') )
                <h2 class="info-title uppercase mt-4">{{ block_value('info-title') }}</h2>
            @endif
            <p>{{ block_value('name') }}<br>
            <a href="tel:{{ block_value('phone') }}">{{ block_value('phone') }}</a><br>
            <a href="mailto:{{ block_value('mail') }}" target="_blank">{{ block_value('mail') }}</a></p>
        </div>
        <div class="image-container w-full max-w-[175px] md:max-w-[200px] xl:max-w-[250px]">
            @include('blocks.helpers.image',
            [
                'name_ImageField' => 'image',
                'additionalClasses' => array('class' => 'rounded-full'),
                'thumbnail' => 'small-crop',
                'identifierLightbox' => $idLightbox
            ])
        </div>
    </div>
@overwrite