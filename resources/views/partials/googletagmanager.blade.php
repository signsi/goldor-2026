@php
$google_tagmanager_id = App\getThemeOption('google_tagmanager_id');
@endphp
{{-- TODO: XX temporär, falls alte plugin version --}}
@if($google_tagmanager_id != '' && $google_tagmanager_id != 'XX')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{$google_tagmanager_id}}"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '{{$google_tagmanager_id}}');
    </script>
@endif