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
 * Block-theme backend logic: CPTs, taxonomies, meta, dynamic blocks, iCal endpoint.
 */
require get_template_directory() . '/block-theme-logic.php';

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
		'1.0',
		true
	);
}
add_action( 'wp_enqueue_scripts', 'goldor_scripts' );

/**
 * The three faces the design is built on: Arvo for headings, Source Serif 4
 * for reading text, Inter for UI chrome (nav, buttons, meta, labels).
 */
function goldor_fonts_url() {
	return 'https://fonts.googleapis.com/css2'
		. '?family=Arvo:ital,wght@0,400;0,700;1,400;1,700'
		. '&family=Inter:ital,opsz,wght@0,14..32,300..700;1,14..32,300..700'
		. '&family=Source+Serif+4:ital,opsz,wght@0,8..60,300..700;1,8..60,300..700'
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

	return sprintf(
		'<div class="wp-block-site-logo %5$s"><a href="%1$s" class="custom-logo-link" rel="home"><img class="custom-logo" src="%2$s" alt="%3$s" width="%4$d" style="width:%4$dpx"></a></div>',
		esc_url( home_url( '/' ) ),
		esc_url( get_template_directory_uri() . '/img/' . $file ),
		esc_attr( get_bloginfo( 'name' ) ),
		$width,
		esc_attr( $classes )
	);
}
add_filter( 'render_block_core/site-logo', 'goldor_site_logo_fallback', 10, 2 );

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
