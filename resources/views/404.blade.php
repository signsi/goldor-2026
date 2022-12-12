@extends('layouts.app')

@section('content')
  @if (! have_posts())
    <div class="flex flex-grow flex-col max-w-slim px-gutter py-section mx-auto">
      <div class="max-w-fit">
        <h3 class="text-primary mt-0">{{ App\pl__('Error 404 - 404') }}</h3>
        <h1>{{ App\pl__('Error 404 - Titel') }}</h1>
        <p class="!mb-gutter">{!! App\pl_e('Error 404 - Info') !!}</p>
        @include('partials.search')
        <ul class="is-style-liststyle-icon--return">
          <li class="flex"><a href="{{ App\get_home_url() }}" rel="home">{{ App\pl__('Zurück zur Startseite') }}</a></li>
        </ul>
      </div>
    </div>
  @endif
@endsection