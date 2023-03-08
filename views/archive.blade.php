@php
    $post_type = get_post_type();
@endphp

@extends('layouts.app')

@section('content')
    @if (! have_posts())
        @include('partials.content.content-none')
    @else
        @includeFirst(['partials.' . $post_type . '.content-archive'. 'partials.content.content-archive-' . $post_type , 'partials.content.content-archive'])
    @endif
@endsection