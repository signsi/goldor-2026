<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package goldor
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php
					global $posttype;
					$posttype = 'artikel';
					get_template_part( 'template-parts/content', 'grid' );
				?>

			</main><!-- #main -->
		</div><!-- #primary -->

<?php
get_footer();
