@php
    $social_media_linkedin = block_value('social-media-linkedin') ? block_value('social-media-linkedin') : App\getThemeOption('linkedin');
    $social_media_twitter = block_value('social-media-twitter') ? block_value('social-media-twitter') : App\getThemeOption('twitter');
    $social_media_xing = block_value('social-media-xing') ? block_value('social-media-xing') : App\getThemeOption('xing');
    $social_media_facebook = block_value('social-media-facebook') ? block_value('social-media-facebook') : App\getThemeOption('facebook');
    $social_media_youtube = block_value('social-media-youtube') ? block_value('social-media-youtube') : App\getThemeOption('youtube');
    $social_media_instagram = block_value('social-media-instagram') ? block_value('social-media-instagram') : App\getThemeOption('instagram');
    $social_media_googleplus = block_value('social-media-googleplus') ? block_value('social-media-googleplus') : App\getThemeOption('google_plus');
@endphp

@extends('blocks.helpers.block-wrapper', ['element_classes' => 'not-prose'])

@section('content-section')
    <ul class="flex flex-row gap-3 list-none ml-0">
        @include('blocks.helpers.social-link',['media_name' => '', 'media_link' => $social_media_linkedin, 'icon_classes' => 'fab fa-linkedin', 'anchor_classes' => 'text-primary hover:text-font'])
        @include('blocks.helpers.social-link',['media_name' => '', 'media_link' => $social_media_twitter, 'icon_classes' => 'fab fa-twitter', 'anchor_classes' => 'text-primary hover:text-font'])
        @include('blocks.helpers.social-link',['media_name' => '', 'media_link' => $social_media_xing, 'icon_classes' => 'fab fa-xing', 'anchor_classes' => 'text-primary hover:text-font'])
        @include('blocks.helpers.social-link',['media_name' => '', 'media_link' => $social_media_facebook, 'icon_classes' => 'fab fa-facebook-f', 'anchor_classes' => 'text-primary hover:text-font'])
        @include('blocks.helpers.social-link',['media_name' => '', 'media_link' => $social_media_youtube, 'icon_classes' => 'fab fa-youtube', 'anchor_classes' => 'text-primary hover:text-font'])
        @include('blocks.helpers.social-link',['media_name' => '', 'media_link' => $social_media_instagram, 'icon_classes' => 'fab fa-instagram', 'anchor_classes' => 'text-primary hover:text-font'])
        @include('blocks.helpers.social-link',['media_name' => '', 'media_link' => $social_media_googleplus, 'icon_classes' => 'fab fa-google-plus', 'anchor_classes' => 'text-primary hover:text-font'])
    </ul>
@overwrite