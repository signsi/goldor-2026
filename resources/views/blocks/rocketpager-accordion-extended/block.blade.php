@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true" data-deep-link="true"
        data-deep-link-smudge="true" data-deep-link-smudge-delay="600" data-accordion
        id="deeplinked-accordion-with-smudge">
        <li class="accordion-item{{ App\getAccordionActive() }}"
            data-accordion-item>
            <a href="#{{ App\echoDeepLinktitle() }}" class="accordion-title">{{ block_value('title') }}</a>
            <div class="accordion-content" data-tab-content id="{{ App\echoDeepLinktitle() }}">
                {!! App\sanitize_out(block_value('inner-block'), 'allow_iframe') !!}
            </div>
        </li>
    </ul>
@overwrite