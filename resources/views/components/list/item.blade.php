<li>
    <a 
    href="{{ get_term_link($category) }}" 
    title="{{ __('Mehr zu', 'rocketpager') }} {{ $category->name }}"
    class="underline !font-sans text-xl"
    >
        {{ $category->name }}
    </a>
</li>
