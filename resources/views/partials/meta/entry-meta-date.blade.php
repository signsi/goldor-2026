@php
    $has_icon = $use_icon ?? false;
@endphp

<time class="entry-date updated" datetime="{{ get_post_time('c', true) }}">
    @if($has_icon)
        <i class="fal fa-calendar-alt w-[1em] mr-[0.25em]"></i>
    @endif
    {{ get_the_date() }}
</time>