{{--
Aufruf:
@include('blocks.helpers.background-image',
    [
        'name_ImageField' => 'image',                                   -> Name des Feldes für das Hintergrundbild
        'class_object_fill_breakpoint' => 'bg-object-wrapper--mediumUp',-> Klasse gibt an, ab welcher Bildschrimgrösse der Hintergrund dargestellt werden soll. (Es können zusätzliche Klassen für den Wrapper angegeben werden).
        'class_object_fit' => array('class' => 'bg-object--cover'),     -> Klasse gibt an, wie das Bild die Fläche ausfüllen soll (contain, cover usw.). (Es können zusätzliche Klassen für das Bild angegeben werden).
        'thumbnail' => 'medium',                                        -> (optional) Grösse des Bildes (Thumbnail)
        'isRepeaterElement' => false                                    -> (optional) Ist Bild in einem Repeater: true => sub_value, false => value (default)
    ])
--}}

@php
    $thumbnail = $thumbnail ?? 'full';
    $isRepeaterElement = $isRepeaterElement ?? false;

    $class_object_fill_breakpoint = $class_object_fill_breakpoint ? $class_object_fill_breakpoint : 'bg-object-wrapper--mediumUp';
    $class_object_fit = array_key_exists('class', $class_object_fit) ? $class_object_fit : array('class' => 'bg-object--cover');
@endphp

<div class="{{ $class_object_fill_breakpoint }}">
    <picture>
        @include('blocks.helpers.image',
        [
            'name_ImageField' => $name_ImageField,
            'additionalClasses' => $class_object_fit,
            'thumbnail' => $thumbnail,
            'isRepeaterElement' => $isRepeaterElement
        ])
    </picture>
</div>