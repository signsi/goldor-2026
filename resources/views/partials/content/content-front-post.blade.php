<article @php(post_class('relative'))>
    <header>
        @include('partials.entry-meta-short')
        {{-- hyphens-auto --}}
        <a class="" href="{{ get_permalink() }}">
            <h2 class="entry-title text-6xl !font-sans font-bold text-gray-800 transition-colors ease-in-out hover:text-theme">
                {!! $title !!}
            </h2>
        </a>
    </header>
    {{-- <div class="entry-summary">
        @php(the_excerpt())
    </div> --}}
</article>
