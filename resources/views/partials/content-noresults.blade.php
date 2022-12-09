<div class="flex flex-grow flex-col max-w-slim px-gutter py-section mx-auto">
  <h1>{{ App\pl__('Suche ohne Resultate - Titel') }}</h1>
    <p class="!mb-gutter mt-0">{!! App\pl_e('Suche ohne Resultate - Meldung')  !!}</p>
    <div class="max-w-xs">
      @include('partials.search')
    </div>
    <ul class="is-style-liststyle-icon--return">
      <li class="flex"><a href="{{ App\get_home_url() }}" rel="home">{{ App\pl__('Zurück zur Startseite') }}</a></li>
    </ul>
</div>