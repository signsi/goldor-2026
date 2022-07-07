@php
    $row_per_col = App\setColumns();
    $preview_size = block_value('preview-size');
@endphp

@extends('blocks.helpers.block-wrapper', ['ignoreAnimation' => true])

@section('content-section')

    <div class="title-wrapper text-center">
        <{{ block_field('heading') }}>{{ block_field('title') }}</{{ block_field('heading') }}>
    </div>

    <div class="grid-x grid-margin-x{{ $row_per_col }} customer--wrapper">
        @while (block_rows('logo'))
            @php
                block_row('logo');
                $attachment_id = block_sub_value('image');
                $image_url = wp_get_attachment_url($attachment_id);
            @endphp
            <div class="cell container--outer @if ( block_value( 'boxed'))boxed @endif{{ App\getAnimation() }} {{ $preview_size }}">
                <div class="container--inner">
                    @if ( block_sub_value( 'link') )
                        <a href="{{ block_sub_value('link') }}" target="_blank">
                    @endif
                        <div class="logo" style="background-image: url('{{ ( block_sub_value( 'image') ) ? $image_url : 'https://via.placeholder.com/400x300.png?text=Platzhalter%20Logo' }}');"></div>
                    @if ( block_sub_value( 'link') )
                        </a>
                    @endif
                </div>
                @if ( block_sub_value('description') )
                    <div class="logo-description">
                        {!! App\sanitize_out(block_sub_value('description'), 'text_area') !!}
                    </div>
                @endif
            </div>
        @endwhile
        {{ reset_block_rows( 'logo' ) }}
    </div>
@overwrite