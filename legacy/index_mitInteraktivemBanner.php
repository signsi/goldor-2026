<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package goldor
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<div class="grid-container">
				<?php
					// Werbung 300x250 News
					$argsWerbung = array(
						'post_type' => 'werbung', 'posts_per_page' => 1, 'meta_query' => array(
							array( 'key' => 'Typ', 'value' => 'MediumRectangle News', 'compare' => '==' ),
							array( 'key' => 'aktiv', 'value' => '1', 'compare' => '==' ) )
					);
					$loopWerbung = new WP_Query( $argsWerbung );
					// Werbung 300x250 Stellen
					$argsWerbungStellen = array(
						'post_type' => 'werbung', 'posts_per_page' => 1, 'meta_query' => array(
							array( 'key' => 'Typ', 'value' => 'MediumRectangle Stellengesuche', 'compare' => '==' ),
							array( 'key' => 'aktiv', 'value' => '1', 'compare' => '==' ) )
					);
					$loopWerbungStellen = new WP_Query( $argsWerbungStellen );

					// Posts
					$args = array(
						'post_type' => 'post', 'posts_per_page' => 3, 'meta_query' => array(
							array( 'key' => 'topstory', 'value' => '1', 'compare' => '!=' )	)
					);
					if ( $loopWerbung->have_posts() ):
						$args = array(
							'post_type' => 'post', 'posts_per_page' => 2, 'meta_query' => array(
								array( 'key' => 'topstory', 'value' => '1', 'compare' => '!=' )	)
						);
					endif;
					$loop = new WP_Query( $args );

					// Show Posts
					while ( $loop->have_posts() ) : $loop->the_post();
						include( 'template-parts/grid-item.php' );
					endwhile;

					// Show Werbung 300x250 News
					$loop = $loopWerbung;
					while ( $loop->have_posts() ) : $loop->the_post();
						$thumb_id = get_post_meta( get_the_ID(), 'werbemittel', true);
						$thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
						$link = get_post_meta( get_the_ID(), 'url', true); ?>
						<div class="grid-item">
							<a href="<?php echo str_replace('http://http://','http://','http://'.$link); ?>" target="_blank"><img class="ad-news" width="300" height="250" class="ad" src="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" class="item-image"></a>
						</div>
					<?php endwhile; ?>
			</div><!-- .grid-container -->


			<!-- MAGAZIN -->
			<h1 class="divide"><?php _e('Magazin','goldor'); ?></h1>
			<div class="grid-container">
				<?php
					$args = array(
						'post_type' => 'artikel', 'posts_per_page' => 3, 'meta_query' => array(
							array( 'key' => 'topstory', 'value' => '1', 'compare' => '!=' ) )
					);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						include( 'template-parts/grid-item.php' );
					endwhile;	?>
			</div><!-- .grid-container -->


			<!-- JOBS & MARKT -->
			<h1 class="divide"><?php _e('Jobs & Markt','goldor'); ?></h1>
			<div class="grid-container">
				<div class="grid-item">
					<h2><?php _e('Stellenangebote', 'goldor'); ?></h2>
					<?php
						$category = get_term_by('name', 'stellenangebot', 'job-kategorie');
						//$category = get_term_by('name', 'offre-emploi', 'job-kategorie');

						$args = array( 'post_type' => 'job', 'posts_per_page' => 6, 'tax_query' => array(
								    array( 'taxonomy' => 'job-kategorie', 'field' => 'id',
									  'terms' => $category->term_id, 'include_children' => false ) ) );
						$loop = new WP_Query( $args );

						while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<div class="list-item">
								<p class="list-item-date"><?php echo get_the_date('d.m.Y'); ?></p>
								<a href="<?php echo get_post_permalink(); ?>"><?php the_title(); //the_excerpt(); ?></a>
							</div>
					<?php endwhile; ?>
					<!-- Debug -->
					<?php // echo $loop->request; ?>
					<?php // echo $loop->have_posts(); ?>
					<a href="jobs/stelleninserate?filterselect=<?php echo $category->term_id ?>" class="list-more"><?php _e('All entries','goldor'); ?></a>
				</div>

				<?php if ( !$loopWerbungStellen->have_posts() ):
					// Show Stellengesuche ?>
					<div class="grid-item">
						<h2><?php _e('Stellengesuche','goldor'); ?></h2>
						<?php
							$category = get_term_by('name', 'stellengesuch', 'job-kategorie');
							$args = array( 'post_type' => 'job', 'posts_per_page' => 6, 'tax_query' => array(
									    array( 'taxonomy' => 'job-kategorie', 'field' => 'id',
										  'terms' => $category->term_id, 'include_children' => false ) ) );
							$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post(); ?>
								<div class="list-item">
									<p class="list-item-date"><?php echo get_the_date('d.m.Y'); ?></p>
									<a href="<?php echo get_post_permalink(); ?>"><?php the_title(); //the_excerpt(); ?></a>
								</div>
						<?php endwhile; ?>
						<a href="jobs/stelleninserate?filterselect=<?php echo $category->term_id ?>" class="list-more"><?php _e('All entries','goldor'); ?></a>
					</div>
				<?php else:
					// Show Werbung 300x250 Stellen
					$loop = $loopWerbungStellen;
					while ( $loop->have_posts() ) : $loop->the_post();
						$thumb_id = get_post_meta( get_the_ID(), 'werbemittel', true);
						$thumb_url = wp_get_attachment_image_src( $thumb_id, 'full' );
						$link = get_post_meta( get_the_ID(), 'url', true); ?>
						<div class="grid-item">

							<!--
							STANDARD REMOVED
							<a href="<?php echo str_replace('http://http://','http://','http://'.$link); ?>" target="_blank"><img class="ad-stellen" width="300" height="250" class="ad" src="<?php echo $thumb_url[0]; ?>" title="<?php the_title(); ?>" class="item-image"></a>
							-->

							<!--
							FROM CLIENT
							-->

									<iframe id="skyscraperAd" src="https://www.goldor.ch/wp-content/themes/goldor/index_ad/2021_ODays_Banner_300x250.html" width="300" height="250" frameborder="0"></iframe>
							
							<!--
							END FROM CLIENT
							-->


						</div>
					<?php endwhile;
				endif; ?>


				<div class="grid-item">
					<h2><?php _e('Marktplatz','goldor'); ?></h2>
					<?php
						$args = array( 'post_type' => 'kleinanzeige', 'posts_per_page' => 6 );
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<div class="list-item">
								<p class="list-item-date"><?php echo get_the_date('d.m.Y'); ?></p>
								<a href="<?php echo get_post_permalink(); ?>"><?php the_title(); //the_excerpt(); ?></a>
							</div>
					<?php endwhile;	?>
					<a href="marktplatz/anzeigen" class="list-more"><?php _e('All entries','goldor'); ?></a>
				</div>
			</div><!-- .grid-container -->


			<!-- BRANCHE -->
			<h1 class="divide"><?php _e('Branche','goldor'); ?></h1>
			<div class="grid-container">
				<?php
				$has_vsgu = false;
				$argsVSGU = array( 'post_type' => 'vsgu-news', 'posts_per_page' 	=> 1, 'meta_query' => array( array( 'key' => 'topentry', 'value' => '1', 'compare' => '==' ) ) );
				$loopVSGU = new WP_Query( $argsVSGU );
				while ( $loopVSGU->have_posts() ) : $loopVSGU->the_post();
					$thumb_id = get_post_thumbnail_id(); $thumb_url = wp_get_attachment_image_src($thumb_id, 'medium', true); $link = get_post_permalink();
					$categories = wp_get_post_terms( get_the_ID(), get_post_type() . '-kategorie', array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all') ); ?>
					<div class="grid-item">
						<div class="item-image" style="background-image:url(<?php echo $thumb_url[0]; ?>)" onclick="location.href='<?php echo $link; ?>'">
							<?php if ( ! empty( $categories ) ): echo '<a class="item-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>'; endif; ?>
						</div>
						<a href="<?php echo $link; ?>"><h2><?php the_title(); ?></h2></a>
						<?php the_excerpt(); ?>
						<a href="personen/" class="list-more"><?php _e('All entries','goldor'); ?></a>
					</div>
					<?php $has_vsgu = true;
				endwhile;

				if( $has_vsgu ): $args = array( 'post_type' => array( 'kalender' ), 'posts_per_page' 	=> 1, 'meta_query' => array( array( 'key' => 'topentry', 'value' => '1', 'compare' => '==' ) ) );
				else: $args = array( 'post_type' => array( 'lieferant', 'kalender' ), 'posts_per_page' 	=> 2, 'meta_query' => array( array( 'key' => 'topentry', 'value' => '1', 'compare' => '==' ) ) );
				endif;
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
					include( 'template-parts/grid-item.php' );
				endwhile;	?>

				<div class="grid-item">
					<h2><?php _e('Kalender','goldor'); ?></h2>
					<?php
						$dateToday = date( "Ymd", current_time( 'timestamp', 0 ) );
						$args = array( 'post_type' => 'kalender', 'posts_per_page' => 3,
							'meta_key' => 'startdatum', 'orderby' => 'meta_value', 'order' => 'ASC',
							'meta_query' => array( array( 'key' => 'enddatum', 'value' => $dateToday, 'compare' => '>=', 'type' => 'NUMERIC' ) )
						);

						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post();
							$ort = get_post_meta( get_the_ID(), 'ort', true);
							$dateStrStart = get_post_meta( get_the_ID(), 'startdatum', true);
							$dateStrEnd   = get_post_meta( get_the_ID(), 'enddatum', true);
							$myDateTimeStart = DateTime::createFromFormat('Ymd', $dateStrStart);
							$myDateTimeEnd   = DateTime::createFromFormat('Ymd', $dateStrEnd);
							$newDateStart = $myDateTimeStart->format('d.m.Y');
							if ( $myDateTimeEnd ): $newDateEnd = $myDateTimeEnd->format('d.m.Y'); endif;
							?>

							<div class="list-item">
								<a class="cal-item-title" href="<?php echo get_post_permalink(); ?>"><?php the_title(); ?></a>
								<p class="cal-item-meta"><?php echo $newDateStart; if( $newDateEnd ): echo " – " . $newDateEnd; endif; if( $ort ): echo " (" . $ort . ")"; endif;  ?></p>
								<p><?php echo substr( get_the_excerpt() ,0,75) ?>&#8239;.&#8239;.&#8239;.&nbsp;&nbsp;&nbsp;<a class="article-more" href="<?php echo get_post_permalink(); ?>"><?php _e('mehr','goldor'); ?></a></p>
							</div>
					<?php endwhile;	?>
					<a href="branche/kalender/" class="list-more"><?php _e('All entries','goldor'); ?></a>
				</div>
			</div><!-- .grid-container -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
