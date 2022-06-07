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
    <div class="audio-wrapper">
        <audio controls="" src="{{ $src }}"></audio>
    </div>
@endif
