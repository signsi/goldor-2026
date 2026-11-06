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

// The block runs its own query, so on a kalender-kategorie archive it would
// otherwise ignore the term the visitor actually asked for.
if ( ! $cat_id && is_tax( 'kalender-kategorie' ) ) {
	$queried_term = get_queried_object();
	if ( $queried_term instanceof WP_Term ) {
		$cat_id = $queried_term->term_id;
	}
}

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
		<?php
		// "All" has to leave a category archive entirely, not just drop the
		// query args that the term in the URL would immediately reapply.
		$reset_url = is_tax( 'kalender-kategorie' )
			? get_post_type_archive_link( 'kalender' )
			: remove_query_arg( array( 'event_date', 'event_cat', 'paged' ) );
		?>
		<a class="button-filter" href="<?php echo esc_url( $reset_url ); ?>">
			<?php esc_html_e( 'Alle Termine', 'goldor' ); ?>
		</a>
	</form>

	<?php if ( $query->have_posts() ) : ?>
		<div class="grid-container">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				echo goldor_render_story_card( // phpcs:ignore WordPress.Security.EscapeOutput
					get_the_ID(),
					array(
						'subline'   => goldor_event_dateline( get_the_ID() ),
						'meta_left' => get_post_meta( get_the_ID(), 'ort', true ),
					)
				);
			endwhile;
			?>
		</div>
	<?php else : ?>
		<p class="archive-empty">
			<?php
			// The default view is "from today on", so an empty calendar is
			// almost always "nothing coming up" rather than "nothing at all".
			echo $date_ymd || $cat_id
				? esc_html__( 'Zu dieser Auswahl sind keine Termine vorhanden.', 'goldor' )
				: esc_html__( 'Zurzeit sind keine kommenden Termine erfasst.', 'goldor' );
			?>
		</p>
	<?php endif; ?>

	<?php
	// Laid out like the core Query pagination (previous / numbers / next),
	// so one set of styles serves both.
	$big   = 999999999;
	$pages = paginate_links(
		array(
			'base'      => str_replace( $big, '%#%', esc_url( add_query_arg( 'paged', $big ) ) ),
			'format'    => '',
			'current'   => $paged,
			'total'     => $query->max_num_pages,
			'type'      => 'array',
			'prev_text' => __( 'Vorherige Seite', 'goldor' ),
			'next_text' => __( 'Nächste Seite', 'goldor' ),
		)
	);
	if ( $pages ) :
		$prev    = '';
		$next    = '';
		$numbers = array();
		foreach ( $pages as $item ) {
			if ( false !== strpos( $item, 'prev page-numbers' ) ) {
				$prev = str_replace( 'class="prev page-numbers"', 'class="wp-block-query-pagination-previous"', $item );
			} elseif ( false !== strpos( $item, 'next page-numbers' ) ) {
				$next = str_replace( 'class="next page-numbers"', 'class="wp-block-query-pagination-next"', $item );
			} else {
				$numbers[] = $item;
			}
		}
		?>
		<nav class="wp-block-query-pagination" aria-label="<?php esc_attr_e( 'Seitennummerierung', 'goldor' ); ?>">
			<?php echo $prev; // phpcs:ignore WordPress.Security.EscapeOutput -- built by paginate_links(). ?>
			<div class="wp-block-query-pagination-numbers"><?php echo implode( ' ', $numbers ); // phpcs:ignore WordPress.Security.EscapeOutput ?></div>
			<?php echo $next; // phpcs:ignore WordPress.Security.EscapeOutput ?>
		</nav>
	<?php endif; ?>
</div>
<?php
wp_reset_postdata();
