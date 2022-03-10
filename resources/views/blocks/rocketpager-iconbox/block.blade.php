@php
    $row_per_col = App\setColumns();
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="grid-x grid-margin-x text-center{{ $row_per_col }}">
        @while (block_rows('icon'))
            @php
                block_row('icon');
                $isImage = block_sub_value('content-type') == 'image';
            @endphp
            <div class="cell">
                @if (block_sub_value('link'))
                    <a href="{{ block_sub_value('link') }}" target="_blank">
                @endif

                    <div class="icon-wrapper {{ App\ifTrueReturnVal($isImage, 'image') }} {{ App\existsReturnKey('rounded-bg') }}">
                        @if ( $isImage )
                            @include('blocks.helpers.image',
                            [
                                'name_ImageField' => 'image',
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
                        <h3>{{ block_sub_value('title') }}</h3>
                    @endif

                @if (block_sub_value('link'))
                    </a>
                @endif
            </div>
        @endwhile
        {{ reset_block_rows( 'icon' ) }}
    </div>
@overwrite