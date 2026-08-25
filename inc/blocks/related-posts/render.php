<?php
/**
 * Other News/Artikel posts sharing a tag with the current post.
 *
 * @package goldor
 */

if ( ! in_the_loop() ) {
	the_post();
}

$post_id = get_the_ID();
$tags    = wp_get_post_tags( $post_id );

if ( ! $tags ) {
	return;
}

$related = new WP_Query(
	array(
		'post_type'      => array( 'post', 'artikel' ),
		'tag__in'        => wp_list_pluck( $tags, 'term_id' ),
		'post__not_in'   => array( $post_id ),
		'posts_per_page' => 3,
		'no_found_rows'  => true,
	)
);

if ( ! $related->have_posts() ) {
	return;
}
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore ?>>
	<h1 class="divide"><?php esc_html_e( 'Verwandte Themen', 'goldor' ); ?></h1>
	<div class="grid-container">
		<?php
		while ( $related->have_posts() ) :
			$related->the_post();
			echo goldor_render_grid_item( get_the_ID() ); // phpcs:ignore
		endwhile;
		wp_reset_postdata();
		?>
	</div>
</div>
