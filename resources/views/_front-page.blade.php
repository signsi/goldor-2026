@extends('layouts.app')

@section('content')

    <div class="wp-block-group has-grey-background-color has-background is-style-layout-full">
        <div class="wp-block-group">
            @while (have_posts())
                @php(the_post())
                @includeFirst(['partials.content-front-post', 'partials.content'])
            @endwhile
            {!! get_the_posts_navigation() !!}
        </div>
    </div>

@endsection
