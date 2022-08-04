@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'grid-cols-3'])

@section('flex-item-content')
    @while ( block_rows('slide') )
        @php block_row('slide') @endphp
        <div class="image-wrapper">
            @include('blocks.helpers.image',
            [
                'name_ImageField' => 'image',
                'thumbnail' => '16-9-thumb',
                'isRepeaterElement' => true
            ])
        </div>
    @endwhile
    {{ reset_block_rows('slide') }}
@overwrite
