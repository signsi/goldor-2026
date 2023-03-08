<article @php(post_class())>
  <header>
    <h3 class="entry-title">
      <a href="{{ get_permalink() }}">
        {{ the_title() }}
      </a>
    </h3>

    <div class="text-sm mb-typography">
      @include('partials.meta.entry-meta')
    </div>
  </header>

  <div class="entry-summary">
    @php(the_excerpt())
  </div>
</article>
