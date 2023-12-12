@extends('wrapper.containter-xl')

@section('container')
    <h1>{{ single_cat_title('', false) }}</h1>

    <div class="grid grid-col-1 md:grid-cols-2 lg:grid-cols-3 gap-gutter">
        @while(have_posts()) @php(the_post())
            @includeFirst(['partials.content.content-' . get_post_type(), 'partials.content.content'])
        @endwhile
    </div>
    
	{{-- // hide pagination if there is no postnavigation --}}
	@if (get_next_posts_link() || get_previous_posts_link())
		@include('partials.components.postnavigation')
	@endif

@endsection