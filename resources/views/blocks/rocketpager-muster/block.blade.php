{{--
    Innerhalb von "@section('content-section')" und "@endsection" kann die HTML Struktur des Block definiert werden.
    Die HTML-Struktur wird in den div-Container (rocketpager-{element-slug}) eingefügt. Falls nebst den Standard-Klassen
    zusätzliche Klassen benötigt werden, können diese über die Variable "element_classes" als String mitgegeben werden. Wenn die Animation
    nicht auf das RocketPager-Element aktive sein soll, kann der Parameter "ignoreAnimation" auf true gesetzt werden (Default false).
--}}

@extends('blocks.helpers.block-wrapper', ['element_classes' => 'has-secondary-background-color has-background p-gutter', 'ignoreAnimation' => false])

@section('content-section')
    <p>Anleitungen:<br>
    <a class="underline underline-offset-4 hover:text-primary" href="https://app.nuclino.com/Rocket-GmbH/3-Entwicklung/Genesis-Custom-Blocks-93920a4f-afa9-4c8e-a4a1-ca727bce1bd7" target="_blank">Erstellung neuer Custom Genesis Block (RocketPager Element)</a><br>
    <a class="underline underline-offset-4 hover:text-primary" href="https://app.nuclino.com/Rocket-GmbH/3-Entwicklung/JS-und-Styling-fr-Blcke-hinterlegen-50446bf1-8763-4ec7-bd99-ee521ea873dd" target="_blank">JS und Styling für Blöcke hinterlegen</a></p>

    <h3>I'm a normal if-condition</h3>
        @if ( block_value('field'))
            <p>DO SOMETHING: {{ block_value('field') }}</p>
        @endif

    <h3>I'm a normal if-else-condition</h3>
    <p>
        @if ( block_value('empty-field'))
            DO SOMETHING IF
        @else
            DO SOMETHING ELSE: (field is empty)
        @endif
    </p>

    <h3>I'm a normal if-else-condition (simplified)</h3>
    <p>
        {{ block_value('no-field') ? "DO SOMETHING IF" : "DO SOMETHING ELSE: Field is not available" }}
    </p>

    <h3>I'm a if-else-condition for a checkbox</h3>
    <p>
        @if ( block_value( 'checkbox'))
            DO SOMETING: Checkbox is True
        @else
            DO SOMETHING ELSE: No Checkbox or value False
        @endif
    </p>

    <h3>I'm a if-else-condition for a selection</h3>
    <p>
        @if ( block_value('selection') == 'same' )
            DO SOMETING: Same value - block_value gives back {{ block_value( 'selection') }}
        @else
            DO SOMETHING ELSE: No Select-field, no Selection or other value
        @endif
    </p>

    <h3>I'm a Repeating Item</h3>
        @if(block_rows('repeater'))
            <p>Repeater does {{ block_row_count('repeater') }} loops</p>
            <ul>
                @while (block_rows('repeater'))
                    @php block_row('repeater') @endphp {{-- Next Loop with new Repeater-xl --}}
                    @if ( block_sub_value( 'repeater-item'))
                        <li>{{ block_row_index() + 1 }}. Loop: DO SOMETHING with item (has value) -> {{ block_sub_value( 'repeater-item') }}</li>
                    @else
                        <li>{{ block_row_index() + 1 }}. Loop: DO SOMETHING ELSE with item: (no value)</li>
                    @endif
                @endwhile
                {{ reset_block_rows( 'repeater' ) }} {{-- Setzt den Counter des Repeaters zurück --}}
            </ul>
        @endif

    <!-- IMAGE -->
    <h3>I'm an Image (Thumbnail Medium)</h3>
        @include('blocks.helpers.image',
        [
            'name_ImageField' => 'image',
            'thumbnail' => 'medium'
        ])

    <!-- WITH CLASS-->
    <h3>I'm a Image with additional classes (Margin Left)</h3>
        @include('blocks.helpers.image',
        [
            'name_ImageField' => 'image',
            'additionalClasses' => array('class' => 'ml-xl')
        ])

    <h3>Images in a Repeater</h3>
        @if(block_rows('repeater'))
            <div class="flex flex-wrap">
                @while (block_rows('repeater'))
                    @php block_row('repeater') @endphp {{-- Next Loop with new Repeater-xl--}}
                    @include('blocks.helpers.image',
                    [
                        'name_ImageField' => 'repeater-image',
                        'thumbnail' => 'medium',
                        'additionalClasses' => array('class' => 'mr-gutter mb-gutter'),
                        'isRepeaterElement' => true
                    ])
                @endwhile
            </div>
            {{ reset_block_rows( 'repeater' ) }} {{-- Setzt den Counter des Repeaters zurück --}}
        @endif

    <h3>Images with Object-Fill instead of Background-Images</h3>
        @include('blocks.helpers.background-image',
        [
            'name_ImageField' => 'image',
            'class_object_fill_breakpoint' => 'bg-object-wrapper slides height-small',
            'class_object_fit' => array('class' => 'object-cover'),
            'thumbnail' => 'full',
            'isRepeaterElement' => false
        ])
@overwrite