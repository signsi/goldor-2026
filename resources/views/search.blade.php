@extends('layouts.app')

@section('content')
  @if (! have_posts())
    @include('partials.content-noresults')
    @else
      @include('partials.content-search')
  @endif
@endsection