<?php
/**
 * A homepage section: N posts of one type, as story cards or a compact date
 * list, with an optional named-term taxonomy filter and an optional ad that
 * takes over the whole section when active (used for the "Stellengesuche"
 * slot).
 *
 * @package goldor
 */

$heading       = isset( $attributes['heading'] ) ? $attributes['heading'] : '';
$heading_style = isset( $attributes['headingStyle'] ) ? $attributes['headingStyle'] : 'section';
$post_type     = isset( $attributes['postType'] ) ? $attributes['postType'] : 'post';
$per_page      = isset( $attributes['postsPerPage'] ) ? (int) $attributes['postsPerPage'] : 3;
$offset        = isset( $attributes['offset'] ) ? (int) $attributes['offset'] : 0;
$exclude_top   = ! empty( $attributes['excludeTopstory'] );
$layout        = isset( $attributes['layout'] ) ? $attributes['layout'] : 'grid';
$variant       = isset( $attributes['variant'] ) ? $attributes['variant'] : 'card';
$taxonomy      = isset( $attributes['taxonomy'] ) ? $attributes['taxonomy'] : '';
$term_name     = isset( $attributes['term'] ) ? $attributes['term'] : '';
$archive_link  = isset( $attributes['archiveLink'] ) ? $attributes['archiveLink'] : '';
$link_label    = isset( $attributes['linkLabel'] ) ? $attributes['linkLabel'] : '';
$ad_override   = isset( $attributes['adOverride'] ) ? $attributes['adOverride'] : '';

if ( $ad_override ) {
	$ad = goldor_block_get_active_ad( $ad_override );
	if ( $ad && ! empty( $ad['image'] ) ) {
		echo render_block(
			array(
				'blockName' => 'goldor/ad-slot',
				'attrs'     => array( 'type' => $ad_override ),
			)
		);
		return;
	}
}

$term = null;
if ( $taxonomy && $term_name ) {
	$term = get_term_by( 'name', $term_name, $taxonomy );
	if ( ! $term ) {
		return;
	}
	if ( ! $archive_link ) {
		$archive_link = get_term_link( $term );
	}
}
if ( ! $archive_link ) {
	$archive_link = get_post_type_archive_link( $post_type );
}

$query_args = array(
	'post_type'      => $post_type,
	'posts_per_page' => $per_page,
	'no_found_rows'  => true,
	'post__not_in'   => goldor_rendered_post_ids(),
);
if ( $offset > 0 ) {
	$query_args['offset'] = $offset;
}
if ( $term ) {
	$query_args['tax_query'] = array(
		array( 'taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $term->term_id ),
	);
}
if ( $exclude_top ) {
	// Posts that never had the flag set have no `topstory` row at all, so a
	// plain "!= 1" comparison would drop them along with the top story.
	$query_args['meta_query'] = array(
		'relation' => 'OR',
		array( 'key' => 'topstory', 'compare' => 'NOT EXISTS' ),
		array( 'key' => 'topstory', 'value' => '1', 'compare' => '!=' ),
	);
}

$query = new WP_Query( $query_args );
if ( ! $query->have_posts() ) {
	return;
}

$section_link_label = $link_label ? $link_label : __( 'Alle Einträge', 'goldor' );
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'section-picks' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php
	echo goldor_render_section_head( $heading, $archive_link, $heading ? $section_link_label : '', $heading_style ); // phpcs:ignore WordPress.Security.EscapeOutput
	?>

	<?php if ( 'list' === $layout ) : ?>
		<ul class="entry-list">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				// List rows are not story cards, so they must register themselves
				// for the later blocks that skip what the page already showed.
				goldor_track_rendered_post( get_the_ID() );
				$author = get_the_author();
				?>
				<li class="entry-list__item list-item">
					<a class="entry-list__title" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
					<p class="entry-list__meta list-item-date">
						<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'd.m.y' ) ); ?></time>
						<?php if ( $author ) : ?>
							<span class="entry-list__source"><?php echo esc_html( $author ); ?></span>
						<?php endif; ?>
					</p>
				</li>
				<?php
			endwhile;
			?>
		</ul>
		<?php if ( ! $heading ) : ?>
			<a href="<?php echo esc_url( $archive_link ); ?>" class="list-more"><?php echo esc_html( $section_link_label ); ?></a>
		<?php endif; ?>
	<?php else : ?>
		<div class="grid-container">
			<?php
			while ( $query->have_posts() ) :
				$query->the_post();
				echo goldor_render_story_card( // phpcs:ignore WordPress.Security.EscapeOutput
					get_the_ID(),
					array( 'variant' => $variant )
				);
			endwhile;
			?>
		</div>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
</div>
