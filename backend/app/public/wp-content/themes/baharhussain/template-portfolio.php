<?php
/**
 * Template Name: Portfolio
 *
 * Static portfolio page template.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>
<div id="primary" class="site-main portfolio-page-template">
	<section class="site-section portfolio-hero" aria-labelledby="portfolio-hero-title">
		<div class="wrapper portfolio-hero__grid">
			<div class="portfolio-hero__content">
				<p class="section-eyebrow portfolio-hero__eyebrow"><?php esc_html_e( 'Selected WordPress Projects', 'baharhussain' ); ?></p>
				<h1 id="portfolio-hero-title" class="portfolio-hero__title"><?php esc_html_e( 'WordPress Solutions for Agencies & Growing Businesses', 'baharhussain' ); ?></h1>
				<p class="portfolio-hero__text"><?php esc_html_e( 'A collection of custom WordPress websites I’ve developed for digital agencies and businesses. Each project is built with clean code, performance, accessibility, and scalability at the core.', 'baharhussain' ); ?></p>

				<div class="portfolio-hero__actions">
					<a class="button main-btn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
						<span class="button-text"><?php esc_html_e( 'Discuss Your Project', 'baharhussain' ); ?></span>
						<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
					</a>
					<a class="button outline-btn" href="#portfolio-projects">
						<span class="button-text"><?php esc_html_e( 'View My Work', 'baharhussain' ); ?></span>
						<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false"><path d="M12 5v14M6 13l6 6 6-6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
					</a>
				</div>
			</div>
			<div class="portfolio-hero__showcase">
				<img class="portfolio-hero__image" src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/uploads/project-stack.webp' ); ?>" alt="<?php esc_attr_e( 'Responsive preview of the Patch Marketing website', 'baharhussain' ); ?>" width="1254" height="1254" loading="eager" fetchpriority="high" decoding="async">
			</div>
		</div>
	</section>
	<section class="home-section home-stats" aria-labelledby="portfolio-stats-title">
		<div class="wrapper">
			<h2 id="portfolio-stats-title" class="screen-reader-text"><?php esc_html_e( 'Portfolio experience and services overview', 'baharhussain' ); ?></h2>
			<ul class="home-stats__list">
				<li class="home-stats__item">
					<span class="home-stats__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="M7 3v3M17 3v3M4.5 9.5h15M6.5 5h11A2.5 2.5 0 0 1 20 7.5v10A2.5 2.5 0 0 1 17.5 20h-11A2.5 2.5 0 0 1 4 17.5v-10A2.5 2.5 0 0 1 6.5 5Z" /><path d="m9 14 2 2 4-5" /></svg>
					</span>
					<div class="home-stats__content">
						<strong class="home-stats__value"><?php esc_html_e( '6+', 'baharhussain' ); ?></strong>
						<h3 class="home-stats__title"><?php esc_html_e( 'Years Experience', 'baharhussain' ); ?></h3>
						<p class="home-stats__text"><?php esc_html_e( 'Building high-quality WordPress solutions for agencies and clients.', 'baharhussain' ); ?></p>
					</div>
				</li>
				<li class="home-stats__item">
					<span class="home-stats__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9" /><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18" /></svg>
					</span>
					<div class="home-stats__content">
						<strong class="home-stats__value"><?php esc_html_e( '50+', 'baharhussain' ); ?></strong>
						<h3 class="home-stats__title"><?php esc_html_e( 'Projects Completed', 'baharhussain' ); ?></h3>
						<p class="home-stats__text"><?php esc_html_e( 'Custom websites, improvements, fixes, and long-term support.', 'baharhussain' ); ?></p>
					</div>
				</li>
				<li class="home-stats__item">
					<span class="home-stats__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><circle cx="9" cy="8" r="3" /><path d="M3.5 19a5.5 5.5 0 0 1 11 0M16 11a2.5 2.5 0 1 0 0-5M17.5 14.5A4.5 4.5 0 0 1 21 19" /></svg>
					</span>
					<div class="home-stats__content">
						<strong class="home-stats__value"><?php esc_html_e( 'Agency', 'baharhussain' ); ?></strong>
						<h3 class="home-stats__title"><?php esc_html_e( 'White-Label Partner', 'baharhussain' ); ?></h3>
						<p class="home-stats__text"><?php esc_html_e( 'Supporting agencies behind the scenes with clean development.', 'baharhussain' ); ?></p>
					</div>
				</li>
				<li class="home-stats__item">
					<span class="home-stats__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z" /><path d="M4 7.5 12 12l8-4.5M12 12v9" /></svg>
					</span>
					<div class="home-stats__content">
						<strong class="home-stats__value"><?php esc_html_e( 'Gutenberg', 'baharhussain' ); ?></strong>
						<h3 class="home-stats__title"><?php esc_html_e( 'Block Specialist', 'baharhussain' ); ?></h3>
						<p class="home-stats__text"><?php esc_html_e( 'Custom blocks that make websites easier to manage.', 'baharhussain' ); ?></p>
					</div>
				</li>
			</ul>
		</div>
	</section>
	<?php get_template_part( 'partials/portfolio', 'projects' ); ?>
	<?php get_template_part( 'partials/portfolio', 'white-label' ); ?>
	<?php get_template_part( 'partials/home', 'testimonials' ); ?>
	<?php get_template_part( 'partials/home', 'faq' ); ?>
	<?php get_template_part( 'partials/about', 'cta' ); ?>
</div>
<?php
get_footer();
