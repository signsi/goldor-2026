<?php
/**
 * How an entry's featured image opens its detail view.
 *
 * Edge to edge, cropped to 9:4, only suits a large landscape picture — about
 * one in thirty of the archive's images. Everything else (portraits, square
 * product shots, the many images under 1600px that would be blown up) is
 * shown whole, on the reading measure. "Automatisch" decides that per image;
 * the editors can override it in the entry's sidebar, and for the full width
 * choose which part of the picture the crop keeps.
 *
 * @package goldor
 */

const GOLDOR_TITELBILD_TYPES = array( 'post', 'artikel', 'vsgu-news', 'print' );

/** Smallest width that fills the page without being enlarged. */
const GOLDOR_TITELBILD_FULL_MIN_WIDTH = 1600;

/** Flattest landscape that still survives the 9:4 crop. */
const GOLDOR_TITELBILD_FULL_MIN_RATIO = 1.4;

function goldor_titelbild_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	$location = array();
	foreach ( GOLDOR_TITELBILD_TYPES as $type ) {
		$location[] = array( array( 'param' => 'post_type', 'operator' => '==', 'value' => $type ) );
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_goldor_titelbild',
			'title'    => 'Titelbild',
			'position' => 'side',
			'style'    => 'default',
			'fields'   => array(
				array(
					'key'           => 'field_goldor_titelbild_darstellung',
					'label'         => 'Darstellung',
					'name'          => 'titelbild_darstellung',
					'type'          => 'select',
					'instructions'  => 'Automatisch: randlos nur bei grossen Querformat-Bildern (ab 1600 px), sonst ganz und in Textbreite.',
					'choices'       => array(
						'auto'   => 'Automatisch',
						'full'   => 'Volle Breite (zugeschnitten)',
						'text'   => 'Textbreite (ganzes Bild)',
						'hidden' => 'Nicht oben zeigen',
					),
					'default_value' => 'auto',
					'return_format' => 'value',
				),
				array(
					'key'               => 'field_goldor_titelbild_ausschnitt',
					'label'             => 'Bildausschnitt bei voller Breite',
					'name'              => 'titelbild_ausschnitt',
					'type'              => 'button_group',
					'instructions'      => 'Welcher Teil des Bildes beim Zuschnitt sichtbar bleibt.',
					'choices'           => array(
						'top'    => 'Oben',
						'center' => 'Mitte',
						'bottom' => 'Unten',
					),
					'default_value'     => 'center',
					'conditional_logic' => array(
						array( array( 'field' => 'field_goldor_titelbild_darstellung', 'operator' => '==', 'value' => 'auto' ) ),
						array( array( 'field' => 'field_goldor_titelbild_darstellung', 'operator' => '==', 'value' => 'full' ) ),
					),
				),
			),
			'location' => $location,
		)
	);
}
add_action( 'acf/init', 'goldor_titelbild_fields' );

/**
 * Whether the image is large and wide enough to run edge to edge.
 */
function goldor_titelbild_suits_full_width( $thumb_id ) {
	$meta = wp_get_attachment_metadata( $thumb_id );
	if ( empty( $meta['width'] ) || empty( $meta['height'] ) || goldor_is_cutout_image( $thumb_id ) ) {
		return false;
	}
	return $meta['width'] >= GOLDOR_TITELBILD_FULL_MIN_WIDTH
		&& $meta['width'] / $meta['height'] >= GOLDOR_TITELBILD_FULL_MIN_RATIO;
}

/**
 * The resolved display: 'full', 'text' or 'hidden'.
 */
function goldor_titelbild_mode( $post_id, $thumb_id = 0 ) {
	$thumb_id = $thumb_id ? $thumb_id : get_post_thumbnail_id( $post_id );
	if ( ! $thumb_id ) {
		return 'hidden';
	}

	// A supplier's image is its logo.
	if ( 'lieferant' === get_post_type( $post_id ) ) {
		return 'text';
	}

	$choice = (string) get_post_meta( $post_id, 'titelbild_darstellung', true );
	if ( in_array( $choice, array( 'full', 'text', 'hidden' ), true ) ) {
		return $choice;
	}

	return goldor_titelbild_suits_full_width( $thumb_id ) ? 'full' : 'text';
}

/**
 * Which part of the picture the full-width crop keeps.
 */
function goldor_titelbild_focus( $post_id ) {
	$focus = (string) get_post_meta( $post_id, 'titelbild_ausschnitt', true );
	return in_array( $focus, array( 'top', 'bottom' ), true ) ? $focus : 'center';
}
