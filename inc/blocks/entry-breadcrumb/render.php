<?php
/**
 * "TRADE / Magazin" — the entry's primary category, then the section it lives
 * in. The section label is dropped when it merely repeats the category.
 *
 * @package goldor
 */

$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
if ( ! $post_id ) {
	return;
}

$terms   = goldor_post_terms( $post_id );
$term    = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0] : null;
$section = goldor_entry_section_label( $post_id );

if ( $term && $section && 0 === strcasecmp( $term->name, $section ) ) {
	$section = '';
}
if ( ! $term && ! $section ) {
	return;
}
?>
<p <?php echo get_block_wrapper_attributes( array( 'class' => 'entry-breadcrumb' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php if ( $term ) : ?>
		<a class="entry-breadcrumb__term" href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
	<?php endif; ?>
	<?php if ( $term && $section ) : ?>
		<span class="entry-breadcrumb__sep" aria-hidden="true">/</span>
	<?php endif; ?>
	<?php if ( $section ) : ?>
		<span class="entry-breadcrumb__section"><?php echo esc_html( $section ); ?></span>
	<?php endif; ?>
</p>
