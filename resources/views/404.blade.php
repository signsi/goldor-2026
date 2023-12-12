@extends('layouts.app')

@section('content')
    @if (is_active_sidebar('sidebar-header-404'))
        @php dynamic_sidebar('sidebar-header-404') @endphp
    @endif
    {{-- Inkludiert den Inhalt für den Fall, dass keine Beiträge gefunden wurden --}}
    @include('partials.content.content-none')
@endsection
