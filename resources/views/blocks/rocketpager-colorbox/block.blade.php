@php
$additional_classes = block_value('bgcolor-textbox');
$additional_classes .= App\existsReturnKey('link', ' external-link');
@endphp

@extends('blocks.helpers.block-wrapper',
[
'ignoreAnimation' => false,
'element_classes' => $additional_classes
]
)

@section('content-section')
    @if (block_value('link'))
        <a href="{{ block_value('link') }}" target="_blank">
            @if (block_value('text'))
                {!! App\sanitize_out(block_value('text'), 'text_area') !!}
            @endif
            <span href="{{ block_value('link') }}" class="link-icon" target="_blank"><i
                    class="fas fa-external-link-alt"></i></span>
        </a>
    @else
        @if (block_value('text'))
            {!! App\sanitize_out(block_value('text'), 'text_area') !!}
        @endif
    @endif
@overwrite
