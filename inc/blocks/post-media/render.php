<?php
/**
 * Featured image (with fallback), category badge and artikel paywall badge
 * for the post currently being rendered by a Query Loop.
 *
 * @package goldor
 */

$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
if ( ! $post_id ) {
	return;
}

$link       = get_permalink( $post_id );
$thumb      = goldor_post_thumbnail_url( $post_id );
$categories = goldor_post_terms( $post_id );
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'item-image' ) ); // phpcs:ignore ?> style="background-image:url(<?php echo esc_url( $thumb ); ?>)" onclick="location.href='<?php echo esc_js( $link ); ?>'">
	<?php if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) : ?>
		<span class="item-category"><?php echo esc_html( $categories[0]->name ); ?></span>
	<?php endif; ?>
	<?php if ( 'artikel' === get_post_type( $post_id ) && get_post_meta( $post_id, 'paywall', true ) ) : ?>
		<div class="item-paywall">&nbsp;</div>
	<?php endif; ?>
</div>
