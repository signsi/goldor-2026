<?php
/**
 * "Von der Redaktion empfohlen": the posts the editors pick under Startseite (see
 * inc/startseite.php), in their order, as story cards. Picks are a
 * deliberate choice, so they appear even if a section above already shows
 * them. Without picks the block outputs nothing and its band collapses.
 *
 * @package goldor
 */

$posts = goldor_home_editor_picks();
if ( ! $posts ) {
	return;
}
goldor_stamp_unmarked_picks( $posts );
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'section-picks editor-picks' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php
	// The head leads on to every entry the editors have ever picked
	// (inc/empfohlen.php), not just the three shown here.
	$link_label = ! empty( $attributes['linkLabel'] ) ? $attributes['linkLabel'] : '';
	echo goldor_render_section_head( // phpcs:ignore WordPress.Security.EscapeOutput
		__( 'Von der Redaktion empfohlen', 'goldor' ),
		$link_label ? goldor_empfohlen_url() : '',
		$link_label
	);
	?>
	<div class="grid-container">
		<?php foreach ( $posts as $post_id ) : ?>
			<?php echo goldor_render_story_card( $post_id ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
		<?php endforeach; ?>
	</div>
</div>
