@extends('blocks.helpers.block-wrapper')

@section('content-section')
    <ul class="list-projects {{ block_value('row-per-col') }}">
        @while (block_rows('projekt'))
            @php block_row('projekt') @endphp
            <li class="project-item" style="transform: matrix(1, 0, 0, 1, 0, 0);">
                <a href="{{ block_sub_value('project-link') }}" data-color="{{ block_sub_value('project-color') }}" style="background-color:{{ block_sub_value('project-color') }}">
                    <div class="inner" style="transform: matrix(1, 0, 0, 1, 0, 0);">
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
                    <div class="overlay" style="background: linear-gradient(135deg, {{ block_sub_value('project-color') }}b0 0%, rgba(2,0,36,0.4) 100%)"></div>
                </a>
            </li>
        @endwhile
        {{ reset_block_rows( 'projekt' ) }}
    </ul>
@overwrite
