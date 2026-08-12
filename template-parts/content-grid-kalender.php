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

		<!-- Filter Date -->
		<form method="POST" class="form-filter">
			<input type="text" id="datepicker" name="datepicker" class="input-filter" value="<?php _e('Filtern nach Tag','goldor'); ?>" onchange="form.submit();">
			<input type="button" id="dateeraser" name="dateeraser" class="button-filter" value="<?php _e('All','goldor'); ?>" onclick="getElementById('datepicker').value = ''; form.submit();">
		</form>

		<!-- Filter Category -->
		<?php
			$terms = get_terms($GLOBALS['posttype'] . '-kategorie', $args);
			if ( !empty($terms) ): ?>
				<form method="POST" class="form-filter">
					<select id="catpicker" name="catpicker" class="select-filter" oninput="form.submit();">
						<option <?php echo ( $_GET['catpicker'] ? "" : "selected" ); ?> disabled> <?php _e('Filter category','goldor'); ?></option>
							<?php
								foreach($terms as $term)
									echo "<option value='" . $term->term_id . "' " . ( $_GET['catpicker']==$term->term_id ? "selected" : "" ) . ">" . $term->name . "</option>";
							?>
					</select>
					<input type="button" id="cateraser" name="cateraser" class="button-filter" value="<?php _e('All','goldor'); ?>" onclick="getElementById('catpicker').value = ''; form.submit();">
				</form>
			<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="grid-container">

			<?php
				if ( isset( $_POST['catpicker'] ) && $_POST['catpicker'] != '' || isset( $_GET['catpicker']) && $_GET['catpicker'] != ''):
					if ( $_POST['catpicker'] ):
						$arg_term = $_POST['catpicker'];
					else:
						$arg_term = $_GET['catpicker'];
					endif;
				endif;

				$dateToday = date( "Ymd", current_time( 'timestamp', 0 ) );
				if ( isset( $_POST['datepicker'] ) && $_POST['datepicker'] != '' ):
					$date = date_format( date_create($_POST['datepicker']) ,"Ymd");

					if ($arg_term):
						//** Date + Cat ***************
						$args = array( 'post_type' => $GLOBALS['posttype'], 'posts_per_page' => 9, 'paged' => $paged,
											'meta_key' => 'startdatum', 'orderby' => 'meta_value', 'order' => 'ASC',
											'meta_query' => array(
												array( 'key' => 'startdatum', 'value' => $date, 'compare' => '<=', 'type' => 'NUMERIC' ),
												array( 'key' => 'enddatum', 'value' => $date, 'compare' => '>=', 'type' => 'NUMERIC' )
											),
											'tax_query' => array( array( 'taxonomy' => 'kalender-kategorie', 'field' => 'id', 'terms' => $arg_term ) ) );
					else:
						//** Date only ****************
						$args = array( 'post_type' => $GLOBALS['posttype'], 'posts_per_page' => 9, 'paged' => $paged,
											'meta_key' => 'startdatum', 'orderby' => 'meta_value', 'order' => 'ASC',
											'meta_query' => array(
												array( 'key' => 'startdatum', 'value' => $date, 'compare' => '<=', 'type' => 'NUMERIC' ),
												array( 'key' => 'enddatum', 'value' => $date, 'compare' => '>=', 'type' => 'NUMERIC' )
											) );
					endif;
				else:
					if ($arg_term):
						//** Cat only *****************
						$args = array( 'post_type' => $GLOBALS['posttype'], 'posts_per_page' => 9, 'paged' => $paged,
											'meta_key' => 'startdatum', 'orderby' => 'meta_value', 'order' => 'ASC',
											'tax_query' => array( array( 'taxonomy' => 'kalender-kategorie', 'field' => 'id', 'terms' => $arg_term ) ),
											'meta_query' => array( array( 'key' => 'enddatum', 'value' => $dateToday, 'compare' => '>=', 'type' => 'NUMERIC' ) )
										);
					else:
						//** none *********************
						$args = array( 'post_type' => $GLOBALS['posttype'], 'posts_per_page' => 9, 'paged' => $paged,
											'meta_key' => 'startdatum', 'orderby' => 'meta_value', 'order' => 'ASC',
											'meta_query' => array( array( 'key' => 'enddatum', 'value' => $dateToday, 'compare' => '>=', 'type' => 'NUMERIC' ) )
										 );
					endif;
				endif;

				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
			?>

			<div class="grid-item">
				<?php
					$thumb_id = get_post_thumbnail_id();
					$thumb_url = wp_get_attachment_image_src($thumb_id,'medium', true);
					$categories = get_the_category();
					$link = get_post_permalink();

					$ort = get_post_meta( get_the_ID(), 'ort', true);
					$dateStrStart = get_post_meta( get_the_ID(), 'startdatum', true);
					$dateStrEnd   = get_post_meta( get_the_ID(), 'enddatum', true);
					$myDateTimeStart = DateTime::createFromFormat('Ymd', $dateStrStart);
					$myDateTimeEnd   = DateTime::createFromFormat('Ymd', $dateStrEnd);
					$newDateStart = $myDateTimeStart->format('d.m.Y');
					if ( $myDateTimeEnd ): $newDateEnd = $myDateTimeEnd->format('d.m.Y'); endif;

				?>

				<div class="item-image" style="background-image:url(<?php echo $thumb_url[0]; ?>)" onclick="location.href='<?php echo $link; ?>'">
					<?php if ( ! empty( $categories ) ) {
							echo '<a class="item-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
					} ?>
				</div>
				<a href="<?php echo $link ?>"><h2><?php the_title() ?></h2></a>
				<p class="cal-item-meta"><?php echo $newDateStart; if( $newDateEnd ): echo " – " . $newDateEnd; endif; if( $ort ): echo " (" . $ort . ")"; endif;  ?></p>
				<p><?php echo substr( get_the_excerpt() ,0,75) ?>&#8239;.&#8239;.&#8239;.&nbsp;&nbsp;&nbsp;<a class="article-more" href="<?php echo get_post_permalink(); ?>"><?php _e('mehr','goldor'); ?></a></p>

			</div>
		<?php endwhile;	?>

		</div><!-- .grid-container -->

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'goldor' ),
				'after'  => '</div>',
			) );
		?>

		<div class="prev-next-posts">
			<?php $big = 999999999; // need an unlikely integer
			echo paginate_links( array(
					'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
					'format' => '?paged=%#%',
					'current' => max( 1, get_query_var('paged') ),
					'total' => $loop->max_num_pages
			) );  ?>
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

<script src="<?php bloginfo('stylesheet_directory'); ?>/js/Pikaday/pikaday.js"></script>
<script>
    var picker = new Pikaday({ field: document.getElementById('datepicker') });
		var datepicker = "<?php echo $_POST['datepicker'];?>";
		if( datepicker == '' || datepicker == 0){ datepicker = 'Filtern nach Tag'; }
		document.getElementById('datepicker').value = datepicker;
</script>
