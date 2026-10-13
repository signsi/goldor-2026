<?php
/**
 * A `magazin` issue set as a run of full-bleed bands: the issue head with
 * the cover story and a table of contents beside it, one band per
 * artikel-kategorie (Focus first), then the gated e-paper. Articles belong to
 * an issue via their own `ausgabe` meta (the magazin post ID).
 *
 * The block owns the whole page body — head included — so the "Aktuelle
 * Ausgabe" page and the single issue view open the same way.
 *
 * @package goldor
 */

$source = isset( $attributes['source'] ) ? $attributes['source'] : 'post';

if ( 'latest' === $source ) {
	// The "Aktuelle Ausgabe" page is a plain Page, so the issue it shows has
	// to be looked up rather than read off the current post. get_posts()
	// suppresses filters by default, which would hand the German page the
	// newest issue in either language — WPML has to see this query.
	$latest = get_posts(
		array(
			'post_type'        => 'magazin',
			'posts_per_page'   => 1,
			'fields'           => 'ids',
			'suppress_filters' => false,
		)
	);
	$magazine_id = $latest ? $latest[0] : 0;
} else {
	$magazine_id = isset( $block->context['postId'] ) ? $block->context['postId'] : get_the_ID();
}

if ( ! $magazine_id || 'magazin' !== get_post_type( $magazine_id ) ) {
	return;
}

// The page names itself ("Aktuelle Ausgabe"); a single issue names its section.
if ( 'latest' === $source ) {
	$eyebrow      = get_the_title( get_queried_object_id() );
	$eyebrow_link = '';
} else {
	$eyebrow      = goldor_post_type_section_label( 'magazin' );
	$eyebrow_link = get_post_type_archive_link( 'magazin' );
}

// Imported issues carry the rest of the old embed code after the URL.
$epaper       = trim( strtok( (string) get_post_meta( $magazine_id, 'epaper', true ), '"' ) );
$epaper_thumb = get_post_thumbnail_id( $magazine_id );

// `ausgabe` is a serialized array of ID strings; matching the quoted value
// keeps issue 6195 from also catching articles of issue 86195.
$issue_query = array(
	'post_type'      => 'artikel',
	'posts_per_page' => -1,
	'meta_query'     => array( array( 'key' => 'ausgabe', 'value' => '"' . $magazine_id . '"', 'compare' => 'LIKE' ) ),
);

// The first cover story leads the issue; an issue with several keeps the
// others as the first section rather than dropping them.
$cover_term = get_term_by( 'name', 'Cover Story', 'artikel-kategorie' );
$cover      = null;
if ( $cover_term ) {
	$found = get_posts(
		array(
			'fields'    => 'ids',
			'tax_query' => array( array( 'taxonomy' => 'artikel-kategorie', 'field' => 'term_id', 'terms' => $cover_term->term_id ) ),
		) + $issue_query
	);
	$cover = $found ? $found[0] : null;
}

// Further cover stories, then Focus, then every other category in term order.
$terms = get_terms( array( 'taxonomy' => 'artikel-kategorie', 'hide_empty' => false ) );
$terms = is_wp_error( $terms ) ? array() : $terms;
$rank  = function ( $term ) {
	$order = array( 'Cover Story', 'Focus' );
	$index = array_search( $term->name, $order, true );
	return false === $index ? count( $order ) : $index;
};
usort(
	$terms,
	function ( $a, $b ) use ( $rank ) {
		return $rank( $a ) - $rank( $b );
	}
);

$sections = array();
foreach ( $terms as $term ) {
	$ids = get_posts(
		array(
			'fields'       => 'ids',
			'post__not_in' => $cover ? array( $cover ) : array(),
			'tax_query'    => array( array( 'taxonomy' => 'artikel-kategorie', 'field' => 'term_id', 'terms' => $term->term_id ) ),
		) + $issue_query
	);
	if ( $ids ) {
		$sections[] = array(
			'anchor' => 'rubrik-' . $term->slug,
			'name'   => $term->name,
			'ids'    => $ids,
		);
	}
}

