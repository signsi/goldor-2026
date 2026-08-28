<?php
/**
 * Block-theme backend logic: custom post types, taxonomies, meta, dynamic
 * blocks, and small helpers shared by the theme's dynamic blocks.
 *
 * @package goldor
 */

function goldor_block_register_post_types() {
	$types = array(
		'artikel'      => array(
			'label'       => __( 'Artikel', 'goldor' ),
			'menu_icon'   => 'dashicons-media-document',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'artikel' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'artikel-kategorie', 'post_tag' ),
		),
		'print'        => array(
			'label'       => __( 'Print', 'goldor' ),
			'menu_icon'   => 'dashicons-media-text',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'print' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'print-kategorie', 'post_tag' ),
		),
		'vsgu-news'    => array(
			'label'       => __( 'Personen', 'goldor' ),
			'menu_icon'   => 'dashicons-admin-post',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'personen' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'vsgu-news-kategorie', 'post_tag' ),
		),
		'magazin'      => array(
			'label'       => __( 'Magazin', 'goldor' ),
			'menu_icon'   => 'dashicons-book',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'magazin' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
		),
		'kalender'     => array(
			'label'       => __( 'Kalender', 'goldor' ),
			'menu_icon'   => 'dashicons-calendar-alt',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'kalender' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'kalender-kategorie', 'post_tag' ),
		),
		'job'          => array(
			'label'       => __( 'Jobs', 'goldor' ),
			'menu_icon'   => 'dashicons-businessperson',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'jobs' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'job-kategorie', 'post_tag' ),
		),
		'kleinanzeige' => array(
			'label'       => __( 'Kleinanzeigen', 'goldor' ),
			'menu_icon'   => 'dashicons-store',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'anzeigen' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'kleinanzeige-kategorie', 'post_tag' ),
		),
		'lieferant'    => array(
			'label'       => __( 'Lieferanten', 'goldor' ),
			'menu_icon'   => 'dashicons-groups',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'lieferanten' ),
			'supports'    => array( 'title', 'editor', 'excerpt', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'lieferant-kategorie', 'post_tag' ),
		),
		'wiki'         => array(
			'label'       => __( 'Wiki', 'goldor' ),
			'menu_icon'   => 'dashicons-lightbulb',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'wiki' ),
			'supports'    => array( 'title', 'editor', 'thumbnail', 'author', 'revisions' ),
			'taxonomies'  => array( 'wiki-kategorie', 'post_tag' ),
		),
		'link'         => array(
			'label'       => __( 'Links', 'goldor' ),
			'menu_icon'   => 'dashicons-admin-links',
			'public'      => true,
			'show_in_rest' => true,
			'has_archive' => true,
			'rewrite'     => array( 'slug' => 'links' ),
			'supports'    => array( 'title', 'revisions' ),
			'taxonomies'  => array( 'link-kategorie' ),
		),
		'werbung'      => array(
			'label'       => __( 'Werbung', 'goldor' ),
			'menu_icon'   => 'dashicons-visibility',
			'public'      => true,
			'show_in_rest' => true,
			'show_ui'     => true,
			'supports'    => array( 'title', 'revisions' ),
		),
	);

	foreach ( $types as $slug => $args ) {
		register_post_type( $slug, $args );
	}
}
add_action( 'init', 'goldor_block_register_post_types', 0 );

function goldor_block_register_taxonomies() {
	$taxonomies = array(
		'artikel-kategorie'      => array( 'artikel' ),
		'print-kategorie'        => array( 'print' ),
		'vsgu-news-kategorie'    => array( 'vsgu-news' ),
		'kalender-kategorie'     => array( 'kalender' ),
		'job-kategorie'          => array( 'job' ),
		'kleinanzeige-kategorie' => array( 'kleinanzeige' ),
		'lieferant-kategorie'    => array( 'lieferant' ),
		'wiki-kategorie'         => array( 'wiki' ),
		'link-kategorie'         => array( 'link' ),
	);

	foreach ( $taxonomies as $taxonomy => $objects ) {
		register_taxonomy(
			$taxonomy,
			$objects,
			array(
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'show_in_rest'      => true,
				'rewrite'           => array( 'slug' => $taxonomy ),
				'label'             => ucfirst( str_replace( '-', ' ', $taxonomy ) ),
			)
		);
	}
}
add_action( 'init', 'goldor_block_register_taxonomies', 0 );

