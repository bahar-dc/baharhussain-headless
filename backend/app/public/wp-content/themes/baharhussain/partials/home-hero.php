<?php
/**
 * Homepage hero section.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

$hero_image_url = get_template_directory_uri() . '/assets/build/images/uploads/bahar-profile-hero.webp';
?>

<section class="home-section home-hero" aria-labelledby="home-hero-title">
	<div class="wrapper">
		<div class="home-hero__grid">
			<div class="home-hero__content">
				<p class="section-eyebrow home-hero__eyebrow"><?php esc_html_e( 'Your WordPress Development Partner', 'baharhussain' ); ?></p>
				<h1 id="home-hero-title" class="home-hero__title">
					<span><?php esc_html_e( 'Enterprise', 'baharhussain' ); ?></span>
					<span><?php esc_html_e( 'WordPress Solutions', 'baharhussain' ); ?></span>
					<span><?php esc_html_e( 'for Established ', 'baharhussain' ); ?></span>
					<span><?php esc_html_e( 'Agencies', 'baharhussain' ); ?></span>
				</h1>
				<p class="home-hero__text"><?php esc_html_e( 'I help agencies with custom WordPress themes, Gutenberg blocks, plugins, and WooCommerce development. Every solution is built to meet project needs, with focus on performance, accessibility, and long term maintenance.', 'baharhussain' ); ?></p>

				<div class="landing-hero__actions" aria-label="<?php esc_attr_e( 'Homepage actions', 'baharhussain' ); ?>">
					<a class="button main-btn landing-hero__button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
						<span class="button-text"><?php esc_html_e( 'Discuss Your Project', 'baharhussain' ); ?></span>
						<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
					</a>
					<a class="button outline-btn landing-hero__button" href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>">
						<span class="button-text"><?php esc_html_e( 'View My Work', 'baharhussain' ); ?></span>
						<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
					</a>
				</div>

				<ul class="home-hero__services" aria-label="<?php esc_attr_e( 'Services', 'baharhussain' ); ?>">
					<li><?php esc_html_e( 'Custom WordPress', 'baharhussain' ); ?></li>
					<li><?php esc_html_e( 'Gutenberg', 'baharhussain' ); ?></li>
					<li><?php esc_html_e( 'WooCommerce', 'baharhussain' ); ?></li>
					<li><?php esc_html_e( 'Performance', 'baharhussain' ); ?></li>
					<li><?php esc_html_e( 'Accessibility', 'baharhussain' ); ?></li>
				</ul>
			</div>

			<div class="home-hero__media">
				<div class="home-hero__image image-cover">
					<img src="<?php echo esc_url( $hero_image_url ); ?>" alt="<?php esc_attr_e( 'Bahar Hussain, WordPress developer', 'baharhussain' ); ?>" width="1448" height="1086" fetchpriority="high">
				</div>

				<div class="home-hero__badge home-hero__badge--partner">
					<span class="home-hero__badge-icon" aria-hidden="true">
						<svg viewBox="0 0 512 512" focusable="false"><path d="M256 .5C115.117.5.5 115.109.5 255.992S115.117 511.5 256 511.5s255.5-114.626 255.5-255.508S396.879.5 256 .5ZM26.287 255.992c0-33.306 7.145-64.923 19.89-93.488l109.582 300.225C79.117 425.502 26.287 346.914 26.287 255.992ZM256 485.722c-22.547 0-44.309-3.307-64.898-9.361l68.932-200.274 70.604 193.446c.466 1.135 1.035 2.179 1.646 3.165-23.878 8.404-49.536 13.024-76.284 13.024Zm31.659-337.436c13.827-.724 26.29-2.179 26.29-2.179 12.376-1.464 10.916-19.658-1.468-18.93 0 0-37.207 2.919-61.23 2.919-22.568 0-60.494-2.919-60.494-2.919-12.388-.728-13.839 18.198-1.456 18.93 0 0 11.715 1.455 24.095 2.179l35.784 98.063-50.277 150.767-83.649-248.83c13.84-.724 26.286-2.179 26.286-2.179 12.372-1.464 10.912-19.658-1.468-18.93 0 0-37.198 2.919-61.222 2.919-4.309 0-9.386-.108-14.784-.283C105.141 67.457 175.745 26.274 256 26.274c59.8 0 114.251 22.868 155.121 60.315-.989-.058-1.958-.183-2.978-.183-22.563 0-38.574 19.653-38.574 40.771 0 18.93 10.92 34.948 22.564 53.874 8.737 15.299 18.938 34.953 18.938 63.355 0 19.657-7.56 42.475-17.479 74.259l-22.917 76.554-83.016-246.933Zm83.827 306.259 70.163-202.861c13.104-32.77 17.47-58.977 17.47-82.272 0-8.458-.558-16.31-1.547-23.625 17.932 32.715 28.137 70.262 28.137 110.205 0 84.746-45.927 158.735-114.223 198.553Z" /></svg>
					</span>
					<span>
						<span><?php esc_html_e( 'Your WordPress', 'baharhussain' ); ?></span>
						<span><?php esc_html_e( 'Development Partner', 'baharhussain' ); ?></span>
					</span>
				</div>

				<div class="home-hero__code-card">
					<span class="home-hero__code-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="m8.7 16.6-5.1-4.1 5.1-4.1.95 1.18L6 12.5l3.65 2.92-.95 1.18Zm6.6 0-.95-1.18L18 12.5l-3.65-2.92.95-1.18 5.1 4.1-5.1 4.1Zm-3.77 1.15-1.45-.38 2.39-9.12 1.45.38-2.39 9.12Z" /></svg>
					</span>
					<code>build_custom_blocks();</code>
					<code>optimize_performance();</code>
					<code>support_agency_projects();</code>
				</div>

			</div>
		</div>
	</div>
</section>
