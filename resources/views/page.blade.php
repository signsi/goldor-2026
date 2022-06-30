@extends('layouts.app-width-content')

@section('content')
    @while (have_posts())
        @php(the_post())
        {{ App\breadcrumbs() }}
        {{-- @include('partials.page-header') --}}
        @includeFirst(['partials.content-page', 'partials.content'])
    @endwhile

@endsection
