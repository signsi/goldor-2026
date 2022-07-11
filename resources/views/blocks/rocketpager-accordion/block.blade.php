@extends('blocks.helpers.block-wrapper')

@section('content-section')
    @if(block_rows('element'))
        <ul class="accordion bg-transparent mb-0" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true" data-deep-link-smudge="true" data-deep-link-smudge-delay="600" data-accordion id="deeplinked-accordion-with-smudge">
            @while (block_rows('element'))
                @php block_row('element') @endphp
                @if(!block_sub_value('hide-element'))
                    <li class="accordion-item pl-0 block before:hidden{{ App\getAccordionActive(block_row_index()) }}" data-accordion-item>
                        <a href="#{{ App\echoDeepLinktitle() }}" class="accordion-title color-font border-b border-b-font py-[10px] pr-0 pl-[25px] md:py-[20px]">{{ block_sub_value('title') }}</a>
                        <div class="accordion-content  bg-transparent border-none p-3 pb-5 pr-0 md:p-5 md:pb-10 md:pr-0" data-tab-content id="{{ App\echoDeepLinktitle() }}">
                            {!! App\sanitize_out(block_sub_value('content'), 'text_area' ) !!}
                        </div>
                    </li>
                @endif
            @endwhile
            {{ reset_block_rows( 'element' ) }}
        </ul>
    @endif
@overwrite