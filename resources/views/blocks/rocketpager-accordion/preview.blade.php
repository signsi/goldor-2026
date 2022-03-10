@php
    $hidden = block_value('hide-element');
@endphp

@extends('blocks.helpers.preview-wrapper')

@section('content-section-before-flex')
    @if(block_rows('element'))
        <ul class="accordion">
            @while (block_rows('element'))
                @php block_row('element') @endphp
                    <li class="accordion-item" style="">
                        @if(block_sub_value('hide-element') && !$hidden)
                            <div class="hidden_Element">
                                <h2>Element wird Live nicht angezeigt.</h2>
                            </div>
                        @endif
                        <a class="accordion-title">{{ block_sub_value('title') }}</a>
                        <div class="accordion-content">
                            {!! App\sanitize_out(block_sub_value('content'), 'text_area') !!}
                        </div>
                    </li>
            @endwhile
            {{ reset_block_rows( 'element' ) }}
        </ul>
    @endif
@overwrite