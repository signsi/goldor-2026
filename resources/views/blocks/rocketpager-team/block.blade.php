@php
    $row_per_col = App\setColumns();
    $ratio = block_value('aspect-ratio');
    switch($ratio){
        case 'aspect-ratio-16-9':
            $ar_class = '16-9-thumb';
        break;
        case 'aspect-ratio-4-3':
            $ar_class = '4-3-thumb';
        break;
        case 'aspect-ratio-square':
            $ar_class = 'medium-crop';
        break;
        default:
            $ar_class = 'medium-crop';
    }
    $offset = block_value('offset-right');
    switch($offset){
        case 'is-offset-right--default':
            $offset_class = 'is-offset-right--default';
        break;
        case 'is-offset-right--tiny':
            $offset_class = 'is-offset-right--tiny';
        break;
        case 'is-offset-right--slim':
            $offset_class = 'is-offset-right--slim';
        break;
        case 'is-offset-right--large':
            $offset_class = 'is-offset-right--large';
        break;
        case 'is-offset-right--xlarge':
            $offset_class = 'is-offset-right--xlarge';
        break;
        default:
            $offset_class = 'is-offset-right--default';
    }
@endphp

@extends('blocks.helpers.block-wrapper', ['element_classes' => $offset_class])

@section('content-section')
    <div class="grid gap-tiny lg:gap-mobile{{ $row_per_col }}">
        @while (block_rows('team-member'))
            @php
                block_row('team-member');
                $linkedin = block_sub_value('social-media-linkedin');
                $instagram = block_sub_value('social-media-instagram')
            @endphp
            @if ( !block_sub_value('hide-element') )
                <div class="team-member transition-all duration-300 ease-in-out{{ App\getAnimation() }}">
                    <div class="image-wrapper ">
                        @include('blocks.helpers.image',
                        [
                            'name_ImageField' => 'portrait-image',
                            'thumbnail' => $ar_class,
                            'additionalClasses' => array('class' => 'nolazyload'),
                            'isRepeaterElement' => true
                        ])
                    </div>
                    <div class="text-wrapper pr-4 py-4 text-left">
                        @if ( block_sub_value( 'name') )
                            <p class="title !mb-2"><strong>{{ block_sub_value('name') }}</strong></p>
                        @endif
                        @if ( block_sub_value('text') )
                            <div>{!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}</div>
                        @endif
                        @if ( block_sub_value('email') )
                            <p><a href="mailto:{{ block_sub_value('email') }}" class="underline text-primary hover:text-font">E-Mail</a>@if ( block_sub_value('phone') ) | <a href="tel:{{ block_sub_value('phone') }}" class="underline text-primary hover:text-font">{{ block_sub_value('phone') }}</a> @endif </p>
                        @endif
                    </div>
                </div>
            @endif
        @endwhile
        {{ reset_block_rows( 'team-member' ) }}
    </div>
@overwrite