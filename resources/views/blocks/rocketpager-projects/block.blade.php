@php
    $row_per_col = App\setColumns();
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <ul class="list-projects relative list-none grid {{ $row_per_col }} m-0 p-0 z-[200] transition-transform duration-700 ease-[cubic-bezier(0.7,0,0.3,1)] not-prose">
        @while (block_rows('projekt'))
            @php block_row('projekt') @endphp
            <li class="project-item pl-0 mb-0 before:hidden" style="transform: matrix(1, 0, 0, 1, 0, 0);">
                <a class="block relative overflow-hidden text-white no-underline before:content-[''] before:block before:pb-[75%]" href="{{ block_sub_value('project-link') }}" data-color="{{ block_sub_value('project-color') }}" style="background-color:{{ block_sub_value('project-color') }}">
                    <div class="inner absolute bottom-[40%] 2xl:bottom-1/4 inset-x-10 md:inset-x-[3vw] z-30 transition-transform duration-700 ease-[cubic-bezier(0.7,0,0.3,1)]" style="transform: matrix(1, 0, 0, 1, 0, 0);">
                        @if (block_sub_value('project-type') )
                            <span class="project-type" style="color:{{ block_sub_value('projecttype-color') }}">{{ block_sub_value('project-type') }}</span>
                        @endif
                        @if ( block_sub_value('project-name') )
                            <h3 class="project-name" style="color:{{ block_sub_value('projectname-color') }}">{{ block_sub_value('project-name') }}</h3>
                        @endif
                        @if ( block_sub_value('project-intro') )
                            <p class="project-intro" style="color:{{ block_sub_value('projectintro-color') }}">{{ block_sub_value('project-intro') }}</p>
                        @endif
                    </div>
                    <div class="project-color" style="background-color:{{ block_sub_value('project-color') }}"></div>
                    @include('blocks.helpers.background-image',
                    [
                        'name_ImageField' => 'project-image',
                        'class_object_fill_breakpoint' => 'project-visuel bg-object-wrapper--smallUp',
                        'class_object_fit' => array('class' => 'bg-object--cover'),
                        'thumbnail' => '4-3-thumb',
                        'isRepeaterElement' => true
                    ])
                    <div class="overlay absolute content-[''] inset-0 bottom-0 z-10" style="background: linear-gradient(135deg, {{ block_sub_value('project-color') }}b0 0%, rgba(2,0,36,0.4) 100%)"></div>
                </a>
            </li>
        @endwhile
        {{ reset_block_rows( 'projekt' ) }}
    </ul>
@overwrite
