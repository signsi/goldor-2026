@php
    $isboxBgClasses = block_value('box-bg');
    $boxBgClasses = $isboxBgClasses ? 'bg-white shadow-lg text-primary p-xl' : '';
    $enableStoererClass = block_value('enable-stoerer') ? 'rotate-6 hover:shadow-2xl flex flex-col justify-center items-center p-rp-20 bg-primary shadow-lg hover:bg-secondary border-4 border-secondary border-dotted transition-all max-w-none w-44 h-44 md:w-64 md:h-64 xl:w-80 xl:h-80 rounded-full lg:mb-[calc(0px_-_(1.5_*_var(--spacing-responsive--rp70)))] [&_*]:text-white' : '';
    $hasStoererClass = block_value('enable-stoerer') ? 'hasStoerer' : '';
    
    // Wenn 'enable-stoerer' aktiv ist, setze $boxBgClasses auf leer
    $boxBgClasses = block_value('enable-stoerer') ? '' : $boxBgClasses;

    // Erstelle eine Variable für block_value('hasGradient')
    $hasGradientClass = block_value('hasGradient') ? 'hasGradient' : '';
@endphp

@extends('blocks.helpers.block-wrapper', ['element_classes' => 'relative'])

@section('content-section')
    <div class="hero-slider {{ $hasStoererClass }}">
        @while (block_rows('slide'))
            @php block_row('slide') @endphp
            <div class="slides bg-object-wrapper px-medium {{ block_value('slider-height') }} {{ $hasGradientClass }}">
                @if (block_sub_value('title'))
                    <div class="relative z-30 flex h-full {{ block_value('container-width') }} {{ block_value('box-alignment') }} {{ block_value('text-alignment') }} mx-auto py-2xl">
                        @if (block_sub_value('button-text') && block_value('enable-stoerer')) <a href="{{ block_sub_value('button-link') }}" @else <div @endif class="anim__animated anim__fadeInUp {{ block_value('box-width') }} {{ $enableStoererClass }} {{ $boxBgClasses }}">
                            <span class="heading-1 !my-0">{!! App\sanitize_out(block_sub_value('title'), 'text_area') !!}</span>
                            @if (block_sub_value('text'))
                                <div class="[&_*]:text-lg [&_*]:font-normal">
                                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                                </div>
                            @endif
                            @if (block_sub_value('button-text'))
                                @if (block_value('enable-stoerer'))
                                    <ul class="is-style-liststyle-icon-start--arrow-right-long hidden xl:block mb-0">
                                        <li>{{ block_sub_value('button-text') }}</li>
                                    </ul>
                                @else
                                    <div class="wp-block-buttons mt-large">
                                        <div class="wp-block-button">
                                            <a href="{{ block_sub_value('button-link') }}" class="wp-block-button__link wp-element-button">{{ block_sub_value('button-text') }}</a>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @if (block_sub_value('button-text') && block_value('enable-stoerer')) </a> @else </div> @endif
                    </div>
                @endif
                <picture>
                    @include('blocks.helpers.image', [
                        'name_ImageField' => 'header-image',
                        'additionalClasses' => ['class' => 'absolute inset-0 w-full h-full object-cover object-center'],
                        'thumbnail' => 'full',
                        'isRepeaterElement' => true
                    ])
                </picture>
            </div>
        @endwhile
        {{ reset_block_rows('slide') }}
    </div>
    @if (block_value('arrow-down'))
        @include('blocks.helpers.scroll-down')
    @endif
@overwrite
