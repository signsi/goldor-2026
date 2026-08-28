<?php
/**
 * Scroll-progress bar. Rendered empty and driven by assets/article.js, which
 * removes it entirely when the reader prefers reduced motion.
 *
 * @package goldor
 */
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'reading-progress' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?> aria-hidden="true">
	<span class="reading-progress__bar" data-goldor-progress></span>
</div>
