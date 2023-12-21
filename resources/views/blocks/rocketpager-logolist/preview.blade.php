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
        @if ( block_sub_value('description') )
            <div class="logo-description text-center py-0 px-3 mt-3 mb-8 md:mb-10 lg:mb-15">
                {!! App\sanitize_out(block_sub_value('description'), 'text_area') !!}
            </div>
        @endif
    @endwhile
    {{ reset_block_rows('logo') }}
@overwrite
