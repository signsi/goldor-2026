<?php
/**
 * goldor functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package goldor
 */

if ( ! function_exists( 'goldor_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function goldor_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on goldor, use a find and replace
	 * to change 'goldor' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'goldor', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'goldor' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'goldor_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'goldor_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function goldor_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'goldor_content_width', 640 );
}
add_action( 'after_setup_theme', 'goldor_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function goldor_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'goldor' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'goldor' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'goldor_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function goldor_scripts() {
	wp_enqueue_style( 'goldor-style', get_stylesheet_uri() );

	wp_enqueue_script( 'goldor-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'goldor-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'goldor_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * New block-theme backend migration logic.
 */
require get_template_directory() . '/block-theme-logic.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


  /*************************/
 /*** Excerpt Länge *******/
/*************************/

function new_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');



  /***********************/
 /*** CPT Sorting *******/
/***********************/
add_action('pre_get_posts', 'filter_orderby');
function filter_orderby( $query ){
    if( $query->is_post_type_archive('wiki') ){
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
    }
}


  /*************************************/
 /*** CPT in Author/Tags/Categories ***/
/*************************************/
function add_custom_types_to_tax( $query ) {
	// Author
	if ( $query->is_author() && $query->is_main_query() ) {
		$query->set( 'post_type', array('artikel', 'page') );
			// Page nur weil ansonsten das Artikel-Template geladen wird
			// Da aber niemand ausser Admin Pages erstellt hat, kein Problem
		return $query;
	}

	// Tags&Category
	if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
		// Get all your post types
		$post_types = get_post_types();
		$query->set( 'post_type', $post_types );
		return $query;
	}
}
add_filter( 'pre_get_posts', 'add_custom_types_to_tax' );



  /*************************/
 /*** Legacy cleanup *******/
/*************************/
/*
 * Custom post types and taxonomies are registered centrally in block-theme-logic.php.
 * Legacy duplicate registration blocks have been removed to avoid drift and double-registration.
 */














/**************************************/
 /*** Hide Admin Bar for Subscribers ***/
/**************************************/
add_action('set_current_user', 'cc_hide_admin_bar');
function cc_hide_admin_bar() {
  if (!current_user_can('edit_posts')) {
    show_admin_bar(false);
  }
}

	/*************************/
 /*** Search Bar to Nav ***/
/*************************/
add_filter( 'wp_nav_menu_items','add_search_box', 10, 2 );
function add_search_box( $items, $args ) {
	if( $args->theme_location == 'primary' )
    $items .= '<li>' . get_search_form( false ) . '</li>';
	return $items;
}

  /****************************/
 /*** Login Bar to Sub Nav ***/
/****************************/
add_filter( 'wp_nav_menu_items', 'add_login_logout_link', 10, 2 );
function add_login_logout_link( $items, $args ) {
	if( $args->theme_location == 'secondary' ):
		ob_start();
		wp_loginout('index.php');
		$loginoutlink = ob_get_contents();
		ob_end_clean();
		$items .= '<li>'. $loginoutlink .'</li>';
	endif;
	return $items;
}

  /*************************************/
 /*** Change Passwort to Footer Nav ***/
/*************************************/
add_filter( 'wp_nav_menu_items', 'add_pw_change_link', 10, 2 );
function add_pw_change_link( $items, $args ) {
  if( is_user_logged_in() ):
		if( $args->theme_location == 'secondary' ):
			//$items .= '<li class="wide"><a href="' . get_edit_profile_url( get_current_user_id() ) . '">' . __('Passwort ändern','goldor') . '</a></li>';
			//$items .= '<li class="wide"><a href="' . get_site_url() . '/wp-login.php?action=lostpassword">' . __('Passwort ändern','goldor') . '</a></li>';
			$items .= '<li class="wide"><a href="' . get_site_url() . '/wp-admin/profile.php">' . __('Passwort ändern','goldor') . '</a></li>';
		endif;
	endif;
	return $items;
}

  /**************/
 /*** Author ***/
/**************/
add_action('init', 'cng_author_base');
function cng_author_base() {
	global $wp_rewrite;
	$author_slug = 'profile'; // change slug name
$wp_rewrite->author_base = $author_slug;
}

  /**************************/
 /*** Fallback Thumbnail ***/
/**************************/
add_filter( 'wp_get_attachment_image_src', 'filter_fallback_thumbnail' );
function filter_fallback_thumbnail( $image ){
	if ( !has_post_thumbnail() && !get_post_type()==="werbung" ) {
			$image = array(get_template_directory() . '/img/Fallback_Thumbnail.jpg', 48, 64);
	}
	return $image;
}

  /*****************************************/
 /*** Make Header Shrink on Page Scroll ***/
/*****************************************/
add_action ('wp_footer','vr_shrink_head',1);
function vr_shrink_head() { ?>
<script>
	function init() {
	    window.addEventListener('scroll', function(e){
	        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
	            shrinkOn = 100;
	        if (distanceY > shrinkOn) {
	            document.getElementById("masthead").className = "site-header shrink";
	        } else {
	            document.getElementById("masthead").className = "site-header";
	        }
	    });
	}
	window.onload = init();
</script>
<?php }

   /***********************************************************************************/
	/*** Artikel: Estimated reading time required to read the article + Social Links ***/
 /*** News: Social Links ************************************************************/
/***********************************************************************************/
function get_post_functions() {
	$post = get_post();

	if ( $post ):
		$string = "<div class='post-functions'>";

		if ( get_post_type() === 'artikel' ) :
			// Estimated Reading Time
			$words = str_word_count( strip_tags( $post->post_content ) );
			$minutes = floor( $words / 200 );
			$seconds = floor( $words % 200 / ( 200 / 60 ) );

			if ( $minutes >= 1):
				$string .= "<p>" . __('Lesezeit','goldor') . "</p>";
				$string .= "<p class='time'>";
				if ( $minutes >= 1 ):
					//$estimated_time = $minutes . ' minute' . ($minutes == 1 ? '' : 's') . ', ' . $seconds . ' second' . ($seconds == 1 ? '' : 's');
					$string .= $minutes . 'm' . ' ' . $seconds . 's';
				else:
					$string .= $seconds . 's';
				endif;
				$string .= "</p>";
			endif;

		endif;

		// Social Links
		$link_facebook = "https://www.facebook.com/sharer/sharer.php?u=" . get_permalink( $post->ID );
		$link_twitter = "http://twitter.com/share?text=" . $post->post_title . "&amp;url=" . get_permalink( $post->ID );
		$string .= "<p>" . __('Share','goldor') . "</p>";
		$string .= "<p><a class='facebook' href='$link_facebook' title='auf Facebook teilen' target='_blank'>&nbsp;</a>";
		$string .= "<a class='twitter' href='$link_twitter' title='auf Twitter teilen' target='_blank'>&nbsp;</a>";
		$string .= "</p></div><!-- .post-functions -->";
	endif;

	return $string;
}

  /**************************************/
 /*** Add Custom Post Types to Query ***/    /*Eventuell mal praktisch! Custom Posts zu Posts hinzufügen*/
/**************************************/
/*add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
  if ( is_home() && $query->is_main_query() )
    $query->set( 'post_type', array( 'post', 'artikel' ) );
  return $query;
}*/

  /*********************/
 /*** Force Private ***/
/*********************/
/*function force_type_private($post)
{
    if ($post['post_type'] == 'print')
    		$post['post_status'] = 'private';
    return $post;
}
add_filter('wp_insert_post_data', 'force_type_private');*/
/*function force_type_private($post)
{
    if ($post['post_type'] == 'print'){
        if ($post['post_status'] != 'trash') $post['post_status'] = 'private';
    }
    return $post;
}
add_filter('wp_insert_post_data', 'force_type_private');*/
add_action( 'transition_post_status', 'wpse118970_post_status_new', 10, 3 );
function wpse118970_post_status_new( $new_status, $old_status, $post ) {
    if ( $post->post_type == 'print' && $new_status == 'publish' && $old_status  != $new_status ) {
        $post->post_status = 'private';
        wp_update_post( $post );
    }
}


  /**************************/
 /*** Custom Global Vars ***/
/**************************/
function goldor_global_vars( ) {
}

  /***************************/
 /*** Custom Login Screen ***/
/***************************/
function my_login_logo() { ?>
	<style type='text/css'>
		#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/Logo-Goldor-Magenta.svg);
			background-size:contain; background-position: center;
			width:150px; padding-bottom: 30px;
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
  return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
  return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

  /********************************/
 /*** Rename [...] to ... mehr ***/
/********************************/
//No Read More Button for long Excerpt, show "..." instead
function wpdocs_excerpt_more( $more ) {
	/*return sprintf( '&#8239;.&#8239;.&#8239;.&nbsp;&nbsp;&nbsp;<a class="article-more" href="%1$s">%2$s</a>',
			get_permalink( get_the_ID() ),
			__( 'mehr', 'textdomain' )
	);*/
	return sprintf( '&#8239;.&#8239;.&#8239;.', '', '' );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

//Read More Button For every Excerpt
function themeprefix_excerpt_read_more_link( $output ) {
	global $post;
	return $output . '<a href="' . get_permalink( $post->ID ) . '" class="article-more" title="mehr">' . __('mehr','goldor') . '</a>';
}
add_filter( 'the_excerpt', 'themeprefix_excerpt_read_more_link' );


  /******************************/
 /*** Rename Beitrag to News ***/
/******************************/
function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News';
    $submenu['edit.php'][16][0] = 'News Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'News';
    $labels->add_new = 'Add News';
    $labels->add_new_item = 'Add News';
    $labels->edit_item = 'Edit News';
    $labels->new_item = 'News';
    $labels->view_item = 'View News';
    $labels->search_items = 'Search News';
    $labels->not_found = 'No News found';
    $labels->not_found_in_trash = 'No News found in Trash';
    $labels->all_items = 'All News';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'News';
}

add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );


  /*************************/
 /*** Disable Comments ****/
/*************************/
// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');

/*
add_filter('wpml_user_can_translate', function ($user_can_translate, $user){
	if (in_array('editor', (array) $user->roles, true) && current_user_can('translate')) {
		return true;
	}
		
	return $user_can_translate;
}, 10, 2);
*/