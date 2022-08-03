@php
    $hidden = block_value('hide-element');
@endphp

@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'grid-cols-3'])

@section('flex-item-content')
        @while (block_rows('team-member'))
        @php block_row('team-member') @endphp
            <div class="col">
                @if(block_sub_value('hide-element') && !$hidden)
                    <div class="hidden_Element">
                        <h2>Element wird Live nicht angezeigt.</h2>
                    </div>
                @endif
                @include('blocks.helpers.image',
                [
                    'name_ImageField' => 'portrait-image',
                    'thumbnail' => '16-9-thumb',
                    'isRepeaterElement' => true
                ])
                <div class="text-wrapper">
                    <p>
                        @if ( block_sub_value('name') )
                            <strong>{{ block_sub_value('name') }}</strong><br>
                        @endif
                        @if ( block_sub_value('funktion') )
                            {{ block_sub_value('funktion') }}<br>
                        @endif
                        @if ( block_sub_value('email') )
                            {{ block_sub_value('email') }}
                        @endif
                    </p>
                    @if ( block_sub_value('text') )
                        {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                    @endif
                </div>
            </div>
        @endwhile
        {{ reset_block_rows( 'team-member' ) }}
    </div>
@overwrite
