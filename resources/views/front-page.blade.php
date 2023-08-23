@extends('layouts.app')

@section('content')
    @if (! have_posts())
        {{-- Wenn keine Beiträge vorhanden sind, zeige den entsprechenden Inhalt --}}
        @include('partials.content.content-none')
    @else
        @while (have_posts())
            @php(the_post())
            {{-- Versuche, den passenden Inhalt für den aktuellen Beitragstyp einzufügen --}}
            @includeFirst([
                'partials.content.content-front-page', // Anpassen je nach Anforderung
                'partials.content.content-page', // Anpassen je nach Anforderung
                'partials.content.content' // Standard-Inhalt für Beiträge
            ])
        @endwhile
    @endif
@endsection
