@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'grid-cols-1'])

@section('flex-item-content')
    <div class="transition-all hidden sm:block h-36 w-36 xl:h-44 xl:w-44 block aspect-square overflow-hidden p-5 xl:p-6 2xl:p-7 bg-white rounded-full drop-shadow-md hover:drop-shadow-xl hover:scale-105 hover:rotate-12">
        <div class="flex flex-col justify-center items-center h-full">
            @if ( block_value('image') )
                @include('blocks.helpers.image',
                [
                    'name_ImageField' => 'image',
                    'additionalClasses' => array('class' => 'w-auto !h-[50px] mx-auto mb-2.5'),
                    'thumbnail' => 'small-width',
                    'isRepeaterElement' => false
                ])
            @endif
            @if ( block_value('text') )
                <span class="text-primary font-bold text-sm xl:text-base text-center leading-tight">
                    {!! App\sanitize_out(block_value('text'), 'text_area') !!}
                </span>
            @endif
        </div>
    </div>
@overwrite
