<?php
/**
 * Template part for displaying grid content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package goldor
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			//the_title( '<h1 class="entry-title">', '</h1>' );
			echo '<h1 class="entry-title">Archiv</h1>';
			$terms = get_terms($GLOBALS['posttype'] . '-kategorie', $args);
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="grid-container">
			<?php
				$args = array( 'post_type' => $GLOBALS['posttype'], 'posts_per_page' => 9, 'paged' => $paged );
				$loop = new WP_Query( $args );
				// Pagination fix
				$temp_query = $wp_query;
				$wp_query   = NULL;
				$wp_query   = $loop;

				while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<div class="grid-item magazine">
						<?php
							$thumb_id = get_post_thumbnail_id();
							$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
							$link = get_post_permalink();

							if ( get_post_type() === 'post' ):
								$categories = get_categories();
							else:
								$categories = get_terms( get_post_type() . '-kategorie', $args);
							endif;
						?>

						<div class="item-image" style="background-image:url(<?php echo ($thumb_url[0]) ? $thumb_url[0] : ''; ?>)" onclick="location.href='<?php echo ($link) ? $link : ''; ?>'">
							<?php
								if ($GLOBALS['pagetype']==="search"):
									echo '<a class="item-category">' . get_post_type() . '</a>';
								else:
									if ( !empty($categories) && !is_wp_error($categories) ):
										echo '<a class="item-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
									endif;
								endif;

								if ( get_post_type() === 'artikel' ):
									// Paywall (Artikel)
									$paywall = get_post_meta( get_the_ID(), 'paywall', true);
									if ( $paywall ): echo "<div class='item-paywall'>&nbsp;</div>"; endif;
								endif;
							?>
						</div>
					</div>

					<div class="grid-item-wide">
						<a href="<?php echo $link; ?>"><h2><?php the_title(); ?></h2></a>
						<?php echo substr( get_the_excerpt(), 0, 500 ); ?>&#8239;.&#8239;.&#8239;.&nbsp;&nbsp;&nbsp;<a class="article-more" href="<?php echo get_post_permalink(); ?>">mehr</a>
					</div>

				<?php endwhile;	?>
		</div><!-- .grid-container -->

		<div class="prev-next-posts">
			<?php $big = 999999999; // need an unlikely integer
		 	echo paginate_links( array(
			    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
			    'format' => '?paged=%#%',
			    'current' => max( 1, get_query_var('paged') ),
			    'total' => $loop->max_num_pages
			) );

			// Reset main query object
			$wp_query = NULL;
			$wp_query = $temp_query; ?>
		</div>

	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'goldor' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
