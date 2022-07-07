<div class="cell{{ $animation }}">
    <a href="{{ the_permalink() }}">
        <div class="image-wrapper">
            {{ the_post_thumbnail( $preview_size ) }}
        </div>
    </a>
    @if ( !$disable_meta )
        <div class="meta-wrapper">
            @if ( !$disable_meta_date )
                <span class="entry-date"><i class="fal fa-calendar-alt"></i> {{ get_the_date() }}</span>
            @endif
            @if ( !$disable_meta_author )
                <span class="entry-author"><i class="fal fa-user"></i> {{ get_the_author() }}</span>
            @endif
        </div>
    @endif
    <div class="title-wrapper">
        @if ( !$disable_meta )
            @if ( !$disable_meta_category )
                <span class="entry-category">
                    @foreach(get_the_category() as $cat)
                        @if ($cat->name != 'Allgemein' && $cat->name != 'General')
                            {{ $cat->name }}
                        @endif
                    @endforeach
                </span>
            @endif
        @endif
        <h3>{{ the_title() }}</h3>
    </div>
    <div class="text-wrapper">{{ the_excerpt() }}</div>

    <div class="linklist-wrapper">
        <ul>
            <li><a href="{{ the_permalink() }}">Weiterlesen</a></li>
        </ul>
    </div>
</div>