@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="hero-slider">
        @while (block_rows('slide'))
            @php block_row('slide') @endphp
            <div class="slides bg-object-wrapper--smallUp {{ block_value('slider-height') }}">
                @if ( block_sub_value( 'title') )
                    <div class="grid-container padding-xxlarge-t">
                        <div class="grid-x grid-margin-x text-box">
                            <div class="cell small-12 medium-4 logo-wrapper show-for-medium">
                                <div class="mixed-blend-mode">

                                </div>
                                <div class="logo-wrapper--inner">
                                    <a href="{{home_url("/")}}" rel="home">
                                        <div class="logo">
                                            @include('blocks.helpers.image', 
                                            [
                                                'name_ImageField' => 'logo',
                                                'thumbnail' => 'full',
                                                'isRepeaterElement' => true
                                            ])
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="cell small-12 medium-auto">
                                <div class="text-box--inner">
                                    @if ( block_sub_value( 'title') )
                                        <h1>{{ block_sub_value('title') }}</h1>
                                    @endif
                                    @if ( block_sub_value( 'subtitle') )
                                        <h3>{{ block_sub_value('subtitle') }}</h3>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <picture>
                    @include('blocks.helpers.image', 
                    [
                        'name_ImageField' => 'header-image',
                        'additionalClasses' => array('class' => 'bg-object--cover'),
                        'thumbnail' => 'full',
                        'isRepeaterElement' => true
                    ]) 
                </picture>
            </div>
        @endwhile
        {{ reset_block_rows( 'slide' ) }}
    </div>
    @if ( block_value('arrow-down') )
        <a href="#start" class="arrow-down">
            <span class="scollDown">Scroll</span><i class="fal fa-long-arrow-down animate__animated animate__fadeInDown animate__slow animate__infinite"></i>
        </a>
    @endif
@overwrite