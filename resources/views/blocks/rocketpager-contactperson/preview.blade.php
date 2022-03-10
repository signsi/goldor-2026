@extends('blocks.helpers.preview-wrapper')

@section('content-section-before-flex')  
    <div class="contact-container">
        <div class="info-container">
            @if ( block_value('info-slogan') )
                <p class="info-slogan">{{ block_value('info-slogan') }}</p>
            @endif
            @if ( block_value('info-title') )
                <h2 class="info-title">{{ block_value('info-title') }}</h2>
            @endif
            <p>{{ block_value('name') }}<br>
            <a href="tel:{{ block_value('phone') }}">{{ block_value('phone') }}</a><br>
            <a href="mailto:{{ block_value('mail') }}">{{ block_value('mail') }}</a></p>
        </div>
        <div class="image-container">
            @include('blocks.helpers.image', 
            [
                'name_ImageField' => 'image',
                'thumbnail' => 'small-crop'
            ]) 
        </div>
    </div>
@overwrite