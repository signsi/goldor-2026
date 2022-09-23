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
            @if (block_sub_value('link')) <a href="{{ block_sub_value('link') }}" class="bg-white flex flex-col justify-center group p-5 no-underline hover:bg-secondarydark" @else <div @endif class="bg-white flex flex-col justify-center p-5 no-underline">
                <div class="flex @if ( block_value('layout-row') ) flex-col justify-start md:flex-row md:items-center md:space-x-4 @else flex-col justify-start @endif h-full">
                    <div class="mx-auto @if ( block_value('layout-row') ) basis-1/4 @endif">
                        @if ( $isImage )
                            @include('blocks.helpers.image',
                            [
                                'name_ImageField' => 'image',
                                'additionalClasses' => array('class' => 'transition-transform duration-300 ease-in-out mb-0 w-auto h-[100px] mx-auto md:mx-0 transition'),
                                'thumbnail' => 'small-width',
                                'isRepeaterElement' => true
                            ])
                        @else
                            @if ( block_sub_value('lottie-animation') )
                                {!! App\sanitize_out(block_sub_value('lottie-animation'), 'shortcode') !!}
                            @endif
                        @endif
                    </div>
                    <div class="text-center @if ( block_value('layout-row') ) md:basis-3/4 md:text-left @endif">
                        @if ( block_sub_value('title') )
                            <div class="@if ( block_value('layout-row') ) mt-0 @else mt-4 md:mt-6 lg:mt-8 @endif">
                                <{{ block_sub_value('heading') }} class="group-hover:text-white">{!! App\sanitize_out(block_sub_value('title'), 'text') !!}</{{ block_sub_value('heading') }}>
                            </div>
                        @endif
                        @if ( block_sub_value('text') )
                            @if ( !block_value('flippingbox') )
                                <div class="mt-4 group-hover:text-white @if (block_sub_value('heading')) @else md:mt-6 lg:mt-8 @endif">
                                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                                </div>
                            @endif
                        @endif
                        @if ( block_value('layout-row') )
                            @if (block_sub_value('link'))
                                <span class="no-underline transition-transform text-primary hover:no-underline group-hover:origin-center group-hover:text-white group-hover:translate-x-2 mt-3 block" href="{{ block_sub_value('link') }}">Mehr erfahren <i class="fa-light fa-arrow-right-long"></i></span>
                            @endif
                        @endif
                    </div>
                </div>
                @if ( !block_value('layout-row') )
                    @if (block_sub_value('link'))
                        <span class="text-center no-underline transition-transform hover:no-underline text-primary group-hover:origin-center group-hover:text-white group-hover:translate-x-2 mt-gutter block" href="{{ block_sub_value('link') }}">Mehr erfahren <i class="fa-light fa-arrow-right-long"></i></span>
                    @endif
                @endif
                {{-- @if ( block_value('flippingbox') )
                    <div class="">

                    </div>
                @endif --}}
            @if (block_sub_value('link')) </a> @else </div> @endif
        @endwhile
        {{ reset_block_rows( 'icon' ) }}
    </div>
@overwrite