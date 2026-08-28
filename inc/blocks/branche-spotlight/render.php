<?php
/**
 * Homepage "Branche" spotlight: the featured Personen (vsgu-news) entry plus
 * the featured Messe (kalender) entry. Entries flagged `topentry` win; the
 * slots are otherwise filled with the most recent entries so the section is
 * never half empty.
 *
 * @package goldor
 */

/**
 * One post id of the given type — the flagged entry if there is one.
 */
$pick = function ( $post_type, $exclude = array() ) {
	foreach ( array( true, false ) as $flagged ) {
		$args = array(
			'post_type'      => $post_type,
			'posts_per_page' => 1,
			'no_found_rows'  => true,
			'fields'         => 'ids',
			'post__not_in'   => array_merge( $exclude, goldor_rendered_post_ids() ),
		);
		if ( $flagged ) {
			$args['meta_query'] = array( array( 'key' => 'topentry', 'value' => '1', 'compare' => '=' ) );
		}

		$found = get_posts( $args );
		if ( $found ) {
			return (int) $found[0];
		}
	}

	return 0;
};

$post_ids = array();
foreach ( array( 'vsgu-news', 'kalender' ) as $post_type ) {
	$id = $pick( $post_type, $post_ids );
	if ( $id ) {
		$post_ids[] = $id;
	}
}

if ( ! $post_ids ) {
	return;
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'branche-spotlight' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php
	foreach ( $post_ids as $post_id ) {
		echo goldor_render_story_card( // phpcs:ignore WordPress.Security.EscapeOutput
			$post_id,
			'kalender' === get_post_type( $post_id )
				? array(
					'subline'   => goldor_event_dateline( $post_id ),
					'meta_left' => get_post_meta( $post_id, 'ort', true ),
				)
				: array()
		);
	}
	?>
</div>
