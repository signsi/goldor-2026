@php
    $social_media_linkedin = block_value('social-media-linkedin') ? block_value('social-media-linkedin') : App\getThemeOption('linkedin');
    $social_media_twitter = block_value('social-media-twitter') ? block_value('social-media-twitter') : App\getThemeOption('twitter');
    $social_media_xing = block_value('social-media-xing') ? block_value('social-media-xing') : App\getThemeOption('xing');
    $social_media_facebook = block_value('social-media-facebook') ? block_value('social-media-facebook') : App\getThemeOption('facebook');
    $social_media_youtube = block_value('social-media-youtube') ? block_value('social-media-youtube') : App\getThemeOption('youtube');
    $social_media_instagram = block_value('social-media-instagram') ? block_value('social-media-instagram') : App\getThemeOption('instagram');
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <ul class="flex flex-row gap-3 list-none ml-0 pl-0">
        @include('partials.social.social-link',['media_name' => 'LinkedIn', 'media_link' => $social_media_linkedin, 'icon_classes' => 'fab fa-linkedin', 'anchor_classes' => 'text-primary hover:text-font'])
        @include('partials.social.social-link',['media_name' => 'Twitter', 'media_link' => $social_media_twitter, 'icon_classes' => 'fab fa-twitter', 'anchor_classes' => 'text-primary hover:text-font'])
        @include('partials.social.social-link',['media_name' => 'Xing', 'media_link' => $social_media_xing, 'icon_classes' => 'fab fa-xing', 'anchor_classes' => 'text-primary hover:text-font'])
        @include('partials.social.social-link',['media_name' => 'Facebook', 'media_link' => $social_media_facebook, 'icon_classes' => 'fab fa-facebook-f', 'anchor_classes' => 'text-primary hover:text-font'])
        @include('partials.social.social-link',['media_name' => 'Youtube', 'media_link' => $social_media_youtube, 'icon_classes' => 'fab fa-youtube', 'anchor_classes' => 'text-primary hover:text-font'])
        @include('partials.social.social-link',['media_name' => 'Instagram', 'media_link' => $social_media_instagram, 'icon_classes' => 'fab fa-instagram', 'anchor_classes' => 'text-primary hover:text-font'])
    </ul>
@overwrite