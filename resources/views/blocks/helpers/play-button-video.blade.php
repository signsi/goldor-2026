@php
    $useNoLink = $useNoLink ?? false;
    $background_url = $background_url ?? false;

    $tag = $useNoLink ? 'div' : 'a';
@endphp


<div class="control-container" @if( $background_url ) style="background-image: url('{{ $background_url }}') @endif">
    <{{ $tag }} class="play"><i class="fa-thin fa-circle-play"></i></{{ $tag }}>
</div>