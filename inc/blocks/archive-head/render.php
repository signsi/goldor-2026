<?php
/**
 * The opening head of every archive: an Inter eyebrow naming the section, the
 * Arvo title, and a lead.
 *
 * One block serves the post type archives and their taxonomy views, because a
 * category archive should say "Kalender / Messen", not "Archiv: Messen" — and
 * a term the editors have described in the admin should show that description
 * rather than the template's generic lead.
 *
 * @package goldor
 */

$eyebrow = isset( $attributes['eyebrow'] ) ? $attributes['eyebrow'] : '';
$title   = isset( $attributes['title'] ) ? $attributes['title'] : '';
$lead    = isset( $attributes['lead'] ) ? $attributes['lead'] : '';
$section = goldor_post_type_section_label( goldor_queried_post_type() );

if ( is_tax() || is_category() || is_tag() ) {
	$term = get_queried_object();
	if ( $term instanceof WP_Term ) {
		if ( ! $title ) {
			$title = $term->name;
		}
		if ( ! $eyebrow ) {
			$eyebrow = $section;
		}
		$description = trim( wp_strip_all_tags( term_description( $term ) ) );
		if ( $description ) {
			$lead = $description;
		}
	}
} elseif ( is_post_type_archive() ) {
	$queried = get_queried_object();
	if ( ! $title ) {
		$title = $section ? $section : ( $queried instanceof WP_Post_Type ? $queried->labels->name : '' );
	}
} elseif ( is_author() ) {
	if ( ! $title ) {
		$title = get_the_author_meta( 'display_name', (int) get_query_var( 'author' ) );
	}
	if ( ! $eyebrow ) {
		$eyebrow = __( 'Autorin / Autor', 'goldor' );
	}
} elseif ( is_search() ) {
	if ( ! $title ) {
		/* translators: %s: the search term. */
		$title = sprintf( __( '«%s»', 'goldor' ), get_search_query() );
	}
	if ( ! $eyebrow ) {
		$eyebrow = __( 'Suche', 'goldor' );
	}
} elseif ( ! $title ) {
	$title = get_the_archive_title();
}

// An eyebrow that only repeats the title below it is noise, not orientation.
if ( $eyebrow && $title && 0 === strcasecmp( $eyebrow, $title ) ) {
	$eyebrow = '';
}

if ( ! $title && ! $eyebrow && ! $lead ) {
	return;
}
?>
<header <?php echo get_block_wrapper_attributes( array( 'class' => 'archive-head' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php if ( $eyebrow ) : ?>
		<p class="archive-head__eyebrow"><?php echo esc_html( $eyebrow ); ?></p>
	<?php endif; ?>

	<?php if ( $title ) : ?>
		<h1 class="archive-head__title"><?php echo esc_html( $title ); ?></h1>
	<?php endif; ?>

	<?php if ( $lead ) : ?>
		<p class="archive-head__lead"><?php echo esc_html( $lead ); ?></p>
	<?php endif; ?>
</header>
