@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'grid-cols-1'])

@section('flex-item-content')
    <div class="content-slider">
        @while ( block_rows('slide') )
            @php block_row('slide') @endphp
            <div class="content-element mb-gutter" >
                <div class="mr-4 rounded-4xl overflow-hidden ">
                    <div class="@if(block_sub_value('title') || block_sub_value('text')) shadow-lg @endif">
                        <div class="image-wrapper">
                            @include('blocks.helpers.image',
                            [
                                'name_ImageField' => 'image',
                                'additionalClasses' => array('class' => 'nolazyload w-full'),
                                'thumbnail' => $ar_class,
                                'isRepeaterElement' => true,
                                'identifierLightbox' => $idLightbox
                            ])
                        </div>
                        <div class="relative group text-wrapper pt-6 px-6 pb-12 transition-all {{ block_sub_value('bg-color') }} hover:bg-none hover:bg-primary-gradient">
                            @if ( block_sub_value( 'title') )
                                <p class="font-bold mt-0 text-lg mb-3 text-white">{{ block_sub_value('title') }}</p>
                            @endif
                            @if ( block_sub_value('text') )
                                <div class="mb-gutter [&_p]:mt-0 [&_p]:text-white [&_p]:text-sm">
                                    {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endwhile
        {{ reset_block_rows('slide') }}
    </div>
@overwrite
