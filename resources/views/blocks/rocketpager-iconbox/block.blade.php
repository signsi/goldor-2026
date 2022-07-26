@php
    $row_per_col = App\setColumns();
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="grid gap-gutter text-center{{ $row_per_col }}">
        @while (block_rows('icon'))
            @php
                block_row('icon');
                $isImage = block_sub_value('content-type') == 'image';
            @endphp
            <div class="not-prose">
                @if (block_sub_value('link'))
                    <a class="no-underline hover:no-underline group" href="{{ block_sub_value('link') }}" target="_blank">
                @endif

                    <div class="icon-wrapper block w-[190px] mx-auto mb-gutter {{ App\ifTrueReturnVal($isImage, 'p-10') }} {{ App\existsReturnKey('rounded-bg', 'rounded-full bg-white') }}">
                        @if ( $isImage )
                            @include('blocks.helpers.image',
                            [
                                'name_ImageField' => 'image',
                                'additionalClasses' => array('class' => 'transition-transform duration-300 ease-in-out max-h-[110px] mb-0 w-full h-auto group-hover:scale-110'),
                                'thumbnail' => 'small-width',
                                'isRepeaterElement' => true
                            ])
                        @else
                            @if ( block_sub_value('lottie-animation') )
                                {!! App\sanitize_out(block_sub_value('lottie-animation'), 'shortcode') !!}
                            @endif
                        @endif
                    </div>

                    @if ( block_sub_value('title') )
                        <h3 class="mb-0">{{ block_sub_value('title') }}</h3>
                    @endif

                @if (block_sub_value('link'))
                    </a>
                @endif
            </div>
        @endwhile
        {{ reset_block_rows( 'icon' ) }}
    </div>
@overwrite