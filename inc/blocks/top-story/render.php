<?php
/**
 * Homepage spotlight: the News/Artikel post flagged `topstory`.
 *
 * @package goldor
 */

$query = new WP_Query(
	array(
		'post_type'      => array( 'post', 'artikel' ),
		'posts_per_page' => 1,
		'no_found_rows'  => true,
		'meta_query'     => array( array( 'key' => 'topstory', 'value' => '1', 'compare' => '=' ) ),
	)
);

if ( ! $query->have_posts() ) {
	return;
}

$query->the_post();
$link = get_permalink();
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'top-story' ) ); // phpcs:ignore ?> onclick="location.href='<?php echo esc_js( $link ); ?>'">
	<div class="top-story-img">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'large' ); ?>
		<?php endif; ?>
	</div>
	<div class="top-story-text">
		<div class="top-story-title">
			<h1><a href="<?php echo esc_url( $link ); ?>"><?php the_title(); ?></a></h1>
		</div>
	</div>
</div>
<?php
wp_reset_postdata();
