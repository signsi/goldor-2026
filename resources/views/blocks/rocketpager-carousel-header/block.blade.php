@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <section class="carousel-header-slider slider mt-0 relative">
        @if(block_rows('slide'))
            @while (block_rows('slide'))
                @php block_row('slide') @endphp
                @if ( block_sub_value( 'header-image') )
                    <div class="relative overflow-hidden group">
                        @include('blocks.helpers.image',
                        [
                            'name_ImageField' => 'header-image',
                            'additionalClasses' => array('class' => 'nolazyload'),
                            'thumbnail' => 'square-thumb',
                            'isRepeaterElement' => true
                        ])
                        @if ( block_sub_value( 'text') )
                            <div class="absolute inset-x-0 md:bottom-0 p-medium translate-y-11/10 transition-all transition-300 ease-in text-white bg-black/[.8] group-hover:translate-y-0">
                                <h3 class="m-0">{{ block_sub_value('title') }}</h3>
                                @if ( block_sub_value( 'text') )
                                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                                @endif
                                @if ( block_sub_value( 'button-link') )
                                    <div class="wp-block-buttons mb-0 mt-3">
                                        <div class="wp-block-button mb-0">
                                            <a class="wp-block-button__link hover:text-primary" href="{{ block_sub_value('button-link') }}">{{ block_sub_value('button-text') ? block_sub_value('button-text') : App\pl__("Erfahren Sie mehr") }}</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                @endif
            @endwhile
            {{ reset_block_rows( 'slide' ) }}
        @endif
    </section>
    @if ( block_value( 'title') )
        <div class="absolute top-0 left-0 right-0 hidden md:block max-w-default mx-auto px-gutter pt-2xl">
            <div class="flex gap-gutter">
                <div class="basis-5/12 lg:bassis-4/14 relative hidden md:block">
                    <div class="relative h-full after:content[''] after:absolute after:inset-0 after:mix-blend-multiply after:bg-primary">
                    </div>
                    <div class="absolute inset-medium">
                        <a href="{{App\get_home_url()}}" rel="home">
                            <div class="logo">
                                @include('blocks.helpers.image',
                                [
                                    'name_ImageField' => 'logo',
                                    'thumbnail' => 'full',
                                    'additionalClasses' => array('class' => 'w-full'),
                                ])
                            </div>
                        </a>
                    </div>
                </div>
                <div class="basis-auto">
                    <div class="relative p-medium text-primary bg-white/[.8]">
                        @if ( block_value( 'title') )
                            <h1 class="mt-0">{{ block_value('title') }}</h1>
                        @endif
                        @if ( block_value( 'subtitle') )
                            <h3 class="mb-0">{{ block_value('subtitle') }}</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
@overwrite