@php
    $video_type = block_value('video-type');
    $iframe_link = block_value('iframe-link');
    $video_size = block_value('video-size');
    $useCustomPlayBtn = block_value('use-custom-play-button');
@endphp

@extends('blocks.helpers.block-wrapper', ['element_classes' => 'relative'])

@section('content-section')
    @switch($video_type)
        @case('extern-video')
            @include('blocks.helpers.video-youtube',
            [
                'name_UrlField' => 'youtube-url',
                'video_size' => $video_size,
                'useCustomPlayBtn' =>  $useCustomPlayBtn
            ])
            @break
        @case('intern-video')
            @include('blocks.helpers.video-intern',
            [
                'name_UrlField' => 'video-url',
                'name_PosterField' => 'poster',
                'video_size' => $video_size,
                'useCustomPlayBtn' =>  $useCustomPlayBtn
            ])
            @break
        @case('lightbox-video')
            @include('blocks.helpers.video-lightbox',
            [
                'name_UrlField' => 'video-url',
                'name_PosterField' => 'poster',
                'video_size' => $video_size,
                'useCustomPlayBtn' =>  $useCustomPlayBtn
            ])
            @break
        @default
            @if($iframe_link)
                @include('blocks.helpers.video-iframe',
                [
                    'name_iFrame_Field' => 'iframe-link',
                    'video_size' => $video_size
                ])
            @endif
    @endswitch
    @if ( block_value('arrow-down') )
        @include('blocks.helpers.scroll-down')
    @endif

@overwrite