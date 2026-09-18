<?php
/**
 * Services pricing section.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;
?>

<section class="home-section services-pricing" aria-labelledby="services-pricing-title">
	<div class="wrapper">
		<div class="section-head home-section-head services-pricing__head">
			<?php if ( empty( $args['hide_eyebrow'] ) ) : ?>
				<p class="section-eyebrow home-section-head__eyebrow services-pricing__eyebrow"><?php esc_html_e( 'Pricing', 'baharhussain' ); ?></p>
			<?php endif; ?>
			<h2 id="services-pricing-title" class="home-section-head__title services-pricing__title"><?php esc_html_e( 'Clear Pricing. Flexible Engagement.', 'baharhussain' ); ?></h2>
			<p class="home-section-head__text services-pricing__intro"><?php esc_html_e( 'Every project is scoped around its design, functionality, and delivery needs. You will receive a clear estimate before work begins.', 'baharhussain' ); ?></p>
		</div>

		<div class="services-pricing__plans">
			<article class="services-pricing__plan">
				<h3><?php esc_html_e( 'Custom ACF Website', 'baharhussain' ); ?></h3>
				<p class="services-pricing__starting"><?php esc_html_e( 'Starting from', 'baharhussain' ); ?></p>
				<p class="services-pricing__price"><?php esc_html_e( '$2,000 USD', 'baharhussain' ); ?></p>
				<ul class="services-pricing__checklist">
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Custom development from approved design', 'baharhussain' ); ?></li>
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Flexible content editing through clear custom fields', 'baharhussain' ); ?></li>
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Custom editor dashboard to make content updates simple and organised', 'baharhussain' ); ?></li>
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Best for structured pages and repeatable content', 'baharhussain' ); ?></li>
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Responsive development, QA, performance, and accessibility', 'baharhussain' ); ?></li>
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Development-side technical SEO', 'baharhussain' ); ?></li>
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Final handover', 'baharhussain' ); ?></li>
				</ul>
			</article>

			<article class="services-pricing__plan">
				<h3><?php esc_html_e( 'Custom Gutenberg Website', 'baharhussain' ); ?></h3>
				<p class="services-pricing__starting"><?php esc_html_e( 'Starting from', 'baharhussain' ); ?></p>
				<p class="services-pricing__price"><?php esc_html_e( '$2,500 USD', 'baharhussain' ); ?></p>
				<ul class="services-pricing__checklist">
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Custom development from approved design', 'baharhussain' ); ?></li>
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Visual page editing with custom Gutenberg blocks', 'baharhussain' ); ?></li>
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Custom editor dashboard and visual Gutenberg blocks for easy page updates', 'baharhussain' ); ?></li>
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Build and update pages without code', 'baharhussain' ); ?></li>
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Responsive development, QA, performance, and accessibility', 'baharhussain' ); ?></li>
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Development-side technical SEO', 'baharhussain' ); ?></li>
					<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m7 12.5 3.2 3.2L17.5 8.5" /></svg></span><?php esc_html_e( 'Final handover', 'baharhussain' ); ?></li>
				</ul>
			</article>
		</div>

		<div class="services-pricing__note">
			<span class="services-pricing__note-icon" aria-hidden="true">
				<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9"/><path d="M12 10.5v6M12 7.5h.01"/></svg>
			</span>
			<p><?php esc_html_e( 'Advanced work such as WooCommerce, plugin development, integrations, performance optimisation, and accessibility improvements is scoped separately.', 'baharhussain' ); ?></p>
		</div>

		<div class="services-pricing__action">
			<a class="button main-btn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
				<span class="button-text"><?php esc_html_e( 'Discuss Your Project', 'baharhussain' ); ?></span>
				<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
			</a>
			<a class="button outline-btn" href="<?php echo esc_url( home_url( '/wordpress-experience/' ) ); ?>">
				<span class="button-text"><?php esc_html_e( 'WordPress Experience', 'baharhussain' ); ?></span>
				<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
			</a>
		</div>
	</div>
</section>
