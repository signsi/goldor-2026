@php
  $function = function_exists( 'relevanssi_get_permalink' ) ? 'relevanssi_get_permalink' : 'get_permalink';
@endphp

<div class="flex flex-grow flex-col max-w-slim px-gutter pt-section pb-element mx-auto">
  <h1>{{ App\pl__('Suche mit Resultate - Titel') }}</h1>
  <p class="mt-0">{{ App\pl__('Suche mit Resultate - Meldung Resultate') }} <strong>{{ get_search_query() }}</strong></p>
  <p class="mt-0 !mb-element">{!! App\pl_e('Suche mit Resultate - Meldung') !!}</p>
  @while(have_posts()) @php(the_post())
    <article @php(post_class('py-gutter border-t border-solid border-gray-300'))>
      <header>
        <p class="my-0">
          <a href="{{ call_user_func( $function ) }}">{!! get_the_title() !!}</a>
        </p>
        <time class="updated text-sm mb-2 block" datetime="{{ get_post_time('c', true) }}">
          {{ get_the_date() }}
        </time>
      </header>
      <div class="p:mb-0">
        @php(the_excerpt())
      </div>
    </article>
  @endwhile
  <div class="posts_navigation pt-gutter border-t border-solid border-gray-300">
    @include('partials.components.postnavigation')
  </div>
</div>

<div class="flex flex-grow flex-col max-w-slim px-gutter pb-section pt-element mx-auto">
    <p>{!! App\pl_e('Suche mit Resultate - Meldung weitere Suche') !!}</p>
    <div class="max-w-xs">
      @include('forms.search')
    </div>
</div>