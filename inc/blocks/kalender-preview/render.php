<?php
/**
 * Homepage list of upcoming kalender events.
 *
 * @package goldor
 */

$per_page = isset( $attributes['postsPerPage'] ) ? (int) $attributes['postsPerPage'] : 3;

$query = new WP_Query(
	array(
		'post_type'      => 'kalender',
		'posts_per_page' => $per_page,
		'no_found_rows'  => true,
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
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore ?>>
	<?php
	while ( $query->have_posts() ) :
		$query->the_post();

		$ort        = get_post_meta( get_the_ID(), 'ort', true );
		$start_date = DateTime::createFromFormat( 'Ymd', get_post_meta( get_the_ID(), 'startdatum', true ) );
		$end_date   = DateTime::createFromFormat( 'Ymd', get_post_meta( get_the_ID(), 'enddatum', true ) );
		?>
		<div class="list-item">
			<a class="cal-item-title" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
			<p class="cal-item-meta">
				<?php
				if ( $start_date ) {
					echo esc_html( $start_date->format( 'd.m.Y' ) );
				}
				if ( $end_date ) {
					echo ' – ' . esc_html( $end_date->format( 'd.m.Y' ) );
				}
				if ( $ort ) {
					echo ' (' . esc_html( $ort ) . ')';
				}
				?>
			</p>
			<p>
				<?php echo esc_html( substr( get_the_excerpt(), 0, 75 ) ); ?>&#8239;.&#8239;.&#8239;.
				<a class="article-more" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'mehr', 'goldor' ); ?></a>
			</p>
		</div>
		<?php
	endwhile;
	wp_reset_postdata();
	?>
	<a href="<?php echo esc_url( get_post_type_archive_link( 'kalender' ) ); ?>" class="list-more"><?php esc_html_e( 'All entries', 'goldor' ); ?></a>
</div>
