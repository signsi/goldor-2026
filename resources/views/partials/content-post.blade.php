<article @php(post_class())>
    <header>
        @include('partials.entry-meta')
        <h2 class="entry-title text-6xl !font-sans font-bold">
            <a class="font-sans" href="{{ get_permalink() }}">
                {!! $title !!}
            </a>
        </h2>
    </header>

    <div class="entry-summary">
        @php(the_excerpt())
    </div>
</article>
