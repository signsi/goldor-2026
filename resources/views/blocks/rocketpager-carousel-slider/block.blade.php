@php
    $useCustomPlayBtn = block_value('use-custom-play-button');
    $additional_classes = App\mapToKeyString(['carousel-stil', 'ratio']);
    $isBoxSlider = block_value( 'carousel-stil') == 'box-slider';
    $isCroppedSlider = block_value( 'cropped-stil');
    $additional_classes .= $isBoxSlider ? ' pr-0 pl-0' : '';
    $additional_classes .= block_value( 'cropped-stil') ? ' cropped-stil' : '';
    $idLightbox = App\getLightboxIdentifier();
    $ratio = block_value('aspect-ratio');
    switch($ratio){
        case 'aspect-ratio-16-9':
            $ar_class = '16-9-thumb';
        break;
        case 'aspect-ratio-4-3':
            $ar_class = '4-3-thumb';
        break;
        case 'aspect-ratio-square':
            $ar_class = 'medium-crop';
        break;
        default:
            $ar_class = 'medium-crop';
    }
@endphp

@extends('blocks.helpers.block-wrapper', ['element_classes' => $additional_classes])
{{-- @extends('blocks.helpers.block-wrapper') --}}

@section('content-section')
    <div class="carousel-slider">
        @while ( block_rows('carousel-item') )
            @php
                block_row('carousel-item');
                $preview_type = block_sub_value('preview-element');
            @endphp
            <div class="carousel-element" data-carousel-id="{{ wp_rand(0, PHP_INT_MAX) }}">
                <div class="mr-4 @if(block_sub_value('title')) bg-white shadow-md @endif ">
                    @if ( $preview_type == 'post-image' )
                        <div class="image-wrapper ">
                            @if(block_sub_value('link'))
                                <a href="{{ block_sub_value('link') }}">
                            @endif

                                @include('blocks.helpers.image',
                                [
                                    'name_ImageField' => 'preview-image',
                                    'additionalClasses' => array('class' => 'nolazyload !m-0'),
                                    'thumbnail' => $ar_class,
                                    'isRepeaterElement' => true,
                                    'identifierLightbox' => $idLightbox
                                ])

                            @if(block_sub_value('link'))
                                </a>
                            @endif
                        </div>
                    @else
                        <div class="video-wrapper ">
                            @switch($preview_type)
                                @case('post-video')
                                    @include('blocks.helpers.video-youtube',
                                    [
                                        'name_UrlField' => 'preview-videourl',
                                        'isRepeaterElement' => true,
                                        'useCustomPlayBtn' =>  $useCustomPlayBtn
                                    ])
                                    @break
                                @case('post-video-intern')
                                    @include('blocks.helpers.video-intern',
                                    [
                                        'name_UrlField' => 'preview-videourl',
                                        'name_PosterField' => 'preview-image',
                                        'default_Features' => 'controls playsinline',
                                        'isRepeaterElement' => true,
                                        'useCustomPlayBtn' =>  $useCustomPlayBtn
                                    ])
                                    @break
                                @case('post-video-lightbox')
                                    @include('blocks.helpers.video-lightbox',
                                    [
                                        'name_UrlField' => 'preview-videourl',
                                        'name_PosterField' => 'preview-image',
                                        'useCustomPlayBtn' =>  $useCustomPlayBtn,
                                        'isRepeaterElement' => true,
                                        'identifierLightbox' => $idLightbox
                                    ])
                            @endswitch
                        </div>
                    @endif
                    <div class="text-wrapper p-gutter">
                        @if ( block_sub_value( 'title') )
                            <p class="text-font font-bold text-sm mt-0 !mb-2 @if ( block_sub_value('link') ) font-normal @else font-bold @endif">{{ block_sub_value('title') }}</p>
                        @endif
                        @if ( block_sub_value('text') )
                            <div class="">
                            {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                            </div>
                        @endif
                        @if ( block_sub_value('email') )
                            <a class="text-font text-sm hover:text-primary" href="mailto:{{ block_sub_value('email') }}">{{ App\pl__('E-Mail') }}</a>@if ( block_sub_value('phone') )<span class="!text-font text-sm"> | </span><a href="tel:{{ block_sub_value('phone') }}">{{ block_sub_value('phone') }}</a> @endif </p>
                        @endif
                    </div>
                </div>
            </div>
        @endwhile
        {{ reset_block_rows( 'carousel-item' ) }}
    </div>
@overwrite
