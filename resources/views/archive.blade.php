@extends('layouts.app')

@section('content')
    @if (! have_posts())
        @include('partials.content.content-none')
    @else
        <div class="wp-block-group is-style-layout-full">
            <div class="wp-block-group">
            <h1>{{ App\pl__('Archiv - Titel') }}</h1>
                <div class="columns-1 md:columns-2 lg:columns-3 md:gap-4 lg:gap-6">
                    @while(have_posts()) @php(the_post())
                        @includeFirst(['partials.' . get_post_type() . '.content-archiv', 'partials.content.content-' . get_post_type(), 'partials.content.content'])
                    @endwhile
                </div>
            </div>
            <div class="wp-block-group mt-section">
                @include('partials.components.postnavigation')
            </div>
        </div>
    @endif
@endsection