@extends('layouts.app')

@section('content')
    @if (! have_posts())
        {{-- Zeige Inhalt für den Fall, dass keine Ergebnisse vorhanden sind --}}
        @include('partials.content.content-noresults')
    @else
        {{-- Zeige Inhalt für den Fall, dass Ergebnisse vorhanden sind --}}
        @include('partials.content.content-results')
    @endif
@endsection
