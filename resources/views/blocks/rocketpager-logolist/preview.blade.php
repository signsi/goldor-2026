@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'four-columns'])

<{{ block_field('heading') }}>{{ block_field('title') }}</{{ block_field('heading') }}>
@section('flex-item-content')
    @while (block_rows('logo'))
        @php block_row('logo') @endphp
        <div class="col">
            <div class="image-wrapper">
                @include('blocks.helpers.image',
                [
                    'name_ImageField' => 'image',
                    'isRepeaterElement' => true
                ])
            </div>
        </div>
    @endwhile
    {{ reset_block_rows('logo') }}
@overwrite