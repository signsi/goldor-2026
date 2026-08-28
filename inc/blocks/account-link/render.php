<?php
/**
 * "Anmelden" for guests, or account + logout links for logged-in users — the
 * block-theme replacement for the old wp_nav_menu_items injections (the block
 * Navigation editor can't be filtered that way).
 *
 * @package goldor
 */

$icon = '<svg class="account-link__icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true" focusable="false"><circle cx="12" cy="8" r="3.6"/><path d="M4.8 20c0-3.6 3.2-5.8 7.2-5.8s7.2 2.2 7.2 5.8"/></svg>';
?>
<div <?php echo get_block_wrapper_attributes( array( 'class' => 'account-link' ) ); // phpcs:ignore WordPress.Security.EscapeOutput ?>>
	<?php if ( is_user_logged_in() ) : ?>
		<a class="account-link__item" href="<?php echo esc_url( admin_url( 'profile.php' ) ); ?>">
			<?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput ?>
			<span><?php esc_html_e( 'Mein Konto', 'goldor' ); ?></span>
		</a>
		<a class="account-link__item account-link__item--plain" href="<?php echo esc_url( wp_logout_url( home_url( '/' ) ) ); ?>">
			<span><?php esc_html_e( 'Abmelden', 'goldor' ); ?></span>
		</a>
	<?php else : ?>
		<a class="account-link__item" href="<?php echo esc_url( wp_login_url( home_url( '/' ) ) ); ?>">
			<?php echo $icon; // phpcs:ignore WordPress.Security.EscapeOutput ?>
			<span><?php esc_html_e( 'Anmelden', 'goldor' ); ?></span>
		</a>
	<?php endif; ?>
</div>
