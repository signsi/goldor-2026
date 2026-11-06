<?php
/**
 * "Von der Redaktion empfohlen" as an archive: every News or Artikel entry the
 * editors have ever picked under Startseite, the latest pick first.
 *
 * The picks themselves are only the three ids on the Startseite settings
 * (inc/startseite.php). So that earlier picks are not forgotten, each entry
 * is stamped with the moment it was picked (meta `goldor_empfohlen_am`, on
 * all its translations). Picking an entry again moves it back to the top.
 * Picks made before this existed are stamped the first time they render.
 *
 * Served at /empfohlen/ (French /fr/recommandations/) by the
 * archive-empfohlen template.
 *
 * @package goldor
 */

const GOLDOR_PICKED_META = 'goldor_empfohlen_am';

/**
 * The archive's path per language.
 */
function goldor_empfohlen_slugs() {
	return array(
		'de' => 'empfohlen',
		'fr' => 'recommandations',
	);
}

/**
 * The archive's URL in the current language.
 */
function goldor_empfohlen_url() {
	$slugs = goldor_empfohlen_slugs();
	$lang  = goldor_current_language();
	$slug  = isset( $slugs[ $lang ] ) ? $slugs[ $lang ] : $slugs['de'];
	return home_url( user_trailingslashit( $slug ) );
}

/**
 * Stamps an entry and its translations as picked now.
 */
function goldor_mark_picked( $post_id ) {
	$post_id = (int) $post_id;
	if ( ! $post_id ) {
		return;
	}

	$ids  = array( $post_id );
	$type = 'post_' . get_post_type( $post_id );
	$trid = apply_filters( 'wpml_element_trid', null, $post_id, $type );
	if ( $trid ) {
		foreach ( (array) apply_filters( 'wpml_get_element_translations', array(), $trid, $type ) as $translation ) {
			if ( ! empty( $translation->element_id ) ) {
				$ids[] = (int) $translation->element_id;
			}
		}
	}

	$now = time();
	foreach ( array_unique( $ids ) as $id ) {
		update_post_meta( $id, GOLDOR_PICKED_META, $now );
	}
}

/**
 * The picks as they were before the Startseite settings are saved, so the
 * newly added ones can be told apart afterwards.
 */
function goldor_picks_before_save( $post_id ) {
	if ( GOLDOR_HOME_POST_TYPE === get_post_type( (int) $post_id ) ) {
		$GLOBALS['goldor_picks_before'] = array_map( 'intval', (array) get_post_meta( (int) $post_id, 'redaktion_empfohlen', true ) );
	}
}
add_action( 'acf/save_post', 'goldor_picks_before_save', 5 );

function goldor_picks_after_save( $post_id ) {
	if ( GOLDOR_HOME_POST_TYPE !== get_post_type( (int) $post_id ) ) {
		return;
	}
	$before = isset( $GLOBALS['goldor_picks_before'] ) ? $GLOBALS['goldor_picks_before'] : array();
	$after  = array_map( 'intval', (array) get_post_meta( (int) $post_id, 'redaktion_empfohlen', true ) );

	foreach ( $after as $id ) {
		if ( ! in_array( $id, $before, true ) || ! get_post_meta( $id, GOLDOR_PICKED_META, true ) ) {
			goldor_mark_picked( $id );
		}
	}
}
add_action( 'acf/save_post', 'goldor_picks_after_save', 20 );

/**
 * Picks that predate the stamp get it when they first show on the homepage.
 */
function goldor_stamp_unmarked_picks( $post_ids ) {
	foreach ( $post_ids as $id ) {
		if ( ! get_post_meta( $id, GOLDOR_PICKED_META, true ) ) {
			goldor_mark_picked( $id );
		}
	}
}

/*
 * Routing.
 */
function goldor_empfohlen_rewrite() {
	foreach ( array_unique( goldor_empfohlen_slugs() ) as $slug ) {
		add_rewrite_rule( '^' . $slug . '/?$', 'index.php?goldor_empfohlen=1', 'top' );
		add_rewrite_rule( '^' . $slug . '/page/([0-9]+)/?$', 'index.php?goldor_empfohlen=1&paged=$matches[1]', 'top' );
	}

	// New rules take effect once, on the first request after a theme update.
	// Its own option: goldor_rewrite_version belongs to inc/werbung.php, and
	// sharing it would rebuild the rules on every request.
	$version = '1';
	if ( get_option( 'goldor_empfohlen_rewrite' ) !== $version ) {
		flush_rewrite_rules( false );
		update_option( 'goldor_empfohlen_rewrite', $version, true );
	}
}
add_action( 'init', 'goldor_empfohlen_rewrite', 20 );

function goldor_empfohlen_query_var( $vars ) {
	$vars[] = 'goldor_empfohlen';
	return $vars;
}
add_filter( 'query_vars', 'goldor_empfohlen_query_var' );

function goldor_is_empfohlen() {
	return (bool) get_query_var( 'goldor_empfohlen' );
}

/**
 * The main query: picked News and Artikel, latest pick first. Flagged as an
 * archive so it renders with the archive templates and pagination.
 */
function goldor_empfohlen_query( $query ) {
	if ( is_admin() || ! $query->is_main_query() || ! $query->get( 'goldor_empfohlen' ) ) {
		return;
	}

	$query->set( 'post_type', GOLDOR_HOME_PICKS_TYPES );
	$query->set( 'meta_key', GOLDOR_PICKED_META );
	$query->set( 'orderby', array( 'meta_value_num' => 'DESC', 'date' => 'DESC' ) );
	$query->set( 'ignore_sticky_posts', true );

	$query->is_home    = false;
	$query->is_archive = true;
}
add_action( 'pre_get_posts', 'goldor_empfohlen_query' );

function goldor_empfohlen_template_hierarchy( $templates ) {
	return goldor_is_empfohlen() ? array_merge( array( 'archive-empfohlen' ), $templates ) : $templates;
}
add_filter( 'archive_template_hierarchy', 'goldor_empfohlen_template_hierarchy' );

function goldor_empfohlen_document_title( $parts ) {
	if ( goldor_is_empfohlen() ) {
		$parts['title'] = __( 'Von der Redaktion empfohlen', 'goldor' );
	}
	return $parts;
}
add_filter( 'document_title_parts', 'goldor_empfohlen_document_title' );

/**
 * The language switcher would otherwise offer the homepage; point it at the
 * same archive in the other language.
 */
function goldor_empfohlen_language_links( $languages ) {
	if ( ! goldor_is_empfohlen() || ! is_array( $languages ) ) {
		return $languages;
	}
	$slugs = goldor_empfohlen_slugs();
	foreach ( $languages as $code => $language ) {
		$slug = isset( $slugs[ $code ] ) ? $slugs[ $code ] : $slugs['de'];
		$home = apply_filters( 'wpml_permalink', home_url( '/' ), $code, true );
		$languages[ $code ]['url'] = trailingslashit( $home ) . user_trailingslashit( $slug );
	}
	return $languages;
}
add_filter( 'icl_ls_languages', 'goldor_empfohlen_language_links' );

/**
 * No picks in this language yet is an empty list, not a missing page.
 */
function goldor_empfohlen_no_404( $preempt ) {
	if ( goldor_is_empfohlen() && ! is_paged() ) {
		status_header( 200 );
		return true;
	}
	return $preempt;
}
add_filter( 'pre_handle_404', 'goldor_empfohlen_no_404' );
