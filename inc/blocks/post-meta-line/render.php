<?php
/**
 * The card footer (author, date, primary category) for the post currently
 * being rendered by a Query Loop.
 *
 * Core's post-terms block needs one hard-coded taxonomy, but the card is
 * shared by every post type — each of which has its own
 * `{post_type}-kategorie` — so the term is resolved per post instead.
 *
 * @package goldor
 */

$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
if ( ! $post_id ) {
	return;
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'story-card__meta-wrap' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php echo goldor_render_card_meta( $post_id ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
</div>
