@php
    $video_type = block_value('video-type');
    $isExternVideo = $video_type == 'extern-video';
    $isInternVideo = $video_type == 'intern-video';
    $iframe_link = block_value('iframe-link');
    $video_size = block_value('video-size');
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    @if($isExternVideo)
        @include('blocks.helpers.video-youtube',
        [
            'name_UrlField' => 'youtube-url',
            'video_size' => $video_size
        ])
    @elseif($isInternVideo)
        @include('blocks.helpers.video-intern',
        [
            'name_UrlField' => 'video-url',
            'name_PosterField' => 'poster',
            'video_size' => $video_size
        ])
    @elseif($iframe_link)
        @include('blocks.helpers.video-iframe',
        [
            'name_iFrame_Field' => 'iframe-link',
            'video_size' => $video_size
        ])
    @endif
@overwrite