@php
    $hidden = block_value('hideElement');
@endphp

@extends('blocks.helpers.preview-wrapper', ['flex_type' => 'grid-cols-3'])

@section('flex-item-content')
        @while (block_rows('team-member'))
        @php block_row('team-member') @endphp
            <div class="team-member flex flex-col justify-between @if (block_value('isSlider')) h-full pr-gutter @else transition-all @endif group duration-300 shadow-md ease-in-out{{ App\getAnimation() }}">
                <div class="image-wrapper">
                    @include('blocks.helpers.image', [
                        'name_ImageField' => 'portrait-image',
                        'thumbnail' => $ar_class,
                        'additionalClasses' => ['class' => 'transition nolazyload group-hover:scale-105'],
                        'isRepeaterElement' => true,
                    ])
                </div>
                <div
                    class="text-wrapper flex flex-col p-gutter @if (block_value('isSlider')) border-solid border-2 border-grey hover:shadow-lg transition-all @endif">
                    <div class="text-wrapper--inner">
                        @if (block_sub_value('name'))
                            <p class="my-0">
                                <strong>
                                    {{ block_sub_value('name') }}
                                </strong>
                            </p>
                        @endif
                        @if (block_sub_value('text'))
                            <div class="[&_*]:text-sm [&_p]:mt-0">
                                {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                            </div>
                        @endif
                    </div>
                    {{-- mt-auto --}}
                    @if (block_sub_value('email'))
                        <ul class="is-style-liststyle-icon-end--arrow-right group mb-0 ml-0">
                            <li class="my-0 x group-hover:origin-center group-hover:translate-x-2 text-xs text-primary hover:text-font">
                                <a href="mailto:{{ block_sub_value('email') }}" rel="noreferrer noopener" class="font-semibold text-primary hover:text-font no-underline">{{ App\pl__('E-Mail senden') }}</a>
                            </li>
                        </ul>
                    @endif
                </div>
            </div>
        @endwhile
        {{ reset_block_rows( 'team-member' ) }}
    </div>
@overwrite
