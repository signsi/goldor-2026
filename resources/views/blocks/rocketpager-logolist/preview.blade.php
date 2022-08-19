@php
    $flex_type = App\setColumns(true);
@endphp

@extends('blocks.helpers.preview-wrapper', ['flex_type' => $flex_type])

@section('content-section-before-flex')
    <{{ block_field('heading') }} class="mb-8">{{ block_field('title') }}</{{ block_field('heading') }}>
@overwrite

@section('flex-item-content')
    @while (block_rows('logo'))
            @php
                block_row('logo');
                $attachment_id = block_sub_value('image');
                $image_url = wp_get_attachment_url($attachment_id);
            @endphp
    @endwhile
    {{ reset_block_rows('logo') }}
@overwrite