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
?>
<a <?php echo get_block_wrapper_attributes( array( 'class' => goldor_card_media_classes( $post_id ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?> href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" tabindex="-1" aria-hidden="true">
	<?php echo goldor_card_media_inner( $post_id ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
</a>
