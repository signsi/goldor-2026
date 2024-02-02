@php
    $social_media_linkedin = block_value('social-media-linkedin') ? block_value('social-media-linkedin') : App\getThemeOption('linkedin');
    $social_media_twitter = block_value('social-media-twitter') ? block_value('social-media-twitter') : App\getThemeOption('twitter');
    $social_media_xing = block_value('social-media-xing') ? block_value('social-media-xing') : App\getThemeOption('xing');
    $social_media_facebook = block_value('social-media-facebook') ? block_value('social-media-facebook') : App\getThemeOption('facebook');
    $social_media_youtube = block_value('social-media-youtube') ? block_value('social-media-youtube') : App\getThemeOption('youtube');
    $social_media_instagram = block_value('social-media-instagram') ? block_value('social-media-instagram') : App\getThemeOption('instagram');
@endphp

@extends('blocks.helpers.preview-wrapper')

@section('content-section-before-flex')
    <ul>
        @if ( $social_media_linkedin )
            <li>
                LinkedIn: {{ $social_media_linkedin }}
            </li>
        @endif
        @if ( $social_media_twitter )
            <li>
                X (ehemals Twitter): {{ $social_media_twitter }}
            </li>
        @endif
        @if ( $social_media_xing )
            <li>
                Xing: {{ $social_media_xing }}
            </li>
        @endif
        @if ( $social_media_facebook )
            <li>
                Facebook: {{ $social_media_facebook }}
            </li>
        @endif
        @if ( $social_media_youtube )
            <li>
                Youtube: {{ $social_media_youtube }}
            </li>
        @endif
        @if ( $social_media_instagram )
            <li>
                Instagram: {{ $social_media_instagram }}
            </li>
        @endif
    </ul>
@overwrite