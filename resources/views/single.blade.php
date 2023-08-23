@php
    // Ermittle den Post-Typ
    $post_type = get_post_type();
@endphp

@extends('layouts.app')

@section('content')
    @while(have_posts()) @php(the_post())
        {{-- Lade den Inhalt für den spezifischen Post-Typ, beginnend mit dem spezifischen Template --}}
        @includeFirst([
            'partials.' . $post_type . '.content-single',
            'partials.content.content-single-' . $post_type,
            'partials.content.content-single'
        ])
    @endwhile
@endsection
