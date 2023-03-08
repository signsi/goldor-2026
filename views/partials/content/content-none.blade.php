<div class="wp-block-group is-style-layout-full">
    <div class="wp-block-group max-w-slim">
        <h2>{{ App\pl__('Error 404 - 404') }}</h2>
        <h1>{{ App\pl__('Error 404 - Titel') }}</h1>
        <p class="mb-element">{{ App\pl_e('Error 404 - Info') }}</p>

        @include('forms.search')

        <ul class="is-style-liststyle-icon--return mt-element">
            <li class="flex"><a href="{{ App\get_home_url() }}" rel="home">{{ App\pl__('Zurück zur Startseite') }}</a></li>
        </ul>
    </div>
</div>