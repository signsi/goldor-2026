<?php
/**
 * Everyone who writes for the magazine: portrait, name, short bio and a link
 * to their profile.
 *
 * Only accounts with published articles appear, so subscribers and advertisers
 * stay out. Technical and sponsored accounts publish too, but are not people
 * readers follow; `goldor_author_index_exclude` lists them by nicename.
 *
 * Sorted by surname, because "Prof. Dr. Henry A. Hänni" belongs under H.
 *
 * @package goldor
 */

$post_types = array( 'post', 'artikel' );
$exclude    = apply_filters( 'goldor_author_index_exclude', array( 'admin', 'goldor-admin', 'publireportage' ) );

$authors = get_users(
	array(
		'has_published_posts' => $post_types,
		'nicename__not_in'    => $exclude,
	)
);

if ( ! $authors ) {
	return;
}

$sort_key = function ( $user ) {
	$last = get_user_meta( $user->ID, 'last_name', true );
	if ( ! $last ) {
		$parts = preg_split( '/\s+/', trim( $user->display_name ) );
		$last  = end( $parts );
	}
	return remove_accents( $last . ' ' . $user->display_name );
};
usort(
	$authors,
	function ( $a, $b ) use ( $sort_key ) {
		return strcasecmp( $sort_key( $a ), $sort_key( $b ) );
	}
);
?>
<ul <?php echo get_block_wrapper_attributes( array( 'class' => 'author-index' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php
	foreach ( $authors as $author ) :
		$url   = get_author_posts_url( $author->ID );
		$bio   = trim( wp_strip_all_tags( get_the_author_meta( 'description', $author->ID ) ) );
		$count = (int) count_user_posts( $author->ID, $post_types, true );
		?>
		<li class="author-index__item">
			<a class="author-index__avatar" href="<?php echo esc_url( $url ); ?>" tabindex="-1" aria-hidden="true">
				<?php echo get_avatar( $author->ID, 192, '', '' ); ?>
			</a>
			<div class="author-index__body">
				<h2 class="author-index__name">
					<a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $author->display_name ); ?></a>
				</h2>
				<p class="author-index__count">
					<?php
					/* translators: %s: number of articles. */
					echo esc_html( sprintf( _n( '%s Beitrag', '%s Beiträge', $count, 'goldor' ), number_format_i18n( $count ) ) );
					?>
				</p>
				<?php if ( $bio ) : ?>
					<p class="author-index__bio"><?php echo esc_html( $bio ); ?></p>
				<?php endif; ?>
			</div>
		</li>
	<?php endforeach; ?>
</ul>
