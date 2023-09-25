@extends('blocks.helpers.block-wrapper', ['element_classes' => 'relative'])

@section('content-section')
    <div class="hero-slider">
        @while (block_rows('slide'))
            @php block_row('slide') @endphp
            <div class="slides bg-object-wrapper px-gutter {{ block_value('slider-height') }} @if ( block_value( 'hasGradient') ) hasGradient @endif ">
                @if ( block_sub_value( 'title') )
                    <div class="relative z-30 flex h-full {{ block_value('box-alignment') }} {{ block_value('text-alignment') }} max-w-default mx-auto py-section">
                        <div class="{{ block_value('box-width') }} @if ( block_value( 'box-bg') ) bg-white shadow-lg text-primary p-element @else [&_*]:text-white @endif">
                            @if ( block_sub_value( 'title') )
                                <span class="heading-1 !my-0">{{ block_sub_value('title') }}</h3>
                            @endif
                            @if ( block_sub_value( 'text') )
                                <div class="[&_*]:text-lg [&_*]:font-normal">
                                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                                </div>
                            @endif
                            @if ( block_sub_value( 'button-text') )
                                <div class="wp-block-buttons">
                                    <div class="wp-block-button">
                                        <a class="wp-block-button__link wp-element-button">{{ block_sub_value('button-text') }}</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                <picture class="-z-10">
                    @include('blocks.helpers.image',
                    [
                        'name_ImageField' => 'header-image',
                        'additionalClasses' => array('class' => 'object-cover !my-0'),
                        'thumbnail' => 'full',
                        'isRepeaterElement' => true
                    ])
                </picture>
            </div>
        @endwhile
        {{ reset_block_rows( 'slide' ) }}
    </div>
    @if ( block_value('arrow-down') )
        @include('blocks.helpers.scroll-down')
    @endif
@overwrite