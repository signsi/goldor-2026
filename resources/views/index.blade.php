@extends('layouts.app')

@section('content')
    @unless(have_posts())
        @include('partials.content.content-none')
    @else
        
        <x-container w="default">

            <h1>{{ App\pl__('Archiv - Titel') }}</h1>
            @while(have_posts())
                @php(the_post())
                @include('partials.content.content')
            @endwhile
            
            {{-- // hide pagination if there is no postnavigation --}}
            @if (get_next_posts_link() || get_previous_posts_link())
                @include('partials.components.postnavigation')
            @endif

        </x-container>
    @endif
@endsection
