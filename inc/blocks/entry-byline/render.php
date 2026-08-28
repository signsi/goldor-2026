<?php
/**
 * Author and date on the left, article actions on the right.
 *
 * @package goldor
 */

$post_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
if ( ! $post_id ) {
	return;
}

$author_id = (int) get_post_field( 'post_author', $post_id );
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'entry-byline' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<div class="entry-byline__who">
		<?php if ( $author_id ) : ?>
			<a class="entry-byline__author" href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>">
				<?php echo esc_html( get_the_author_meta( 'display_name', $author_id ) ); ?>
			</a>
		<?php endif; ?>
		<time class="entry-byline__date" datetime="<?php echo esc_attr( get_the_date( 'c', $post_id ) ); ?>">
			<?php echo esc_html( get_the_date( 'j. F Y', $post_id ) ); ?>
		</time>
	</div>

	<div class="entry-byline__actions">
		<button type="button" class="entry-action" data-goldor-share
			data-title="<?php echo esc_attr( get_the_title( $post_id ) ); ?>"
			data-url="<?php echo esc_url( get_permalink( $post_id ) ); ?>"
			data-copied="<?php esc_attr_e( 'Link kopiert', 'goldor' ); ?>">
			<?php esc_html_e( 'Teilen', 'goldor' ); ?>
		</button>
		<button type="button" class="entry-action" data-goldor-print>
			<?php esc_html_e( 'Drucken', 'goldor' ); ?>
		</button>
	</div>
</div>
