@extends('layouts.app')

@section('content')
    @if (!have_posts())
        @include('partials.content.content-none');
    @endif

    @while (have_posts())
        @php(the_post())
        @includeFirst(['partials.content.content-' . get_post_type(), 'partials.content.content'])
    @endwhile

    {!! get_the_posts_navigation() !!}
@endsection

@section('sidebar')
    @php(dynamic_sidebar('sidebar-primary'))
@endsection
