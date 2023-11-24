{{--
    Falls es kein Repeater-Feld oder Query-Loop gibt, kann die HTML-Strukur innerhalb von "@section('content-section-before-flex')" und "@endsection" definiert werden.
    Bei Repeater oder Query-Loop kann das wiederholende Element innerhalb von "@section('flex-item-content')" und "@endsection" definiert werden.
    Falls vor oder nach den wiederholenden Elementen etwas dargestellt werden soll, kann dies über "@section('content-section-before-flex')" oder "@section('content-section-after-flex')" erreicht werden.
    Mit dem zusätzlichen Parameter flex_type kann die Anzahl Reihen [grid-cols-x] definiert werden.
    Die HTML-Struktur wird in den div-Container (rocketpager-{element-slug}) eingefügt. Falls nebst den Standard-Klassen
    zusätzliche Klassen benötigt werden, können diese über die Variable element_classes mitgegeben werden.
--}}

@extends('blocks.helpers.preview-wrapper', [
    'element_classes' => '',
    'flex_type' => 'grid-cols-3'
])

@section('content-section-before-flex')
    {{-- Inhalt für Struktur (Ansicht) bei Normallfall (oder vor wiederholenden Elementen) --}}

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
    {{-- Inhalt für Struktur (Ansicht) für wiederholenden Elementen (bsp. bei Repeater-Feld oder Query-Loop) --}}

    @if(block_rows('repeater'))
        @while (block_rows('repeater'))
            @php block_row('repeater') @endphp {{-- Next Loop with new Repeater-Element --}}
            <div class="mt-6">
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

@section('content-section-after-flex')
    {{-- Struktur und Darstellung nach wiederholenden Elementen --}}

    <p>Dieser Inhalt wird nacht den wiederholenden Elementen dargestellt.</p>
@overwrite