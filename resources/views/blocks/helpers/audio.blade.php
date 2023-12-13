{{-- Aufruf:
@include('blocks.helpers.audio',
    [
        'name_AudioField' => 'audio',        -> Name des Feldes für das Audio
        'isRepeaterElement' => false         -> (optional) Ist Audio in einem Repeater: true => sub_value, false => value (default)
    ]) --}}



@php
    $isRepeaterElement = $isRepeaterElement ?? false;

    $src = $isRepeaterElement ? block_sub_value($name_AudioField) : block_value($name_AudioField);
@endphp

@if ($src)
    <div class="mt-auto mb-0 px-gutter pb-gutter">
        <audio class="h-8 w-full sepia-0 saturate-75 grayscale contrast-99 invert-0" controls="" src="{{ $src }}"></audio>
    </div>
@endif
