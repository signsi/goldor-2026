<?php
/**
 * Plain links to the current post type's "{post_type}-kategorie" taxonomy
 * archives — a semantic, JS-free replacement for the old POST/GET dropdown
 * category filters.
 *
 * @package goldor
 */

$post_type = isset( $attributes['postType'] ) ? $attributes['postType'] : get_query_var( 'post_type' );
$taxonomy  = $post_type . '-kategorie';

if ( ! taxonomy_exists( $taxonomy ) ) {
	return;
}

$terms = get_terms( array( 'taxonomy' => $taxonomy, 'hide_empty' => true ) );
if ( empty( $terms ) || is_wp_error( $terms ) ) {
	return;
}

$archive_link  = get_post_type_archive_link( $post_type );
$current_term  = is_tax( $taxonomy ) ? get_queried_object() : null;
?>
<ul <?php echo get_block_wrapper_attributes( array( 'class' => 'taxonomy-filter-links' ) ); // phpcs:ignore ?>>
	<li class="<?php echo esc_attr( ! $current_term ? 'is-active' : '' ); ?>">
		<a href="<?php echo esc_url( $archive_link ); ?>"><?php esc_html_e( 'All', 'goldor' ); ?></a>
	</li>
	<?php foreach ( $terms as $term ) : ?>
		<li class="<?php echo esc_attr( $current_term && $current_term->term_id === $term->term_id ? 'is-active' : '' ); ?>">
			<a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
		</li>
	<?php endforeach; ?>
</ul>
