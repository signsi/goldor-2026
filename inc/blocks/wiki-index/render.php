<?php
/**
 * All entries of a post type, grouped by its own "{post_type}-kategorie"
 * term and alphabetical within each group. Used for the Wiki and Links
 * archives, which are reference lists rather than feeds — every entry is on
 * one page, with no pagination to work through.
 *
 * Links entries point at their external `url` meta; one without a URL still
 * gets its own permalink rather than a dead link.
 *
 * @package goldor
 */

$post_type = isset( $attributes['postType'] ) ? $attributes['postType'] : 'wiki';
$taxonomy  = $post_type . '-kategorie';
$terms     = taxonomy_exists( $taxonomy ) ? get_terms( array( 'taxonomy' => $taxonomy, 'hide_empty' => true ) ) : array();

if ( empty( $terms ) || is_wp_error( $terms ) ) {
	$terms = array( null );
}

// Groups are only known to be empty once every one of them has been queried,
// so the list is built first and the empty state decided afterwards.
ob_start();
?>
	<?php foreach ( $terms as $term ) : ?>
		<?php
		// Filters have to run so WPML keeps the index to one language.
		$query_args = array(
			'post_type'        => $post_type,
			'posts_per_page'   => -1,
			'orderby'          => 'title',
			'order'            => 'ASC',
			'suppress_filters' => false,
		);
		if ( $term ) {
			$query_args['tax_query'] = array(
				array( 'taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $term->term_id ),
			);
		}
		$entries = get_posts( $query_args );
		if ( ! $entries ) {
			continue;
		}
		?>
		<section class="wiki-index__group">
			<?php if ( $term ) : ?>
				<h2 class="wiki-index__term" id="<?php echo esc_attr( $term->slug ); ?>"><?php echo esc_html( $term->name ); ?></h2>
			<?php endif; ?>

			<ul class="wiki-index__list">
				<?php
				foreach ( $entries as $entry ) :
					$external = 'link' === $post_type ? goldor_normalize_url( get_post_meta( $entry->ID, 'url', true ) ) : '';
					$host     = $external ? preg_replace( '/^www\./', '', (string) wp_parse_url( $external, PHP_URL_HOST ) ) : '';
					?>
					<li class="wiki-index__item">
						<?php if ( $external ) : ?>
							<a class="wiki-index__link" href="<?php echo esc_url( $external ); ?>" target="_blank" rel="noopener noreferrer">
								<?php echo esc_html( get_the_title( $entry ) ); ?>
							</a>
							<?php if ( $host ) : ?>
								<span class="wiki-index__host"><?php echo esc_html( $host ); ?></span>
							<?php endif; ?>
						<?php else : ?>
							<a class="wiki-index__link" href="<?php echo esc_url( get_permalink( $entry ) ); ?>">
								<?php echo esc_html( get_the_title( $entry ) ); ?>
							</a>
						<?php endif; ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>
	<?php endforeach; ?>
<?php
$groups = trim( ob_get_clean() );
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'wiki-index' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php if ( $groups ) : ?>
		<?php echo $groups; // phpcs:ignore WordPress.Security.EscapeOutput ?>
	<?php else : ?>
		<p class="archive-empty"><?php esc_html_e( 'Zu dieser Auswahl sind zurzeit keine Einträge vorhanden.', 'goldor' ); ?></p>
	<?php endif; ?>
</div>