$has_articles = $cover || $sections;
$show_epaper  = (bool) $epaper;
$band         = 0;
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'magazine-issue' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>

	<section class="section section--archive magazine-issue__band">
		<div class="section__inner">
			<header class="archive-head">
				<?php if ( $eyebrow ) : ?>
					<p class="archive-head__eyebrow">
						<?php if ( $eyebrow_link ) : ?>
							<a href="<?php echo esc_url( $eyebrow_link ); ?>"><?php echo esc_html( $eyebrow ); ?></a>
						<?php else : ?>
							<?php echo esc_html( $eyebrow ); ?>
						<?php endif; ?>
					</p>
				<?php endif; ?>
				<h1 class="archive-head__title"><?php echo esc_html( get_the_title( $magazine_id ) ); ?></h1>
				<?php if ( has_excerpt( $magazine_id ) ) : ?>
					<p class="archive-head__lead"><?php echo esc_html( get_the_excerpt( $magazine_id ) ); ?></p>
				<?php endif; ?>
			</header>

			<?php if ( $has_articles ) : ?>
				<div class="hero-grid<?php echo $cover ? '' : ' hero-grid--aside-only'; ?>">
					<?php if ( $cover ) : ?>
						<div class="top-story">
							<?php
							echo goldor_render_story_card( // phpcs:ignore WordPress.Security.EscapeOutput
								$cover,
								array(
									'variant'    => 'hero',
									'image_size' => 'large',
									'heading'    => 'h2',
									'cta'        => __( 'Jetzt lesen', 'goldor' ),
								)
							);
							?>
						</div>
					<?php endif; ?>

					<nav class="hero-aside magazine-issue__toc" aria-label="<?php esc_attr_e( 'Inhalt dieser Ausgabe', 'goldor' ); ?>">
						<?php echo goldor_render_section_head( __( 'In dieser Ausgabe', 'goldor' ), '', '', 'column' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
						<ul class="entry-list entry-list--toc">
							<?php foreach ( $sections as $section ) : ?>
								<li class="entry-list__item">
									<a class="entry-list__title" href="#<?php echo esc_attr( $section['anchor'] ); ?>"><?php echo esc_html( $section['name'] ); ?></a>
									<span class="entry-list__meta">
										<?php
										/* translators: %d: number of articles in the section */
										echo esc_html( sprintf( _n( '%d Beitrag', '%d Beiträge', count( $section['ids'] ), 'goldor' ), count( $section['ids'] ) ) );
										?>
									</span>
								</li>
							<?php endforeach; ?>
							<?php if ( $show_epaper ) : ?>
								<li class="entry-list__item">
									<a class="entry-list__title" href="#e-paper"><?php esc_html_e( 'E-Paper', 'goldor' ); ?></a>
									<span class="entry-list__meta"><?php esc_html_e( 'Für Abonnenten', 'goldor' ); ?></span>
								</li>
							<?php endif; ?>
						</ul>
					</nav>
				</div>
			<?php else : ?>
				<p class="archive-empty"><?php esc_html_e( 'Die Beiträge dieser Ausgabe werden in Kürze aufgeschaltet.', 'goldor' ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<?php foreach ( $sections as $section ) : ?>
		<section id="<?php echo esc_attr( $section['anchor'] ); ?>" class="section magazine-issue__band<?php echo ( ++$band % 2 ) ? ' section--soft' : ''; ?>">
			<div class="section__inner">
				<?php echo goldor_render_section_head( $section['name'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
				<div class="grid-container">
					<?php foreach ( $section['ids'] as $article_id ) : ?>
						<?php echo goldor_render_grid_item( $article_id ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
					<?php endforeach; ?>
				</div>
			</div>
		</section>
	<?php endforeach; ?>

	<?php if ( $show_epaper ) : ?>
		<section id="e-paper" class="section magazine-issue__band<?php echo ( ++$band % 2 ) ? ' section--soft' : ''; ?>">
			<div class="section__inner">
				<?php echo goldor_render_section_head( __( 'E-Paper', 'goldor' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>

				<?php if ( $has_articles ) : ?>
					<div class="magazine-epaper">
						<?php if ( $epaper_thumb ) : ?>
							<div class="magazine-epaper__cover">
								<?php if ( is_user_logged_in() ) : ?>
									<a href="<?php echo esc_url( $epaper ); ?>" target="_blank" rel="noopener" tabindex="-1" aria-hidden="true">
										<?php echo wp_get_attachment_image( $epaper_thumb, 'medium_large', false, array( 'alt' => '', 'loading' => 'lazy' ) ); ?>
									</a>
								<?php else : ?>
									<?php echo wp_get_attachment_image( $epaper_thumb, 'medium_large', false, array( 'alt' => '', 'loading' => 'lazy' ) ); ?>
									<span class="story-card__paywall"><?php esc_html_e( 'Abo', 'goldor' ); ?></span>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<div class="magazine-epaper__body">
							<h3 class="magazine-epaper__title"><?php echo esc_html( get_the_title( $magazine_id ) ); ?></h3>
							<?php if ( is_user_logged_in() ) : ?>
								<p class="magazine-epaper__text"><?php esc_html_e( 'Die vollständige Printausgabe zum Blättern.', 'goldor' ); ?></p>
								<p class="magazine-epaper__actions">
									<a class="goldor-button" href="<?php echo esc_url( $epaper ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'E-Paper öffnen', 'goldor' ); ?></a>
								</p>
							<?php else : ?>
								<p class="magazine-epaper__text"><?php esc_html_e( 'Das E-Paper ist kostenpflichtig. Bitte loggen Sie sich als Abonnent ein.', 'goldor' ); ?></p>
								<p class="magazine-epaper__actions">
									<a class="goldor-button" href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>"><?php esc_html_e( 'Anmelden', 'goldor' ); ?></a>
								</p>
							<?php endif; ?>
						</div>
					</div>
				<?php elseif ( is_user_logged_in() ) : ?>
					<div class="magazine-epaper__embed">
						<iframe src="<?php echo esc_url( $epaper ); ?>" title="<?php echo esc_attr( get_the_title( $magazine_id ) ); ?>" allowfullscreen loading="lazy"></iframe>
					</div>
				<?php else : ?>
					<div class="form-epaper">
						<?php wp_login_form(); ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>
</div>
