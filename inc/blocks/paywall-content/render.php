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
			<?php
			// goldor/entry-lead sets the opening paragraph above the hero image,
			// so the body picks up from the same split.
			list( $lead, $body ) = goldor_content_lead_and_body( $post_id );
			echo $lead
				? apply_filters( 'the_content', $body ) // phpcs:ignore WordPress.Security.EscapeOutput
				: apply_filters( 'the_content', get_the_content() ); // phpcs:ignore WordPress.Security.EscapeOutput
			?>
		</div>

	<?php else : ?>

		<p class="entry-cut">
			<?php
			list( , $teaser_body ) = goldor_content_lead_and_body( $post_id );
			echo esc_html( mb_substr( trim( wp_strip_all_tags( $teaser_body ) ), 0, 700 ) );
			?>&#8239;.&#8239;.&#8239;.
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
