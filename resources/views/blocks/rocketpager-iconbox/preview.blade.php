@php
    $flex_type = App\setColumns(true);
@endphp

@extends('blocks.helpers.preview-wrapper', ['flex_type' => $flex_type])

@section('flex-item-content')
    @while (block_rows('icon'))
        @php block_row('icon') @endphp
        <div class="animation-shortcode">
            @if ( block_sub_value('title') )
                <h3 class="text-center">{{ block_sub_value('title') }}</h3>
            @endif
            @if ( block_sub_value('content-type') == 'image' )
                @include('blocks.helpers.image',
                [
                    'name_ImageField' => 'image',
                    'additionalClasses' => array('class' => 'mx-auto'),
                    'thumbnail' => 'small-width',
                    'isRepeaterElement' => true
                ])
            @else
                @if ( block_sub_value('lottie-animation') )
                    {!! App\sanitize_out(block_sub_value('lottie-animation'), 'shortcode') !!}
                @endif
            @endif
        </div>
    @endwhile
    {{ reset_block_rows('icon') }}
@overwrite
