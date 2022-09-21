@extends('layouts.app-width-content')

@section('content')
  @if (! have_posts())
    @include('partials.content-noresults')
    @else
      <div class="wp-block-group alignfull">
        <div class="wp-block-group alignwide">
        <h1>{{ __('Archiv', 'rocketpager') }}</h1>
          <div class="columns-1 md:columns-2 lg:columns-3 md:gap-4 lg:gap-6">
              @while(have_posts()) @php(the_post())
                @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
              @endwhile
          </div>
        </div>
      </div>
  @endif
@endsection