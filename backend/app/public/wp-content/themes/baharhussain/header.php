<?php
defined( 'ABSPATH' ) || exit;

/**
 * The template for displaying website header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

list( $bh_var_post_id, $bh_fields, $bh_option_fields ) = THS::defaults();

$bh_var_tracking = $bh_option_fields['custom_scripts'] ?? '';
$bh_var_ccss     = $bh_option_fields['custom_css'] ?? '';
$bh_var_hscripts = $bh_option_fields['head_scripts'] ?? '';
$bh_var_bscripts = $bh_option_fields['body_scripts'] ?? '';
$bh_var_cta      = $bh_option_fields['ths_var_tohdr_btn'] ?? null;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-W8W4JQDB');</script>
	<!-- End Google Tag Manager -->
	<meta name="google-adsense-account" content="ca-pub-1039887015960428">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="color-scheme" content="light">
	<?php
	if ( THS::if_live() && '' !== $bh_var_hscripts ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- admin-only ACF field containing intentional script tags.
		echo $bh_var_hscripts;
	}
	?>
	<meta name="theme-color" content="#f2f2f2">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="application-name" content="Bahar Hussain Theme">
	<meta name="msapplication-navbutton_color" content="#f2f2f2">
	<meta name="msapplication-TileColor" content="#f2f2f2">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="apple-mobile-web-app-status-bar-style" content="#f2f2f2">
	<meta name="description" content="<?php echo esc_attr( get_the_title() ); ?>">
	<?php
	if ( '' !== $bh_var_tracking ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- admin-only ACF field containing intentional tracking scripts.
		echo $bh_var_tracking;
	}

	if ( '' !== $bh_var_ccss ) {
		echo '<style type="text/css">';
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- CSS output inside <style> tag; wp_strip_all_tags() prevents injection.
		echo wp_strip_all_tags( $bh_var_ccss );
		echo '</style>';
	}

	wp_head();
	?>
</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8W4JQDB"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php wp_body_open(); ?>
	<?php if ( THS::if_live() && '' !== $bh_var_bscripts ) : ?>
		<div style="display: none;">
			<?php
			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- admin-only ACF field containing intentional body scripts.
			echo $bh_var_bscripts;
			?>
		</div>
	<?php endif; ?>

	<a class="skip-link screen-reader-text" href="#page-section"><?php esc_html_e( 'Skip to content', 'baharhussain' ); ?></a>
	<header class="site-header header-section">
		<div class="site-header__bar">
			<div class="site-header__inner wrapper">
				<div class="site-header__brand header-logo">
					<?php if ( is_front_page() || is_home() ) : ?>
						<div class="site-header__site-title mb-0 no-heading-style">
							<a class="site-header__logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) . ' Home' ); ?>">
								<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/site-logo.svg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="330" height="40">
							</a>
						</div>
					<?php else : ?>
						<a class="site-header__logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) . ' Home' ); ?>">
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/site-logo.svg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="330" height="40">
						</a>
					<?php endif; ?>
				</div>
				<div class="site-header__nav header-nav">
					<?php
					wp_nav_menu(
						array(
							'theme_location'       => 'header-nav',
							'fallback_cb'          => 'THS::nav_fallback',
							'container'            => 'nav',
							'container_id'         => 'site-header-menu',
							'container_class'      => 'site-header__menu',
							'container_aria_label' => 'Primary navigation',
							'menu_class'           => 'site-header__menu-list',
						)
					);
					?>
				</div>
				<div class="site-header__actions header-btns">
					<?php if ( is_page_template( 'template-contact.php' ) ) : ?>
						<a class="button primary-btn site-header__cta" href="https://calendly.com/baharhussain/schedule" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Schedule Discovery Call (opens in a new tab)', 'baharhussain' ); ?>" title="<?php esc_attr_e( 'Schedule Discovery Call', 'baharhussain' ); ?>">
							<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.7"></rect><path d="M7 3v4M17 3v4M3 10h18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"></path></svg>
							<span class="button-text"><?php esc_html_e( 'Schedule Discovery Call', 'baharhussain' ); ?></span>
						</a>
					<?php elseif ( $bh_var_cta ) : ?>
						<?php // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- THS::button() returns pre-escaped HTML. ?>
						<?php echo THS::button( $bh_var_cta, 'button primary-btn site-header__cta' ); ?>
					<?php else : ?>
						<a class="button primary-btn site-header__cta" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
							<?php esc_html_e( 'Discuss Your Project', 'baharhussain' ); ?>
						</a>
					<?php endif; ?>
				</div>
				<button class="site-header__menu-toggle menu-btn" type="button" aria-controls="header-slideout" aria-expanded="false" aria-label="<?php esc_attr_e( 'Open navigation menu', 'baharhussain' ); ?>">
					<span class="top" aria-hidden="true"></span>
					<span class="middle" aria-hidden="true"></span>
					<span class="bottom" aria-hidden="true"></span>
				</button>
			</div>
		</div>
	</header>
	<div id="header-slideout" class="header-slideout" aria-hidden="true">
		<div class="header-slideout-inner" role="dialog" aria-modal="true" aria-label="<?php esc_attr_e( 'Mobile navigation', 'baharhussain' ); ?>">
			<div class="header-slideout-head">
				<a class="site-header__logo-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) . ' Home' ); ?>">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/build/images/site-logo.svg" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="330" height="40">
				</a>
				<button class="site-header__menu-toggle js-close-slideout active" type="button" aria-label="<?php esc_attr_e( 'Close navigation menu', 'baharhussain' ); ?>">
					<span class="top" aria-hidden="true"></span><span class="middle" aria-hidden="true"></span><span class="bottom" aria-hidden="true"></span>
				</button>
			</div>
			<?php
			wp_nav_menu(
				array(
					'theme_location'       => 'header-nav',
					'fallback_cb'          => 'THS::nav_fallback',
					'container'            => 'nav',
					'container_class'      => 'site-mobile-nav header-nav',
					'container_aria_label' => 'Mobile navigation',
					'menu_class'           => 'site-mobile-nav__list',
				)
			);
			?>
			<div class="site-header__mobile-actions">
				<a class="button primary-btn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Discuss Your Project', 'baharhussain' ); ?></a>
			</div>
		</div>
	</div>

	<main id="main-section" class="main-section">
