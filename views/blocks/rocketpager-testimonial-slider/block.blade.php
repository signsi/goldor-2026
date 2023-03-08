@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <div class="testimonial my-element-tablet md:my-element-desktop">
        @while (block_rows('testimonial'))
            @php block_row('testimonial') @endphp
            <div class="testimonial-itemwrapper !block relative w-full md:w-[80%] max-w-slimmer mx-auto mb-0 text-center">
                @if ( block_sub_value('testimonial-link') )
                    <a href="{{ block_sub_value('testimonial-link') }}" target="_blank">
                @endif

                    @include('blocks.helpers.background-image',
                    [
                        'name_ImageField' => 'testimonial-logo',
                        'class_object_fill_breakpoint' => 'bg-object-wrapper img-wrapper max-w-[170px] h-[170px] mx-auto mb-5 overflow-hidden rounded-full p-4 bg-white',
                        'class_object_fit' => array('class' => 'object-contain p-6'),
                        'thumbnail' => 'small-width',
                        'isRepeaterElement' => true
                    ])

                @if ( block_sub_value('testimonial-link') )
                    </a>
                @endif

                @if ( block_sub_value('testimonial-companyname') )
                    <p class="testimonial-title mb-3 mx-auto"><strong>{{ block_sub_value('testimonial-companyname') }}</strong></p>
                @endif
                @if ( block_sub_value('testimonial-content') )
                    <p class="mb-0 mx-auto">«{{ block_sub_value('testimonial-content') }}»
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
