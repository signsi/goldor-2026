<?php
/**
 * All entries of a post type, grouped alphabetically by its own
 * "{post_type}-kategorie" taxonomy term. Used for the Wiki and Links
 * archives. Links entries point at their external `url` meta instead of a
 * permalink.
 *
 * @package goldor
 */

$post_type = isset( $attributes['postType'] ) ? $attributes['postType'] : 'wiki';
$taxonomy  = $post_type . '-kategorie';
$terms     = taxonomy_exists( $taxonomy ) ? get_terms( array( 'taxonomy' => $taxonomy, 'hide_empty' => true ) ) : array();

if ( empty( $terms ) || is_wp_error( $terms ) ) {
	$terms = array( null );
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'wiki-index' ) ); // phpcs:ignore ?>>
	<?php foreach ( $terms as $term ) : ?>
		<?php
		$query_args = array(
			'post_type'      => $post_type,
			'posts_per_page' => -1,
			'orderby'        => 'title',
			'order'          => 'ASC',
		);
		if ( $term ) {
			$query_args['tax_query'] = array(
				array( 'taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $term->term_id ),
			);
		}
		$entries = get_posts( $query_args );
		if ( ! $entries ) {
			continue;
		}
		?>
		<ul>
			<?php if ( $term ) : ?>
				<h2><?php echo esc_html( $term->name ); ?></h2>
			<?php endif; ?>
			<?php foreach ( $entries as $entry ) : ?>
				<li>
					<?php if ( 'link' === $post_type ) : ?>
						<a href="<?php echo esc_url( goldor_normalize_url( get_post_meta( $entry->ID, 'url', true ) ) ); ?>" target="_blank" rel="noopener">
							<?php echo esc_html( get_the_title( $entry ) ); ?>
						</a>
					<?php else : ?>
						<a href="<?php echo esc_url( get_permalink( $entry ) ); ?>"><?php echo esc_html( get_the_title( $entry ) ); ?></a>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
	<?php endforeach; ?>
</div>
