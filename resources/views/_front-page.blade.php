@extends('layouts.app-width-content')

@section('content')
    {{-- @include('partials.page-header-big') --}}
    <div class="max-w-content w-full mx-auto px-4 md:px-6">
        @php
        @endphp
        @if (!have_posts())
            <x-alert type="warning">
                {!! __('Sorry, no results were found.', 'sage') !!}
            </x-alert>

            {!! get_search_form(false) !!}
        @endif
        <div class="flex !flex-row gap-16 my-16 max-w-6xl">
            <div>
                <h2 class="font-bold">
                    Heisse Trends &amp; frische News
                </h2>
                <div>
                    <ul class="flex !flex-col gap-2 list-none !ml-0 my-8">
                        @each('components/list/item', get_categories(), 'category')
                    </ul>
                </div>
            </div>
            <div class="flex !flex-col gap-16">
                @while (have_posts())
                    @php(the_post())
                    @includeFirst(['partials.content-front-post', 'partials.content'])
                @endwhile
            </div>

            {!! get_the_posts_navigation() !!}
        @endsection

        @section('sidebar')
            @include('sections.sidebar')

        </div>
    @endsection
