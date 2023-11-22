@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'grid-cols-2'])

@section('flex-item-content')
    <div class="">
        {!! App\sanitize_out(block_value('element'), 'allow_iframe') !!}
    </div>
@overwrite
