@php
    $row_per_col = App\setColumns();
    $preview_size = block_value('preview-size');
    switch($preview_size){
        case 'aspect-ratio-16-9':
            $ar_class = 'pt-[56.25%]';
        break;
        case 'aspect-ratio-4-3':
            $ar_class = 'pt-[75%]';
        break;
        case 'aspect-ratio-square':
            $ar_class = 'pt-[100%]';
        break;
        default:
            $ar_class = 'pt-[56.25%]';
    }
@endphp

@extends('blocks.helpers.block-wrapper', ['ignoreAnimation' => true])

@section('content-section')

    <div class="title-wrapper text-center">
        <{{ block_field('heading') }} class="mb-element">{{ block_field('title') }}</{{ block_field('heading') }}>
    </div>

    <div class="grid{{ $row_per_col }} gap-gutter customer--wrapper">
        @while (block_rows('logo'))
            @php
                block_row('logo');
                $attachment_id = block_sub_value('image');
                $image_url = wp_get_attachment_url($attachment_id);
            @endphp
            <div class="cell container--outer{{ App\getAnimation() }}">
                <div class="container--inner relative {{ $ar_class }} @if ( block_value( 'boxed')) bg-white border border-gray-500 @endif">
                    @if ( block_sub_value( 'link') )
                        <a href="{{ block_sub_value('link') }}" target="_blank">
                    @endif
                        <div class="logo absolute inset-[10%] bg-contain bg-no-repeat bg-center" style="background-image: url('{{ ( block_sub_value( 'image') ) ? $image_url : 'https://via.placeholder.com/400x300.png?text=Platzhalter%20Logo' }}');"></div>
                    @if ( block_sub_value( 'link') )
                        </a>
                    @endif
                </div>
                @if ( block_sub_value('description') )
                    <div class="logo-description text-center py-0 px-3 mt-3 mb-8 md:mb-10 lg:mb-15">
                        {!! App\sanitize_out(block_sub_value('description'), 'text_area') !!}
                    </div>
                @endif
            </div>
        @endwhile
        {{ reset_block_rows( 'logo' ) }}
    </div>
@overwrite