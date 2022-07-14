@extends('blocks.helpers.block-wrapper', ['element_classes' => 'relative mt-0'])

@section('content-section')
    <div class="hero-slider">
        @while (block_rows('slide'))
            @php block_row('slide') @endphp
            <div class="slides bg-object-wrapper {{ block_value('slider-height') }}">
                @if ( block_sub_value( 'title') )
                    <div class="absolute top-0 left-0 right-0 hidden md:block max-w-default mx-auto px-gutter pt-section">
                        <div class="flex gap-gutter">
                            <div class="basis-5/12 lg:bassis-4/14 relative hidden md:block">
                                <div class="relative h-full after:content[''] after:absolute after:inset-0 after:mix-blend-multiply after:bg-primary">
                                </div>
                                <div class="absolute inset-gutter-mobile md:inset-gutter-desktop">
                                    <a href="{{home_url("/")}}" rel="home">
                                        <div class="logo">
                                            @include('blocks.helpers.image',
                                            [
                                                'name_ImageField' => 'logo',
                                                'thumbnail' => 'full',
                                                'additionalClasses' => array('class' => 'w-full'),
                                                'isRepeaterElement' => true,
                                            ])
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="basis-full">
                                <div class="relative p-gutter text-primary bg-white/[.8]">
                                    @if ( block_sub_value( 'title') )
                                        <h1>{{ block_sub_value('title') }}</h1>
                                    @endif
                                    @if ( block_sub_value( 'subtitle') )
                                        <h3 class="mb-0">{{ block_sub_value('subtitle') }}</h3>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <picture class="-z-10">
                    @include('blocks.helpers.image',
                    [
                        'name_ImageField' => 'header-image',
                        'additionalClasses' => array('class' => 'object-cover'),
                        'thumbnail' => 'full',
                        'isRepeaterElement' => true
                    ])
                </picture>
            </div>
        @endwhile
        {{ reset_block_rows( 'slide' ) }}
    </div>
    @if ( block_value('arrow-down') )
        <a href="#start" class="flex flex-col absolute left-1/2 right-0 bottom-8 lg:bottom-[5%] w-10 md:w-16 text-xl text-center text-primary -ml-5 md:-ml-8 hover:no-underline hover:text-font">
            <span class="text-sm mb-3 -rotate-90">Scroll</span><i class="fal fa-long-arrow-down animate-bounce mt-3"></i>
        </a>
    @endif
@overwrite