@php
    $flex_type = block_value('row-per-col');
@endphp

@extends('blocks.helpers.preview-wrapper', ['flex_type' => $flex_type])

@section('flex-item-content')
        @while (block_rows('projekt'))
            @php block_row('projekt') @endphp
            <div class="col">
                <div class="image-wrapper">
                    @include('blocks.helpers.image',
                    [
                        'name_ImageField' => 'project-image',
                        'thumbnail' => '4-3-thumb',
                        'isRepeaterElement' => true
                    ])
                </div>
                <div class="text-wrapper">
                    @if ( block_sub_value('project-type') )
                        {{ block_sub_value('project-type') }}
                    @endif
                    @if ( block_sub_value('project-name') )
                        <h3>{{ block_sub_value('project-name') }}</h3>
                    @endif
                    @if ( block_sub_value('project-intro') )
                        {{ block_sub_value('project-intro') }}
                    @endif
                </div>
            </div>
        @endwhile
        {{ reset_block_rows( 'projekt' ) }}
    </div>
@overwrite
