@php
  $function = function_exists( 'relevanssi_get_permalink' ) ? 'relevanssi_get_permalink' : 'get_permalink';
@endphp

<div class="flex flex-grow flex-col max-w-content px-gutter py-section mx-auto">
  <h1>{{ __('Ihre Suchresultate', 'rocketpager') }}</h1>
  <p class="!mb-element mt-0">{{ __('Ihre Suche nach:', 'rocketpager') }} <strong>{!! $title !!}</strong></p>
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
      <div class="prose-p:mb-0">
        @php(the_excerpt())
      </div>
    </article>
  @endwhile
  <div class="posts_navigation pt-gutter mt-element border-t border-solid border-gray-300">
    {!! get_the_posts_navigation() !!}
  </div>

</div>

