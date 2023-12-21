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
    {{ $author }}
</div>