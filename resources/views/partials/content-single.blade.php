<article @php(post_class('page content'))>

    {{-- <div class="entry-content">
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
    </div> --}}
    @php(the_content())

</article>
