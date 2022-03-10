@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'two-columns'])

@section('flex-item-content')
        @if ( block_value( 'image'))
            <div class="col">
                <div class="bg-image" style="background-image: url('{{ block_field('image') }}');">
                </div>
            </div>
        @endif
        
        <div class="col bg-primary">
            <div class="text-wrapper">
                Siehe Zitat im Textfeld...
            </div>
            @include('blocks.helpers.audio', 
            [
                'name_AudioField' => 'audio'
            ]) 
        </div>
@overwrite
