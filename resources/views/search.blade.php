@extends('layouts.app')

@section('content')
    @if (is_active_sidebar('sidebar-header-search'))
        @php dynamic_sidebar('sidebar-header-search') @endphp
    @endif
    @if (! have_posts())
        {{-- Zeige Inhalt für den Fall, dass keine Ergebnisse vorhanden sind --}}
        @include('partials.content.content-noresults')
    @else
        {{-- Zeige Inhalt für den Fall, dass Ergebnisse vorhanden sind --}}
        @include('partials.content.content-results')
    @endif
@endsection

