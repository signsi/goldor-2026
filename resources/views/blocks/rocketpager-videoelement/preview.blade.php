@php
    $video_type = block_value('video-type');
    $isExternVideo = $video_type == 'extern-video';
    $isInternVideo = $video_type == 'intern-video';
    $iframe_link = block_value('iframe-link');
    $video_size = block_value('video-size');
@endphp

@extends('blocks.helpers.preview-wrapper')

@section('content-section-before-flex')
    @if($isExternVideo)
        Youtube-ID : {{ block_value('youtube-url') }}
    @elseif($isInternVideo)
        @include('blocks.helpers.video-intern',
        [
            'name_UrlField' => 'video-url',
            'name_PosterField' => 'poster',
            'video_size' => $video_size
        ])
    @else
        Video mit IFrame. Um das iFrame zu sehen, klicke auf das RocketPager-Element.
    @endif
@overwrite