@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'three-columns'])

@section('flex-item-content')
    @while ( block_rows('testimonial') )
        @php block_row('testimonial') @endphp
        <div class="col">
            @include('blocks.helpers.image',
            [
                'name_ImageField' => 'testimonial-logo',
                'isRepeaterElement' => true
            ])
            <div class="text-wrapper">
                @if ( block_sub_value('testimonial-companyname') )
                    <p class="testimonial-title"><strong>{{ block_sub_value('testimonial-companyname') }}</strong></p>
                @endif
                @if ( block_sub_value('testimonial-content') )
                    <p>«{{ block_sub_value('testimonial-content') }}»
                        @if ( block_sub_value( 'testimonial-name') )
                            - <i>{{ block_sub_value('testimonial-name') }}</i>
                        @endif
                    </p>
                @endif
                @if ( block_sub_value('testimonial-link') )
                    Link: {{ block_sub_value('testimonial-link') }}
                @endif
            </div>
        </div>
    @endwhile
    {{ reset_block_rows( 'testimonial' ) }}
@overwrite
