<?php

/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package goldor
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital@0;1&family=Work+Sans:ital,wght@0,300;1,300&display=swap"
		rel="stylesheet">


	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180"
		href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png"
		href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicons/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png"
		href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicons/manifest.json">
	<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicons/safari-pinned-tab.svg"
		color="#e6007e">
	<meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-4JX00LB4BM"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-4JX00LB4BM');
	</script>

</head>

<body <?php body_class(); ?>>

	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'goldor'); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<h1 class="site-title">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" rel="home">
						<span class="helper"></span>
						<?php include ("img/Logo-Goldor.svg"); ?>
					</a>
				</h1>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle" aria-controls="primary-menu"
					aria-expanded="false"><?php esc_html_e('Primary Menu', 'goldor'); ?></button>
				<?php wp_nav_menu(array('theme_location' => 'primary', 'menu_id' => 'primary-menu')); ?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->

		<div class="entry-nav">
			<ul>
				<?php if (is_single()):
					if (get_post_type() === "post") {
						$archive_link = "news";
					} else {
						$archive_link = get_post_type_archive_link(get_post_type());
					} ?>
					<li><a href="#" onclick="window.history.go(-1);" class="list-more-"><?php _e('Zurück', 'goldor'); ?></a>
					</li>
					<li><a href="<?php echo $archive_link; ?>"><?php _e('All entries', 'goldor'); ?></a></li>
				<?php endif; ?>
			</ul>&nbsp;
		</div>

		<?php do_action('wpml_add_language_selector'); ?>

		<?php
		if (is_front_page() && is_home()):
			$args = array(
				'post_type' => array('post', 'artikel'),
				'posts_per_page' => 1,
				'meta_query' => array(
					array(
						'key' => 'topstory',
						'value' => '1',
						'compare' => '=='
					)
				)
			);

			$loop = new WP_Query($args);

			while ($loop->have_posts()):
				$loop->the_post();
				$thumb_id = get_post_thumbnail_id();
				$thumb_url = wp_get_attachment_image_src($thumb_id, 'large', true);
				$categories = get_the_category();
				$link = get_post_permalink();
				?>
				<div class="top-story" style="background-image:url(<?php echo $thumb_url[0]; ?>)"
					onclick="location.href='<?php echo $link; ?>'">
					<div class="top-story-text">
						<div class="top-story-title">
							<h1><a href="<?php echo $link ?>"><?php the_title(); ?></a></h1>
						</div>
						<div class="top-story-excerpt"><?php the_excerpt(); ?></div>
					</div>
				</div><!-- .top-story -->
			<?php endwhile;
		else:
		endif;
		?>

		<div id="content" class="site-content">