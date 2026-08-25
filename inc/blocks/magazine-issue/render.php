<?php
/**
 * A `magazin` issue: cover story, Focus, one section per artikel-kategorie
 * term, and a gated e-paper. Articles belong to an issue via their own
 * `ausgabe` meta (the magazin post ID).
 *
 * @package goldor
 */

if ( ! in_the_loop() ) {
	the_post();
}

$magazine_id = get_the_ID();
if ( 'magazin' !== get_post_type( $magazine_id ) ) {
	return;
}

$epaper       = get_post_meta( $magazine_id, 'epaper', true );
$epaper_thumb = goldor_post_thumbnail_url( $magazine_id, 'medium' );
$categories   = get_terms( array( 'taxonomy' => 'artikel-kategorie', 'hide_empty' => false ) );
$cover_term   = get_term_by( 'name', 'Cover Story', 'artikel-kategorie' );
$focus_term   = get_term_by( 'name', 'Focus', 'artikel-kategorie' );

$issue_articles = get_posts(
	array(
		'post_type'      => 'artikel',
		'posts_per_page' => -1,
		'fields'         => 'ids',
		'meta_query'     => array( array( 'key' => 'ausgabe', 'value' => $magazine_id, 'compare' => 'LIKE' ) ),
	)
);
?>
<div <?php echo get_block_wrapper_attributes(); // phpcs:ignore ?> class="magazine-content">

	<?php if ( $cover_term ) : ?>
		<?php
		$cover = get_posts(
			array(
				'post_type'      => 'artikel',
				'posts_per_page' => 1,
				'tax_query'      => array( array( 'taxonomy' => 'artikel-kategorie', 'field' => 'term_id', 'terms' => $cover_term->term_id ) ),
				'meta_query'     => array( array( 'key' => 'ausgabe', 'value' => $magazine_id, 'compare' => 'LIKE' ) ),
			)
		);
		if ( $cover ) :
			$cover_post = $cover[0];
			?>
			<div class="magazine-coverstory">
				<img src="<?php echo esc_url( goldor_post_thumbnail_url( $cover_post->ID ) ); ?>" alt="">
				<a href="<?php echo esc_url( get_permalink( $cover_post ) ); ?>"><h2><?php echo esc_html( get_the_title( $cover_post ) ); ?></h2></a>
				<?php echo wp_kses_post( get_the_excerpt( $cover_post ) ); ?>
			</div>
			<div class="magazine-index">
				<ul>
					<?php foreach ( $categories as $term ) : ?>
						<li><a href="#<?php echo esc_attr( sanitize_title( $term->name ) ); ?>"><?php echo esc_html( $term->name ); ?></a></li>
					<?php endforeach; ?>
					<?php if ( $epaper ) : ?>
						<li><a href="#epaper"><?php esc_html_e( 'E-Paper', 'goldor' ); ?></a></li>
					<?php endif; ?>
				</ul>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ( $focus_term ) : ?>
		<?php
		$focus = get_posts(
			array(
				'post_type'      => 'artikel',
				'posts_per_page' => 1,
				'tax_query'      => array( array( 'taxonomy' => 'artikel-kategorie', 'field' => 'term_id', 'terms' => $focus_term->term_id ) ),
				'meta_query'     => array( array( 'key' => 'ausgabe', 'value' => $magazine_id, 'compare' => 'LIKE' ) ),
			)
		);
		if ( $focus ) :
			$focus_post = $focus[0];
			?>
			<h1 id="<?php echo esc_attr( sanitize_title( $focus_term->name ) ); ?>" class="divide"><?php echo esc_html( $focus_term->name ); ?></h1>
			<div class="grid-container">
				<div class="grid-item">
					<div class="item-image" style="background-image:url(<?php echo esc_url( goldor_post_thumbnail_url( $focus_post->ID ) ); ?>)" onclick="location.href='<?php echo esc_js( get_permalink( $focus_post ) ); ?>'">
						<?php
						$focus_categories = goldor_post_terms( $focus_post->ID );
						if ( ! empty( $focus_categories ) && ! is_wp_error( $focus_categories ) ) :
							?>
							<span class="item-category"><?php echo esc_html( $focus_categories[0]->name ); ?></span>
						<?php endif; ?>
						<?php if ( get_post_meta( $focus_post->ID, 'paywall', true ) ) : ?>
							<div class="item-paywall">&nbsp;</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="grid-item-wide">
					<a href="<?php echo esc_url( get_permalink( $focus_post ) ); ?>"><h2><?php echo esc_html( get_the_title( $focus_post ) ); ?></h2></a>
					<?php echo esc_html( substr( wp_strip_all_tags( $focus_post->post_content ), 0, 500 ) ); ?>&#8239;.&#8239;.&#8239;.
					<a class="article-more" href="<?php echo esc_url( get_permalink( $focus_post ) ); ?>"><?php esc_html_e( 'mehr', 'goldor' ); ?></a>
				</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	foreach ( $categories as $term ) :
		if ( in_array( $term->name, array( 'Cover Story', 'Focus' ), true ) ) {
			continue;
		}
		$section = get_posts(
			array(
				'post_type'      => 'artikel',
				'posts_per_page' => -1,
				'tax_query'      => array( array( 'taxonomy' => 'artikel-kategorie', 'field' => 'term_id', 'terms' => $term->term_id ) ),
				'meta_query'     => array( array( 'key' => 'ausgabe', 'value' => $magazine_id, 'compare' => 'LIKE' ) ),
			)
		);
		if ( ! $section ) {
			continue;
		}
		?>
		<h1 id="<?php echo esc_attr( sanitize_title( $term->name ) ); ?>" class="divide"><?php echo esc_html( $term->name ); ?></h1>
		<div class="grid-container">
			<?php foreach ( $section as $article ) : ?>
				<?php echo goldor_render_grid_item( $article->ID ); // phpcs:ignore ?>
			<?php endforeach; ?>
		</div>
	<?php endforeach; ?>

	<?php if ( $epaper ) : ?>
		<?php
		$can_view_epaper = is_user_logged_in();
		?>
		<?php if ( $issue_articles ) : ?>
			<h1 id="epaper" class="divide">E-Paper</h1>
			<div class="epaper">
				<div class="item-paywall">&nbsp;</div>
				<?php if ( $can_view_epaper ) : ?>
					<a target="_blank" rel="noopener" href="<?php echo esc_url( $epaper ); ?>">
						<img class="item-image" src="<?php echo esc_url( $epaper_thumb ); ?>" alt="">
					</a>
				<?php else : ?>
					<img class="item-image" src="<?php echo esc_url( $epaper_thumb ); ?>" alt="<?php esc_attr_e( 'Das E-Paper ist kostenpflichtig. Bitte loggen Sie sich als Abonnent ein.', 'goldor' ); ?>">
				<?php endif; ?>
			</div>
		<?php elseif ( $can_view_epaper ) : ?>
			<div class="epaper">
				<iframe src="<?php echo esc_url( $epaper ); ?>" frameborder="0" allowfullscreen allowtransparency="true"></iframe>
			</div>
		<?php else : ?>
			<div class="form-epaper">
				<?php wp_login_form(); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>
