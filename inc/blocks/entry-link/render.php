<?php
/**
 * The entry's own outbound link: a Kleinanzeige points at the seller, a Link
 * entry is nothing but its destination. The host is printed beside the button
 * so a reader knows where the link leaves to before following it.
 *
 * @package goldor
 */

$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
if ( ! $post_id ) {
	return;
}

$url = goldor_normalize_url( get_post_meta( $post_id, 'url', true ) );
if ( ! $url ) {
	return;
}

$label = ! empty( $attributes['label'] ) ? $attributes['label'] : __( 'Zum Angebot', 'goldor' );
$host  = wp_parse_url( $url, PHP_URL_HOST );
$host  = $host ? preg_replace( '/^www\./', '', $host ) : '';
?>
<p <?php echo get_block_wrapper_attributes( array( 'class' => 'entry-cta' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<a class="goldor-button" href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer">
		<?php echo esc_html( $label ); ?>
	</a>
	<?php if ( $host ) : ?>
		<span class="entry-cta__host"><?php echo esc_html( $host ); ?></span>
	<?php endif; ?>
</p>
