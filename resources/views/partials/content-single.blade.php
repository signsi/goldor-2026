<article @php(post_class(''))>
    <header class='max-w-content w-full mx-auto prose px-4 md:px-6'>
        <h1 class="entry-title">
            {!! $title !!}
        </h1>

        @include('partials.entry-meta')
    </header>

    <div class="entry-content">
        @php(the_content())
    </div>

    <footer>
        {!! wp_link_pages([
            'echo' => 0,
            'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'),
            'after' => '</p></nav>',
        ]) !!}
    </footer>

    {{-- @php(comments_template()) --}}
</article>
