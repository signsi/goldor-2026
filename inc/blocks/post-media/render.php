<?php
/**
 * Featured image (with fallback) and artikel paywall badge for the post
 * currently being rendered by a Query Loop — the Query Loop counterpart of
 * goldor_render_card_media().
 *
 * @package goldor
 */

$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
if ( ! $post_id ) {
	return;
}

$thumb_id = get_post_thumbnail_id( $post_id );
?>
<a <?php echo get_block_wrapper_attributes( array( 'class' => 'story-card__media' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?> href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" tabindex="-1" aria-hidden="true">
	<?php
	if ( $thumb_id ) {
		echo wp_get_attachment_image( $thumb_id, 'medium_large', false, array( 'alt' => '', 'loading' => 'lazy' ) );
	} else {
		?>
		<img src="<?php echo esc_url( goldor_post_thumbnail_url( $post_id ) ); ?>" alt="" loading="lazy">
		<?php
	}
	?>
	<?php if ( 'artikel' === get_post_type( $post_id ) && get_post_meta( $post_id, 'paywall', true ) ) : ?>
		<span class="story-card__paywall"><?php esc_html_e( 'Abo', 'goldor' ); ?></span>
	<?php endif; ?>
</a>
