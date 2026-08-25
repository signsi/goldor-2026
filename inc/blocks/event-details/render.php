<?php
/**
 * Date range, location, and "add to calendar" link for a kalender event.
 *
 * @package goldor
 */

if ( ! in_the_loop() ) {
	the_post();
}

$post_id = get_the_ID();
if ( 'kalender' !== get_post_type( $post_id ) ) {
	return;
}

$start = get_post_meta( $post_id, 'startdatum', true );
$end   = get_post_meta( $post_id, 'enddatum', true );
$ort   = get_post_meta( $post_id, 'ort', true );

$start_date = DateTime::createFromFormat( 'Ymd', $start );
$end_date   = $end ? DateTime::createFromFormat( 'Ymd', $end ) : false;
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore ?>>
	<?php if ( $start_date ) : ?>
		<h2 class="kalender-date">
			<?php echo esc_html( $start_date->format( 'd.m.Y' ) ); ?>
			<?php if ( $end_date ) : ?>
				&ndash; <?php echo esc_html( $end_date->format( 'd.m.Y' ) ); ?>
			<?php endif; ?>
		</h2>
	<?php endif; ?>

	<div class="entry-meta">
		<a href="<?php echo esc_url( add_query_arg( 'goldor_ical', $post_id, home_url( '/' ) ) ); ?>">
			<?php esc_html_e( 'Zu Outlook hinzufügen', 'goldor' ); ?>
		</a>
		<?php if ( $ort ) : ?>
			&nbsp;&nbsp;&nbsp;<span class="no-link"><?php echo esc_html( $ort ); ?></span>
		<?php endif; ?>
	</div>
</div>
