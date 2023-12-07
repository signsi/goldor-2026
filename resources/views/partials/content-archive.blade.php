<div class="wp-block-group is-style-layout-full">
    <div class="wp-block-group">
        <h1>{{ App\pl__('Archiv - Titel') }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
            @while(have_posts()) @php(the_post())
                {{-- Lade den Inhalt für den aktuellen Post --}}
                @includeFirst(['partials.content.content-' . get_post_type(), 'partials.content.content'])
            @endwhile
        </div>
    </div>
    <div class="wp-block-group mt-xl">
        {{-- Lade die Post-Navigation --}}
        @include('partials.components.postnavigation')
    </div>
</div>
