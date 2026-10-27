<?php
/**
 * The service bar's links — the same three shortcuts the newsletter opens
 * with, so the newest issue and the job ads are one click away instead of
 * two levels down the main navigation.
 *
 * @package goldor
 */

$links = goldor_service_links();
if ( ! $links ) {
	return;
}
?>
<nav <?php echo get_block_wrapper_attributes( array( 'class' => 'service-links' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?> aria-label="<?php esc_attr_e( 'Service', 'goldor' ); ?>">
	<ul class="service-links__list">
		<?php foreach ( $links as $link ) : ?>
			<li><a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a></li>
		<?php endforeach; ?>
	</ul>
</nav>
