<?php
/**
 * The author box fields on the user profile. The photo is an image from the
 * media library; it replaces Gravatar everywhere get_avatar() is used, and
 * without one Gravatar stays the fallback. The heading reads "Über den Autor"
 * or "Über die Autorin".
 *
 * @package goldor
 */

// The author box heading, chosen per person: German genders it, and
// WordPress has no field to derive it from.
const GOLDOR_AUTHOR_LABELS = array(
	'autor'   => 'Über den Autor',
	'autorin' => 'Über die Autorin',
);

/**
 * The author box heading for a user, or '' while none is chosen.
 */
function goldor_author_label( $user_id ) {
	$choice = get_user_meta( $user_id, 'autor_anrede', true );
	return isset( GOLDOR_AUTHOR_LABELS[ $choice ] ) ? GOLDOR_AUTHOR_LABELS[ $choice ] : '';
}

function goldor_author_photo_field() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_goldor_autor_foto',
			'title'    => 'Autorenbox',
			'fields'   => array(
				array(
					'key'           => 'field_goldor_autor_foto',
					'label'         => 'Bild',
					'name'          => 'autor_foto',
					'type'          => 'image',
					'instructions'  => 'Quadratisch, mindestens 400×400 px. Erscheint in der Autorenbox, in der Übersicht und auf der Profilseite.',
					'return_format' => 'id',
					'preview_size'  => 'thumbnail',
				),
				array(
					'key'           => 'field_goldor_autor_anrede',
					'label'         => 'Überschrift der Autorenbox',
					'name'          => 'autor_anrede',
					'type'          => 'button_group',
					'instructions'  => 'Steht unter jedem Beitrag über dem Namen.',
					'choices'       => GOLDOR_AUTHOR_LABELS,
					'allow_null'    => 1,
				),
			),
			'location' => array(
				array(
					array( 'param' => 'user_form', 'operator' => '==', 'value' => 'all' ),
				),
			),
		)
	);
}
add_action( 'acf/init', 'goldor_author_photo_field' );

function goldor_author_photo_avatar( $args, $id_or_email ) {
	$user_id = $id_or_email instanceof WP_User ? $id_or_email->ID : ( is_numeric( $id_or_email ) ? (int) $id_or_email : 0 );
	$photo   = $user_id ? (int) get_user_meta( $user_id, 'autor_foto', true ) : 0;
	// Uncropped on purpose: the registered thumbnail is a 300×170 card crop.
	$image   = $photo ? wp_get_attachment_image_src( $photo, 'medium_large' ) : false;

	if ( $image ) {
		$args['url']           = $image[0];
		$args['found_avatars'] = true;
	}
	return $args;
}
add_filter( 'pre_get_avatar_data', 'goldor_author_photo_avatar', 10, 2 );

/*
 * Pages are cached for days and the author box sits on every article, so a
 * new photo has to empty the whole cache, not just the author's own URL.
 */
function goldor_author_photo_purge( $meta_id, $user_id, $meta_key ) {
	if ( 'autor_foto' === $meta_key ) {
		do_action( 'litespeed_purge_all' );
	}
}
add_action( 'added_user_meta', 'goldor_author_photo_purge', 10, 3 );
add_action( 'updated_user_meta', 'goldor_author_photo_purge', 10, 3 );
