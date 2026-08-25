<?php
/**
 * Kalender archive: native date + category filter, own WP_Query, own grid
 * and pagination. Replaces the old Pikaday-driven filter template part.
 *
 * @package goldor
 */

$paged      = max( 1, (int) get_query_var( 'paged' ) ?: ( isset( $_GET['paged'] ) ? absint( $_GET['paged'] ) : 1 ) );
$date_input = isset( $_GET['event_date'] ) ? sanitize_text_field( wp_unslash( $_GET['event_date'] ) ) : '';
$cat_id     = isset( $_GET['event_cat'] ) ? absint( $_GET['event_cat'] ) : 0;

$date_ymd = '';
if ( $date_input ) {
	$parsed = DateTime::createFromFormat( 'Y-m-d', $date_input );
	if ( $parsed ) {
		$date_ymd = $parsed->format( 'Ymd' );
	}
}

$meta_query = array();
if ( $date_ymd ) {
	$meta_query[] = array( 'key' => 'startdatum', 'value' => $date_ymd, 'compare' => '<=', 'type' => 'NUMERIC' );
	$meta_query[] = array( 'key' => 'enddatum', 'value' => $date_ymd, 'compare' => '>=', 'type' => 'NUMERIC' );
} else {
	$meta_query[] = array( 'key' => 'enddatum', 'value' => current_time( 'Ymd' ), 'compare' => '>=', 'type' => 'NUMERIC' );
}

$args = array(
	'post_type'      => 'kalender',
	'posts_per_page' => 9,
	'paged'          => $paged,
	'meta_key'       => 'startdatum',
	'orderby'        => 'meta_value',
	'order'          => 'ASC',
	'meta_query'     => $meta_query,
);

if ( $cat_id ) {
	$args['tax_query'] = array(
		array( 'taxonomy' => 'kalender-kategorie', 'field' => 'term_id', 'terms' => $cat_id ),
	);
}

$query = new WP_Query( $args );
$terms = get_terms( array( 'taxonomy' => 'kalender-kategorie', 'hide_empty' => true ) );
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore ?>>
	<form method="get" class="form-filter">
		<input type="date" name="event_date" class="input-filter" value="<?php echo esc_attr( $date_input ); ?>">

		<?php if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
			<select name="event_cat" class="select-filter">
				<option value=""><?php esc_html_e( 'Filter category', 'goldor' ); ?></option>
				<?php foreach ( $terms as $term ) : ?>
					<option value="<?php echo esc_attr( $term->term_id ); ?>" <?php selected( $cat_id, $term->term_id ); ?>>
						<?php echo esc_html( $term->name ); ?>
					</option>
				<?php endforeach; ?>
			</select>
		<?php endif; ?>

		<button type="submit" class="button-filter"><?php esc_html_e( 'Filter', 'goldor' ); ?></button>
		<a class="button-filter" href="<?php echo esc_url( remove_query_arg( array( 'event_date', 'event_cat', 'paged' ) ) ); ?>">
			<?php esc_html_e( 'All', 'goldor' ); ?>
		</a>
	</form>

	<div class="grid-container">
		<?php
		while ( $query->have_posts() ) :
			$query->the_post();

			$ort        = get_post_meta( get_the_ID(), 'ort', true );
			$start_date = DateTime::createFromFormat( 'Ymd', get_post_meta( get_the_ID(), 'startdatum', true ) );
			$end_date   = DateTime::createFromFormat( 'Ymd', get_post_meta( get_the_ID(), 'enddatum', true ) );
			?>
			<div class="grid-item">
				<div class="item-image" style="background-image:url(<?php echo esc_url( goldor_post_thumbnail_url( get_the_ID() ) ); ?>)" onclick="location.href='<?php echo esc_js( get_permalink() ); ?>'"></div>
				<a href="<?php echo esc_url( get_permalink() ); ?>"><h2><?php the_title(); ?></h2></a>
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
		?>
	</div>

	<div class="prev-next-posts">
		<?php
		$big = 999999999;
		echo paginate_links(
			array(
				'base'    => str_replace( $big, '%#%', esc_url( add_query_arg( 'paged', $big ) ) ),
				'format'  => '',
				'current' => $paged,
				'total'   => $query->max_num_pages,
			)
		);
		?>
	</div>
</div>
<?php
wp_reset_postdata();
