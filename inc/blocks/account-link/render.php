<?php
/**
 * Login link for guests, or logout + change-password links for logged-in
 * users — the block-theme replacement for the old wp_nav_menu_items
 * injections (the block Navigation editor can't be filtered that way).
 *
 * @package goldor
 */
?>
<ul <?php echo get_block_wrapper_attributes( array( 'class' => 'wp-block-navigation__container' ) ); // phpcs:ignore ?>>
	<?php if ( is_user_logged_in() ) : ?>
		<li class="wp-block-navigation-item">
			<a class="wp-block-navigation-item__content" href="<?php echo esc_url( admin_url( 'profile.php' ) ); ?>">
				<?php esc_html_e( 'Passwort ändern', 'goldor' ); ?>
			</a>
		</li>
		<li class="wp-block-navigation-item">
			<a class="wp-block-navigation-item__content" href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>">
				<?php esc_html_e( 'Logout', 'goldor' ); ?>
			</a>
		</li>
	<?php else : ?>
		<li class="wp-block-navigation-item">
			<a class="wp-block-navigation-item__content" href="<?php echo esc_url( wp_login_url( home_url( '/' ) ) ); ?>">
				<?php esc_html_e( 'Login', 'goldor' ); ?>
			</a>
		</li>
	<?php endif; ?>
</ul>
