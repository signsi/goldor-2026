@extends('layouts.app')

@section('content')
    @if (! have_posts())
        @include('partials.content.content-none')
    @else
        <div class="wp-block-group is-style-layout-full">
            <div class="wp-block-group">
                <h1>{{ App\pl__('Archiv - Titel') }}</h1>
                @while(have_posts()) @php(the_post())
                    @include('partials.content.content')
                @endwhile
                <div class="wp-block-group mt-element">
                    @include('partials.components.postnavigation')
                </div>
            </div>
        </div>
    @endif
@endsection
