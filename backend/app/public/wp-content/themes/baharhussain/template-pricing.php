<?php
/**
 * Template Name: Pricing
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div id="primary" class="site-main pricing-page-template">
	<div id="page-section" class="page-section">
		<section id="pricing-hero" class="hero-section background-light-blue" aria-labelledby="pricing-hero-title">
			<div class="dbt-spr-48"></div>
			<div class="page-section">
				<div class="hero-ctn center-align">
					<div class="wrapper">
						<p class="section-eyebrow"><?php esc_html_e( 'Pricing', 'baharhussain' ); ?></p>
						<h1 id="pricing-hero-title"><?php esc_html_e( 'Enterprise WordPress Development Cost', 'baharhussain' ); ?></h1>
						<div class="banner-text">
							<p><?php esc_html_e( 'Plan your WordPress project with clear pricing and the right development approach.', 'baharhussain' ); ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="dbt-spr-48"></div>
		</section>
	</div>

	<?php get_template_part( 'partials/services', 'pricing', array( 'hide_eyebrow' => true ) ); ?>
	<?php get_template_part( 'partials/about', 'cta' ); ?>
</div>

<?php
get_footer();
