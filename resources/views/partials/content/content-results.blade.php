@php
  $function = function_exists( 'relevanssi_get_permalink' ) ? 'relevanssi_get_permalink' : 'get_permalink';
@endphp

<div class="wp-block-group is-style-layout-full">
    <div class="wp-block-group scroll-reveal anim__fadeInUp is-style-layout-slim">
      <h1>{{ App\pl__('Suche mit Resultate - Titel') }}</h1>
      <p class="mt-0">{{ App\pl__('Suche mit Resultate - Meldung Resultate') }} <strong>{{ get_search_query() }}</strong></p>
      <p class="mt-0 !mb-xl">{{ App\pl_e('Suche mit Resultate - Meldung') }}</p>
      @while(have_posts()) @php(the_post())
        <article @php(post_class('py-medium border-t border-solid border-greylight'))>
          <header>
            <p class="my-0">
              <a href="{{ call_user_func( $function ) }}" class="text-primary font-bold">{!! get_the_title() !!}</a>
            </p>
            <div class="text-sm mb-2 [&_*]:text-xs [&_*]:text-greydark">
              @include('partials.meta.entry-meta-date')
            </div>
          </header>
          <div class="p:mb-0 [&_p]:text-sm [&_p]:flex [&_p]:flex-col">
            @php(the_excerpt())
          </div>
        </article>
      @endwhile
      <div class="posts_navigation pt-medium border-t border-solid border-greylight">
        @include('partials.components.postnavigation')
      </div>
  </div>
</div>

<div class="wp-block-group is-style-layout-full has-greylight-background-color has-background">
    <div class="wp-block-group scroll-reveal anim__fadeInUp is-style-layout-slim">
      <p>{{ App\pl_e('Suche mit Resultate - Meldung weitere Suche') }}</p>
      @include('forms.search')
    </div>
</div>