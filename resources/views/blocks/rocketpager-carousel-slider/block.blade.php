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

@section('content-section')
    @while ( block_rows('carousel-item') )
        @php
            block_row('carousel-item');
            $preview_type = block_sub_value('preview-element');
        @endphp
        <div class="carousel-element @if($isBoxSlider) p-0 pb-4 md:p-4 md:pt-0 @endif" data-carousel-id="{{ wp_rand(0, PHP_INT_MAX) }}">
            @if ( $preview_type == 'post-image' )
                <div class="image-wrapper not-prose">
                    @if(block_sub_value('link'))
                        <a href="{{ block_sub_value('link') }}">
                    @endif

                        @include('blocks.helpers.image',
                        [
                            'name_ImageField' => 'preview-image',
                            'additionalClasses' => array('class' => 'nolazyload !m-0 pr-4'),
                            'thumbnail' => $ar_class,
                            'isRepeaterElement' => true,
                            'identifierLightbox' => $idLightbox
                        ])

                    @if(block_sub_value('link'))
                        </a>
                    @endif
                </div>
            @else
                <div class="video-wrapper not-prose">
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
            <div class="text-wrapper pr-4 not-prose {{ $isBoxSlider ? 'px-0 text-left' : 'py-4 text-left'}}">
                @if ( block_sub_value( 'title') )
                    <p class="title !mb-2 @if ( block_sub_value('link') ) font-normal @else font-bold @endif">{{ block_sub_value('title') }}</p>
                @endif
                @if ( block_sub_value('text') )
                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                @endif
                @if ( block_sub_value('email') )
                    <p><a href="mailto:{{ block_sub_value('email') }}" class="underline text-primary hover:text-darkgreen">E-Mail</a>@if ( block_sub_value('phone') ) | <a href="tel:{{ block_sub_value('phone') }}" class="underline text-primary hover:text-darkgreen">{{ block_sub_value('phone') }}</a> @endif </p>
                @endif
            </div>
        </div>
    @endwhile
    {{ reset_block_rows( 'carousel-item' ) }}
@overwrite
