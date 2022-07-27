@extends('blocks.helpers.block-wrapper', ['ignoreAnimation' => true, 'element_classes' => 'grid grid-cols-2 lg:grid-cols-3 gap-[3px]'])

@section('content-section')
    @while (block_rows('team-member'))
        @php
            block_row('team-member');
            $linkedin = block_sub_value('social-media-linkedin');
            $instagram = block_sub_value('social-media-instagram')
        @endphp
        @if ( !block_sub_value('hide-element') )
            <div class="team-member inline-block transition-all duration-300 ease-in-out{{ App\getAnimation() }}">
                <div class="content--wrapper relative not-prose">
                    <div class="portrait">
                        @include('blocks.helpers.image',
                        [
                            'name_ImageField' => 'portrait-image',
                            'thumbnail' => 'square-thumb',
                            'isRepeaterElement' => true
                        ])
                    </div>
                    <div class="job-description absolute inset-0 min-w-full bg-cover bg-no-repeat bg-center opacity-0 bg-font bg-opacity-80 flex flex-col flex-nowrap justify-center items-center text-center transition-all duration-300 ease-in-ou p-3 md:p-6 lg:8 break-words text-white text-sm sm:text-base md:text-xl">
                        <p>
                            @if ( block_sub_value('name') )
                                <strong>{{ block_sub_value('name') }}</strong><br>
                            @endif
                            @if ( block_sub_value('funktion') )
                                {{ block_sub_value('funktion') }}<br>
                            @endif
                            @if ( block_sub_value('email') )
                                <a href="mailto:{{ block_sub_value('email') }}" class="email relative font-black text-primary overflow-hidden bg-gradient-to-r from-white to-primary bg-clip-text bg-[length:200%_100%] bg-100 transition-[background-position] duration-300 ease-in no-underline hover:bg-0_100">{{ block_sub_value('email') }}</a>
                            @endif
                        </p>
                        <div class="description hidden md:block">
                            @if ( block_sub_value('text') )
                                {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                            @endif
                        </div>
                        <div class="social-nav-wrapper">
                            @include('blocks.helpers.social-link',['media_name'=> '', 'media_link' => $linkedin, 'icon_classes' => 'fab fa-linkedin', 'noListitem' => true])
                            @include('blocks.helpers.social-link',['media_name'=> '', 'media_link' => $instagram, 'icon_classes' => 'fab fa-instagram-square', 'noListitem' => true])
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endwhile
    {{ reset_block_rows( 'team-member' ) }}
@overwrite

<style>
    a.email{
        -webkit-text-fill-color: transparent;
    }
</style>