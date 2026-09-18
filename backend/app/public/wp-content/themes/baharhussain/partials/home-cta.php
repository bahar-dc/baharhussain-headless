<?php
/**
 * Homepage call-to-action section.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="home-section home-cta" aria-labelledby="home-cta-title">
	<div class="wrapper">
		<div class="home-cta__inner">
			<p class="section-eyebrow home-section-head__eyebrow home-cta__eyebrow"><?php esc_html_e( 'Let’s Work Together', 'baharhussain' ); ?></p>
			<h2 id="home-cta-title" class="home-cta__title"><?php esc_html_e( 'Ready to Start Your WordPress Project?', 'baharhussain' ); ?></h2>
			<p class="home-cta__text"><?php echo wp_kses_post( __( 'Whether you need a new website, custom functionality, or ongoing support, <br /> let’s discuss the best way to move forward.', 'baharhussain' ) ); ?></p>

			<div class="home-cta__actions" aria-label="<?php esc_attr_e( 'Project actions', 'baharhussain' ); ?>">
				<a class="button main-btn home-cta__button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					<span class="button-text"><?php esc_html_e( 'Discuss Your Project', 'baharhussain' ); ?></span>
					<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false"><path d="M5 12h14M13 6l6 6-6 6" /></svg>
				</a>
				<a class="button outline-btn home-cta__button" href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>">
					<span class="button-text"><?php esc_html_e( 'View My Work', 'baharhussain' ); ?></span>
					<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false"><path d="M5 12h14M13 6l6 6-6 6" /></svg>
				</a>
			</div>

			<ul class="home-cta__proof">
				<li>
					<span class="home-cta__proof-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><rect x="5" y="4" width="14" height="17" rx="2" /><path d="M9 4.5V3h6v1.5M9 10h6M9 14h4" /><path d="m14 17 1.5 1.5L19 15" /></svg></span>
					<span><strong><?php esc_html_e( 'Clear Project Scope', 'baharhussain' ); ?></strong><span><?php esc_html_e( 'Goals and requirements confirmed', 'baharhussain' ); ?></span></span>
				</li>
				<li>
					<span class="home-cta__proof-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><rect x="5" y="3" width="14" height="18" rx="2" /><path d="M8 7h8M8 11h2M14 11h2M8 15h2M14 15h2M8 18h2M14 18h2" /></svg></span>
					<span><strong><?php esc_html_e( 'Transparent Estimate', 'baharhussain' ); ?></strong><span><?php esc_html_e( 'Clear cost and timeline', 'baharhussain' ); ?></span></span>
				</li>
				<li>
					<span class="home-cta__proof-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M4 13v-1a8 8 0 0 1 16 0v1" /><path d="M6 12H5a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h2v-7H6ZM18 12h1a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-2v-7h1ZM17 19c-1 2-2.7 2-5 2" /></svg></span>
					<span><strong><?php esc_html_e( 'Support After Launch', 'baharhussain' ); ?></strong><span><?php esc_html_e( 'Updates and improvements when needed', 'baharhussain' ); ?></span></span>
				</li>
			</ul>
		</div>
	</div>
</section>
