<?php
/**
 * On single views only: a browser-back link plus a link to the post type's
 * archive.
 *
 * @package goldor
 */

if ( ! is_singular() ) {
	return;
}

$post_type = get_post_type();
$archive_link = 'post' === $post_type ? home_url( '/news' ) : get_post_type_archive_link( $post_type );

if ( ! $archive_link ) {
	return;
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'entry-nav' ) ); // phpcs:ignore ?>>
	<ul>
		<li><a href="#" onclick="window.history.go(-1); return false;"><?php esc_html_e( 'Zurück', 'goldor' ); ?></a></li>
		<li><a href="<?php echo esc_url( $archive_link ); ?>"><?php esc_html_e( 'All entries', 'goldor' ); ?></a></li>
	</ul>
</div>
