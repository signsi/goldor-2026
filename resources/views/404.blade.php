@extends('layouts.app-width-content')

@section('content')
  @if (! have_posts())
    <div class="flex flex-grow flex-col max-w-slim px-gutter py-section mx-auto">
      <div class="max-w-fit">
        <h3 class="text-primary mt-0">{{ __('404', 'rocketpager') }}</h3>
        <h1>{{ __('Seite nicht gefunden', 'rocketpager') }}</h1>
        <p class="!mb-gutter">{{ __('Leider konnten wir die von Ihnen gesuchte Seite nicht finden.', 'rocketpager') }}</p>
        @include('partials.search')
        <ul class="is-style-liststyle-icon--return">
          <li class="flex"><a href="{{ home_url('/') }}" rel="home">{{ __('Zurück zur Startseite', 'rocketpager') }}</a></li>
        </ul>
      </div>
    </div>
  @endif
@endsection
