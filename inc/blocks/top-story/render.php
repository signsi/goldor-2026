<?php
/**
 * Homepage hero: the News/Artikel post flagged `topstory`, falling back to the
 * most recent entry so the hero slot is never empty.
 *
 * @package goldor
 */

// The whole card is the link; a separate button is only shown when set.
$cta = isset( $attributes['cta'] ) ? $attributes['cta'] : '';

$post_id = goldor_top_story_id();
if ( ! $post_id ) {
	return;
}
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'top-story' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php
	echo goldor_render_story_card( // phpcs:ignore WordPress.Security.EscapeOutput
		$post_id,
		array(
			'variant'    => 'hero',
			'image_size' => 'large',
			'heading'    => 'h1',
			'cta'        => $cta,
			'eyebrow'    => goldor_post_eyebrow( $post_id ),
		)
	);
	?>
</div>
