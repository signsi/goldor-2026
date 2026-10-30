<?php
/**
 * Homepage list of upcoming kalender events. The date is what a reader scans
 * for, so it is set largest; an event that is on today says so.
 *
 * @package goldor
 */

$per_page   = isset( $attributes['postsPerPage'] ) ? (int) $attributes['postsPerPage'] : 3;
$heading    = isset( $attributes['heading'] ) ? $attributes['heading'] : '';
$link_label = isset( $attributes['linkLabel'] ) ? $attributes['linkLabel'] : '';

// Beneath a single event the block reads as "further dates", so the event
// being read is never one of them.
$exclude = goldor_rendered_post_ids();
if ( is_singular( 'kalender' ) && get_the_ID() ) {
	$exclude[] = get_the_ID();
}

$query = new WP_Query(
	array(
		'post_type'      => 'kalender',
		'posts_per_page' => $per_page,
		'no_found_rows'  => true,
		'post__not_in'   => $exclude,
		'meta_key'       => 'startdatum',
		'orderby'        => 'meta_value',
		'order'          => 'ASC',
		'meta_query'     => array(
			array( 'key' => 'enddatum', 'value' => current_time( 'Ymd' ), 'compare' => '>=', 'type' => 'NUMERIC' ),
		),
	)
);

if ( ! $query->have_posts() ) {
	return;
}

$archive_link = get_post_type_archive_link( 'kalender' );
$label        = $link_label ? $link_label : __( 'Alle Einträge', 'goldor' );
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'kalender-preview' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php
	echo goldor_render_section_head( $heading, $archive_link, $heading ? $label : '', 'column' ); // phpcs:ignore WordPress.Security.EscapeOutput
	?>

	<ul class="entry-list entry-list--events">
		<?php
		while ( $query->have_posts() ) :
			$query->the_post();
			goldor_track_rendered_post( get_the_ID() );
			$dates   = goldor_event_daterange( get_the_ID() );
			$ort     = trim( (string) get_post_meta( get_the_ID(), 'ort', true ) );
			$running = goldor_event_is_running( get_the_ID() );
			?>
			<li class="entry-list__item list-item event-item<?php echo $running ? ' is-running' : ''; ?>">
				<?php if ( $dates ) : ?>
					<p class="event-item__date"><?php echo esc_html( $dates ); ?></p>
				<?php endif; ?>
				<a class="entry-list__title cal-item-title" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?><?php echo $ort ? esc_html( ', ' . $ort ) : ''; ?></a>
				<p class="entry-list__excerpt"><?php echo esc_html( wp_html_excerpt( wp_strip_all_tags( get_the_excerpt() ), 90, '&#8230;' ) ); ?></p>
				<?php if ( $running ) : ?>
					<p class="event-item__status"><?php esc_html_e( 'Läuft gerade', 'goldor' ); ?></p>
				<?php endif; ?>
			</li>
		<?php
		endwhile;
		wp_reset_postdata();
		?>
	</ul>

	<?php if ( ! $heading ) : ?>
		<a href="<?php echo esc_url( $archive_link ); ?>" class="list-more"><?php echo esc_html( $label ); ?></a>
	<?php endif; ?>
</div>
