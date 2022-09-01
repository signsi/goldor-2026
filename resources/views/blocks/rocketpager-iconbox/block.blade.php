@php
    $row_per_col = App\setColumns();
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="grid gap-gutter {{ $row_per_col }}">
        @while (block_rows('icon'))
            @php
                block_row('icon');
                $isImage = block_sub_value('content-type') == 'image';
            @endphp
            @if (block_sub_value('link')) <a href="{{ block_sub_value('link') }}" @else <div @endif class="bg-secondary border-3 border-secondary group hover:bg-white hover:border-primary flex flex-col justify-between group p-5 text-center md:text-left no-underline">
                <div class="flex flex-col justify-start h-full mb-4 md:mb-6 lg:mb-8">
                    <div class="{{ App\existsReturnKey('rounded-bg', 'rounded-full bg-white') }}">
                        @if ( $isImage )
                            @include('blocks.helpers.image',
                            [
                                'name_ImageField' => 'image',
                                'additionalClasses' => array('class' => 'transition-transform duration-300 ease-in-out mb-0 w-auto h-[75px] lg:h-[80px] mx-auto md:mx-0 transition  group-hover:scale-105'),
                                'thumbnail' => 'small-width',
                                'isRepeaterElement' => true
                            ])
                        @else
                            @if ( block_sub_value('lottie-animation') )
                                {!! App\sanitize_out(block_sub_value('lottie-animation'), 'shortcode') !!}
                            @endif
                        @endif
                    </div>
                    @if ( block_sub_value('title') )
                        <div class="mt-4 md:mt-6 lg:mt-8">
                            <{{ block_sub_value('heading') }}>{!! App\sanitize_out(block_sub_value('title'), 'text') !!}</{{ block_sub_value('heading') }}>
                        </div>
                    @endif
                    @if ( block_sub_value('text') )
                        <div class="mt-4 @if (block_sub_value('heading')) @else md:mt-6 lg:mt-8 @endif">
                            {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                        </div>
                    @endif
                </div>

                @if (block_sub_value('link'))
                    <span class="no-underline transition-transform hover:no-underline group-hover:origin-center group-hover:text-primary group-hover:translate-x-2 !mb-3 block" href="{{ block_sub_value('link') }}">Mehr erfahren <i class="fa-light fa-arrow-right-long"></i></span>
                @endif
            @if (block_sub_value('link')) </a> @else </div> @endif
        @endwhile
        {{ reset_block_rows( 'icon' ) }}
    </div>
@overwrite
