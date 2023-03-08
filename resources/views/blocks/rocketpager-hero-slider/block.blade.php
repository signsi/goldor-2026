@extends('blocks.helpers.block-wrapper', ['element_classes' => 'relative'])

@section('content-section')
    <div class="hero-slider">
        @while (block_rows('slide'))
            @php block_row('slide') @endphp
            <div class="slides bg-object-wrapper {{ block_value('slider-height') }}">
                @if ( block_sub_value( 'title') )
                    <div class="relative z-30 flex h-full flex-row-reverse align-items items-end max-w-default mx-auto px-gutter pt-section pb-8 lg:pb-12">
                        <div>
                            @if ( block_sub_value( 'title') )
                                <h3 class="text-white !my-0 text-xl md:text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl">{{ block_sub_value('title') }}</h3>
                            @endif
                        </div>
                    </div>
                @endif
                
                <picture class="-z-10 @if ( is_front_page() )after:absolute after:bottom-0 after:inset-x-0 after:h-1/4 after:content-[''] after:z-10 after:mix-blend-multiply after:opacity-80 after:bg-gradient-to-t after:from-black-transparent after:to-transparent @endif">
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
        <a href="#start" class="flex flex-col absolute left-1/2 right-0 bottom-8 lg:bottom-[5%] w-10 md:w-16 text-xl text-center text-primary no-underline -ml-5 md:-ml-8 hover:text-font">
            <span class="text-sm mb-3 -rotate-90">Scroll</span><i class="fal fa-long-arrow-down animate-bounce mt-3"></i>
        </a>
    @endif
@overwrite