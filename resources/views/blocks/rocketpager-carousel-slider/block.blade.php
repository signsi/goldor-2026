@php
    $useCustomPlayBtn = block_value('use-custom-play-button');
    $additional_classes = App\mapToKeyString(['carousel-stil', 'ratio']);
    $isBoxSlider = block_value( 'carousel-stil') == 'box-slider';
    $isCroppedSlider = block_value( 'cropped-stil');
    $additional_classes .= $isBoxSlider ? ' pr-0 pl-0 my-xl pb-xl' : 'my-xl pb-xl';
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
            $ar_class = 'square-thumb';
        break;
        default:
            $ar_class = 'square-thumb';
    }
@endphp

@extends('blocks.helpers.block-wrapper', ['element_classes' => $additional_classes])

@section('content-section')
    <div class="carousel-slider {{ block_value('arrows-alignment') }}">
        @while ( block_rows('carousel-item') )
            @php
                block_row('carousel-item');
                $preview_type = block_sub_value('preview-xl');
            @endphp
            <div class="carousel-xl" {{ block_value('arrows-alignment') }} data-carousel-id="{{ wp_rand(0, PHP_INT_MAX) }}">
                <div class="mr-4">
                    <div class="@if(block_sub_value('title') || block_sub_value('subtitle') || block_sub_value('text')) bg-white shadow-lg @endif">
                        @if ( $preview_type == 'post-image' )
                            <div class="image-wrapper ">
                                @if(block_sub_value('link'))
                                    <a href="{{ block_sub_value('link') }}">
                                @endif

                                    @include('blocks.helpers.image',
                                    [
                                        'name_ImageField' => 'preview-image',
                                        'additionalClasses' => array('class' => 'transition-transform scale-100 hover:scale-105 nolazyload !m-0'),
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
                        <div class="relative group text-wrapper p-medium [&_*]:text-font [&_*]:text-sm">
                            @if ( block_sub_value( 'title') )
                                <p class="font-bold my-0">{{ block_sub_value('title') }}</p>
                            @endif
                            @if ( block_sub_value('text') )
                                <div class="mb-medium [&_p]:mt-0">
                                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                                </div>
                            @endif
                            @if ( block_sub_value('email') || block_sub_value('phone') )
                                <div class="absolute opacity-0 group-hover:opacity-100 group-hover:justify-center transition-colors group-hover:items-center inset-0 bg-transparent group-hover:bg-primary">
                                    <ul class="flex justify-center items-center h-full my-0 pl-0 space-x-6 [&_*]:text-white transition-transform translate-y-full group-hover:translate-y-0">
                                        @if ( block_sub_value('email') )
                                            <a href="mailto:{{ block_sub_value('email') }}"><i class="hover:text-font text-xl fa-solid fa-envelope"></i></a>
                                        @endif
                                        @if ( block_sub_value('phone') )
                                            <a href="tel:{{ block_sub_value('phone') }}"><i class="hover:text-font text-xl fa-solid fa-phone"></i></a>
                                        @endif
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endwhile
        {{ reset_block_rows( 'carousel-item' ) }}
    </div>
    @if ( block_value( 'use-progressbar') )
        <div class="progress mt-medium w-1/2 lg:w-1/3" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    @endif
@overwrite
