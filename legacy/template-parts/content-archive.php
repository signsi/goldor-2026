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

	<div class="entry-content">

		<div class="grid-container">
			<?php while ( have_posts() ) : the_post(); ?>

			<div class="grid-item">
				<?php
					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
					$link = get_post_permalink();

					if ( get_post_type() === 'post' ):
						$categories = get_categories();
					elseif ( get_post_type() === 'artikel' ):
						$categories = wp_get_post_terms( get_the_ID(), get_post_type() . '-kategorie', array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all') );
					else:
						$categories = get_terms( get_post_type() . '-kategorie', $args);
					endif;
				?>

				<div class="item-image" style="background-image:url(<?php echo ($thumb_url[0]) ? $thumb_url[0] : ''; ?>)" onclick="location.href='<?php echo ($link) ? $link : ''; ?>'">
					<?php
						if ($GLOBALS['pagetype']==="search"):
							$post_type_obj = get_post_type_object( get_post_type() );
							$post_type_name = /*get_post_type()*/$post_type_obj->labels->singular_name;
							echo '<a class="item-category">' . /*get_post_type()*/ $post_type_name . '</a>';
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
				<a href="<?php echo $link ?>"><h2><?php the_title();?></h2></a>
				<!--<?php echo substr( wp_strip_all_tags(get_the_content()), 0, 500 ) ?>&#8239;.&#8239;.&#8239;.&nbsp;&nbsp;&nbsp;<a class="article-more" href="<?php echo get_post_permalink(); ?>"><?php _e('mehr','goldor'); ?></a>-->
				<?php the_excerpt(); ?></a>
			</div>

			<?php endwhile; ?>
		</div><!-- .grid-container -->

		<div class="prev-next-posts">
			<?php global $wp_query;
			$big = 999999999; // need an unlikely integer
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			) ); ?>
		</div>

	</div>

</article><!-- #post-## -->
