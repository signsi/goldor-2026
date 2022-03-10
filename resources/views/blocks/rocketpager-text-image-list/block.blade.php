@php
    $col = block_value( 'row-per-col');
    $row_per_col = App\setColumns();
@endphp


@extends('blocks.helpers.block-wrapper', ['ignoreAnimation' => true])

@section('content-section')
    <div class="grid-x grid-margin-x {{ $row_per_col }}">
        @while (block_rows('post'))
            @php block_row('post') @endphp
            <div class="cell{{ App\getAnimation() }}">
                    @switch( $col )
                        @case(1)
                            @include('blocks.helpers.image',
                            [
                                'name_ImageField' => 'image',
                                'thumbnail' => 'full-width',
                                'isRepeaterElement' => true
                            ])
                            @break
                        @case(2)
                            @include('blocks.helpers.image',
                            [
                                'name_ImageField' => 'image',
                                'thumbnail' => '16-9-thumb',
                                'isRepeaterElement' => true
                            ])
                            @break
                        @case(3)
                            @include('blocks.helpers.image',
                            [
                                'name_ImageField' => 'image',
                                'additionalClasses' => array('class' => 'show-for-medium'),
                                'thumbnail' => 'square-thumb',
                                'isRepeaterElement' => true
                            ])
                            @include('blocks.helpers.image',
                            [
                                'name_ImageField' => 'image',
                                'additionalClasses' => array('class' => 'hide-for-medium'),
                                'thumbnail' => '16-9-thumb',
                                'isRepeaterElement' => true
                            ])
                            @break
                        @default
                            @include('blocks.helpers.image',
                            [
                                'name_ImageField' => 'image',
                                'thumbnail' => '4-3-thumb',
                                'isRepeaterElement' => true
                            ])
                    @endswitch
                @if ( block_sub_value('title') )
                    <div class="title-wrapper">
                        <h3>{{ block_sub_value('title') }}</h3>
                    </div>
                @endif
                @if ( block_sub_value('Text') )
                    <div class="text-wrapper">
                        {!! App\sanitize_out(block_sub_value('Text'), 'text_area') !!}
                    </div>
                @endif
                @if ( block_sub_value('linklist') )
                    <div class="linklist-wrapper">
                        {!! App\sanitize_out(block_sub_value('linklist'), 'text_area') !!}
                    </div>
                @endif
            </div>
        @endwhile
        {{ reset_block_rows( 'post' ) }}
    </div>
@overwrite