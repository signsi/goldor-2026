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
                    'additionalClasses' => array('class' => 'w-auto h-[75px] mx-0'),
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
        </div>
    @endwhile
    {{ reset_block_rows('icon') }}
@overwrite
