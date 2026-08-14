<?php
/**
 * Template part for single grid item.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package goldor
 */

?>

<?php
	$thumb_id = get_post_thumbnail_id();
	$thumb_url = wp_get_attachment_image_src($thumb_id, 'medium', true);
	$link = get_post_permalink();

	// Category
	if ( get_post_type() === 'post' ) :
		$categories = get_the_category();
	else:
		$categories = wp_get_post_terms( get_the_ID(), get_post_type() . '-kategorie', array('orderby' => 'name', 'order' => 'ASC', 'fields' => 'all') );
	endif;
?>

<div class="grid-item">
	<div class="item-image" style="background-image:url(<?php echo $thumb_url[0]; ?>)" onclick="location.href='<?php echo $link; ?>'">
		<?php
			if ( get_post_type() != 'magazin' ) :
				if ( ! empty( $categories ) ):
						if ( get_post_type() != 'magazin' ) :
								echo '<span class="item-category">' . esc_html( $categories[0]->name ) . '</span>';
						else:
								echo '<a class="item-category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
						endif;
				endif;

				// Paywall (Artikel)
				if ( get_post_type() === 'artikel' ) :
					$paywall = get_post_meta( get_the_ID(), 'paywall', true);
					if ( $paywall ):
						echo "<div class='item-paywall'>&nbsp;</div>";
					endif;
				endif;

			endif;
		?>
	</div>
	<a href="<?php echo $link; ?>"><h2><?php the_title(); ?></h2></a>
	<?php
			// if( array_key_exists('posttype', $GLOBALS) && $GLOBALS['posttype'] === 'lieferant'  ) {
			// 		if( has_excerpt() ) {
			// 				echo( get_the_excerpt() );
			// 		} else {
			// 				$content = get_the_excerpt();
			// 				$content = wp_trim_words( $content , 10 );
			// 				echo( $content );
			// 		}
			// } else {
			// 		the_excerpt();
			// }
	?>
</div>
