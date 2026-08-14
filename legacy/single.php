<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package goldor
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			// show social links
			echo get_post_functions();

			get_template_part( 'template-parts/content', get_post_format() );

			?>

			<?php // If there are similarly tagged posts, show them
				$orig_post = $post;
				global $post;
				$tags = wp_get_post_tags($post->ID);

				if ( $tags ) {
					$tag_ids = array();
					foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
					$args=array(
						'post_type' => array( 'post', 'artikel' ),
						'tag__in' => $tag_ids,
						'post__not_in' => array($post->ID),
						'posts_per_page'=>3, // Number of related posts to display.
						'caller_get_posts'=>1
					);
					$my_query = new wp_query( $args );

					if ( $my_query->have_posts() ):
						echo "<h1 class='divide'>" . __('Verwandte Themen','goldor') . "</h1>";
						echo "<div class='post-related'>";
					endif;

					echo "<div class='grid-container'>";
					while( $my_query->have_posts() ) {
						$my_query->the_post();

						include( 'template-parts/grid-item.php' );

					}
					echo "</div><!-- .grid-container -->";
					if ( $my_query->have_posts() )
						echo "</div>";
				}
				$post = $orig_post;
				wp_reset_query();
			?>

			<?php // If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
