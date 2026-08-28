<?php
/**
 * Renders one active `werbung` ad for the requested placement type.
 *
 * @package goldor
 */

$type       = isset( $attributes['type'] ) ? $attributes['type'] : 'Skyscraper';
$show_label = ! empty( $attributes['showLabel'] );
$ad         = goldor_block_get_active_ad( $type );

if ( ! $ad || empty( $ad['image'] ) ) {
	return;
}

$sizes = array(
	'Skyscraper'                     => array( 'class' => 'skyscraper', 'width' => 160, 'height' => 600 ),
	'Leaderboard'                    => array( 'class' => 'leaderboard', 'width' => 728, 'height' => 90 ),
	'MediumRectangle News'           => array( 'class' => 'ad-news', 'width' => 300, 'height' => 250 ),
	'MediumRectangle Stellengesuche' => array( 'class' => 'ad-stellen', 'width' => 300, 'height' => 250 ),
);
$size = isset( $sizes[ $type ] ) ? $sizes[ $type ] : array( 'class' => 'ad', 'width' => 300, 'height' => 250 );
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'ad-slot ' . $size['class'] ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php if ( $show_label ) : ?>
		<p class="ad-slot__label"><?php esc_html_e( 'Anzeige', 'goldor' ); ?></p>
	<?php endif; ?>
	<a href="<?php echo esc_url( $ad['url'] ); ?>" target="_blank" rel="noopener sponsored">
		<img
			class="ad"
			width="<?php echo esc_attr( $size['width'] ); ?>"
			height="<?php echo esc_attr( $size['height'] ); ?>"
			src="<?php echo esc_url( $ad['image'] ); ?>"
			alt="<?php echo esc_attr( $ad['title'] ); ?>"
			loading="lazy"
		>
	</a>
</div>
