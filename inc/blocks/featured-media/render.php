<?php
/**
 * Full-bleed featured image; its caption stays on the reading measure.
 *
 * @package goldor
 */

$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
if ( ! $post_id ) {
	return;
}

$thumb_id = get_post_thumbnail_id( $post_id );
if ( ! $thumb_id ) {
	return;
}

$caption = wp_get_attachment_caption( $thumb_id );
$alt     = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
?>
<figure <?php echo get_block_wrapper_attributes( array( 'class' => 'entry-media' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php echo wp_get_attachment_image( $thumb_id, 'full', false, array( 'alt' => $alt, 'class' => 'entry-media__img' ) ); ?>
	<?php if ( $caption ) : ?>
		<figcaption class="entry-media__caption"><?php echo wp_kses_post( $caption ); ?></figcaption>
	<?php endif; ?>
</figure>
