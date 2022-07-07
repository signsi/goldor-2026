@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="testimonial">
        @while (block_rows('testimonial'))
            @php block_row('testimonial') @endphp
            <div class="cell testimonial-itemwrapper">
                @if ( block_sub_value('testimonial-link') )
                    <a href="{{ block_sub_value('testimonial-link') }}" target="_blank">
                @endif

                    @include('blocks.helpers.background-image',
                    [
                        'name_ImageField' => 'testimonial-logo',
                        'class_object_fill_breakpoint' => 'bg-object-wrapper--smallUp img-wrapper',
                        'class_object_fit' => array('class' => 'bg-object--contain'),
                        'thumbnail' => 'small-width',
                        'isRepeaterElement' => true
                    ])

                @if ( block_sub_value('testimonial-link') )
                    </a>
                @endif

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
            </div>
        @endwhile
        {{ reset_block_rows( 'testimonial' ) }}
    </div>
@overwrite
