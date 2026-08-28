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
$seconds = 0;

if ( $post && 'artikel' === get_post_type( $post ) ) {
	$words   = str_word_count( wp_strip_all_tags( $post->post_content ) );
	$minutes = (int) floor( $words / 200 );
	$seconds = (int) floor( ( $words % 200 ) / ( 200 / 60 ) );
}

$facebook = 'https://www.facebook.com/sharer/sharer.php?u=' . rawurlencode( get_permalink( $post ) );
$twitter  = 'https://twitter.com/share?text=' . rawurlencode( get_the_title( $post ) ) . '&url=' . rawurlencode( get_permalink( $post ) );
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'post-functions' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php if ( $minutes >= 1 ) : ?>
		<p class="post-functions__time">
			<span class="post-functions__label"><?php esc_html_e( 'Lesezeit', 'goldor' ); ?></span>
			<span class="time"><?php echo esc_html( $minutes . 'm ' . $seconds . 's' ); ?></span>
		</p>
	<?php endif; ?>

	<p class="post-functions__share">
		<span class="post-functions__label"><?php esc_html_e( 'Teilen', 'goldor' ); ?></span>
		<a class="facebook" href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Auf Facebook teilen', 'goldor' ); ?>">
			<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><path d="M14 8.5V6.8c0-.7.2-1.1 1.2-1.1H16V3.1c-.3 0-1-.1-1.9-.1-2 0-3.4 1.2-3.4 3.4v2.1H8.5V11H10.7v8h3V11h2.2l.3-2.5H14Z"/></svg>
		</a>
		<a class="twitter" href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener" aria-label="<?php esc_attr_e( 'Auf X teilen', 'goldor' ); ?>">
			<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" focusable="false"><path d="M13.7 10.6 20 3.4h-1.5l-5.5 6.3-4.4-6.3H3.5l6.6 9.5-6.6 7.6H5l5.8-6.6 4.6 6.6h5.1l-6.8-9.9Zm-2 2.4-.7-1-5.3-7.4h2.3l4.3 6 .7 1 5.6 8h-2.3l-4.6-6.6Z"/></svg>
		</a>
	</p>
</div>
