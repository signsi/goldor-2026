@extends('layouts.app')

@section('content')
    {{-- Ermittelt den aktuellen Beitragstyp --}}
    @php
        $post_type = get_post_type();
    @endphp
    
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
