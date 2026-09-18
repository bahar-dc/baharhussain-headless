<?php
/**
 * Agency growth section.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="home-section landing-agency-growth" aria-labelledby="landing-agency-growth-title">
	<div class="wrapper">
		<div class="landing-agency-growth__grid">
			<div class="landing-agency-growth__content">
				<p class="section-eyebrow landing-agency-growth__eyebrow"><?php esc_html_e( 'Why Agencies Work With Me', 'baharhussain' ); ?></p>
				<h2 id="landing-agency-growth-title" class="landing-agency-growth__title">
					<?php esc_html_e( 'A Trusted Partner for Agency Growth', 'baharhussain' ); ?>
				</h2>
				<p class="landing-agency-growth__text"><?php esc_html_e( 'I help agencies deliver better WordPress projects through clean execution, dependable communication, and long-term technical support that fits naturally into their workflow.', 'baharhussain' ); ?></p>
				<a class="button main-btn landing-agency-growth__link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					<span class="button-text"><?php esc_html_e( 'Discuss Your Project', 'baharhussain' ); ?></span>
					<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
						<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>
			</div>

			<ul class="landing-agency-growth__list">
				<li><?php esc_html_e( 'Agency-first mindset', 'baharhussain' ); ?></li>
				<li><?php esc_html_e( 'Clean and maintainable code', 'baharhussain' ); ?></li>
				<li><?php esc_html_e( 'Clear communication', 'baharhussain' ); ?></li>
				<li><?php esc_html_e( 'Flexible support', 'baharhussain' ); ?></li>
				<li><?php esc_html_e( 'Long-term reliability', 'baharhussain' ); ?></li>
			</ul>
		</div>
	</div>
</section>
