<?php
/**
 * Article body for post types without a paywall. goldor/entry-lead sets the
 * opening paragraph above the hero image, so the body resumes after it —
 * both blocks split the same source via goldor_content_lead_and_body().
 *
 * @package goldor
 */

$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
if ( ! $post_id ) {
	return;
}

list( $lead, $body ) = goldor_content_lead_and_body( $post_id );
$content = $lead ? $body : get_the_content( null, false, $post_id );
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'entry-content-full' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php echo apply_filters( 'the_content', $content ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
</div>