function goldor_block_register_meta() {
	$meta_fields = array(
		'paywall'    => array( 'object_type' => array( 'artikel' ), 'type' => 'boolean' ),
		'Typ'        => array( 'object_type' => array( 'werbung' ), 'type' => 'string' ),
		'aktiv'      => array( 'object_type' => array( 'werbung' ), 'type' => 'boolean' ),
		'werbemittel' => array( 'object_type' => array( 'werbung' ), 'type' => 'integer' ),
		'url'        => array( 'object_type' => array( 'werbung', 'kleinanzeige', 'link' ), 'type' => 'string' ),
		'topentry'   => array( 'object_type' => array( 'artikel', 'kalender', 'vsgu-news' ), 'type' => 'boolean' ),
		'topstory'   => array( 'object_type' => array( 'post', 'artikel' ), 'type' => 'boolean' ),
		'ausgabe'    => array( 'object_type' => array( 'artikel', 'print' ), 'type' => 'string' ),
		'startdatum' => array( 'object_type' => array( 'kalender' ), 'type' => 'string' ),
		'enddatum'   => array( 'object_type' => array( 'kalender' ), 'type' => 'string' ),
		'ort'        => array( 'object_type' => array( 'kalender' ), 'type' => 'string' ),
		'website'    => array( 'object_type' => array( 'lieferant' ), 'type' => 'string' ),
		'email'      => array( 'object_type' => array( 'lieferant' ), 'type' => 'string' ),
		'phone'      => array( 'object_type' => array( 'lieferant' ), 'type' => 'string' ),
		'epaper'     => array( 'object_type' => array( 'magazin' ), 'type' => 'string' ),
	);

	foreach ( $meta_fields as $meta_key => $args ) {
		foreach ( (array) $args['object_type'] as $object_type ) {
			register_post_meta(
				$object_type,
				$meta_key,
				array(
					'type'         => $args['type'],
					'single'       => true,
					'show_in_rest' => true,
				)
			);
		}
	}
}
add_action( 'init', 'goldor_block_register_meta', 20 );

/**
 * A dedicated inserter category for the theme's dynamic blocks.
 */
function goldor_block_categories( $categories ) {
	return array_merge(
		array(
			array(
				'slug'  => 'goldor',
				'title' => __( 'Goldor', 'goldor' ),
			),
		),
		$categories
	);
}
add_filter( 'block_categories_all', 'goldor_block_categories' );

/**
 * Dynamic block loader. Every inc/blocks/{name}/ directory with a block.json
 * is registered; edit.js (if present) is pre-registered as a plain script
 * handle so blocks work with zero build step.
 */
function goldor_register_blocks() {
	foreach ( glob( get_template_directory() . '/inc/blocks/*', GLOB_ONLYDIR ) as $dir ) {
		$name    = basename( $dir );
		$edit_js = $dir . '/edit.js';

		if ( file_exists( $edit_js ) ) {
			wp_register_script(
				"goldor-block-{$name}-edit",
				get_template_directory_uri() . "/inc/blocks/{$name}/edit.js",
				array( 'wp-blocks', 'wp-element', 'wp-block-editor', 'wp-components', 'wp-server-side-render', 'wp-i18n' ),
				filemtime( $edit_js ),
				true
			);
		}

		register_block_type( $dir );
	}
}
add_action( 'init', 'goldor_register_blocks' );

/**
 * Resolve the current front-end language without hard-depending on WPML.
 */
