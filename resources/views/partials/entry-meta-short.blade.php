<div class="mb-4">
    <a class="" href="#" title="{{ __('Mehr zu', 'rocketpager') }}">
        <span class="!font-sans">
            {{-- {{ App\get_main_category_name()}} --}}
        </span>
    </a>
    <span>&#183;</span>
    <time class="updated font-sans" datetime="{{ get_post_time('c', true) }}">
        {{ get_the_date() }}
    </time>
</div>