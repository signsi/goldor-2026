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
			if ( $GLOBALS['posttype'] === 'artikel' ):
				echo '<h1 class="entry-title">' . __('Artikel','goldor') . '</h1>';
			elseif ( $GLOBALS['posttype'] === 'vsgu-news' ):
				echo '<h1 class="entry-title">' . __('Personen','goldor') . '</h1>';
			else:
				$string = str_replace(" - Gold&#039;Or", "", wp_title('', false, 'right'));
				echo '<h1 class="entry-title">' . $string . '</h1>';
			endif;

			if ( $GLOBALS['posttype'] === 'post' ):
				$terms = get_categories();
			else:
				$terms = get_terms($GLOBALS['posttype'] . '-kategorie', $args);
			endif;


			if (!empty($terms)):
				if ($GLOBALS['posttype'] === 'wiki' || $GLOBALS['posttype'] === 'lieferant'): ?>
					<form method="POST" class="form-filter">
						<?php
						foreach ($terms as $term) {
							echo "<button name='filterselect' type='submit' value='" . $term->term_id . "' " . (isset($_POST['filterselect']) && $_POST['filterselect'] == $term->term_id ? "class='selected'" : "") . ">" . $term->name . "</button>";
						}
						?>
						<input type="submit" id="filtereraser" name="filtereraser" class="button-filter" value="<?php _e('All', 'goldor'); ?>" onclick="getElementById('filterselect').value = ''; form.submit();">
					</form>
				<?php
				else: ?>
					<form method="GET" class="form-filter">
						<select id="filterselect" name="filterselect" class="select-filter" oninput="form.submit();">
							<option <?php echo (empty($_GET['filterselect']) ? "selected" : ""); ?> disabled><?php _e('Filter entries', 'goldor'); ?></option>
							<?php
							foreach ($terms as $term) {
								echo "<option value='" . $term->term_id . "' " . (isset($_GET['filterselect']) && $_GET['filterselect'] == $term->term_id ? "selected" : "") . ">" . $term->name . "</option>";
							}
							?>
						</select>
						<input type="button" id="filtereraser" name="filtereraser" class="button-filter" value="<?php _e('All', 'goldor'); ?>" onclick="getElementById('filterselect').value = ''; form.submit();">
					</form>
				<?php
				endif;
			endif;


			?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="grid-container">

			<?php
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				if ( $GLOBALS['posttype'] === 'lieferant' ):
						$posts_per_page = 16;
				else:
						$posts_per_page = 9;
				endif;

				if ( isset( $_POST['filterselect'] ) && $_POST['filterselect'] != '' || isset( $_GET['filterselect']) && $_GET['filterselect'] != ''):
					if ( $_POST['filterselect'] ):
						$arg_term = $_POST['filterselect'];
					else:
						$arg_term = $_GET['filterselect'];
					endif;

					if ( $GLOBALS['posttype'] === 'post' ):
						$args = array( 'post_type' => $GLOBALS['posttype'], 'posts_per_page' => $posts_per_page, 'paged' => $paged, 'cat' =>  $arg_term );
					else:
						$args = array( 'post_type' => $GLOBALS['posttype'], 'posts_per_page' => $posts_per_page, 'paged' => $paged,
													'tax_query' => array( array(
													'taxonomy' => $GLOBALS['posttype'] . '-kategorie',
												  'field' => 'id', 'terms' => $arg_term,
													'include_children' => false ) )
						);
					endif;

				else:
					$args = array( 'post_type' => $GLOBALS['posttype'], 'posts_per_page' => $posts_per_page, 'paged' => $paged );
				endif;

				$loop = new WP_Query( $args );
				// Pagination fix
				$temp_query = $wp_query;
				$wp_query   = NULL;
				$wp_query   = $loop;

				while ( $loop->have_posts() ) : $loop->the_post();
					include( 'grid-item.php' );
				endwhile;
			?>

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