function goldor_current_language() {
	if ( defined( 'ICL_LANGUAGE_CODE' ) && ICL_LANGUAGE_CODE ) {
		return ICL_LANGUAGE_CODE;
	}

	if ( has_filter( 'wpml_current_language' ) ) {
		$language = apply_filters( 'wpml_current_language', null );
		if ( $language ) {
			return $language;
		}
	}

	return substr( get_locale(), 0, 2 );
}

/**
 * Whether the current visitor may read the full artikel content, or should
 * see the paywall teaser instead.
 */
function goldor_block_should_show_article_full_content( $post_id = null ) {
	$post_id = $post_id ? $post_id : get_the_ID();

	if ( 'artikel' !== get_post_type( $post_id ) ) {
		return true;
	}

	if ( is_user_logged_in() ) {
		return true;
	}

	$paywall = get_post_meta( $post_id, 'paywall', true );
	return empty( $paywall );
}

/**
 * Fetch one active `werbung` (ad) entry of the given type.
 */
function goldor_block_get_active_ad( $type = 'Skyscraper' ) {
	$ad_query = new WP_Query(
		array(
			'post_type'      => 'werbung',
			'posts_per_page' => 1,
			'post_status'    => 'publish',
			'no_found_rows'  => true,
			'meta_query'     => array(
				array( 'key' => 'Typ', 'value' => $type, 'compare' => '=' ),
				array( 'key' => 'aktiv', 'value' => '1', 'compare' => '=' ),
			),
		)
	);

	if ( ! $ad_query->have_posts() ) {
		return null;
	}

	$ad_query->the_post();
	$thumb_id = get_post_meta( get_the_ID(), 'werbemittel', true );
	$image    = $thumb_id ? wp_get_attachment_image_src( $thumb_id, 'full' ) : false;
	$url      = get_post_meta( get_the_ID(), 'url', true );

	$ad = array(
		'id'    => get_the_ID(),
		'title' => get_the_title(),
		'url'   => $url ? goldor_normalize_url( $url ) : '',
		'image' => $image ? $image[0] : '',
	);
	wp_reset_postdata();

	return $ad;
}

/**
 * Legacy ad/link meta stores bare domains (e.g. "example.com"); make sure we
 * always link to a real absolute URL.
 */
function goldor_normalize_url( $url ) {
	$url = trim( (string) $url );
	if ( '' === $url ) {
		return '';
	}
	if ( ! preg_match( '#^https?://#i', $url ) ) {
		$url = 'https://' . $url;
	}
	return esc_url( $url );
}

/**
 * Featured image URL with a graceful fallback image, since
 * wp_get_attachment_image_src() has no reliable filter hook for posts that
 * have no thumbnail at all.
 */
function goldor_post_thumbnail_url( $post_id, $size = 'medium' ) {
	$thumb_id = get_post_thumbnail_id( $post_id );
	if ( $thumb_id ) {
		$src = wp_get_attachment_image_src( $thumb_id, $size );
		if ( $src ) {
			return $src[0];
		}
	}
	return get_template_directory_uri() . '/img/Fallback_Thumbnail.jpg';
}

/**
 * The post type the current archive/taxonomy view is listing, so blocks that
 * are dropped into a shared template don't have to be told which one it is.
 */
function goldor_queried_post_type() {
	if ( is_post_type_archive() ) {
		$queried = get_queried_object();
		if ( $queried instanceof WP_Post_Type ) {
			return $queried->name;
		}
	}

	if ( is_tax() ) {
		$term = get_queried_object();
		if ( $term instanceof WP_Term && '-kategorie' === substr( $term->taxonomy, -10 ) ) {
			return substr( $term->taxonomy, 0, -10 );
		}
	}

	$post_type = get_query_var( 'post_type' );
	if ( is_string( $post_type ) && $post_type ) {
		return $post_type;
	}

	return get_post_type() ? get_post_type() : 'post';
}

/**
 * The category/type badge terms for a post: WordPress categories for `post`,
 * otherwise the post type's own `{post_type}-kategorie` taxonomy.
 */
