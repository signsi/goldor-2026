<?php
/**
 * Renders one active `werbung` ad for the requested placement type.
 *
 * @package goldor
 */

$type = isset( $attributes['type'] ) ? $attributes['type'] : 'Skyscraper';
$ad   = goldor_block_get_active_ad( $type );

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
<div <?php echo get_block_wrapper_attributes( array( 'class' => $size['class'] ) ); // phpcs:ignore ?>>
	<a href="<?php echo esc_url( $ad['url'] ); ?>" target="_blank" rel="noopener sponsored">
		<img
			class="ad"
			width="<?php echo esc_attr( $size['width'] ); ?>"
			height="<?php echo esc_attr( $size['height'] ); ?>"
			src="<?php echo esc_url( $ad['image'] ); ?>"
			alt="<?php echo esc_attr( $ad['title'] ); ?>"
		>
	</a>
</div>
