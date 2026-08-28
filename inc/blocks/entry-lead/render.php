<?php
/**
 * The article's opening emphasised paragraph, hoisted above the hero image.
 * goldor/paywall-content renders the remainder, splitting the same source.
 *
 * @package goldor
 */

$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
if ( ! $post_id ) {
	return;
}

list( $lead ) = goldor_content_lead_and_body( $post_id );
if ( ! $lead ) {
	return;
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'entry-lead' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php
	// The dek is set upright, so the house <em> wrapper comes off — but links
	// and everything else inside it stay.
	echo wp_kses_post( wpautop( preg_replace( '#</?(em|i)\b[^>]*>#i', '', $lead ) ) );
	?>
</div>
