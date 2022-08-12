<div class="flex flex-col group bg-white{{ $animation }}">
    <a href="{{ the_permalink() }}">
        <div class="image-wrapper not-prose overflow-hidden">
            {{ the_post_thumbnail( $preview_size, ['class' => 'transition-transform duration-300 ease-in-out group-hover:scale-110']) }}
        </div>
    </a>
    @if ( !$disable_meta )
        <div class="meta-wrapper flex flex-wrap py-3 px-gutter bg-gradient-to-l from-slate-100 prose-base text-font">
            @if ( !$disable_meta_date )
                <span class="entry-date block mr-5"><i class="fal fa-calendar-alt w-5"></i> {{ get_the_date() }}</span>
            @endif
            @if ( !$disable_meta_author )
                <span class="entry-author block"><i class="fal fa-user w-5"></i> {{ get_the_author() }}</span>
            @endif
        </div>
    @endif
    <div class="title-wrapper pt-gutter px-gutter not-prose text-font">
        @if ( !$disable_meta )
            @if ( !$disable_meta_category )
                <span class="entry-category prose-base">
                    @foreach(get_the_category() as $cat)
                        @if ($cat->name != 'Allgemein' && $cat->name != 'General')
                            {{ $cat->name }}
                        @endif
                    @endforeach
                </span>
            @endif
        @endif
        <h3 class="text-2xl pt-gutter font-bold">{{ the_title() }}</h3>
    </div>
    <div class="text-wrapper px-gutter text-font">{{ the_excerpt() }}</div>

    <div class="linklist-wrapper px-gutter pb-gutter mt-auto mb-0 prose-sm">
        <ul class="list-none">
            <li class="relative m-0 pl-0"><a class="no-underline duration-300 before:absolute before:font-icon before:content-arrow-right-long before:font-light before:-left-4 hover:text-font" href="{{ the_permalink() }}">Weiterlesen</a></li>
        </ul>
    </div>
</div>