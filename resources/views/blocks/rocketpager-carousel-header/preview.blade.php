@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'three-columns'])

@section('flex-item-content')
    @while ( block_rows('slide') )
        @php block_row('slide') @endphp
        <div class="col">
            <div class="image-wrapper">
                @include('blocks.helpers.image',
                [
                    'name_ImageField' => 'header-image',
                    'thumbnail' => 'square-thumb',
                    'isRepeaterElement' => true
                ])
            </div>
            <div class="text-wrapper">
                @if ( block_sub_value( 'title') )
                    <h3>{{ block_sub_value('title') }}</h3>
                @endif
                @if ( block_sub_value( 'text') )
                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                @endif
                @if ( block_sub_value( 'button-link') )
                    <div class="wp-block-buttons">
                        <div class="wp-block-button"><a class="wp-block-button__link" href="{{ block_sub_value('button-link') }}">{{( block_sub_value( 'button-text')) ? block_sub_value('button-text') : "Erfahren Sie mehr" }}</a></div>
                    </div>
                @endif
            </div>
        </div>
    @endwhile
    {{ reset_block_rows( 'slide' ) }}
@overwrite