@php
    $idLightbox = App\getLightboxIdentifier();
@endphp

@extends('blocks.helpers.block-wrapper', ['element_classes' => 'content-slider'])

@section('content-section')
    @while ( block_rows('slide') )
        @php block_row('slide') @endphp
        <div class="not-prose">
            @include('blocks.helpers.image',
            [
                'name_ImageField' => 'image',
                'additionalClasses' => array('class' => 'nolazyload'),
                'thumbnail' => 'full-width',
                'isRepeaterElement' => true,
                'identifierLightbox' => $idLightbox
            ])
        </div>
    @endwhile
    {{ reset_block_rows('slide') }}
@overwrite