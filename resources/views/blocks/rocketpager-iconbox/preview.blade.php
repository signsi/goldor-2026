@php
    $flex_type = App\setColumns(true);
@endphp

@extends('blocks.helpers.preview-wrapper', ['flex_type' => $flex_type])

@section('flex-item-content')
    @while (block_rows('icon'))
        @php block_row('icon') @endphp
        <div>
            @if ( block_sub_value('content-type') == 'image' )
                @include('blocks.helpers.image',
                [
                    'name_ImageField' => 'image',
                    'additionalClasses' => array('class' => 'transition-transform duration-300 ease-in-out w-auto !h-[75px] !lg:h-[80px] mx-auto md:mx-0'),
                    'thumbnail' => 'small-width',
                    'isRepeaterElement' => true
                ])
            @else
                @if ( block_sub_value('lottie-animation') )
                    {!! App\sanitize_out(block_sub_value('lottie-animation'), 'shortcode') !!}
                @endif
            @endif
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
            @if (block_sub_value('link'))
                <span class="no-underline transition-transform hover:no-underline group-hover:origin-center group-hover:text-orange group-hover:translate-x-2 !mb-3 block" href="{{ block_sub_value('link') }}">Mehr erfahren <i class="fa-light fa-arrow-right-long"></i></span>
            @endif
        </div>
    @endwhile
    {{ reset_block_rows('icon') }}
@overwrite
