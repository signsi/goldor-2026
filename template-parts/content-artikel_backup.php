<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package goldor
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php	the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-header-sub">
			<?php echo get_the_post_thumbnail(); ?>
				<div class="entry-meta">
					<?php goldor_posted_on(); ?>
				</div><!-- .entry-meta -->
		</div><!-- .entry-header-sub -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			// PAYWALL
			$user = wp_get_current_user();
			$paywall = get_post_meta( get_the_ID(), 'paywall', true);
			$paywall_passed = false;

			if ( is_user_logged_in() || !$paywall ) {

				$paywall_passed = true;
				/* Show all. */
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'goldor' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				/* Show Author */ ?>
				<div class="entry-author"><a href="<?php echo get_author_posts_url( get_the_author_meta('ID'), get_the_author_meta('user_nicename') ); ?>">
					<?php
						echo get_avatar( get_the_author_meta('ID'), 60);
						echo "<p>" . get_the_author() . "</p>";
					?>
				</a></div><!-- .entry-author -->

			<?php } else {

				/* Show only 700 characters and registration form. */
				echo "<p class='entry-cut'>";
					echo substr( wp_strip_all_tags(get_the_content(),false) , 0, 700) . "&#8239;.&#8239;.&#8239;. <span class='entry-cut-info'><a href='goldor-bestellen'>   " . _e('werden Sie Abonnent, um weiterzulesen.','goldor') . " </a></span>";
				echo "</p>"; ?>

				<?php if ( get_post_type() == 'artikel' && is_single() ): ?>

					<div id="login-form">
						<h1><?php _e('Loggen Sie sich bitte ein','goldor'); ?></h1>
						<?php wp_login_form( $args ); ?>
						<?php if(ICL_LANGUAGE_CODE=='de'): ?>
								<p class="text-small">Falls Sie kein Goldor-Abonnement besitzen, <br>können Sie <a href="goldor-bestellen">hier Abonnent werden</a>.</p>
						<?php else: ?>
								<p class="text-small">Si vous n'avez pas d'abonnement Gold'Or, <br>vous pouvez vous <a href="goldor-bestellen">abonner ici</a>.</p>
						<?php endif; ?>
					</div>

				<?php endif;
			}

			/*the_content( sprintf(
				/* translators: %s: Name of current post. */
				/*wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'goldor' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );*/

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'goldor' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


	<footer class="entry-footer">
		<?php //goldor_entry_footer(); ?>

		<?php if ( $paywall_passed ):  ?>
			<div class="entry-meta">
				<?php the_tags( 'Tags: ', ', ', '<br />' ); ?>
			</div>
		<?php endif; ?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
