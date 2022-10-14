<div class="flex flex-grow flex-col max-w-slim px-gutter py-section mx-auto">
  <h1>{{ __('Leider nichts gefunden', 'rocketpager') }}</h1>
  <p class="!mb-gutter mt-0">{{ __('Der von Ihnen gewählte Suchbegriff wurde auf keiner Seite gefunden.', 'rocketpager') }}<br>{{ __('Überprüfen Sie die Rechtschreibung oder versuchen Sie es erneut.', 'rocketpager') }}</p>
    <div class="max-w-xs">
      @include('partials.search')
    </div>
    <ul class="is-style-liststyle-icon--return">
      <li class="flex"><a href="{{ home_url('/') }}" rel="home">{{ __('Zurück zur Startseite', 'rocketpager') }}</a></li>
    </ul>
</div>