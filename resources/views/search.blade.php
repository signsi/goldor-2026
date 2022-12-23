@extends('layouts.app')

@section('content')
  @if (! have_posts())
    @include('partials.content.content-noresults')
  @else
    @include('partials.content.content-results')
  @endif
@endsection