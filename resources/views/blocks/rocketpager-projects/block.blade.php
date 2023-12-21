@php
    $row_per_col = App\setColumns();
@endphp

@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <ul class="list-projects relative list-none grid {{ $row_per_col }} m-0 p-0 z-40 transition-transform duration-700 ease-[cubic-bezier(0.7,0,0.3,1)]">
        @while (block_rows('projekt'))
            @php block_row('projekt') @endphp
            <li class="project-item pl-0 my-0 before:hidden" style="transform: matrix(1, 0, 0, 1, 0, 0);">
                <a class="block relative overflow-hidden text-white no-underline before:content-default before:block before:pb-[75%] group" href="{{ block_sub_value('project-link') }}" data-color="{{ block_sub_value('project-color') }}" style="background-color:{{ block_sub_value('project-color') }}">
                    <div class="inner absolute bottom-4/10 2xl:bottom-1/4 inset-x-10 md:inset-x-[3vw] z-30 transition-transform duration-700 ease-[cubic-bezier(0.7,0,0.3,1)]" style="transform: matrix(1, 0, 0, 1, 0, 0);">
                        @if (block_sub_value('project-type') )
                            <span class="project-type block mb-3 text-white opacity-80 transition-colors duration-500 ease-[cubic-bezier(0.7,0,0.3,1)]" style="color:{{ block_sub_value('projecttype-color') }}">{{ block_sub_value('project-type') }}</span>
                        @endif
                        @if ( block_sub_value('project-name') )
                            <h3 class="project-name leading-none m-0 mb-3 max-w-[80%] transition-colors duration-500 ease-[cubic-bezier(0.7,0,0.3,1)]" style="color:{{ block_sub_value('projectname-color') }}">{{ block_sub_value('project-name') }}</h3>
                        @endif
                        @if ( block_sub_value('project-intro') )
                            <p class="project-intro leading-none m-0 max-w-[80%] transition-all duration-500 ease-[cubic-bezier(0.7,0,0.3,1)] absolute left-0 top-full lg:opacity-0 lg:translate-y-1/3 lg:group-hover:translate-y-0 lg:group-hover:opacity-100 lg:group-hover:transition-all lg:group-hover:duration-500 lg:group-hover:ease-[cubic-bezier(0.7,0,0.3,1)]" style="color:{{ block_sub_value('projectintro-color') }}">{{ block_sub_value('project-intro') }}</p>
                        @endif
                    </div>
                    <div class="project-color absolute inset-0 z-20 translate-y-12/10 skew-y-12 transition-transform duration-500 ease-[cubic-bezier(0.7,0,0.3,1)] delay-100 group-hover:translate-y-0 group-hover:skew-y-0 group-hover:transition-transform group-hover:duration-500 group-hover:ease-[cubic-bezier(0.7,0,0.3,1)]" style="background-color:{{ block_sub_value('project-color') }}"></div>
                    @include('blocks.helpers.background-image',
                    [
                        'name_ImageField' => 'project-image',
                        'class_object_fill_breakpoint' => 'project-visuel bg-object-wrapper absolute inset-0 z-10 bg-cover bg-center bg-no-repeat transition-all duration-[800ms] ease-[cubic-bezier(0.7,0,0.3,1)] group-hover:-translate-y-1/10 group-hover:transition-transform group-hover:duration-500 group-hover:ease-[cubic-bezier(0.7,0,0.3,1)] group-hover:delay-100',
                        'class_object_fit' => array('class' => 'object-cover'),
                        'thumbnail' => '4-3-thumb',
                        'isRepeaterElement' => true
                    ])
                    <div class="overlay absolute content-default inset-0 bottom-0 z-10" style="background: linear-gradient(135deg, {{ block_sub_value('project-color') }}b0 0%, rgba(2,0,36,0.4) 100%)"></div>
                </a>
            </li>
        @endwhile
        {{ reset_block_rows( 'projekt' ) }}
    </ul>
@overwrite
