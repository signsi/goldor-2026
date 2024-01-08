@extends('blocks.helpers.preview-wrapper')

@section('content-section-before-flex') 
    <ul class="accordion">
        <li class="accordion-item">
            <a class="accordion-title">{{ block_value('title') }}</a>
            <div class="accordion-content">
                <p>Um den Inhalt zu sehen klicke auf den Block</p>
            </div>
        </li>
    </ul>
@overwrite
