@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'three-columns'])

@section('flex-item-content')
    @while ( block_rows('carousel-item') )
        @php block_row('carousel-item') @endphp
        <div class="col">
            <div class="image-wrapper">
                @if ( block_sub_value( 'preview-image') )
                    @include('blocks.helpers.image',
                    [
                        'name_ImageField' => 'preview-image',
                        'thumbnail' => '16-9-thumb',
                        'isRepeaterElement' => true
                    ])
                @endif
            </div>
            <div class="text-wrapper">
                @if ( block_sub_value('title') )
                    <p><strong>{{ block_sub_value('title') }}</strong></p>
                @endif
                @if ( block_sub_value('text') )
                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                @endif
                @if ( block_sub_value('link') )
                    <p>Link: {{ block_sub_value('link') }}</p>
                @endif
            </div>
        </div>
    @endwhile
    {{ reset_block_rows( 'carousel-item' ) }}
@overwrite
