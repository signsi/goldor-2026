@extends('layouts.app')

@section('content')
    {{-- Ermittelt den aktuellen Beitragstyp --}}
    @php
        $post_type = get_post_type();
    @endphp

    @if (is_active_sidebar('sidebar-header-archive'))
        @php dynamic_sidebar('sidebar-header-archive') @endphp
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
