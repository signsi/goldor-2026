@extends('blocks.helpers.block-wrapper', ['element_classes' => 'relative'])

@section('content-section')
    <div class="hero-slider">
        @while (block_rows('slide'))
            @php block_row('slide') @endphp
            <div class="slides bg-object-wrapper px-medium {{ block_value('slider-height') }} @if (block_value('hasGradient')) hasGradient @endif">
                @if (block_sub_value('title'))
                    <div class="relative z-30 flex h-full {{ block_value('container-width') }} {{ block_value('box-alignment') }} {{ block_value('text-alignment') }} mx-auto py-2xl">
                        <div class="w-full {{ block_value('box-width') }} @if (block_value('box-bg')) bg-white shadow-lg text-primary p-xl @else [&_*]:text-white @endif @if (block_value('enable-stoerer')) stoerer @endif anim__animated anim__fadeInUp">
                            <span class="heading-1 !my-0">{!! App\sanitize_out(block_sub_value('title'), 'text_area') !!}</span>
                            @if (block_sub_value('text'))
                                <div class="[&_*]:text-lg [&_*]:font-normal">
                                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                                </div>
                            @endif
                            @if (block_sub_value('button-text'))
                                @if (block_value('enable-stoerer'))
                                    <ul class="is-style-liststyle-icon-start--arrow-right-long hidden xl:block">
                                        <li><a href="{{ block_sub_value('button-link') }}">{{ block_sub_value('button-text') }}</a></li>
                                    </ul>
                                @else
                                    <div class="wp-block-buttons mt-large">
                                        <div class="wp-block-button">
                                            <a href="{{ block_sub_value('button-link') }}" class="wp-block-button__link wp-element-button">{{ block_sub_value('button-text') }}</a>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        </div>
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
