<?php
/**
 * The practical half of a kalender entry: when, where, and a one-click
 * download into the reader's own calendar.
 *
 * @package goldor
 */

$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
if ( ! $post_id || 'kalender' !== get_post_type( $post_id ) ) {
	return;
}

$start = DateTime::createFromFormat( 'Ymd', (string) get_post_meta( $post_id, 'startdatum', true ) );
$end   = DateTime::createFromFormat( 'Ymd', (string) get_post_meta( $post_id, 'enddatum', true ) );
$ort   = get_post_meta( $post_id, 'ort', true );

$dates = '';
if ( $start ) {
	$dates = $start->format( 'd.m.Y' );
	if ( $end && $end->format( 'Ymd' ) !== $start->format( 'Ymd' ) ) {
		$dates .= ' – ' . $end->format( 'd.m.Y' );
	}
}

if ( ! $dates && ! $ort ) {
	return;
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'event-details' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<dl class="entry-facts">
		<?php if ( $dates ) : ?>
			<div class="entry-facts__row">
				<dt class="entry-facts__label"><?php esc_html_e( 'Termin', 'goldor' ); ?></dt>
				<dd class="entry-facts__value entry-facts__value--accent">
					<time datetime="<?php echo esc_attr( $start->format( 'Y-m-d' ) ); ?>"><?php echo esc_html( $dates ); ?></time>
				</dd>
			</div>
		<?php endif; ?>

		<?php if ( $ort ) : ?>
			<div class="entry-facts__row">
				<dt class="entry-facts__label"><?php esc_html_e( 'Ort', 'goldor' ); ?></dt>
				<dd class="entry-facts__value"><?php echo esc_html( $ort ); ?></dd>
			</div>
		<?php endif; ?>
	</dl>

	<?php if ( $start ) : ?>
		<p class="entry-cta">
			<a class="goldor-button" href="<?php echo esc_url( add_query_arg( 'goldor_ical', $post_id, home_url( '/' ) ) ); ?>">
				<?php esc_html_e( 'Termin übernehmen', 'goldor' ); ?>
			</a>
			<span class="entry-cta__host"><?php esc_html_e( 'iCal / Outlook', 'goldor' ); ?></span>
		</p>
	<?php endif; ?>
</div>
