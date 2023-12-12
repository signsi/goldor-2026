@php
    $header_image_search = App\getThemeOption('header_image_search');
    $header_image_default = App\getThemeOption('header_image_default');
    $header_src = $header_image_search ? $header_image_search : $header_image_default;
@endphp

@extends('layouts.app')

@section('content')

    @if ($header_src)
        <div class="wp-block-cover is-light" style="min-height:300px">
            <img alt="Header-Bild - Suche 1" class="wp-block-cover__image-background"  src="{{ $header_src }}" data-object-fit="cover">
        </div>
    @else
        <div class="wp-block-cover is-light" style="min-height:300px">
            <img alt="Header-Bild - Suche 2" class="wp-block-cover__image-background"  src="https://placehold.co/1920x1080?text=Platzhalter+Suche" data-object-fit="cover">
        </div>
    @endif

    @if (! have_posts())
        {{-- Zeige Inhalt für den Fall, dass keine Ergebnisse vorhanden sind --}}
        @include('partials.content.content-noresults')
    @else
        {{-- Zeige Inhalt für den Fall, dass Ergebnisse vorhanden sind --}}
        @include('partials.content.content-results')
    @endif
@endsection

