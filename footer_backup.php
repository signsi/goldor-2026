<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package goldor
 */

?>

	</div><!-- #content -->

	<?php // Werbung 160x600
	$args = array(
		'post_type' => 'werbung', 'posts_per_page' => 1, 'meta_query' => array(
			array( 'key' => 'Typ', 'value' => 'Skyscraper', 'compare' => '==' ),
			array( 'key' => 'aktiv', 'value' => '1', 'compare' => '==' ) )
	);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$thumb_id = get_post_meta( get_the_ID(), 'werbemittel', true);
		$thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
		$link = get_post_meta( get_the_ID(), 'url', true); ?>
		<div class="skyscraper">
			<a href="<?php echo str_replace('http://http://','http://','http://'.$link); ?>" target="_blank"><img width="160" height="600" class="ad" src="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" class="item-image"></a>
		</div>
	<?php endwhile;

	// Werbung 728x90
	$args = array(
		'post_type' => 'werbung', 'posts_per_page' => 1, 'meta_query' => array(
			array( 'key' => 'Typ', 'value' => 'Leaderboard', 'compare' => '==' ),
			array( 'key' => 'aktiv', 'value' => '1', 'compare' => '==' ) )
	);
	$loop = new WP_Query( $args );
	while ( $loop->have_posts() ) : $loop->the_post();
		$thumb_id = get_post_meta( get_the_ID(), 'werbemittel', true);
		$thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
		$link = get_post_meta( get_the_ID(), 'url', true); ?>
		<div class="leaderboard">
			<a href="<?php echo str_replace('http://http://','http://','http://'.$link); ?>" target="_blank"><img width="728" height="90" class="ad" src="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" class="item-image"></a>
		</div>
	<?php endwhile; ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-social">
			<a href="https://www.facebook.com/goldormagazin/" title="Goldor auf Facebook" target="_blank"><?php include("img/Social-Facebook.svg"); ?></a>
			<a href="https://twitter.com/Goldormagazin" title="Goldor auf Twitter" target="_blank"><?php include("img/Social-Twitter.svg"); ?></a>
			<a href="https://www.youtube.com/channel/UCtsUXjKW0L8_onO5TuBnUvg" title="Goldor auf Youtube" target="_blank"><?php include("img/Social-Youtube.svg"); ?></a>
		</div>

		<div class="site-info">
			<div class="newsletter">
				<p><strong><?php _e('Newsletter abonnieren','goldor'); ?></strong></p>
				<?php
					if(ICL_LANGUAGE_CODE=='de'):
						echo do_shortcode("[ninja_form id=10]");
					else:
						echo do_shortcode("[ninja_form id=11]");
					endif;
				?>
			</div>

			<?php wp_nav_menu( array( 'theme_location' => 'secondary', 'menu_class' => 'sub-navigation', 'after' => '' ) ); ?>

			<div class="footer-logo"><?php include("img/Logo-Goldor-Footer.svg"); ?></div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
