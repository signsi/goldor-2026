<?php
/**
 * The DE or FR Ninja Forms newsletter signup, chosen by the current
 * language. No-ops gracefully if Ninja Forms isn't active.
 *
 * @package goldor
 */

if ( ! shortcode_exists( 'ninja_form' ) ) {
	return;
}

$form_id = 'de' === goldor_current_language()
	? ( isset( $attributes['formIdDe'] ) ? $attributes['formIdDe'] : 10 )
	: ( isset( $attributes['formIdFr'] ) ? $attributes['formIdFr'] : 11 );
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore ?>>
	<?php echo do_shortcode( '[ninja_form id="' . absint( $form_id ) . '"]' ); ?>
</div>
