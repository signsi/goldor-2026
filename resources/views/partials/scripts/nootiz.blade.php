@php
$nootiz_id = App\getThemeOption('nootiz_id');
@endphp
@if($nootiz_id != '')
    <script defer src="https://load.nootiz.com/{{$nootiz_id}}"></script>
@endif