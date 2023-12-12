@php
    $header_image_404 = App\getThemeOption('header_image_404');
    $header_image_default = App\getThemeOption('header_image_default');
    $header_src = $header_image_404 ? $header_image_404 : $header_image_default;
@endphp

@extends('layouts.app')

@section('content')
 
    @if ($header_src)
        <div class="wp-block-cover is-light" style="min-height:300px">
            <img alt="Header-Bild - 404" class="wp-block-cover__image-background"  src="{{ $header_src }}" data-object-fit="cover">
        </div>
    @else
        <div class="wp-block-cover is-light" style="min-height:300px">
            <img alt="Header-Bild - 404" class="wp-block-cover__image-background"  src="https://placehold.co/1920x1080?text=Platzhalter+404" data-object-fit="cover">
        </div>
    @endif

    {{-- Inkludiert den Inhalt für den Fall, dass keine Beiträge gefunden wurden --}}
    @include('partials.content.content-none')
@endsection


