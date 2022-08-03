@php
    $flex_type = App\setColumns(true);
@endphp

@extends('blocks.helpers.preview-wrapper', ['flex_type' => $flex_type])

@section('content-section-before-flex')
    <{{ block_field('heading') }} class="mb-8">{{ block_field('title') }}</{{ block_field('heading') }}>
@overwrite

@section('flex-item-content')
    @while (block_rows('logo'))
        @php block_row('logo') @endphp
            @include('blocks.helpers.image',
            [
                'name_ImageField' => 'image',
                'isRepeaterElement' => true
            ])
    @endwhile
    {{ reset_block_rows('logo') }}
@overwrite