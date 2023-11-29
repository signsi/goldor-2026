<div class="wp-block-group is-style-layout-full">
    <div class="wp-block-group scroll-reveal anim__fadeInUp is-style-layout-slim">
        <h2>{{ App\pl__('Suche') }}</h2>
        <h1>{{ App\pl__('Suche ohne Resultate - Titel') }}</h1>
        <p class="mb-xl">{{ App\pl_e('Suche ohne Resultate - Meldung') }}</p>
        @include('forms.search')
        @include('components.backtophome')
  </div>
</div>