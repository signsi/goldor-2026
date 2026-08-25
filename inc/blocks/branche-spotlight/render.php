<?php
/**
 * Homepage "Branche" spotlight. If a `vsgu-news` (Personen) entry is flagged
 * `topentry`, it gets the big spotlight card plus one supplementary flagged
 * `kalender` entry. Otherwise, up to two flagged `lieferant`/`kalender`
 * entries fill the spot instead.
 *
 * @package goldor
 */

$spotlight = new WP_Query(
	array(
		'post_type'      => 'vsgu-news',
		'posts_per_page' => 1,
		'no_found_rows'  => true,
		'meta_query'     => array( array( 'key' => 'topentry', 'value' => '1', 'compare' => '=' ) ),
	)
);

ob_start();
$has_vsgu = false;

if ( $spotlight->have_posts() ) {
	$has_vsgu = true;
	$spotlight->the_post();

	$link       = get_permalink();
	$thumb      = goldor_post_thumbnail_url( get_the_ID() );
	$categories = goldor_post_terms( get_the_ID() );
	?>
	<div class="grid-item">
		<div class="item-image" style="background-image:url(<?php echo esc_url( $thumb ); ?>)" onclick="location.href='<?php echo esc_js( $link ); ?>'">
			<?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
				<a class="item-category" href="<?php echo esc_url( get_term_link( $categories[0] ) ); ?>"><?php echo esc_html( $categories[0]->name ); ?></a>
			<?php endif; ?>
		</div>
		<a href="<?php echo esc_url( $link ); ?>"><h2><?php the_title(); ?></h2></a>
		<?php the_excerpt(); ?>
		<a href="<?php echo esc_url( get_post_type_archive_link( 'vsgu-news' ) ); ?>" class="list-more"><?php esc_html_e( 'All entries', 'goldor' ); ?></a>
	</div>
	<?php
	wp_reset_postdata();
}

$supplement = new WP_Query(
	array(
		'post_type'      => $has_vsgu ? array( 'kalender' ) : array( 'lieferant', 'kalender' ),
		'posts_per_page' => $has_vsgu ? 1 : 2,
		'no_found_rows'  => true,
		'meta_query'     => array( array( 'key' => 'topentry', 'value' => '1', 'compare' => '=' ) ),
	)
);

while ( $supplement->have_posts() ) :
	$supplement->the_post();
	echo goldor_render_grid_item( get_the_ID() ); // phpcs:ignore
endwhile;
wp_reset_postdata();

$content = ob_get_clean();

if ( ! $content ) {
	return;
}
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore ?>>
	<?php echo $content; // phpcs:ignore ?>
</div>
