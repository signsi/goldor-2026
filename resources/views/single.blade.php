@php
  $post_type = get_post_type();
@endphp

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.' . $post_type . '.content-single', 'partials.content.content-single-' . $post_type, 'partials.content.content-single'])
  @endwhile
@endsection
