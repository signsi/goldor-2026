@extends('blocks.helpers.block-wrapper', ['ignoreAnimation' => true])

@section('content-section')
    @if ( block_field( 'title') )
        <h2>{{ block_field('title') }}</h2>
    @endif
    <div class="customer--wrapper">
        @while (block_rows('logo'))
            @php
                block_row('logo');
                $attachment_id = block_sub_value('image');
                $image_url = wp_get_attachment_url($attachment_id);
            @endphp
            <div class="container--outer{{ App\getAnimation() }}">
                <div class="container--inner">
                    @if ( block_sub_value( 'link') )
                        <a href="{{ block_sub_value('link') }}" target="_blank">
                    @endif

                        <div class="logo" style="background-image: url('{{ ( block_sub_value( 'image') ) ? $image_url : 'https://via.placeholder.com/400x300.png?text=Platzhalter%20Logo' }}');"></div>

                    @if ( block_sub_value( 'link') )
                        </a>
                    @endif
                </div>
            </div>
        @endwhile
        {{ reset_block_rows( 'logo' ) }}
    </div>
@overwrite