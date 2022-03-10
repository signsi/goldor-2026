@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'four-columns'])

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
            <div class="text-wrapper">
                @if ( block_sub_value('link') )
                    Link: {{ block_sub_value('link') }}
                @endif
            </div>
        </div>
    @endwhile
    {{ reset_block_rows('logo') }}
@overwrite
