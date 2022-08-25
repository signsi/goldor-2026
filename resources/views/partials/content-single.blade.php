<article @php(post_class(''))>

    <div class="entry-content">
        <div class="max-w-default px-gutter pb-element mx-auto">
            <div class="grid grid-cols-2 gap-12">
                <div class="flex flex-col not-prose">
                    @php(the_post_thumbnail())
                </div>
                <div class="flex flex-col py-12">
                    <h1 class="entry-title">
                        {!! $title !!}
                    </h1>
                    @php(the_content())
                </div>
            </div>
        </div>
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
