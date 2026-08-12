<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package goldor
 */

if ( ! function_exists( 'goldor_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function goldor_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);


	if ( get_post_type() != 'post' ):
		$categories = wp_get_post_terms( get_the_ID(), get_post_type() . '-kategorie', array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all') );
	else:
		$categories = get_the_category();
	endif;


	//$categories = get_the_category();

	$autor = sprintf(
		esc_html_x( '%s', 'post author', 'goldor' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	$date = sprintf(
		esc_html_x( '%s', 'post date', 'goldor' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$category = sprintf(
		esc_html_x( '%s', 'post category', 'goldor' ),
		'<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" rel="bookmark">' . esc_html( $categories[0]->name ) .  '</a>'
	);

	if ( 'post' === get_post_type() ) :
		echo '<span class="post-date">' . $date . '</span>&nbsp;&nbsp;&nbsp;<span class="post-category">' . $category . '</span>'; // WPCS: XSS OK.
	else:
		echo '<span class="post-by">' . $autor . '</span>&nbsp;&nbsp;&nbsp;<span class="post-date">' . $date . '</span>&nbsp;&nbsp;&nbsp;<span class="post-category">' . $category . '</span>'; // WPCS: XSS OK.
	endif;

}
endif;

if ( ! function_exists( 'goldor_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function goldor_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'goldor' ) );
		if ( $categories_list && goldor_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'goldor' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'goldor' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'goldor' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'goldor' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'goldor' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function goldor_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'goldor_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'goldor_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so goldor_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so goldor_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in goldor_categorized_blog.
 */
function goldor_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'goldor_categories' );
}
add_action( 'edit_category', 'goldor_category_transient_flusher' );
add_action( 'save_post',     'goldor_category_transient_flusher' );
