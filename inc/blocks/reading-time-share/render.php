<?php
/**
 * Estimated reading time (artikel only) and social share links.
 *
 * @package goldor
 */

if ( ! in_the_loop() ) {
	the_post();
}

$post    = get_post();
$minutes = 0;

if ( $post && 'artikel' === get_post_type( $post ) ) {
	$words   = str_word_count( wp_strip_all_tags( $post->post_content ) );
	$minutes = (int) floor( $words / 200 );
	$seconds = (int) floor( ( $words % 200 ) / ( 200 / 60 ) );
}

$facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode( get_permalink( $post ) );
$twitter  = 'https://twitter.com/share?text=' . rawurlencode( get_the_title( $post ) ) . '&url=' . rawurlencode( get_permalink( $post ) );
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore ?> class="post-functions">
	<?php if ( $minutes >= 1 ) : ?>
		<p><?php esc_html_e( 'Lesezeit', 'goldor' ); ?></p>
		<p class="time"><?php echo esc_html( $minutes . 'm ' . $seconds . 's' ); ?></p>
	<?php endif; ?>

	<p><?php esc_html_e( 'Share', 'goldor' ); ?></p>
	<p>
		<a class="facebook" href="<?php echo esc_url( $facebook ); ?>" title="auf Facebook teilen" target="_blank" rel="noopener">&nbsp;</a>
		<a class="twitter" href="<?php echo esc_url( $twitter ); ?>" title="auf Twitter teilen" target="_blank" rel="noopener">&nbsp;</a>
	</p>
</div>
