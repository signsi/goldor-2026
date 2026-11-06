<?php
/**
 * The entry's Dachzeile above the title — the same line the homepage cover
 * story carries, so a reader who clicked on it finds it again here.
 *
 * @package goldor
 */

$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
if ( ! $post_id ) {
	return;
}

$eyebrow = goldor_post_eyebrow( $post_id );
if ( ! $eyebrow ) {
	return;
}
?>
<p <?php echo get_block_wrapper_attributes( array( 'class' => 'entry-eyebrow' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>><?php echo esc_html( $eyebrow ); ?></p>
