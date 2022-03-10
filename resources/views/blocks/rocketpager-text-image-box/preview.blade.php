@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'two-columns'])

@section('flex-item-content')
        @if ( block_value('text') )

            <div class="col">
                <div class="bg-image" style="background-image: url('{{ block_field('image') }}');">
                </div>
            </div>

            <div class="col {{ block_value('bgcolor-textbox') }}">
                <div class="text-wrapper">
                    @if ( block_value('title') )
                        <h3>{{ block_value('title') }}</h3>
                    @endif
                    {!! App\sanitize_out(block_value('text'), 'text_area') !!}
                </div>
                @if ( block_value('linklist') )
                    <div class="linklist-wrapper">
                        {!! App\sanitize_out(block_value('linklist'), 'text_area') !!}
                    </div>
                @endif
            </div>
        @endif
@overwrite
