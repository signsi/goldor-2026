@php
    $has_link = $author_as_link ?? true;
    $author_id = get_the_author_meta('ID');
    $first_name = get_the_author_meta('first_name');
    $last_name = get_the_author_meta('last_name');
    $display_name = ($first_name && $last_name) ? "$first_name $last_name" : get_the_author();
    $avatar_html = get_avatar($author_id, 56, '', 'Author Avatar', ['class' => 'avatar rounded-full']);

    // Berechne die Lesezeit
    // Text des Beitrags
    $post_content = get_post_field('post_content', get_the_ID());

    // Anzahl der Wörter im Beitrag
    $word_count = str_word_count(strip_tags($post_content));

    // Durchschnittliche Lesegeschwindigkeit in Wörtern pro Minute
    $words_per_minute = 200; // Du kannst diese Zahl anpassen

    // Berechne die geschätzte Lesezeit
    $reading_time = ceil($word_count / $words_per_minute);

    // Formatiere die Lesezeit
    $formatted_reading_time = sprintf(
        _n('%d Minute', '%d Minuten', $reading_time, 'textdomain'),
        $reading_time
    );

@endphp

<div class="entry-author min-w-fit w-64 mx-auto author p-4 border border-solid border-beige rounded-2xl">
    <div class="flex flex-row items-center space-x-4">
        {{-- Überprüfe, ob der Autor ein Gravatar-Bild hat --}}
        @if(!empty($avatar_html))
            <div class="avatar-image">
                {!! $avatar_html !!}
            </div>
        @else
            <i class="fal fa-user w-[1em] mr-[0.25em]"></i>
        @endif
        {{-- Füge den Autor-Namen hinzu --}}
        <div class="avatar-name text-left">
            <span class="text-primary font-bold">{{ $display_name }}</span><br>
            <div class="reading-time text-xs">
                {{ $formatted_reading_time }} {{ App\pl_e('Lesezeit') }}
            </div>
        </div>
    </div>
</div>
