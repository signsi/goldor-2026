@php
    $showLinkedin = block_value('social-share-linkedin');
    $showTwitter = block_value('social-share-twitter');
    $showFacebook = block_value('social-share-facebook');
    $showWhatsapp = block_value('social-share-whatsApp');
    $showMail = block_value('social-share-email');
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="wp-block-buttons">
        <div class="wp-block-button">
            <div class="wp-block-button__link">
                Teilen
                @include('partials.social-share',[
                    'showLinkedin' => $showLinkedin,
                    'showTwitter' => $showTwitter,
                    'showFacebook' => $showFacebook,
                    'showWhatsapp' => $showWhatsapp,
                    'showMail' => $showMail
                ])
            </div>
        </div>
    </div>
@overwrite