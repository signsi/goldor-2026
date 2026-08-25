<?php
/**
 * Website, email and phone for the current Lieferant entry.
 *
 * @package goldor
 */

if ( ! in_the_loop() ) {
	the_post();
}

$post_id = get_the_ID();
if ( 'lieferant' !== get_post_type( $post_id ) ) {
	return;
}

$website = get_post_meta( $post_id, 'website', true );
$email   = get_post_meta( $post_id, 'email', true );
$phone   = get_post_meta( $post_id, 'phone', true );

if ( ! $website && ! $email && ! $phone ) {
	return;
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'entry-meta' ) ); // phpcs:ignore ?>>
	<?php if ( $website ) : ?>
		<a href="<?php echo esc_url( goldor_normalize_url( $website ) ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $website ); ?></a>
	<?php endif; ?>
	<?php if ( $email ) : ?>
		&nbsp;&nbsp;&nbsp;<a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
	<?php endif; ?>
	<?php if ( $phone ) : ?>
		&nbsp;&nbsp;&nbsp;<span class="no-link"><?php echo esc_html( $phone ); ?></span>
	<?php endif; ?>
</div>
