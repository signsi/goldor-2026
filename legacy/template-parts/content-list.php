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
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content wiki">

		<?php
		$terms = get_terms($GLOBALS['posttype'] . '-kategorie', $args);

		if ( !empty($terms) ):

			foreach( $terms as $term ){
				$args = array(
					'post_type' => $GLOBALS['posttype'], 'numberposts' => -1,
					'orderby' => 'post_title', 'order' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => $GLOBALS['posttype'] . '-kategorie',
							'field' => 'id',
							'terms' => $term->term_id,
							'include_children' => false )
					)
				);
				$loop = new WP_Query( $args ); ?>
				<ul>
					<h2><?php echo $term->name; ?></h2>
					<?php
					if ( $GLOBALS['posttype'] === 'wiki' ) echo "<img class='item-image' src='http://studentprint.ch/files/orderpics/farbenr/hellgrau.png' >";
					while ( $loop->have_posts() ) : $loop->the_post();
						if( get_post_type() == 'link' ):
							$url = get_post_meta( get_the_ID(), 'url', true); ?>
							<li><a href="<?php echo str_replace('http://http://', 'http://', 'http://'.$url); ?>" target="_blank"><?php the_title(); ?></a></li>
						<?php else: ?>
							<li><a href="<?php echo get_post_permalink(); ?>"><?php the_title() ;?></a></li>
						<?php endif;
					endwhile; ?>
				</ul>
				<?php
			}

		else:
			$args = array( 'post_type' => $GLOBALS['posttype'], 'numberposts' => -1 );
			$loop = new WP_Query( $args ); ?>
			<ul>
				<h2><?php echo $term->name; ?></h2>
				<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<li><a href="<?php echo get_post_permalink(); ?>"><?php the_title() ;?></a></li>
				<?php endwhile; ?>
			</ul>
			<?php
		endif; ?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'goldor' ),
				'after'  => '</div>',
			) );
		?>
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
