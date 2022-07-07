@extends('blocks.helpers.block-wrapper', ['ignoreAnimation' => true])

@section('content-section')
    @while (block_rows('team-member'))
        @php
            block_row('team-member');
            $linkedin = block_sub_value('social-media-linkedin');
            $instagram = block_sub_value('social-media-instagram')
        @endphp
        @if ( !block_sub_value('hide-element') )
            <div class="team-member{{ App\getAnimation() }}">
                <div class="content--wrapper">
                    <div class="portrait">
                        @include('blocks.helpers.image',
                        [
                            'name_ImageField' => 'portrait-image',
                            'thumbnail' => 'square-thumb',
                            'isRepeaterElement' => true
                        ])
                    </div>
                    <div class="job-description">
                        <p>
                            @if ( block_sub_value('name') )
                                <strong>{{ block_sub_value('name') }}</strong><br>
                            @endif
                            @if ( block_sub_value('funktion') )
                                {{ block_sub_value('funktion') }}<br>
                            @endif
                            @if ( block_sub_value('email') )
                                <a href="mailto:{{ block_sub_value('email') }}" class="email">{{ block_sub_value('email') }}</a>
                            @endif
                        </p>
                        <div class="description">
                            @if ( block_sub_value('text') )
                                {!! App\sanitize_out(block_sub_value('text'), 'text_area') !!}
                            @endif
                        </div>
                        <div class="social-nav-wrapper">
                            @include('blocks.helpers.social-link',['media_name'=> '', 'media_link' => $linkedin, 'icon_classes' => 'fab fa-linkedin', 'noListitem' => true])
                            @include('blocks.helpers.social-link',['media_name'=> '', 'media_link' => $instagram, 'icon_classes' => 'fab fa-instagram-square', 'noListitem' => true])
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endwhile
    {{ reset_block_rows( 'team-member' ) }}
@overwrite