function goldor_post_terms( $post_id ) {
	$post_type = get_post_type( $post_id );
	if ( 'post' === $post_type ) {
		return get_the_category( $post_id );
	}
	$taxonomy = $post_type . '-kategorie';
	if ( ! taxonomy_exists( $taxonomy ) ) {
		return array();
	}
	return wp_get_post_terms( $post_id, $taxonomy, array( 'orderby' => 'name', 'order' => 'ASC' ) );
}

/**
 * Every story card rendered so far in this request. The homepage stacks
 * several independent queries (hero, news, magazine, spotlight, calendar) that
 * happily return the same entry twice, so each of them skips what earlier
 * blocks already showed.
 */
function goldor_track_rendered_post( $post_id ) {
	if ( ! isset( $GLOBALS['goldor_rendered_posts'] ) ) {
		$GLOBALS['goldor_rendered_posts'] = array();
	}
	$GLOBALS['goldor_rendered_posts'][ (int) $post_id ] = true;
}

function goldor_rendered_post_ids() {
	return isset( $GLOBALS['goldor_rendered_posts'] )
		? array_keys( $GLOBALS['goldor_rendered_posts'] )
		: array();
}

/**
 * The card's cover image, wrapped in a link to the post. Falls back to the
 * theme's placeholder when a post has no featured image, and flags paywalled
 * artikel entries.
 */
function goldor_render_card_media( $post_id, $size = 'medium_large' ) {
	$thumb_id = get_post_thumbnail_id( $post_id );

	ob_start();
	?>
	<a class="story-card__media" href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" tabindex="-1" aria-hidden="true">
		<?php
		if ( $thumb_id ) {
			echo wp_get_attachment_image( $thumb_id, $size, false, array( 'alt' => '', 'loading' => 'lazy' ) );
		} else {
			?>
			<img src="<?php echo esc_url( goldor_post_thumbnail_url( $post_id, $size ) ); ?>" alt="" loading="lazy">
			<?php
		}
		?>
		<?php if ( 'artikel' === get_post_type( $post_id ) && get_post_meta( $post_id, 'paywall', true ) ) : ?>
			<span class="story-card__paywall"><?php esc_html_e( 'Abo', 'goldor' ); ?></span>
		<?php endif; ?>
	</a>
	<?php
	return ob_get_clean();
}

/**
 * The card footer: author and date on the left, the primary category on the
 * right — the small line that closes every card in the design.
 */
function goldor_render_card_meta( $post_id, $left = '' ) {
	$terms  = goldor_post_terms( $post_id );
	$term   = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0] : null;
	$author = (int) get_post_field( 'post_author', $post_id );

	ob_start();
	?>
	<p class="story-card__meta">
		<span class="story-card__byline">
			<?php if ( $left ) : ?>
				<span class="story-card__author"><?php echo esc_html( $left ); ?></span>
			<?php else : ?>
				<?php if ( $author ) : ?>
					<span class="story-card__author"><?php echo esc_html( get_the_author_meta( 'display_name', $author ) ); ?></span>
				<?php endif; ?>
				<time class="story-card__date" datetime="<?php echo esc_attr( get_the_date( 'c', $post_id ) ); ?>">
					<?php echo esc_html( get_the_date( 'd.m.Y', $post_id ) ); ?>
				</time>
			<?php endif; ?>
		</span>
		<?php if ( $term ) : ?>
			<a class="story-card__category" href="<?php echo esc_url( get_term_link( $term ) ); ?>"><?php echo esc_html( $term->name ); ?></a>
		<?php endif; ?>
	</p>
	<?php
	return ob_get_clean();
}

/**
 * Shared story-card markup used by the homepage sections, the "Branche"
 * spotlight and the related-posts block.
 *
 * The `variant` only switches a modifier class — image ratio, title size and
 * column behaviour all live in the stylesheet, so the same markup serves the
 * hero, its sidebar teaser and the three-up grids.
 */
