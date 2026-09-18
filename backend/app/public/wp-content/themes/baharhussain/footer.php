<?php
defined( 'ABSPATH' ) || exit;

/**
 * The template for displaying website footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

list( $bh_var_post_id, $bh_fields, $bh_option_fields ) = THS::defaults();
$bh_var_footer_scripts = $bh_option_fields['footer_scripts'] ?? '';
$bh_is_contact_page    = is_page_template( 'template-contact.php' );
?>
</main>

<footer id="footer-section" class="footer-section">
	<div class="footer-ctn site-footer">
		<div class="wrapper">
			<div class="site-footer__box">
				<div class="site-footer__main">
					<div class="site-footer__brand">
						<a class="site-footer__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) . ' Home' ); ?>">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/site-logo.svg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="330" height="40">
						</a>
						<p><?php esc_html_e( 'Custom WordPress development built around your project needs.', 'baharhussain' ); ?></p>
					</div>

					<nav class="site-footer__nav" aria-label="<?php esc_attr_e( 'Quick links', 'baharhussain' ); ?>">
						<h2><?php esc_html_e( 'Quick Links', 'baharhussain' ); ?></h2>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer-nav',
								'fallback_cb'    => false,
								'container'      => false,
								'menu_class'     => 'site-footer__menu',
								'depth'          => 1,
							)
						);
						?>
					</nav>

					<div class="site-footer__contact-column">
						<h2><?php esc_html_e( 'Contact', 'baharhussain' ); ?></h2>
						<ul class="site-footer__contact">
							<li>
								<span aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M4 6h16v12H4z" /><path d="m4 7 8 6 8-6" /></svg></span>
								<a href="mailto:bahar@baharhussain.com"><?php esc_html_e( 'bahar@baharhussain.com', 'baharhussain' ); ?></a>
							</li>
							<li>
								<span aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M12 21s7-5.2 7-11a7 7 0 0 0-14 0c0 5.8 7 11 7 11Z" /><circle cx="12" cy="10" r="2.5" /></svg></span>
								<?php esc_html_e( 'Lahore, Pakistan', 'baharhussain' ); ?>
							</li>
							<li>
								<span aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M6.5 10v8M6.5 6v.01M11 18v-4.5a3 3 0 0 1 6 0V18M11 10v8" /></svg></span>
								<a href="https://www.linkedin.com/in/bahar-hussain/" target="_blank" rel="noopener noreferrer"><?php esc_html_e( 'Connect on LinkedIn', 'baharhussain' ); ?></a>
							</li>
							<li>
								<span aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M7.2 3.5 10 7.8 7.9 10a15.8 15.8 0 0 0 6.1 6.1l2.2-2.1 4.3 2.8-.8 3.4c-.2.8-.9 1.3-1.7 1.3A15.5 15.5 0 0 1 2.5 6c0-.8.5-1.5 1.3-1.7l3.4-.8Z" /></svg></span>
								<a href="tel:+923474849527"><?php esc_html_e( '+923474849527', 'baharhussain' ); ?></a>
							</li>
						</ul>
					</div>

					<div class="site-footer__cta">
						<span class="site-footer__cta-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<path d="M21 3 10 14" />
								<path d="m21 3-7 20-4-9-9-4 20-7Z" />
							</svg>
						</span>
						<h2><?php esc_html_e( 'Ready to Move Your Project Forward?', 'baharhussain' ); ?></h2>
						<p><?php esc_html_e( 'Share what you are planning, and I will help you find a clear and practical next step.', 'baharhussain' ); ?></p>
						<a class="button main-btn" href="<?php echo esc_url( $bh_is_contact_page ? '#contact-project-form' : home_url( '/contact/' ) ); ?>">
							<span class="button-text"><?php esc_html_e( 'Discuss Your Project', 'baharhussain' ); ?></span>
							<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
								<path d="M5 12h14" />
								<path d="m13 6 6 6-6 6" />
							</svg>
						</a>
						<a class="button outline-btn" href="https://calendly.com/baharhussain/schedule" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Schedule a Meeting (opens in a new tab)', 'baharhussain' ); ?>" title="<?php esc_attr_e( 'Schedule a Meeting', 'baharhussain' ); ?>">
							<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.7"></rect><path d="M7 3v4M17 3v4M3 10h18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"></path></svg>
							<span class="button-text"><?php esc_html_e( 'Schedule a Meeting', 'baharhussain' ); ?></span>
						</a>
					</div>
				</div>
				<div class="site-footer__bottom flex-between-center">
					<p><?php printf( esc_html__( '© %s Bahar Hussain. All rights reserved.', 'baharhussain' ), esc_html( gmdate( 'Y' ) ) ); ?></p>
					<nav class="site-footer__legal" aria-label="<?php esc_attr_e( 'Legal links', 'baharhussain' ); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'legal-nav',
								'fallback_cb'    => false,
								'container'      => false,
								'menu_class'     => 'site-footer__legal-menu',
								'depth'          => 1,
							)
						);
						?>
					</nav>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
<?php if ( '' !== $bh_var_footer_scripts ) { ?>
	<div style="display: none;">
		<?php
		defined( 'ABSPATH' ) || exit;

		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- admin-only ACF field containing intentional footer scripts.
		echo $bh_var_footer_scripts;
		?>
	</div>
<?php } ?>
</body>

</html>
