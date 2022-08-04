@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'grid-cols-2'])

@section('flex-item-content')
    @while ( block_rows('slide') )
        @php
            block_row('slide');
        @endphp
        <div>
            @include('blocks.helpers.image',
            [
                'name_ImageField' => 'header-image',
                'thumbnail' => 'full',
                'isRepeaterElement' => true
            ])
            @if ( block_sub_value( 'title') )
                <h2>{{ block_sub_value('title') }}</h2>
            @endif
            @if ( block_sub_value( 'subtitle') )
                <h3 class="mb-0">{{ block_sub_value('subtitle') }}</h3>
            @endif
        </div>
    @endwhile
    {{ reset_block_rows( 'slide' ) }}
@overwrite