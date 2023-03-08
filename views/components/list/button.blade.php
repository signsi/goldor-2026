<a href={{ $item['href'] }} title={{ $item['title'] }}
    class="inline-flex px-4 py-2 border-2 text-gray-900 border-gray-900 items-center justify-center overflow-hidden  hover:translate-y-[1px] transition-all hover:bg-theme hover:border-theme hover:text-white">
    {{-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path
            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
    </svg> --}}
    <span class="">
        {{ $item['label'] }}
    </span>
</a>