function goldor_render_story_card( $post_id, $args = array() ) {
	$args = wp_parse_args(
		$args,
		array(
			'variant'    => 'card',
			'image_size' => 'medium_large',
			'excerpt'    => true,
			'meta'       => true,
			'cta'        => '',
			'heading'    => 'h3',
			'subline'    => '',
			'meta_left'  => '',
		)
	);

	$link    = get_permalink( $post_id );
	$tag     = preg_match( '/^h[1-6]$/', $args['heading'] ) ? $args['heading'] : 'h3';
	$excerpt = $args['excerpt'] ? get_the_excerpt( $post_id ) : '';

	goldor_track_rendered_post( $post_id );

	ob_start();
	?>
	<article class="story-card story-card--<?php echo esc_attr( $args['variant'] ); ?> grid-item">
		<?php echo goldor_render_card_media( $post_id, $args['image_size'] ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
		<div class="story-card__body">
			<<?php echo esc_attr( $tag ); ?> class="story-card__title">
				<a href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( get_the_title( $post_id ) ); ?></a>
			</<?php echo esc_attr( $tag ); ?>>

			<?php if ( $args['subline'] ) : ?>
				<p class="story-card__subline cal-item-meta"><?php echo esc_html( $args['subline'] ); ?></p>
			<?php endif; ?>

			<?php if ( $excerpt ) : ?>
				<p class="story-card__excerpt"><?php echo esc_html( wp_strip_all_tags( $excerpt ) ); ?></p>
			<?php endif; ?>

			<?php if ( $args['cta'] ) : ?>
				<p class="story-card__actions">
					<a class="goldor-button" href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $args['cta'] ); ?></a>
				</p>
			<?php endif; ?>

			<?php
			if ( $args['meta'] ) {
				echo goldor_render_card_meta( $post_id, $args['meta_left'] ); // phpcs:ignore WordPress.Security.EscapeOutput
			}
			?>
		</div>
	</article>
	<?php
	return ob_get_clean();
}

/**
 * Back-compat wrapper: the standard three-up card.
 */
function goldor_render_grid_item( $post_id ) {
	return goldor_render_story_card( $post_id );
}

/**
 * A section header: an uppercase title plus an optional arrow link to the
 * matching archive.
 */
function goldor_render_section_head( $title, $link = '', $link_label = '', $style = 'section' ) {
	if ( ! $title && ! $link_label ) {
		return '';
	}

	$style = in_array( $style, array( 'section', 'column' ), true ) ? $style : 'section';

	ob_start();
	?>
	<div class="section-head section-head--<?php echo esc_attr( $style ); ?>">
		<?php if ( $title ) : ?>
			<h2 class="section-head__title"><?php echo esc_html( $title ); ?></h2>
		<?php endif; ?>
		<?php if ( $link && $link_label ) : ?>
			<a class="section-head__link" href="<?php echo esc_url( $link ); ?>"><?php echo esc_html( $link_label ); ?></a>
		<?php endif; ?>
	</div>
	<?php
	return ob_get_clean();
}

/**
 * Editorial convention: an article opens with a short emphasised lead
 * paragraph. The detail view lifts that paragraph out of the body and sets it
 * above the hero image, so both callers split the same raw content with this
 * one function rather than passing state between blocks.
 *
 * Returns array( lead_html, body_html ). An empty lead means "no dek" and the
 * body is the untouched content.
 */
function goldor_content_lead_and_body( $post_id = null ) {
	$post = get_post( $post_id );
	if ( ! $post ) {
		return array( '', '' );
	}

	$raw = $post->post_content;

	// Block content carries its own structure; never split on blank lines there.
	if ( false !== strpos( $raw, '<!-- wp:' ) ) {
		return array( '', $raw );
	}

	$parts = preg_split( '/\R\s*\R/', trim( $raw ), 2 );
	$lead  = isset( $parts[0] ) ? trim( $parts[0] ) : '';
	$body  = isset( $parts[1] ) ? $parts[1] : '';

	$is_lead = $lead
		&& preg_match( '/<(em|i)[\s>]/i', $lead )
		&& mb_strlen( wp_strip_all_tags( $lead ) ) <= 400;

	return $is_lead ? array( $lead, $body ) : array( '', $raw );
}

