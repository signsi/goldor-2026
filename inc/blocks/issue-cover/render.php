<?php
/**
 * The newest magazin issue's cover as a small tilted print, for the Abo band —
 * it shows that the subscription is a printed magazine, not just a newsletter.
 *
 * @package goldor
 */

// WPML has to see this query, or the German band gets the French issue.
$latest = get_posts(
	array(
		'post_type'        => 'magazin',
		'posts_per_page'   => 1,
		'fields'           => 'ids',
		'suppress_filters' => false,
		'meta_query'       => array( array( 'key' => '_thumbnail_id', 'compare' => 'EXISTS' ) ),
	)
);

if ( ! $latest ) {
	return;
}

$issue_id = $latest[0];
?>
<a <?php echo get_block_wrapper_attributes( array( 'class' => 'issue-cover' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?> href="<?php echo esc_url( get_permalink( $issue_id ) ); ?>" tabindex="-1" aria-hidden="true">
	<?php echo get_the_post_thumbnail( $issue_id, 'medium', array( 'class' => 'issue-cover__img', 'alt' => '', 'loading' => 'lazy', 'sizes' => '92px' ) ); ?>
</a>
