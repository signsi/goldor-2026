<div class="flex flex-col group bg-white{{ $animation }}">
    <a href="{{ the_permalink() }}">
        <div class="image-wrapper overflow-hidden">
            {{ the_post_thumbnail( $preview_size, ['class' => 'transition-transform duration-300 ease-in-out group-hover:scale-110']) }}
        </div>
    </a>
    @if ( !$disable_meta )
        <div class="meta-wrapper flex flex-wrap py-3 px-medium bg-gradient-to-l from-slate-100 text-font">
            @if ( !$disable_meta_date )
                @include('partials.meta.entry-meta-date', ['use_icon' => true])
            @endif
            @if ( !$disable_meta_author )
                @include('partials.meta.entry-meta-author', ['use_icon' => true, 'author_as_link' => false])
            @endif
        </div>
    @endif
    <div class="title-wrapper pt-medium px-gutter text-font">
        @if ( !$disable_meta )
            @if ( !$disable_meta_category )
                <span class="entry-category block pb-4">
                    @foreach(get_the_category() as $cat)
                        @if ($cat->name != 'Allgemein' && $cat->name != 'General')
                            {{ $cat->name }}
                        @endif
                    @endforeach
                </span>
            @endif
        @endif
        <h3 class="text-2xl mt-0 font-bold">{{ the_title() }}</h3>
    </div>
    <div class="text-wrapper px-medium text-font">{{ the_excerpt() }}</div>

    <div class="linklist-wrapper px-gutter pb-medium mt-auto mb-0">
        <ul class="list-none">
            <li class="relative m-0 pl-0"><a class="no-underline transition-colors duration-300 before:absolute before:font-icon before:content-arrow-right-long before:font-light before:-left-6 hover:text-font" href="{{ the_permalink() }}">{{ App\pl__('Weiterlesen') }}</a></li>
        </ul>
    </div>
</div>