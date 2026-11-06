<?php
/**
 * The detail view's featured image: edge to edge or whole on the reading
 * measure (see inc/titelbild.php for which and why), opening large in the
 * lightbox. Its caption stays on the reading measure.
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

$mode = goldor_titelbild_mode( $post_id, $thumb_id );
if ( 'hidden' === $mode ) {
	return;
}

$caption = wp_get_attachment_caption( $thumb_id );
$alt     = get_post_meta( $thumb_id, '_wp_attachment_image_alt', true );
$large   = wp_get_attachment_image_url( $thumb_id, 'full' );

$classes = 'entry-media entry-media--' . $mode;
if ( 'full' === $mode ) {
	$classes .= ' entry-media--focus-' . goldor_titelbild_focus( $post_id );
}

$image = wp_get_attachment_image(
	$thumb_id,
	'full',
	false,
	array(
		'alt'     => $alt,
		'class'   => 'entry-media__img',
		'sizes'   => 'full' === $mode ? '100vw' : '(max-width: 760px) 100vw, 680px',
		'loading' => 'eager',
	)
);
?>
<figure <?php echo get_block_wrapper_attributes( array( 'class' => $classes ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php if ( $large ) : ?>
		<a class="entry-media__link" href="<?php echo esc_url( $large ); ?>"><?php echo $image; // phpcs:ignore WordPress.Security.EscapeOutput ?></a>
	<?php else : ?>
		<?php echo $image; // phpcs:ignore WordPress.Security.EscapeOutput ?>
	<?php endif; ?>
	<?php if ( $caption ) : ?>
		<figcaption class="entry-media__caption"><?php echo wp_kses_post( $caption ); ?></figcaption>
	<?php endif; ?>
</figure>
