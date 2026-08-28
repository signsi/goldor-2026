<?php
/**
 * About-the-author panel.
 *
 * The eyebrow is gendered in German. WordPress stores no such field, so it
 * defaults to a neutral phrase and editors can set `goldor_author_label` on a
 * user (e.g. "Über die Autorin") to override it per person.
 *
 * @package goldor
 */

$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
if ( ! $post_id ) {
	return;
}

$author_id = (int) get_post_field( 'post_author', $post_id );
if ( ! $author_id ) {
	return;
}

$name = get_the_author_meta( 'display_name', $author_id );
$bio  = get_the_author_meta( 'description', $author_id );
$label = get_user_meta( $author_id, 'goldor_author_label', true );
if ( ! $label ) {
	$label = __( 'Über die Autorschaft', 'goldor' );
}
?>
<aside <?php echo get_block_wrapper_attributes( array( 'class' => 'author-box' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<div class="author-box__avatar"><?php echo get_avatar( $author_id, 128 ); ?></div>

	<div class="author-box__body">
		<p class="author-box__label"><?php echo esc_html( $label ); ?></p>
		<p class="author-box__name"><?php echo esc_html( $name ); ?></p>
		<?php if ( $bio ) : ?>
			<p class="author-box__bio"><?php echo esc_html( $bio ); ?></p>
		<?php endif; ?>
		<a class="author-box__link" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>">
			<?php
			/* translators: %s: author display name. */
			printf( esc_html__( 'Alle Beiträge von %s', 'goldor' ), esc_html( $name ) );
			?>
		</a>
	</div>
</aside>
