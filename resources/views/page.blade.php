@extends('layouts.app')

@section('content')
    @if (! have_posts())
        @include('partials.content.content-none')
    @else
        @while (have_posts())
            @php(the_post())
            @includeFirst(['partials.content.content-page', 'partials.content.content'])
        @endwhile
    @endif
@endsection
