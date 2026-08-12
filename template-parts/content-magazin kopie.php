<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package goldor
 */

?>

<script type="text/javascript">
	function removeClassSingle(){
		alert(document.getElementById("body").className);
		document.getElementById("body").className = document.getElementById("body").className.replace("single ","");
	}
	window.onload = removeClassSingle();
</script>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
			the_title( '<h1 id="Cover Story" class="entry-title">', '</h1>' );
			//echo "<h1 class='sub-title'>Rubrik</h2>";

			global $magazineID;
			$magazineID = get_the_ID();
			$epaper = get_post_meta( $magazineID, 'epaper', true);
			$thumb_id = get_post_thumbnail_id();
			$epaper_thumb = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
		?>

		<div class="entry-header-sub">
		</div><!-- .entry-header-sub -->
	</header><!-- .entry-header -->

	<div class="magazine-content">
		<?php
				// COVER STORY
				//************
				$args = array( 'post_type' => 'artikel', 'numberposts' => 1,
					'tax_query' => array( array(
						'taxonomy' => 'artikel-kategorie', 'field' => 'id',
						'terms' => '7', 'include_children' => false ) ),
					'meta_query' => array( array(
						'key' => 'ausgabe', 'value' => $magazineID, 'compare' => 'LIKE' ) )
 				);

				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
					$categories = get_the_category();
					$link = get_post_permalink();
				?>

					<div class="magazine-coverstory">
						<img src="<?php echo $thumb_url[0]; ?>" />
					  <a href="<?php echo $link ?>"><h2><?php the_title() ;?></h2></a>
						<?php the_excerpt(); ?>
					</div>
					<div class="magazine-index">
						<ul>
							<?php $terms = get_terms('artikel-kategorie', '');
								foreach($terms as $term) echo "<li><a href='#" . $term->name . "'>" . $term->name . "</a></li>";
								if ( $epaper ) echo "<li><a href='#epaper'>E-Paper</a></li>"; ?>
						</ul>
					</div>

					<?php endwhile; ?>

					<?php
						// FOCUS
						//******
						$args = array( 'post_type' => 'artikel', 'numberposts' => 1,
										'tax_query' => array( array(
											'taxonomy' => 'artikel-kategorie', 'field' => 'name',
											'terms' => 'Focus', 'include_children' => false ) ),
										'meta_query' => array( array(
											'key' => 'ausgabe', 'value' => $magazineID, 'compare' => 'LIKE' ) )
								);
						$loopSub = new WP_Query( $args );

						if ( $loopSub->have_posts() ):
							echo "<h1 id='Focus' class='divide'>Focus</h1>";
							echo "<div class='grid-container'>";
							while ( $loopSub->have_posts() ) : $loopSub->the_post(); ?>
								<div class="grid-item">
								<?php
									$thumb_id = get_post_thumbnail_id();
									$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail-size', true);
									$categories = wp_get_post_terms( get_the_ID(), get_post_type() . '-kategorie', array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all') );
									$link = get_post_permalink();
								?>

									<div class="item-image" style="background-image:url(<?php echo $thumb_url[0]; ?>)" onclick="location.href='<?php echo $link; ?>'">
										<?php
											if ( ! empty( $categories ) ):
												echo '<a class="item-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
											endif;
											// Paywall (Artikel)
											$paywall = get_post_meta( get_the_ID(), 'paywall', true);
											if ( $paywall ): echo "<div class='item-paywall'>&nbsp;</div>"; endif;
										?>
									</div>
								</div>
							<?php endwhile; ?>
							<div class="grid-item-wide">
								<a href="<?php echo $link ?>"><h2><?php the_title(); ?></h2></a>
								<?php echo substr( wp_strip_all_tags(get_the_content()), 0, 500 ) ?>&#8239;.&#8239;.&#8239;.&nbsp;&nbsp;&nbsp;<a class="article-more" href="<?php echo get_post_permalink(); ?>"><?php _e('mehr','goldor'); ?></a>
							</div>
						</div><!-- .grid-container -->
						<?php endif;

						// ALLE KATEGORIEN
						//****************
						$terms = get_terms('artikel-kategorie', '');
						foreach($terms as $term){

							$args = array( 'post_type' => 'artikel', 'numberposts' => -1,
											'tax_query' => array( array(
												'taxonomy' => 'artikel-kategorie', 'field' => 'name',
												'terms' => $term->name, 'include_children' => false ) ),
											'meta_query' => array( array(
												'key' => 'ausgabe', 'value' => $magazineID, 'compare' => 'LIKE' ) )
					 				);
							$loopSub = new WP_Query( $args );

							if ( $loopSub->have_posts() && $term->name != 'Cover Story' && $term->name != 'Focus'):
								echo "<h1 id='" . $term->name . "' class='divide'>" . $term->name . "</h1>";
								echo "<div class='grid-container'>";

								while ( $loopSub->have_posts() ) : $loopSub->the_post();
									include( 'grid-item.php' );
								endwhile;

								echo "</div><!-- .grid-container -->";
							endif;

						}

						// Check if magazin has articles
						$args = array( 'post_type' => 'artikel', 'numberposts' => -1,
										'meta_query' => array( array( 'key' => 'ausgabe', 'value' => $magazineID, 'compare' => 'LIKE' ) )
								);
						$loopSub = new WP_Query( $args );

						if ( $loopSub->have_posts() ):
							// E-PAPER Rubrik
							//***************
							if ( $epaper ):
								echo "<h1 id='epaper' class='divide'>E-Paper</h1>"; ?>
								<div class="epaper">
									<div class='item-paywall'>&nbsp;</div>
									<?php
										$user = wp_get_current_user();

										if ( in_array( 'subscriber', (array) $user->roles ) || is_user_logged_in() ): ?>
											<a target="_blank" href="<?php echo $epaper ?>"><img class="item-image" src="<?php echo $epaper_thumb[0]; ?>"></a>
										<?php else: ?>
											<a href="#" onclick="alert('Das E-Paper ist kostenpflichtig. Abonnenten loggen sich bitte ein.')"><img class="item-image" src="<?php echo $epaper_thumb[0]; ?>"></a>
										<?php endif;
								 echo "</div>";
							endif;
						else:
							// E-PAPER Embedded
							//*****************
							if ( $epaper ):
								if ( in_array( 'subscriber', (array) $user->roles ) || !is_user_logged_in() ):
									echo "<div class='form-epaper'>";
									wp_login_form( $args );
									echo "</div>";
								else: ?>
									<div class="epaper">
										<iframe src="<?php echo $epaper; ?>" frameborder="0" allowfullscreen="true"  allowtransparency="true">
										</iframe>
									</div>
								<?php endif;
							endif;
						endif;



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
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
