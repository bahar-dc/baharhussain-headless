<?php
/**
 * About page experience snapshot.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;
?>

<section id="about-experience" class="site-section about-experience" aria-labelledby="about-experience-title">
	<div class="wrapper">
		<header class="about-experience__header">
			<p class="section-eyebrow about-experience__eyebrow"><?php esc_html_e( 'Experience', 'baharhussain' ); ?></p>
			<h2 id="about-experience-title" class="about-experience__title"><?php esc_html_e( 'My WordPress Experience', 'baharhussain' ); ?></h2>
			<p class="about-experience__intro"><?php esc_html_e( 'Each project has strengthened my ability to solve technical problems, handle complex requirements, and deliver dependable WordPress work.', 'baharhussain' ); ?></p>
		</header>

		<ul class="about-experience__stats" aria-label="<?php esc_attr_e( 'Experience statistics', 'baharhussain' ); ?>">
			<li class="about-experience__card">
				<span class="about-experience__icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M7 3v3M17 3v3M4.5 9.5h15M6.5 5h11A2.5 2.5 0 0 1 20 7.5v10A2.5 2.5 0 0 1 17.5 20h-11A2.5 2.5 0 0 1 4 17.5v-10A2.5 2.5 0 0 1 6.5 5Z"></path><path d="m9 14 2 2 4-5"></path></svg></span>
				<strong class="about-experience__value">6+</strong>
				<h3><?php esc_html_e( 'Years of Experience', 'baharhussain' ); ?></h3>
				<p><?php esc_html_e( 'Built through real WordPress work across custom websites and complex projects.', 'baharhussain' ); ?></p>
			</li>
			<li class="about-experience__card">
				<span class="about-experience__icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9"></circle><path d="M3 12h18M12 3a14 14 0 0 1 0 18M12 3a14 14 0 0 0 0 18"></path></svg></span>
				<strong class="about-experience__value">50+</strong>
				<h3><?php esc_html_e( 'Projects Completed', 'baharhussain' ); ?></h3>
				<p><?php esc_html_e( 'Custom builds, improvements, fixes, and ongoing development support.', 'baharhussain' ); ?></p>
			</li>
			<li class="about-experience__card">
				<span class="about-experience__icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M4 8 12 4l8 4-8 4-8-4ZM4 12l8 4 8-4M4 16l8 4 8-4"></path></svg></span>
				<strong class="about-experience__value about-experience__value--word"><?php esc_html_e( 'Agency', 'baharhussain' ); ?></strong>
				<h3><?php esc_html_e( 'Team Collaboration', 'baharhussain' ); ?></h3>
				<p><?php esc_html_e( 'Working with design and development teams on client WordPress projects.', 'baharhussain' ); ?></p>
			</li>
			<li class="about-experience__card">
				<span class="about-experience__icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z"></path><path d="M4 7.5 12 12l8-4.5M12 12v9"></path></svg></span>
				<strong class="about-experience__value about-experience__value--word"><?php esc_html_e( 'Custom', 'baharhussain' ); ?></strong>
				<h3><?php esc_html_e( 'WordPress Development', 'baharhussain' ); ?></h3>
				<p><?php esc_html_e( 'Themes, Gutenberg blocks, plugins, and WooCommerce solutions built around project needs.', 'baharhussain' ); ?></p>
			</li>
		</ul>
	</div>
</section>
