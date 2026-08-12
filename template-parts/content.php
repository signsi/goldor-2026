<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package goldor
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( get_post_type() == 'kalender' ) :
			$ort = get_post_meta( get_the_ID(), 'ort', true);
			$dateStrStart = get_post_meta( get_the_ID(), 'startdatum', true);
			$dateStrEnd   = get_post_meta( get_the_ID(), 'enddatum', true);
			$myDateTimeStart = DateTime::createFromFormat('Ymd', $dateStrStart);
			$myDateTimeEnd   = DateTime::createFromFormat('Ymd', $dateStrEnd);
			$newDateStart = $myDateTimeStart->format('d.m.Y');
			if ( $myDateTimeEnd ): $newDateEnd = $myDateTimeEnd->format('d.m.Y'); endif;

			$titleBefore = '<h2 class="kalender-date">' . $newDateStart;
			if ( $newDateEnd ): $titleBefore .= ' – ' . $newDateEnd; endif;
			$titleBefore .= '</h2>';
		else :
			$titleBefore = "";
		endif;

		if ( is_single() ) :
			the_title( $titleBefore . '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif; ?>


		<div class="entry-header-sub">
			<?php if ( is_single() ) : echo get_the_post_thumbnail(); endif;

			if ( 'post' === get_post_type() || 'artikel' === get_post_type()) : ?>
				<div class="entry-meta">
					<?php goldor_posted_on(); ?>
				</div><!-- .entry-meta -->

			<?php	elseif ( 'lieferant' === get_post_type() ):
				$website = get_post_meta( get_the_ID(), 'website', true);
				$email = get_post_meta( get_the_ID(), 'email', true);
				$phone = get_post_meta( get_the_ID(), 'phone', true); ?>
				<div class="entry-meta">
					<?php echo "<a href='" . str_replace('http://http://','http://','http://'.$website) . "'>" . $website . "</a>&nbsp;&nbsp;&nbsp";
					echo "<a href='mailto:" . $email . "'>" . $email . "</a>&nbsp;&nbsp;&nbsp";
					echo "<span class='no-link'>" . $phone . "</span>"; ?>
				</div><!-- .entry-meta -->

			<?php elseif ( 'kalender' === get_post_type() ): ?>
				<div class="entry-meta">
					<a href="<?php echo get_template_directory_uri() . '/inc/ical.php?date=' . $newDateStart . '&amp;startTime=&amp;endTime=&amp;subject=' . get_the_title() . '&amp;desc=' . $desc ?>">Zu Outlook hinzufügen</a>
					&nbsp;&nbsp;&nbsp;<span class="no-link"><?php echo $ort; ?></span>
				</div><!-- .entry-meta -->
			<?php endif; ?>

		</div><!-- .entry-header-sub -->
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php

			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'goldor' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'goldor' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->


	<footer class="entry-footer">
		<?php //goldor_entry_footer(); ?>

		<div class="entry-meta">
			<?php the_tags( 'Tags: ', ', ', '<br />' ); ?>
		</div>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
