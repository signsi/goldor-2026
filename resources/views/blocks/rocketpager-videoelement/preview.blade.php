@php
    $video_type = block_value('video-type');
    $iframe_link = block_value('iframe-link');
    $video_size = block_value('video-size');
@endphp

@extends('blocks.helpers.preview-wrapper')

@section('content-section-before-flex')
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
@overwrite