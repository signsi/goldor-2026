@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <section class="carousel-header-slider slider">
        @if(block_rows('slide'))
            @while (block_rows('slide'))
                @php block_row('slide') @endphp
                @if ( block_sub_value( 'header-image') )
                    <div class="image-container">
                        @include('blocks.helpers.image',
                        [
                            'name_ImageField' => 'header-image',
                            'additionalClasses' => array('class' => 'nolazyload'),
                            'thumbnail' => 'square-thumb',
                            'isRepeaterElement' => true
                        ])
                        @if ( block_sub_value( 'text') )
                            <div class="image-container-textbox">
                                <h3>{{ block_sub_value('title') }}</h3>
                                @if ( block_sub_value( 'text') )
                                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                                @endif
                                @if ( block_sub_value( 'button-link') )
                                    <div class="wp-block-buttons">
                                        <div class="wp-block-button"><a class="wp-block-button__link" href="{{ block_sub_value('button-link') }}">{{ block_sub_value('button-text') ? block_sub_value('button-text') : "Erfahren Sie mehr" }}</a></div>
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
        <div class="grid-container show-for-medium padding-xxlarge-t">
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
                                    'thumbnail' => 'full'
                                ])
                            </div>
                        </a>
                    </div>
                </div>
                <div class="cell small-12 medium-auto">
                    <div class="text-box--inner">
                        @if ( block_value( 'title') )
                            <h1>{{ block_value('title') }}</h1>
                        @endif
                        @if ( block_value( 'subtitle') )
                            <h3>{{ block_value('subtitle') }}</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
@overwrite