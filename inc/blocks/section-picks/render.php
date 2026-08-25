<?php
/**
 * A homepage section: N posts of one type, as cards or a date list, with an
 * optional named-term taxonomy filter and an optional ad that takes over the
 * whole section when active (used for the Jobs & Markt "Stellengesuche" slot).
 *
 * @package goldor
 */

$heading      = isset( $attributes['heading'] ) ? $attributes['heading'] : '';
$post_type    = isset( $attributes['postType'] ) ? $attributes['postType'] : 'post';
$per_page     = isset( $attributes['postsPerPage'] ) ? (int) $attributes['postsPerPage'] : 3;
$exclude_top  = ! empty( $attributes['excludeTopstory'] );
$layout       = isset( $attributes['layout'] ) ? $attributes['layout'] : 'grid';
$taxonomy     = isset( $attributes['taxonomy'] ) ? $attributes['taxonomy'] : '';
$term_name    = isset( $attributes['term'] ) ? $attributes['term'] : '';
$archive_link = isset( $attributes['archiveLink'] ) ? $attributes['archiveLink'] : '';
$ad_override  = isset( $attributes['adOverride'] ) ? $attributes['adOverride'] : '';

if ( $ad_override ) {
	$ad = goldor_block_get_active_ad( $ad_override );
	if ( $ad && ! empty( $ad['image'] ) ) {
		echo render_block(
			array(
				'blockName' => 'goldor/ad-slot',
				'attrs'     => array( 'type' => $ad_override ),
			)
		);
		return;
	}
}

$term = null;
if ( $taxonomy && $term_name ) {
	$term = get_term_by( 'name', $term_name, $taxonomy );
	if ( ! $term ) {
		return;
	}
	if ( ! $archive_link ) {
		$archive_link = get_term_link( $term );
	}
}
if ( ! $archive_link ) {
	$archive_link = get_post_type_archive_link( $post_type );
}

$query_args = array(
	'post_type'      => $post_type,
	'posts_per_page' => $per_page,
	'no_found_rows'  => true,
);
if ( $term ) {
	$query_args['tax_query'] = array(
		array( 'taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $term->term_id ),
	);
}
if ( $exclude_top ) {
	$query_args['meta_query'] = array( array( 'key' => 'topstory', 'value' => '1', 'compare' => '!=' ) );
}

$query = new WP_Query( $query_args );
if ( ! $query->have_posts() ) {
	return;
}
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore ?>>
	<?php if ( $heading ) : ?>
		<h1 class="divide"><?php echo esc_html( $heading ); ?></h1>
	<?php endif; ?>

	<?php if ( 'list' === $layout ) : ?>
		<?php
		while ( $query->have_posts() ) :
			$query->the_post();
			?>
			<div class="list-item">
				<p class="list-item-date"><?php echo esc_html( get_the_date( 'd.m.Y' ) ); ?></p>
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
			</div>
			<?php
		endwhile;
		?>
		<a href="<?php echo esc_url( $archive_link ); ?>" class="list-more"><?php esc_html_e( 'All entries', 'goldor' ); ?></a>
		<?php
	else :
		?>
		<div class="grid-container">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				echo goldor_render_grid_item( get_the_ID() ); // phpcs:ignore
			endwhile;
			?>
		</div>
		<?php
	endif;
	wp_reset_postdata();
	?>
</div>
