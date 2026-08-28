<?php
/**
 * Homepage hero: the News/Artikel post flagged `topstory`, falling back to the
 * most recent entry so the hero slot is never empty.
 *
 * @package goldor
 */

$cta = isset( $attributes['cta'] ) ? $attributes['cta'] : __( 'Jetzt lesen', 'goldor' );

$base_args = array(
	'post_type'      => array( 'post', 'artikel' ),
	'posts_per_page' => 1,
	'no_found_rows'  => true,
	'ignore_sticky_posts' => true,
);

$query = new WP_Query(
	$base_args + array(
		'meta_query' => array( array( 'key' => 'topstory', 'value' => '1', 'compare' => '=' ) ),
	)
);

if ( ! $query->have_posts() ) {
	$query = new WP_Query( $base_args );
}

if ( ! $query->have_posts() ) {
	return;
}

$query->the_post();
$post_id = get_the_ID();
wp_reset_postdata();
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'top-story' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php
	echo goldor_render_story_card( // phpcs:ignore WordPress.Security.EscapeOutput
		$post_id,
		array(
			'variant'    => 'hero',
			'image_size' => 'large',
			'heading'    => 'h1',
			'cta'        => $cta,
		)
	);
	?>
</div>
