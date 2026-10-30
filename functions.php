<?php
/**
 * Goldor theme setup, enqueues, and backend-only behavior.
 *
 * Front-end markup lives entirely in templates/, parts/, patterns/ and the
 * dynamic blocks under inc/blocks/ — this file only wires up theme supports,
 * assets, and hooks that have no template of their own.
 *
 * @package goldor
 */

if ( ! function_exists( 'goldor_setup' ) ) :
	function goldor_setup() {
		load_theme_textdomain( 'goldor', get_template_directory() . '/languages' );

		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'custom-logo', array( 'height' => 40, 'flex-height' => true, 'flex-width' => true ) );
		add_theme_support( 'editor-styles' );
		add_editor_style( array( 'style.css', 'assets/editor.css' ) );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'align-wide' );
		add_theme_support( 'jetpack-responsive-videos' );

		add_theme_support(
			'html5',
			array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' )
		);

		register_nav_menus(
			array(
				'primary'   => esc_html__( 'Primary', 'goldor' ),
				'secondary' => esc_html__( 'Secondary', 'goldor' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'goldor_setup' );

/**
 * Originals are capped at 2560px and `large` is 1800px, so core's 2048px
 * sub-size only duplicates them in every srcset (CLEANUP.md, U8).
 */
function goldor_image_sizes() {
	remove_image_size( '2048x2048' );
}
add_action( 'after_setup_theme', 'goldor_image_sizes' );

/**
 * Block-theme backend logic: CPTs, taxonomies, meta, dynamic blocks, iCal endpoint.
 */
require get_template_directory() . '/block-theme-logic.php';

/**
 * Ad management: run dates, cache purging, admin list, format check.
 */
require get_template_directory() . '/inc/werbung.php';
require get_template_directory() . '/inc/autoren.php';
require get_template_directory() . '/inc/hintergrund.php';
require get_template_directory() . '/inc/stil-sperre.php';

/*
 * Assets
 */
function goldor_scripts() {
	wp_enqueue_style( 'goldor-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );

	wp_enqueue_style( 'goldor-fonts', goldor_fonts_url(), array(), null );

	if ( is_singular( array( 'post', 'artikel', 'vsgu-news' ) ) ) {
		wp_enqueue_script(
			'goldor-article',
			get_template_directory_uri() . '/assets/article.js',
			array(),
			'1.0',
			true
		);
	}

	wp_enqueue_script(
		'goldor-header-shrink',
		get_template_directory_uri() . '/assets/header-shrink.js',
		array(),
		'1.1',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'goldor_scripts' );

/**
 * The two faces the design is built on, as in print and the newsletter: Arvo
 * Bold for headlines, Inter for reading text and everything functional.
 */
function goldor_fonts_url() {
	return 'https://fonts.googleapis.com/css2'
		. '?family=Arvo:wght@700'
		. '&family=Inter:ital,opsz,wght@0,14..32,300..700;1,14..32,300..700'
		. '&display=swap';
}

/**
 * The block editor needs the same faces so the canvas matches the front end;
 * wp_enqueue_scripts never runs there.
 */
function goldor_editor_fonts() {
	if ( is_admin() ) {
		wp_enqueue_style( 'goldor-fonts', goldor_fonts_url(), array(), null );
	}
}
add_action( 'enqueue_block_assets', 'goldor_editor_fonts' );

/**
 * The Gold'Or wordmark is part of the design, not editorial content — so when
 * no custom logo has been uploaded, the Site Logo block falls back to the
 * theme's own SVG instead of rendering nothing at all.
 */
function goldor_site_logo_fallback( $block_content, $block ) {
	if ( false !== strpos( $block_content, '<img' ) ) {
		return $block_content;
	}

	$width   = isset( $block['attrs']['width'] ) ? (int) $block['attrs']['width'] : 170;
	$classes = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
	$file    = false !== strpos( $classes, 'site-logo--magenta' ) ? 'Logo-Goldor-Magenta.svg' : 'Logo-Goldor.svg';

	// The height reserves the header's space, and the logo never waits for a
	// lazy-load script: both logo files are 512×139.
	return sprintf(
		'<div class="wp-block-site-logo %5$s"><a href="%1$s" class="custom-logo-link" rel="home"><img class="custom-logo" src="%2$s" alt="%3$s" width="%4$d" height="%6$d" style="width:%4$dpx" data-no-lazy="1" data-skip-lazy="1"></a></div>',
		esc_url( home_url( '/' ) ),
		esc_url( get_template_directory_uri() . '/img/' . $file ),
		esc_attr( get_bloginfo( 'name' ) ),
		$width,
		esc_attr( $classes ),
		round( $width * 139 / 512 )
	);
}
add_filter( 'render_block_core/site-logo', 'goldor_site_logo_fallback', 10, 2 );

/**
 * Menu items imported from the old classic menu carry internal notes in their
 * description field ("Holds our Magazin data"). Core prints them as hidden
 * spans that still reach screen readers and search snippets, so they go.
 */
function goldor_strip_nav_descriptions( $block_content ) {
	return preg_replace( '#<span class="wp-block-navigation-item__description">.*?</span>#s', '', $block_content );
}
add_filter( 'render_block_core/navigation-link', 'goldor_strip_nav_descriptions' );
add_filter( 'render_block_core/navigation-submenu', 'goldor_strip_nav_descriptions' );

/**
 * On phones the service bar is hidden; its shortcuts open the main menu
 * instead, as the last items of the overlay. The last </ul> of the navigation
 * closes its top-level list, so they land after the regular items.
 */
function goldor_nav_service_links( $block_content, $block ) {
	$class = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
	$close = strrpos( $block_content, '</ul>' );
	if ( ! goldor_service_bar_enabled() || false === strpos( $class, 'main-navigation' ) || false === $close ) {
		return $block_content;
	}

	$items = '';
	foreach ( goldor_service_links() as $link ) {
		$items .= sprintf(
			'<li class="wp-block-navigation-item service-nav-item"><a class="wp-block-navigation-item__content" href="%1$s"><span class="wp-block-navigation-item__label">%2$s</span></a></li>',
			esc_url( $link['url'] ),
			esc_html( $link['label'] )
		);
	}

	return substr_replace( $block_content, $items, $close, 0 );
}
add_filter( 'render_block_core/navigation', 'goldor_nav_service_links', 10, 2 );

/**
 * The service bar can be switched off under Settings → Reading; it is on
 * until someone unticks it.
 */
function goldor_service_bar_enabled() {
	return (bool) get_option( 'goldor_service_bar', true );
}

function goldor_service_bar_setting() {
	register_setting(
		'reading',
		'goldor_service_bar',
		array(
			'type'              => 'boolean',
			'default'           => true,
			'sanitize_callback' => 'rest_sanitize_boolean',
		)
	);

	add_settings_field(
		'goldor_service_bar',
		__( 'Service-Leiste', 'goldor' ),
		function () {
			printf(
				'<input type="hidden" name="goldor_service_bar" value="0"><label><input type="checkbox" name="goldor_service_bar" value="1" %1$s> %2$s</label><p class="description">%3$s</p>',
				checked( goldor_service_bar_enabled(), true, false ),
				esc_html__( 'Service-Leiste über dem Header anzeigen', 'goldor' ),
				esc_html__( 'Die Leiste mit Aktueller Ausgabe, Stelleninseraten und Inserat aufgeben. Auf dem Handy stehen diese Links im Menü.', 'goldor' )
			);
		},
		'reading'
	);
}
add_action( 'admin_init', 'goldor_service_bar_setting' );

/**
 * Switched off, the bar's group renders nothing, and the header's own
 * account link (otherwise hidden behind the bar's) comes back.
 */
function goldor_hide_service_bar( $block_content, $block ) {
	$class = isset( $block['attrs']['className'] ) ? $block['attrs']['className'] : '';
	if ( ! goldor_service_bar_enabled() && preg_match( '/(^|\s)service-bar(\s|$)/', $class ) ) {
		return '';
	}
	return $block_content;
}
add_filter( 'render_block_core/group', 'goldor_hide_service_bar', 10, 2 );

function goldor_service_bar_body_class( $classes ) {
	if ( goldor_service_bar_enabled() ) {
		$classes[] = 'has-service-bar';
	}
	return $classes;
}
add_filter( 'body_class', 'goldor_service_bar_body_class' );

function goldor_resource_hints( $urls, $relation_type ) {
	if ( 'preconnect' === $relation_type ) {
		$urls[] = array( 'href' => 'https://fonts.googleapis.com' );
		$urls[] = array(
			'href'        => 'https://fonts.gstatic.com',
			'crossorigin' => '',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'goldor_resource_hints', 10, 2 );

function goldor_favicons() {
	$base = get_stylesheet_directory_uri() . '/img/favicons';
	echo '<link rel="apple-touch-icon" sizes="180x180" href="' . esc_url( $base . '/apple-touch-icon.png' ) . '">' . "\n";
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . esc_url( $base . '/favicon-32x32.png' ) . '">' . "\n";
	echo '<link rel="icon" type="image/png" sizes="16x16" href="' . esc_url( $base . '/favicon-16x16.png' ) . '">' . "\n";
	echo '<link rel="manifest" href="' . esc_url( $base . '/manifest.json' ) . '">' . "\n";
	echo '<link rel="mask-icon" href="' . esc_url( $base . '/safari-pinned-tab.svg' ) . '" color="#e6007e">' . "\n";
	echo '<meta name="theme-color" content="#ffffff">' . "\n";
}
add_action( 'wp_head', 'goldor_favicons', 1 );

function goldor_analytics() {
	?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-4JX00LB4BM"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());
		gtag('config', 'G-4JX00LB4BM');
	</script>
	<?php
}
add_action( 'wp_head', 'goldor_analytics' );

/*
 * Excerpts
 */
function goldor_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'goldor_excerpt_length' );

function goldor_excerpt_more( $more ) {
	return '&#8239;.&#8239;.&#8239;.';
}
add_filter( 'excerpt_more', 'goldor_excerpt_more' );

function goldor_excerpt_read_more_link( $output ) {
	return $output . '<a href="' . esc_url( get_permalink() ) . '" class="article-more">' . esc_html__( 'mehr', 'goldor' ) . '</a>';
}
add_filter( 'the_excerpt', 'goldor_excerpt_read_more_link' );

/**
 * The sand "note" panel used for company facts and background asides, offered
 * as a block style so editors can reach it from the inspector.
 */
function goldor_register_block_styles() {
	foreach ( array( 'core/group', 'core/paragraph' ) as $block ) {
		register_block_style(
			$block,
			array(
				'name'  => 'goldor-note',
				'label' => __( 'Infobox', 'goldor' ),
			)
		);
	}

	// The pill is for the one main action per view; everything else is square.
	register_block_style(
		'core/button',
		array(
			'name'  => 'secondary',
			'label' => __( 'Nebenaktion', 'goldor' ),
		)
	);
}
add_action( 'init', 'goldor_register_block_styles' );

/*
 * Classic-content cleanup
 *
 * wpautop leaves empty paragraphs around caption shortcodes, which open large
 * unexplained gaps in the article measure; and [caption] hard-codes the
 * original upload width inline, pinning inline figures to 500px inside a
 * 780px column. Both are stripped so images fill the measure.
 */
function goldor_strip_empty_paragraphs( $content ) {
	return preg_replace( '#<p>(?:\s|&nbsp;|<br\s*/?>)*</p>#i', '', $content );
}
add_filter( 'the_content', 'goldor_strip_empty_paragraphs', 20 );

add_filter( 'img_caption_shortcode_width', '__return_zero' );

/*
 * Query tweaks
 */
function goldor_filter_orderby( $query ) {
	if ( ! $query->is_main_query() ) {
		return;
	}
	if ( $query->is_post_type_archive( 'wiki' ) ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
	}
	if ( $query->is_post_type_archive( 'lieferant' ) ) {
		$query->set( 'posts_per_page', 16 );
	}
}
add_action( 'pre_get_posts', 'goldor_filter_orderby' );

/**
 * The `job` and `magazin` entries publish under /jobs/ and /magazin/, which
 * are also page trees carried over from the classic site — /jobs/anleitung-
 * tarife/, /magazin/archiv/ and friends. A post type's single-entry rewrite
 * rule is matched before the page rules, so those pages 404 although they
 * exist and are linked from the main navigation.
 *
 * A request the post type itself cannot answer is handed back to the page of
 * the same path. Entry permalinks are matched first and so stay untouched.
 */
function goldor_page_beats_cpt_permalink( $wp ) {
	if ( empty( $wp->request ) ) {
		return;
	}

	$slug = '';
	foreach ( $wp->query_vars as $var => $value ) {
		if ( ! is_string( $value ) || '' === $value ) {
			continue;
		}
		$post_type = get_post_type_object( $var );
		if ( $post_type && $post_type->public && $post_type->rewrite ) {
			$slug = $value;
			break;
		}
	}

	if ( '' === $slug ) {
		return;
	}

	// Drafts and private entries count too, so an editor's preview of an
	// unpublished entry is never diverted to a page.
	$entry = get_posts(
		array(
			'post_type'      => $post_type->name,
			'name'           => $slug,
			'post_status'    => 'any',
			'posts_per_page' => 1,
			'fields'         => 'ids',
			'no_found_rows'  => true,
		)
	);
	if ( $entry ) {
		return;
	}

	$page = get_page_by_path( $wp->request );
	if ( ! $page || 'publish' !== $page->post_status ) {
		return;
	}

	$wp->query_vars = array( 'pagename' => $wp->request );
}
add_action( 'parse_request', 'goldor_page_beats_cpt_permalink' );

/**
 * A translated page carries its own slug — /branche/calendrier for
 * /branche/kalender, /emplois for /jobs — so a `page-{slug}.html` template
 * written for the original is never found for it.
 *
 * Every translation is offered its original's template as a candidate, which
 * keeps one template per layout instead of one per language, and covers pages
 * added later without touching the theme.
 */
function goldor_translated_page_template_hierarchy( $templates ) {
	if ( ! has_filter( 'wpml_object_id' ) ) {
		return $templates;
	}

	$page = get_queried_object();
	if ( ! $page instanceof WP_Post ) {
		return $templates;
	}

	$default_language = apply_filters( 'wpml_default_language', null );
	if ( ! $default_language ) {
		return $templates;
	}

	$original_id = apply_filters( 'wpml_object_id', $page->ID, 'page', true, $default_language );
	if ( ! $original_id || (int) $original_id === $page->ID ) {
		return $templates;
	}

	$original = get_post( $original_id );
	if ( ! $original || $original->post_name === $page->post_name ) {
		return $templates;
	}

	$candidate = 'page-' . $original->post_name . '.php';
	if ( in_array( $candidate, $templates, true ) ) {
		return $templates;
	}

	// Ahead of the generic page.php, behind everything more specific.
	$position = array_search( 'page.php', $templates, true );
	if ( false === $position ) {
		$templates[] = $candidate;
	} else {
		array_splice( $templates, $position, 0, array( $candidate ) );
	}

	return $templates;
}
add_filter( 'page_template_hierarchy', 'goldor_translated_page_template_hierarchy' );

function goldor_body_classes( $classes ) {
	if ( is_post_type_archive( 'lieferant' ) || is_tax( 'lieferant-kategorie' ) ) {
		$classes[] = 'lieferanten';
	}
	return $classes;
}
add_filter( 'body_class', 'goldor_body_classes' );

function goldor_add_custom_types_to_tax( $query ) {
	if ( ! $query->is_main_query() || is_admin() ) {
		return;
	}

	if ( $query->is_author() ) {
		$query->set( 'post_type', array( 'post', 'artikel' ) );
	} elseif ( ( $query->is_category() || $query->is_tag() ) && empty( $query->query_vars['suppress_filters'] ) ) {
		$query->set( 'post_type', get_post_types( array( 'public' => true ) ) );
	}
}
add_action( 'pre_get_posts', 'goldor_add_custom_types_to_tax' );

/*
 * Backend-only behavior (no template equivalent needed)
 */
add_action(
	'set_current_user',
	function () {
		if ( ! current_user_can( 'edit_posts' ) ) {
			show_admin_bar( false );
		}
	}
);

add_action(
	'init',
	function () {
		global $wp_rewrite;
		$wp_rewrite->author_base = 'profile';
	}
);

add_action(
	'transition_post_status',
	function ( $new_status, $old_status, $post ) {
		if ( 'print' === $post->post_type && 'publish' === $new_status && $old_status !== $new_status ) {
			$post->post_status = 'private';
			wp_update_post( $post );
		}
	},
	10,
	3
);

/*
 * Custom login screen branding
 */
add_action(
	'login_enqueue_scripts',
	function () {
		?>
		<style type="text/css">
			#login h1 a, .login h1 a {
				background-image: url(<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/img/Logo-Goldor-Magenta.svg);
				background-size: contain;
				background-position: center;
				width: 150px;
				padding-bottom: 30px;
			}
		</style>
		<?php
	}
);
add_filter( 'login_headerurl', function () { return home_url(); } );
add_filter( 'login_headertext', function () { return get_bloginfo( 'name' ); } );

/*
 * Rename the built-in "post" type to "News" in the admin
 */
add_action(
	'init',
	function () {
		global $wp_post_types;
		$labels                  = &$wp_post_types['post']->labels;
		$labels->name            = 'News';
		$labels->singular_name   = 'News';
		$labels->add_new_item    = 'Add News';
		$labels->new_item        = 'News';
		$labels->view_item       = 'View News';
		$labels->search_items    = 'Search News';
		$labels->not_found       = 'No News found';
		$labels->all_items       = 'All News';
		$labels->menu_name       = 'News';
		$labels->name_admin_bar  = 'News';
	}
);

/*
 * Comments are fully disabled site-wide
 */
add_action(
	'admin_init',
	function () {
		foreach ( get_post_types() as $post_type ) {
			if ( post_type_supports( $post_type, 'comments' ) ) {
				remove_post_type_support( $post_type, 'comments' );
				remove_post_type_support( $post_type, 'trackbacks' );
			}
		}
		remove_menu_page( 'edit-comments.php' );
		remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	}
);
add_filter( 'comments_open', '__return_false', 20 );
add_filter( 'pings_open', '__return_false', 20 );
add_filter( 'comments_array', '__return_empty_array', 10, 2 );
add_action(
	'admin_init',
	function () {
		global $pagenow;
		if ( 'edit-comments.php' === $pagenow ) {
			wp_safe_redirect( admin_url() );
			exit;
		}
	}
);
add_action(
	'init',
	function () {
		if ( is_admin_bar_showing() ) {
			remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
		}
	}
);
