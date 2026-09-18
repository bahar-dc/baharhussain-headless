<?php
/**
 * Template Name: Coming Soon
 *
 * Minimal launch countdown page.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$launch_time = '2026-07-24T00:00:00+05:00';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-W8W4JQDB');</script>
	<!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, nofollow">
	<?php wp_head(); ?>
	<style>
		.coming-soon-page {
			margin: 0;
			color: #111827;
			background: #f8fafc;
			overflow: hidden;
		}

		.coming-soon {
			display: grid;
			place-items: center;
			height: 100svh;
			padding: clamp(16px, 3vh, 32px) 20px;
			box-sizing: border-box;
			font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
			text-align: center;
		}

		.coming-soon__inner {
			width: min(100%, 760px);
		}

		.coming-soon__logo {
			display: flex;
			justify-content: center;
			width: 100%;
			margin-bottom: clamp(20px, 6vh, 56px);
		}

		.coming-soon__logo img {
			display: block;
			width: 100px;
			height: auto;
		}

		.coming-soon__eyebrow {
			margin: 0 0 16px;
			color: #2563eb;
			font-size: 14px;
			font-weight: 700;
			letter-spacing: 0.14em;
			text-transform: uppercase;
		}

		.coming-soon__title {
			margin: 0;
			font-family: Manrope, Inter, system-ui, sans-serif;
			font-size: clamp(42px, 8vw, 76px);
			font-weight: 700;
			letter-spacing: -0.045em;
			line-height: 1.05;
		}

		.coming-soon__text {
			max-width: 560px;
			margin: clamp(12px, 2.5vh, 24px) auto 0;
			color: #4b5563;
			font-size: clamp(17px, 2vw, 20px);
			line-height: 1.6;
		}

		.coming-soon__countdown {
			display: grid;
			grid-template-columns: repeat(4, 1fr);
			gap: 12px;
			margin-top: clamp(20px, 5vh, 48px);
		}

		.coming-soon__unit {
			padding: clamp(12px, 3vh, 24px) 10px;
			background: #fff;
			border: 1px solid #e5e7eb;
			border-radius: 16px;
		}

		.coming-soon__value,
		.coming-soon__label {
			display: block;
		}

		.coming-soon__value {
			font-family: Manrope, Inter, system-ui, sans-serif;
			font-size: clamp(30px, 6vw, 52px);
			font-variant-numeric: tabular-nums;
			font-weight: 700;
			line-height: 1;
		}

		.coming-soon__label {
			margin-top: 10px;
			color: #6b7280;
			font-size: 12px;
			font-weight: 600;
			letter-spacing: 0.08em;
			text-transform: uppercase;
		}

		.coming-soon__date {
			margin: clamp(12px, 2.5vh, 24px) 0 0;
			color: #6b7280;
			font-size: 14px;
		}

		.coming-soon__complete {
			margin-top: 48px;
			color: #2563eb;
			font-size: clamp(24px, 5vw, 36px);
			font-weight: 700;
		}

		@media (max-width: 560px) {
			.coming-soon__countdown {
				grid-template-columns: repeat(2, 1fr);
			}
		}
	</style>
</head>
<body <?php body_class( 'coming-soon-page' ); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W8W4JQDB"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	<?php wp_body_open(); ?>
	<div class="coming-soon" id="primary">
		<div class="coming-soon__inner">
			<a class="coming-soon__logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/site-logo.svg' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" width="330" height="40">
			</a>

			<p class="coming-soon__eyebrow"><?php esc_html_e( 'Launching Soon', 'baharhussain' ); ?></p>
			<h1 class="coming-soon__title"><?php esc_html_e( 'Something new is on the way.', 'baharhussain' ); ?></h1>
			<p class="coming-soon__text"><?php esc_html_e( 'We are putting the final details in place. Come back when the countdown reaches zero.', 'baharhussain' ); ?></p>

			<div class="coming-soon__countdown" data-countdown data-launch-time="<?php echo esc_attr( $launch_time ); ?>" role="timer" aria-live="off" aria-label="<?php esc_attr_e( 'Time remaining until launch', 'baharhussain' ); ?>">
				<div class="coming-soon__unit"><span class="coming-soon__value" data-days>00</span><span class="coming-soon__label"><?php esc_html_e( 'Days', 'baharhussain' ); ?></span></div>
				<div class="coming-soon__unit"><span class="coming-soon__value" data-hours>00</span><span class="coming-soon__label"><?php esc_html_e( 'Hours', 'baharhussain' ); ?></span></div>
				<div class="coming-soon__unit"><span class="coming-soon__value" data-minutes>00</span><span class="coming-soon__label"><?php esc_html_e( 'Minutes', 'baharhussain' ); ?></span></div>
				<div class="coming-soon__unit"><span class="coming-soon__value" data-seconds>00</span><span class="coming-soon__label"><?php esc_html_e( 'Seconds', 'baharhussain' ); ?></span></div>
			</div>
			<p class="coming-soon__date"><?php esc_html_e( 'Friday, July 24 at 12:00 AM (Pakistan time)', 'baharhussain' ); ?></p>
			<p class="coming-soon__complete" data-complete hidden><?php esc_html_e( 'We are live!', 'baharhussain' ); ?></p>
		</div>
	</div>

	<script>
		(function () {
			'use strict';

			var countdown = document.querySelector('[data-countdown]');
			var complete = document.querySelector('[data-complete]');

			if (!countdown) {
				return;
			}

			var target = new Date(countdown.getAttribute('data-launch-time')).getTime();
			var interval;
			var pad = function (value) {
				return String(value).padStart(2, '0');
			};

			var updateCountdown = function () {
				var remaining = target - Date.now();

				if (remaining <= 0) {
					clearInterval(interval);
					countdown.hidden = true;
					complete.hidden = false;
					return;
				}

				var days = Math.floor(remaining / 86400000);
				var hours = Math.floor((remaining % 86400000) / 3600000);
				var minutes = Math.floor((remaining % 3600000) / 60000);
				var seconds = Math.floor((remaining % 60000) / 1000);

				countdown.querySelector('[data-days]').textContent = pad(days);
				countdown.querySelector('[data-hours]').textContent = pad(hours);
				countdown.querySelector('[data-minutes]').textContent = pad(minutes);
				countdown.querySelector('[data-seconds]').textContent = pad(seconds);
			};

			updateCountdown();
			interval = setInterval(updateCountdown, 1000);
		}());
	</script>
	<?php wp_footer(); ?>
</body>
</html>
