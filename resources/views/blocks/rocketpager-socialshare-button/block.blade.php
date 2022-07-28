@php
    $showLinkedin = block_value('social-share-linkedin');
    $showTwitter = block_value('social-share-twitter');
    $showFacebook = block_value('social-share-facebook');
    $showWhatsapp = block_value('social-share-whatsApp');
    $showMail = block_value('social-share-email');
    $rocketpagerClasses = 'py-5 border-y border-primary not-prose';
    $ulClasses = 'flex justify-center items-center mb-0 ml-0';
    $liClasses = 'mb-0 ml-3 before:hidden';
    $aClasses = 'text-white group-hover:text-primary group-hover:hover:text-font transition duration-300 ease-out'
@endphp

@extends('blocks.helpers.block-wrapper', ['element_classes' => $rocketpagerClasses])

@section('content-section')
    <div class="wp-block-buttons mb-0">
        <div class="wp-block-button w-full mb-0">
            <div class="wp-block-button__link w-full flex justify-center items-center border border-primary bg-primary hover:bg-white hover:text-primary transition duration-300 ease-in-out group">
                Teilen
                @include('partials.social-share',[
                    'showLinkedin' => $showLinkedin,
                    'showTwitter' => $showTwitter,
                    'showFacebook' => $showFacebook,
                    'showWhatsapp' => $showWhatsapp,
                    'showMail' => $showMail,
                    'list_classes' => $ulClasses,
                    'listitem_classes' => $liClasses,
                    'achnor_classes' => $aClasses
                ])
            </div>
        </div>
    </div>
@overwrite