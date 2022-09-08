@php
    $row_per_col = App\setColumns();
@endphp

@extends('blocks.helpers.block-wrapper', ['ignoreAnimation' => true])

@section('content-section')
    <div class="grid gap-tiny lg:gap-mobile{{ $row_per_col }}">
        @while (block_rows('team-member'))
            @php
                block_row('team-member');
                $linkedin = block_sub_value('social-media-linkedin');
                $instagram = block_sub_value('social-media-instagram')
            @endphp
            @if ( !block_sub_value('hide-element') )
                <div class="team-member transition-all duration-300 ease-in-out{{ App\getAnimation() }}">
                    <div class="image-wrapper not-prose">
                        @include('blocks.helpers.image',
                        [
                            'name_ImageField' => 'portrait-image',
                            'thumbnail' => 'square-thumb',
                            'additionalClasses' => array('class' => '!m-0'),
                            'isRepeaterElement' => true
                        ])
                    </div>
                    <div class="text-wrapper pr-4 py-4 text-left">
                        @if ( block_sub_value( 'name') )
                            <p class="title !mb-2"><strong>{{ block_sub_value('name') }}</strong></p>
                        @endif
                        @if ( block_sub_value('text') )
                            <div class="prose-p:leading-7">{!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}</div>
                        @endif
                        @if ( block_sub_value('email') )
                            <p><a href="mailto:{{ block_sub_value('email') }}" class="underline text-primary hover:text-darkgreen">E-Mail</a>@if ( block_sub_value('phone') ) | <a href="tel:{{ block_sub_value('phone') }}" class="underline text-primary hover:text-darkgreen">{{ block_sub_value('phone') }}</a> @endif </p>
                        @endif
                    </div>
                </div>
            @endif
        @endwhile
        {{ reset_block_rows( 'team-member' ) }}
    </div>
@overwrite