<?php
/**
 * Renders full artikel content for subscribers/logged-in users, or a
 * 700-character teaser plus a login form for everyone else.
 *
 * @package goldor
 */

if ( ! in_the_loop() ) {
	the_post();
}

$post_id = get_the_ID();
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore ?>>
	<?php if ( goldor_block_should_show_article_full_content( $post_id ) ) : ?>

		<div class="entry-content-full">
			<?php the_content(); ?>
		</div>

		<div class="entry-author">
			<a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
				<p><?php the_author(); ?></p>
			</a>
		</div>

	<?php else : ?>

		<p class="entry-cut">
			<?php echo esc_html( substr( wp_strip_all_tags( get_the_content() ), 0, 700 ) ); ?>&#8239;.&#8239;.&#8239;.
			<span class="entry-cut-info">
				<a href="<?php echo esc_url( home_url( '/goldor-bestellen' ) ); ?>">
					<?php esc_html_e( 'werden Sie Abonnent, um weiterzulesen.', 'goldor' ); ?>
				</a>
			</span>
		</p>

		<div id="login-form">
			<h1><?php esc_html_e( 'Loggen Sie sich bitte ein', 'goldor' ); ?></h1>
			<?php wp_login_form(); ?>
			<?php if ( 'de' === goldor_current_language() ) : ?>
				<p class="text-small">
					Falls Sie kein Goldor-Abonnement besitzen, <br>können Sie
					<a href="<?php echo esc_url( home_url( '/goldor-bestellen' ) ); ?>">hier Abonnent werden</a>.
				</p>
			<?php else : ?>
				<p class="text-small">
					Si vous n'avez pas d'abonnement Gold'Or, <br>vous pouvez vous
					<a href="<?php echo esc_url( home_url( '/goldor-bestellen' ) ); ?>">abonner ici</a>.
				</p>
			<?php endif; ?>
		</div>

	<?php endif; ?>

	<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'goldor' ), 'after' => '</div>' ) ); ?>
</div>
