<article>
    <div class="max-w-content-medium mx-auto px-gutter py-3xl text-center anim__animated anim__fadeInUp">
        @include('partials.meta.entry-meta-date')
        <h1 class="entry-title mt-0">{!! get_the_title() !!}</h1>
        @include('partials.meta.entry-meta-author')
    </div>
    <div class="w-full anim__animated anim__fadeInUp">
        <div class="relative before:absolute before:inset-x before:bottom-0 before:bg-quaternary before:h-1/2 before:w-full before:top-auto before:content-[''] before:-z-10">
            @if (has_post_thumbnail())
                {{ the_post_thumbnail( 'full', ['class' => 'max-w-content-large mx-auto px-gutter']) }}
            @else
                <img src="https://placehold.co/800x600?text=Platzhalter" alt="Platzhalterbild" class="z-10">
            @endif
        </div>
    </div>

    @php(the_content())
    @include('partials.news.share-on-style-2')
    {{-- @include('partials.news.newest-posts') --}}
    @include('partials.news.newest-posts-image')
</article>
