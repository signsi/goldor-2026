@php
    $video_type = block_value('video-type');
    $iframe_link = block_value('iframe-link');
    $video_size = block_value('video-size');
@endphp

@extends('blocks.helpers.preview-wrapper')

@section('content-section-before-flex')
    <div class="w-full text-xs bg-grey text-white p-gutter">
    <strong><u>Video-Element</u></strong><br><br>
    @switch($video_type)
        @case('extern-video')
            Youtube-ID : {{ block_value('youtube-url') }}
            @break
        @case('intern-video')
            @include('blocks.helpers.video-intern',
            [
                'name_UrlField' => 'video-url',
                'name_PosterField' => 'poster',
                'video_size' => $video_size
            ])
            @if ( block_value( 'autoplay') )
                <br>Autoplay ist aktiviert
            @endif
            @if ( block_value( 'loop') )
                <br>Schleife ist aktiviert
            @endif
            @if ( block_value( 'muted') )
                <br>Stummgeschaltet ist aktiviert
            @endif
            @if ( block_value( 'controls') )
                <br>Wiedergabe-Steuerung ist aktiviert
            @endif
            @break

        @case('lightbox-video')
            Video-Link für Lightbox-Video : {{ block_value('video-url') }}
            @include('blocks.helpers.image',
            [
                'name_ImageField' => 'poster'
            ])
            @break
        @default
            @if($iframe_link)
                Video mit IFrame. Um das iFrame zu sehen, klicke auf das RocketPager-Element.
            @endif
    @endswitch
        @if ( block_value( 'video-size') )
            <br>Video-Grösse: {{ block_value('video-size') }}
        @endif
        @if (block_value('arrow-down'))
            <br>Scroll Down-Button ist aktiviert
        @endif
        @if (block_value('use-custom-play-button'))
            <br>Custom Play Button verwenden - ist aktiviert
        @endif
        @if (block_value('hasGradient'))
            <br>Leicher Farbverlauf im Hintergrund (für bessere Lesbarkeit) - ist aktiviert
        @endif
        
    </div>
@overwrite