{{--
    Siehe hier für Einstellungsmöglichkeiten
    https://developer.wordpress.org/reference/functions/wp_link_pages/
--}}
{!! wp_link_pages([
    'echo' => 0,
    'before' => '<nav class="page-nav"><p>' . __( 'Pages:' ),
    'after' => '</p></nav>'
]) !!}