<?php
/**
 * "Weitere Artikel" — related entries as a hairline list with thumbnails,
 * matched on shared tags and falling back to the same section.
 *
 * @package goldor
 */

if ( ! in_the_loop() ) {
	the_post();
}

$post_id = get_the_ID();
$tags    = wp_get_post_tags( $post_id, array( 'fields' => 'ids' ) );

$args = array(
	'post_type'      => array( 'post', 'artikel' ),
	'post__not_in'   => array_merge( array( $post_id ), goldor_rendered_post_ids() ),
	'posts_per_page' => 3,
	'no_found_rows'  => true,
	'ignore_sticky_posts' => true,
);

$related = $tags ? new WP_Query( $args + array( 'tag__in' => $tags ) ) : null;
if ( ! $related || ! $related->have_posts() ) {
	$related = new WP_Query( $args );
}

if ( ! $related->have_posts() ) {
	return;
}
?>
<section <?php echo get_block_wrapper_attributes( array( 'class' => 'related-posts' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<h2 class="related-posts__title"><?php esc_html_e( 'Weitere Artikel', 'goldor' ); ?></h2>

	<ul class="related-posts__list">
		<?php
		while ( $related->have_posts() ) :
			$related->the_post();
			goldor_track_rendered_post( get_the_ID() );

			$terms = goldor_post_terms( get_the_ID() );
			$term  = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0] : null;
			?>
			<li class="related-posts__item">
				<a class="related-posts__media" href="<?php echo esc_url( get_permalink() ); ?>" tabindex="-1" aria-hidden="true">
					<?php
					$thumb_id = get_post_thumbnail_id();
					if ( $thumb_id ) {
						echo wp_get_attachment_image( $thumb_id, 'medium', false, array( 'alt' => '', 'loading' => 'lazy' ) );
					}
					?>
				</a>
				<div class="related-posts__body">
					<p class="related-posts__meta">
						<?php if ( $term ) : ?>
							<span class="related-posts__term"><?php echo esc_html( $term->name ); ?></span>
						<?php endif; ?>
						<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date( 'j. M Y' ) ); ?></time>
					</p>
					<h3 class="related-posts__heading">
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
					</h3>
				</div>
			</li>
			<?php
		endwhile;
		wp_reset_postdata();
		?>
	</ul>
</section>
