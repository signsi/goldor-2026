@php
    $header_image_archive = App\getThemeOption('header_image_archive');
    $header_image_default = App\getThemeOption('header_image_default');
    $header_src = $header_image_archive ? $header_image_archive : $header_image_default;
@endphp

@extends('layouts.app')

@section('content')
    {{-- Ermittelt den aktuellen Beitragstyp --}}
    @php
        $post_type = get_post_type();
    @endphp

    @if ($header_src)
        <div class="wp-block-cover is-light" style="min-height:300px">
            <img alt="Header-Bild - Archiv" class="wp-block-cover__image-background"  src="{{ $header_src }}" data-object-fit="cover">
        </div>
    @else
        <div class="wp-block-cover is-light" style="min-height:300px">
            <img alt="Header-Bild - Archiv" class="wp-block-cover__image-background"  src="https://placehold.co/1920x1080?text=Platzhalter+Archiv" data-object-fit="cover">
        </div>
    @endif

    {{-- Überprüft, ob Beiträge vorhanden sind --}}
    @if (! have_posts())
        @include('partials.content.content-none')
    @else
        {{-- Versucht, den passenden Inhalt einzufügen --}}
        @includeFirst([
            'partials.' . $post_type . '.content-archive', // z.B. 'partials.post.content-archive' für den Beitragstyp 'post'
            'partials.content.content-archive' // Standard-Inhalt für Archivansicht
        ])
    @endif
@endsection
