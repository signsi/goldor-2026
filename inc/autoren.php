<?php
/**
 * Author photos: an image from the media library on the user profile. It
 * replaces Gravatar everywhere get_avatar() is used; without one, Gravatar
 * stays the fallback.
 *
 * @package goldor
 */

function goldor_author_photo_field() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'      => 'group_goldor_autor_foto',
			'title'    => 'Autorenbild',
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
