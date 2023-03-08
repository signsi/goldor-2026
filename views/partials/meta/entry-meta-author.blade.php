@php
    $has_icon = $use_icon ?? false;
    $has_link = $author_as_link ?? true;
    $author = get_the_author();
@endphp

<div class="entry-author byline author vcard">
    @if($has_icon)
        <i class="fal fa-user w-[1em] mr-[0.25em]"></i>
    @else
        <span>{{ App\pl__('Autor') }}</span>
    @endif
    @if($has_link)
        <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author">
            {{ $author }}
        </a>
    @else
        {{ $author }}
    @endif
</div>