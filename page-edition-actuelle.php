	<?php
/**
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package goldor
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
				$args = array( 'post_type' => 'magazin', 'numberposts' => 1,
          'post_status' => 'publish', 'orderby' => 'date', 'order' => 'DESC'
				);
				$loop = new WP_Query( $args );
				if ( $loop->have_posts() ) : $loop->the_post();
					get_template_part( 'template-parts/content', 'magazin' );
				endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
