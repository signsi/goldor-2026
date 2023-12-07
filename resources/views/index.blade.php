@extends('layouts.app')

@section('content')
    @unless(have_posts())
        @include('partials.content.content-none')
    @else
        <div class="wp-block-group is-style-layout-full">
            <div class="wp-block-group scroll-reveal anim__fadeInUp">
            <h1>{{ App\pl__('Archiv - Titel') }}</h1>
            @while(have_posts())
                @php(the_post())
                @include('partials.content.content')
            @endwhile
            <div class="wp-block-group mt-xl">
                @include('partials.components.postnavigation')
            </div>
        </div>
    @endif
@endsection
