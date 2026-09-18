<?php
/**
 * Agency growth map section.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="home-section landing-growth-map" aria-labelledby="landing-growth-map-title">
	<div class="wrapper">
		<div class="landing-growth-map__header">
			<p class="section-eyebrow landing-growth-map__eyebrow"><?php esc_html_e( 'Why Agencies Work With Me', 'baharhussain' ); ?></p>
			<h2 id="landing-growth-map-title" class="landing-growth-map__title">
				<?php esc_html_e( 'A Trusted Partner for Agency Growth', 'baharhussain' ); ?>
			</h2>
		</div>
		<div class="landing-growth-map__media">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/uploads/how-i-help.png' ); ?>" alt="<?php esc_attr_e( 'Agency growth partnership qualities', 'baharhussain' ); ?>" loading="lazy" decoding="async">
		</div>
	</div>
</section>
