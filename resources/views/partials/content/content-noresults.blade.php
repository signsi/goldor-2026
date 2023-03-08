<div class="wp-block-group is-style-layout-full">
    <div class="wp-block-group max-w-slim">
      <h1>{{ App\pl__('Suche ohne Resultate - Titel') }}</h1>
      <p class="mb-element">{{ App\pl_e('Suche ohne Resultate - Meldung') }}</p>

      @include('forms.search')

      <ul class="is-style-liststyle-icon--return mt-element">
        <li class="flex"><a href="{{ App\get_home_url() }}" rel="home">{{ App\pl__('Zurück zur Startseite') }}</a></li>
      </ul>
</div>