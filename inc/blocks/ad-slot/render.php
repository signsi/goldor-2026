<?php
/**
 * Renders one active `werbung` ad for the requested placement type, always
 * labelled "Anzeige". The showLabel attribute is kept only so existing
 * block markup stays valid.
 *
 * @package goldor
 */

$type = isset( $attributes['type'] ) ? $attributes['type'] : 'Skyscraper';

// Detail pages run their image the full width of the page, right under it.
if ( 'Skyscraper' === $type && is_singular() && ! is_page() ) {
	return;
}

$ad = goldor_block_get_active_ad( $type );

$formats = goldor_ad_formats();
$size    = isset( $formats[ $type ] ) ? $formats[ $type ] : array( 'class' => 'ad', 'width' => 300, 'height' => 250 );
$class   = 'ad-slot ' . $size['class'];
$mobile  = 'Billboard' === $type && $ad ? $ad['mobile'] : '';

// An unbooked billboard stands in for the skyscraper where that one is hidden.
// Pages are cached, so the stylesheet decides where: see .is-skyscraper-fallback.
if ( 'Billboard' === $type && ( ! $ad || empty( $ad['image'] ) ) ) {
	$ad     = goldor_block_get_active_ad( 'Skyscraper' );
	$mobile = '';

	if ( $ad ) {
		$ad['image']    = $ad['mobile'];
		$size['width']  = GOLDOR_AD_MOBILE_SIZE[0];
		$size['height'] = GOLDOR_AD_MOBILE_SIZE[1];
		$class         .= ' is-skyscraper-fallback';
	}
}

if ( ! $ad || empty( $ad['image'] ) ) {
	return;
}

if ( 'Skyscraper' === $type && ! $ad['sticky'] ) {
	$class .= ' is-static';
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => $class ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php // Always marked, so advertising stays recognisable as such. ?>
	<p class="ad-slot__label"><?php esc_html_e( 'Anzeige', 'goldor' ); ?></p>
	<a href="<?php echo esc_url( $ad['url'] ); ?>" target="_blank" rel="noopener sponsored">
		<?php if ( $mobile ) : ?>
			<picture>
				<source
					media="(max-width: 600px)"
					srcset="<?php echo esc_url( $mobile ); ?>"
					width="<?php echo esc_attr( GOLDOR_AD_MOBILE_SIZE[0] ); ?>"
					height="<?php echo esc_attr( GOLDOR_AD_MOBILE_SIZE[1] ); ?>"
				>
		<?php endif; ?>
		<img
			class="ad"
			width="<?php echo esc_attr( $size['width'] ); ?>"
			height="<?php echo esc_attr( $size['height'] ); ?>"
			src="<?php echo esc_url( $ad['image'] ); ?>"
			alt="<?php echo esc_attr( $ad['title'] ); ?>"
			loading="lazy"
		>
		<?php if ( $mobile ) : ?>
			</picture>
		<?php endif; ?>
	</a>
</div>
