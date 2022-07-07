@php
    $useCustomPlayBtn = block_value('use-custom-play-button');
    $additional_classes = App\mapToKeyString(['carousel-stil', 'ratio']);
    $idLightbox = App\getLightboxIdentifier();
@endphp

@extends('blocks.helpers.block-wrapper', ['element_classes' => $additional_classes])

@section('content-section')
    @while ( block_rows('carousel-item') )
        @php
            block_row('carousel-item');
            $preview_type = block_sub_value('preview-element');
        @endphp
        <div class="carousel-element" data-carousel-id="{{ wp_rand(0, PHP_INT_MAX) }}">
            @if ( $preview_type == 'post-image' )
                <div class="image-wrapper">
                    @if(block_sub_value('link'))
                        <a href="{{ block_sub_value('link') }}">
                    @endif

                        @include('blocks.helpers.image',
                        [
                            'name_ImageField' => 'preview-image',
                            'additionalClasses' => array('class' => 'nolazyload'),
                            'thumbnail' => '16-9-thumb',
                            'isRepeaterElement' => true,
                            'identifierLightbox' => $idLightbox
                        ])

                    @if(block_sub_value('link'))
                        </a>
                    @endif
                </div>
            @else
                <div class="video-wrapper">
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
                                'video_size' => $video_size,
                                'useCustomPlayBtn' =>  $useCustomPlayBtn,
                                'isRepeaterElement' => true,
                                'identifierLightbox' => $idLightbox
                            ])
                    @endswitch
                </div>
            @endif
            <div class="text-wrapper">
                @if ( block_sub_value( 'title') )
                    <p class="title"><strong>{{ block_sub_value('title') }}</strong></p>
                @endif
                @if ( block_sub_value('text') )
                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                @endif
                @if ( block_sub_value('link') )
                    <div class="wp-block-buttons flex {{ ( block_value( 'carousel-stil') == 'carousel-slider' ) ? 'element-alignment--mm' : 'element-alignment--lm' }}">
                        <div class="wp-block-button">
                            <a class="wp-block-button__link" href="{{ block_sub_value('link') }}">
                                Mehr erfahren
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endwhile
    {{ reset_block_rows( 'carousel-item' ) }}
@overwrite
