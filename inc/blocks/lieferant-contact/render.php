<?php
/**
 * Website, email and phone for the current Lieferant entry, as the labelled
 * hairline rows a directory entry is read for.
 *
 * @package goldor
 */

$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
if ( ! $post_id || 'lieferant' !== get_post_type( $post_id ) ) {
	return;
}

$website = get_post_meta( $post_id, 'website', true );
$email   = get_post_meta( $post_id, 'email', true );
$phone   = get_post_meta( $post_id, 'phone', true );

if ( ! $website && ! $email && ! $phone ) {
	return;
}
?>
<dl <?php echo get_block_wrapper_attributes( array( 'class' => 'entry-facts' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php if ( $website ) : ?>
		<div class="entry-facts__row">
			<dt class="entry-facts__label"><?php esc_html_e( 'Website', 'goldor' ); ?></dt>
			<dd class="entry-facts__value">
				<a href="<?php echo esc_url( goldor_normalize_url( $website ) ); ?>" target="_blank" rel="noopener noreferrer">
					<?php echo esc_html( preg_replace( '#^(https?://)?(www\.)?#i', '', $website ) ); ?>
				</a>
			</dd>
		</div>
	<?php endif; ?>

	<?php if ( $email ) : ?>
		<div class="entry-facts__row">
			<dt class="entry-facts__label"><?php esc_html_e( 'E-Mail', 'goldor' ); ?></dt>
			<dd class="entry-facts__value"><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></dd>
		</div>
	<?php endif; ?>

	<?php if ( $phone ) : ?>
		<div class="entry-facts__row">
			<dt class="entry-facts__label"><?php esc_html_e( 'Telefon', 'goldor' ); ?></dt>
			<dd class="entry-facts__value"><a href="tel:<?php echo esc_attr( preg_replace( '/[^\d+]/', '', $phone ) ); ?>"><?php echo esc_html( $phone ); ?></a></dd>
		</div>
	<?php endif; ?>
</dl>
