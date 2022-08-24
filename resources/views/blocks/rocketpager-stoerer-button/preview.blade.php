@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'grid-cols-1'])

@section('flex-item-content')
    <div class="transition-all block aspect-square overflow-hidden max-w-fit p-5 lg:p-6 xl:p-7 bg-white rounded-full drop-shadow-md hover:drop-shadow-xl hover:scale-105 hover:rotate-12">
        <div class="flex flex-col justify-center items-center h-full">
            @if ( block_value('image') )
                @include('blocks.helpers.image',
                [
                    'name_ImageField' => 'image',
                    'additionalClasses' => array('class' => 'w-auto h-[50px] mx-auto'),
                    'thumbnail' => 'small-width',
                    'isRepeaterElement' => false
                ])
            @endif
            @if ( block_value('text') )
                <span class="text-primary text-sm xl:text-base text-center leading-tight">
                    {!! App\sanitize_out(block_value('text'), 'text_area') !!}
                </span>                    
            @endif
        </div>
    </div>
@overwrite
