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
            @if (block_sub_value('link')) <a href="{{ block_sub_value('link') }}" @else <div @endif class="bg-secondary flex flex-col justify-between group px-5 py-8 text-center md:text-left no-underline">
                <div class="flex flex-col justify-start h-full mb-4 md:mb-6 lg:mb-8">
                    <div class="{{ App\existsReturnKey('rounded-bg', 'rounded-full bg-white') }}">
                        @if ( $isImage )
                            @include('blocks.helpers.image',
                            [
                                'name_ImageField' => 'image',
                                'additionalClasses' => array('class' => 'transition-transform duration-300 ease-in-out w-auto h-[75px] md:h-[85px] lg:h-[95px] mx-auto md:mx-0'),
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
                            <h3>{!! App\sanitize_out(block_sub_value('title'), 'text') !!}</h3>
                        </div>
                    @endif
                    @if ( block_sub_value('text') )
                        <div class="mt-4 md:mt-6 lg:mt-8">
                            <p>{!! App\sanitize_out(block_sub_value('text'), 'text') !!}</p>
                        </div>
                    @endif
                </div>

                @if (block_sub_value('link'))
                    <span class="no-underline transition-transform hover:no-underline group-hover:origin-center group-hover:text-orange group-hover:translate-x-2" href="{{ block_sub_value('link') }}">Mehr erfahren <i class="fa-light fa-arrow-right-long"></i></span>
                @endif
            @if (block_sub_value('link')) </a> @else </div> @endif
        @endwhile
        {{ reset_block_rows( 'icon' ) }}
    </div>
@overwrite