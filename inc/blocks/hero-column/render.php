<?php
/**
 * The column beside the top story: what the editors set under Startseite (see
 * inc/startseite.php), either a Halfpage ad or a card and two list rows.
 *
 * @package goldor
 */

$wrapper = get_block_wrapper_attributes( array( 'class' => 'hero-column' ) );

if ( goldor_home_column_shows_ad() ) {
	printf( '<div %s>', $wrapper ); // phpcs:ignore WordPress.Security.EscapeOutput
	echo render_block( // phpcs:ignore WordPress.Security.EscapeOutput
		array(
			'blockName' => 'goldor/ad-slot',
			'attrs'     => array( 'type' => 'Halfpage' ),
		)
	);
	echo '</div>';
	return;
}

$posts = goldor_home_column_posts();
if ( ! $posts ) {
	return;
}

$lead = array_shift( $posts );
?>
<div <?php echo $wrapper; // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<div class="section-picks">
		<div class="grid-container">
			<?php echo goldor_render_story_card( $lead, array( 'variant' => 'compact' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
		</div>
	</div>

	<?php if ( $posts ) : ?>
		<div class="section-picks">
			<ul class="entry-list">
				<?php
				foreach ( $posts as $post_id ) :
					goldor_track_rendered_post( $post_id );
					$author = goldor_shows_author( $post_id ) ? get_the_author_meta( 'display_name', (int) get_post_field( 'post_author', $post_id ) ) : '';
					?>
					<li class="entry-list__item list-item">
						<a class="entry-list__title" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a>
						<p class="entry-list__meta list-item-date">
							<?php if ( $author ) : ?>
								<span class="entry-list__source"><?php echo esc_html( $author ); ?></span>
							<?php endif; ?>
							<time datetime="<?php echo esc_attr( get_the_date( 'c', $post_id ) ); ?>"><?php echo esc_html( get_the_date( 'd.m.y', $post_id ) ); ?></time>
						</p>
					</li>
				<?php endforeach; ?>
			</ul>
			<a href="<?php echo esc_url( '/news/' ); ?>" class="list-more"><?php esc_html_e( 'Alle News', 'goldor' ); ?></a>
		</div>
	<?php endif; ?>
</div>
