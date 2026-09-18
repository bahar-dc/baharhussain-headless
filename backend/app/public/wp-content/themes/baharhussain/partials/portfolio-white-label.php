<?php
/**
 * White-label work note for the portfolio page.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="home-section portfolio-white-label" aria-labelledby="portfolio-white-label-title">
	<div class="wrapper">
		<div class="portfolio-white-label__card">
			<div class="portfolio-white-label__visual" aria-hidden="true">
				<svg class="portfolio-white-label__icon" viewBox="0 0 320 320" fill="none">
					<path d="M160 45c31 22 60 34 92 40v68c0 62-35 99-92 133-57-34-92-71-92-133V85c32-6 61-18 92-40Z" stroke="currentColor" stroke-width="8" stroke-linejoin="round"/>
					<rect x="119" y="143" width="82" height="70" rx="14" stroke="currentColor" stroke-width="8"/>
					<path d="M132 143v-20c0-15.5 12.5-28 28-28s28 12.5 28 28v20" stroke="currentColor" stroke-width="8" stroke-linecap="round"/>
					<circle cx="160" cy="176" r="8" stroke="currentColor" stroke-width="7"/>
					<path d="M160 184v13" stroke="currentColor" stroke-width="7" stroke-linecap="round"/>
					<path d="M32 268h57M32 280h82M222 31h65M246 43h41" stroke="currentColor" stroke-width="2" stroke-linecap="round" opacity=".45"/>
				</svg>
			</div>

			<div class="portfolio-white-label__content">
				<p class="section-eyebrow portfolio-white-label__eyebrow"><?php esc_html_e( 'White Label Work', 'baharhussain' ); ?></p>
				<h2 id="portfolio-white-label-title" class="portfolio-white-label__title"><?php esc_html_e( 'A Note About My Work', 'baharhussain' ); ?></h2>
				<p class="portfolio-white-label__text"><?php esc_html_e( 'The projects shown above were completed through direct freelance work. Much of my agency work is completed under white label agreements, so I am unable to publicly share those projects. Relevant examples can be discussed privately where permitted.', 'baharhussain' ); ?></p>
				<a class="button main-btn portfolio-white-label__button" href="<?php echo esc_url( home_url( '/request-private-work-examples/' ) ); ?>">
					<span class="button-text"><?php esc_html_e( 'Request Private Work Examples', 'baharhussain' ); ?></span>
					<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
				</a>
			</div>
		</div>
	</div>
</section>
