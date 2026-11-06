<?php
/**
 * Dark mode. The page follows the device setting; the header switch
 * (goldor/theme-toggle) overrides it and the choice is kept in the browser.
 *
 * The colours live in style.css under :root[data-theme="dark"]. The attribute
 * is set by a tiny inline script in <head>, before the stylesheet paints, so a
 * dark reader never sees a white flash. Without JavaScript the page stays
 * light.
 *
 * @package goldor
 */

/**
 * Sets data-theme on <html> before first paint.
 */
function goldor_darkmode_head_script() {
	?>
	<script>
	(function () {
		var stored = null;
		try { stored = localStorage.getItem( 'goldor-theme' ); } catch ( e ) {}
		var dark = stored === 'dark' || ( stored !== 'light' && window.matchMedia && window.matchMedia( '(prefers-color-scheme: dark)' ).matches );
		document.documentElement.setAttribute( 'data-theme', dark ? 'dark' : 'light' );
	})();
	</script>
	<meta name="color-scheme" content="light dark">
	<?php
}
add_action( 'wp_head', 'goldor_darkmode_head_script', 0 );

/**
 * The switch's behaviour; small and needed on every page with the header.
 */
function goldor_darkmode_scripts() {
	$file = get_template_directory() . '/assets/theme-toggle.js';
	wp_enqueue_script(
		'goldor-theme-toggle',
		get_template_directory_uri() . '/assets/theme-toggle.js',
		array(),
		filemtime( $file ),
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);
}
add_action( 'wp_enqueue_scripts', 'goldor_darkmode_scripts' );
