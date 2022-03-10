@php
    $additional_classes = App\mapToKeyString(['carousel-stil', 'ratio']);
@endphp

@extends('blocks.helpers.block-wrapper', ['element_classes' => $additional_classes])

@section('content-section')
    @while ( block_rows('carousel-item') )
        @php block_row('carousel-item') @endphp
        <div class="carousel-element">
            @if ( block_sub_value('preview-element') == 'post-image' )
                <div class="image-wrapper">
                    @if(block_sub_value('link'))
                        <a href="{{ block_sub_value('link') }}">
                    @endif

                        @include('blocks.helpers.image',
                        [
                            'name_ImageField' => 'preview-image',
                            'additionalClasses' => array('class' => 'nolazyload'),
                            'thumbnail' => '16-9-thumb',
                            'isRepeaterElement' => true
                        ])

                    @if(block_sub_value('link'))
                        </a>
                    @endif
                </div>
            @else
                <div class="video-wrapper">
                    @if ( block_sub_value('preview-element') == 'post-video' )
                        @include('blocks.helpers.video-youtube',
                        [
                            'name_UrlField' => 'preview-videourl',
                            'isRepeaterElement' => true
                        ])
                    @else
                        @include('blocks.helpers.video-intern',
                        [
                            'name_UrlField' => 'preview-videourl',
                            'name_PosterField' => 'preview-image',
                            'default_Features' => 'controls playsinline',
                            'isRepeaterElement' => true
                        ])
                    @endif
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
