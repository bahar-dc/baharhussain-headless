<?php
/**
 * About page hero section.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

$about_hero_image_url = ! empty( $args['image_url'] ) ? $args['image_url'] : get_template_directory_uri() . '/assets/build/images/uploads/home-hero.jpg';
?>

<section class="site-section about-hero" aria-labelledby="about-hero-title">
	<div class="wrapper">
		<div class="about-hero__content">
			<p class="section-eyebrow about-hero__eyebrow"><?php esc_html_e( 'I am Bahar Hussain,', 'baharhussain' ); ?></p>
			<h1 id="about-hero-title" class="about-hero__title"><?php esc_html_e( 'I Build WordPress Solutions You Need to Grow', 'baharhussain' ); ?></h1>
			<p class="about-hero__text"><?php esc_html_e( 'With over six years of WordPress experience, I turn designs and project ideas into high-quality websites that are easy to manage, improve, and grow.', 'baharhussain' ); ?></p>

			<div class="about-hero__actions">
				<a class="button main-btn about-hero__contact" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					<span class="button-text"><?php esc_html_e( 'Let’s Work Together', 'baharhussain' ); ?></span>
					<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14M13 6l6 6-6 6"></path></svg>
				</a>
				<a class="button outline-btn about-hero__contact" href="#about-experience">
					<span class="button-text"><?php esc_html_e( 'Read More About Me', 'baharhussain' ); ?></span>
					<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M12 5v14M6 13l6 6 6-6"></path></svg>
				</a>
			</div>
		</div>

		<div class="about-hero__media">
			<img src="<?php echo esc_url( $about_hero_image_url ); ?>" alt="<?php esc_attr_e( 'Bahar Hussain in a WordPress development workspace', 'baharhussain' ); ?>" width="1448" height="1086" fetchpriority="high">
			<div class="about-hero__assurance">
				<span class="about-hero__assurance-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M12 2.5 20 6v5.4c0 5-3.4 8.3-8 10.1-4.6-1.8-8-5.1-8-10.1V6l8-3.5Z"></path><path d="m8.3 12 2.2 2.2 5.2-5.2"></path></svg></span>
				<span><strong><?php esc_html_e( 'Focused on Every Detail', 'baharhussain' ); ?></strong><small><?php esc_html_e( 'I follow a clear process and give every project the attention and care it needs.', 'baharhussain' ); ?></small></span>
			</div>
		</div>
	</div>
</section>