/**
 * The section an entry belongs to, named the way the navigation names it.
 */
function goldor_entry_section_label( $post_id ) {
	$labels = array(
		'post'         => __( 'News', 'goldor' ),
		'artikel'      => __( 'Magazin', 'goldor' ),
		'vsgu-news'    => __( 'Personen', 'goldor' ),
		'kalender'     => __( 'Kalender', 'goldor' ),
		'job'          => __( 'Jobs', 'goldor' ),
		'kleinanzeige' => __( 'Marktplatz', 'goldor' ),
		'lieferant'    => __( 'Lieferanten', 'goldor' ),
		'wiki'         => __( 'Branchen-Lexikon', 'goldor' ),
	);
	$type = get_post_type( $post_id );
	return isset( $labels[ $type ] ) ? $labels[ $type ] : '';
}

/**
 * "14.01.2026 – 16.02.2026 (Tucson)" — the one-line date/place summary shown
 * under every kalender event title.
 */
function goldor_event_dateline( $post_id ) {
	$start = DateTime::createFromFormat( 'Ymd', (string) get_post_meta( $post_id, 'startdatum', true ) );
	$end   = DateTime::createFromFormat( 'Ymd', (string) get_post_meta( $post_id, 'enddatum', true ) );
	$ort   = get_post_meta( $post_id, 'ort', true );

	$dates = array();
	if ( $start ) {
		$dates[] = $start->format( 'd.m.Y' );
	}
	if ( $end && ( ! $start || $end->format( 'Ymd' ) !== $start->format( 'Ymd' ) ) ) {
		$dates[] = $end->format( 'd.m.Y' );
	}

	$line = implode( ' – ', $dates );
	if ( $ort ) {
		$line = $line ? $line . ' (' . $ort . ')' : $ort;
	}

	return $line;
}

/**
 * "Add to calendar" download for a kalender event, built from the event's
 * own sanitized post meta rather than raw request input.
 */
function goldor_handle_ical_download() {
	if ( ! isset( $_GET['goldor_ical'] ) ) {
		return;
	}

	$event_id = absint( $_GET['goldor_ical'] );
	if ( ! $event_id || 'kalender' !== get_post_type( $event_id ) || 'publish' !== get_post_status( $event_id ) ) {
		return;
	}

	$start = get_post_meta( $event_id, 'startdatum', true );
	if ( ! preg_match( '/^\d{8}$/', $start ) ) {
		return;
	}
	$end = get_post_meta( $event_id, 'enddatum', true );
	if ( ! preg_match( '/^\d{8}$/', $end ) ) {
		$end = $start;
	}

	$escape = function ( $text ) {
		return addcslashes( wp_strip_all_tags( (string) $text ), ",;\\" );
	};

	$ical  = "BEGIN:VCALENDAR\r\n";
	$ical .= "VERSION:2.0\r\n";
	$ical .= "PRODID:-//goldor//kalender//EN\r\n";
	$ical .= "BEGIN:VEVENT\r\n";
	$ical .= 'UID:' . $event_id . '-' . md5( $start ) . "@goldor.ch\r\n";
	$ical .= 'DTSTAMP:' . gmdate( 'Ymd\THis\Z' ) . "\r\n";
	$ical .= 'DTSTART;VALUE=DATE:' . $start . "\r\n";
	$ical .= 'DTEND;VALUE=DATE:' . $end . "\r\n";
	$ical .= 'SUMMARY:' . $escape( get_the_title( $event_id ) ) . "\r\n";
	$ical .= 'DESCRIPTION:' . $escape( get_the_excerpt( $event_id ) ) . "\r\n";
	$ical .= "END:VEVENT\r\n";
	$ical .= "END:VCALENDAR\r\n";

	nocache_headers();
	header( 'Content-Type: text/calendar; charset=utf-8' );
	header( 'Content-Disposition: inline; filename=kalender.ics' );
	echo $ical; // phpcs:ignore WordPress.Security.EscapeOutput
	exit;
}
add_action( 'template_redirect', 'goldor_handle_ical_download' );
