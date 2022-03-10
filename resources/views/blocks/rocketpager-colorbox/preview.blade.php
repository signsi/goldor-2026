@php
    $additional_classes = block_value('bgcolor-textbox');
@endphp

@extends('blocks.helpers.preview-wrapper', ['element_classes' => $additional_classes])

@section('content-section-before-flex')
    @if ( block_value('text') )
        {!! App\sanitize_out(block_value('text'), 'text_area') !!}
    @endif
@overwrite