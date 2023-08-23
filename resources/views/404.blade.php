@extends('layouts.app')

@section('content')
    {{-- Inkludiert den Inhalt für den Fall, dass keine Beiträge gefunden wurden --}}
    @include('partials.content.content-none')
@endsection
