{{-- 
    Innerhalb von "@section('content-section')" und "@endsection" kann die HTML Struktur des Block definiert werden.
    Die HTML-Struktur wird in den div-Container (rocketpager-{element-name}) eingefügt. Falls nebst den Standard-Klassen
    zusätzliche Klassen benötigt werden, können diese über die Variable element_classes mitgegeben werden."
--}}

@extends('blocks.helpers.preview-wrapper', [
    'element_classes' => '',
    'flex_type' => 'three-columns'
])

@section('content-section-before-flex')               
    <p>Field: {{ block_value('field') }}</p>
    <p>Empty-Field: {{ block_value('empty-field') }}</p>
    <p>No-Field: {{ block_value('no-field') }}</p>
    <p>Checkbox: {{ block_value('checkbox') }}</p>
    <p>Selection: {{ block_value('selection') }}</p>

    @include('blocks.helpers.image', 
    [
        'name_ImageField' => 'image',
        'thumbnail' => 'small-width'
    ])
@overwrite

@section('flex-item-content')
        @if(block_rows('repeater')) 
            @while (block_rows('repeater'))     
                @php block_row('repeater') @endphp {{-- Next Loop with new Repeater-Element --}} 
                <div class="col">                  
                    <div class="image-wrapper">                     
                        @include('blocks.helpers.image', 
                        [
                            'name_ImageField' => 'repeater-image',
                            'additionalClasses' => array('class' => 'margin-medium-r'),
                            'isRepeaterElement' => true
                        ])    
                    </div>
                    <div class="text-wrapper">Repeater-Item: {{ block_sub_value( 'repeater-item') }}</div>
                </div>         
            @endwhile
            {{ reset_block_rows( 'repeater' ) }} {{-- Setzt den Counter des Repeaters zurück --}} 
        @endif
@overwrite