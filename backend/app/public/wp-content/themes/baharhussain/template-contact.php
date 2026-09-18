<?php
/**
 * Template Name: Contact Page
 *
 * Contact page with a Gravity Forms-powered project enquiry hero.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Gravity Form used by the contact hero.
 *
 * Override with the bh_contact_gravity_form_id filter when the project form
 * uses an ID other than 1.
 */
$bh_contact_form_id = (int) apply_filters( 'bh_contact_gravity_form_id', 1 );

get_header();
?>

<div id="primary" class="site-main contact-page-template">
	<section class="site-section contact-hero" aria-labelledby="contact-hero-title">
		<div class="wrapper">
			<div class="contact-hero__grid">
				<div class="contact-hero__content">
					<p class="section-eyebrow contact-hero__eyebrow">
						<?php esc_html_e( 'Get in Touch', 'baharhussain' ); ?>
					</p>
					<h1 id="contact-hero-title" class="contact-hero__title"><?php esc_html_e( 'Let’s Talk About Your', 'baharhussain' ); ?> <span><?php esc_html_e( 'Project', 'baharhussain' ); ?></span></h1>
					<p class="contact-hero__lead"><?php esc_html_e( 'Have a website to build, a feature to improve, or a technical problem to solve?', 'baharhussain' ); ?></p>
					<p class="contact-hero__intro"><?php esc_html_e( 'Share what you need, your timeline, and any useful project details. I will review everything and reply with a clear next step.', 'baharhussain' ); ?></p>

					<ul class="contact-hero__benefits" aria-label="<?php esc_attr_e( 'Trust points', 'baharhussain' ); ?>">
						<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m13 2-9 12h7l-1 8 9-12h-7l1-8Z"></path></svg></span><strong><?php esc_html_e( 'Usually reply within 24 hours', 'baharhussain' ); ?></strong></li>
						<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 5h16v11H8l-4 3V5Z"></path><path d="M8 10h.01M12 10h.01M16 10h.01"></path></svg></span><strong><?php esc_html_e( 'Direct and clear communication', 'baharhussain' ); ?></strong></li>
						<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2"></rect><path d="M7 5h10v4H7zM8 13h.01M12 13h.01M16 13h.01M8 17h.01M12 17h.01M16 17h.01"></path></svg></span><strong><?php esc_html_e( 'Honest estimates and timelines', 'baharhussain' ); ?></strong></li>
					</ul>

					<div class="contact-hero__actions">
						<a class="button main-btn" href="https://calendly.com/baharhussain/schedule" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Schedule Discovery Call (opens in a new tab)', 'baharhussain' ); ?>" title="<?php esc_attr_e( 'Schedule Discovery Call', 'baharhussain' ); ?>">
							<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.7"></rect><path d="M7 3v4M17 3v4M3 10h18" stroke="currentColor" stroke-width="1.7"></path></svg>
							<span class="button-text"><?php esc_html_e( 'Schedule Discovery Call', 'baharhussain' ); ?></span>
						</a>
					</div>

					<div class="contact-hero__trust" aria-label="<?php esc_attr_e( 'Trusted by digital agencies worldwide', 'baharhussain' ); ?>">
						<div class="contact-hero__avatars" aria-hidden="true"><span>BH</span><span>WP</span><span>AG</span></div>
						<p><strong><?php esc_html_e( 'Trusted by digital agencies worldwide', 'baharhussain' ); ?></strong><small><?php esc_html_e( 'to deliver high-quality WordPress solutions.', 'baharhussain' ); ?></small></p>
					</div>
				</div>

				<div id="contact-project-form" class="contact-hero__form-wrap">
					<div class="contact-hero__form-card project-form">
						<div class="contact-hero__form-head">
							<h2><?php esc_html_e( 'Start Your Project', 'baharhussain' ); ?></h2>
							<p><?php esc_html_e( 'Tell me about your project and let’s create something amazing together.', 'baharhussain' ); ?></p>
						</div>
						<?php if ( function_exists( 'gravity_form' ) ) { ?>
							<?php gravity_form( $bh_contact_form_id, false, false, false, null, true, 0, true ); ?>
						<?php } elseif ( current_user_can( 'activate_plugins' ) ) { ?>
							<p class="contact-hero__admin-notice"><?php esc_html_e( 'Gravity Forms must be active to display the project enquiry form.', 'baharhussain' ); ?></p>
						<?php } ?>

						<p class="contact-hero__privacy">
							<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="6" y="10" width="12" height="10" rx="2"></rect><path d="M9 10V7a3 3 0 0 1 6 0v3"></path></svg>
							<span><?php esc_html_e( 'Your information is secure and will never be shared.', 'baharhussain' ); ?></span>
						</p>
					</div>

					<ul class="contact-hero__expertise" aria-label="<?php esc_attr_e( 'Service qualities', 'baharhussain' ); ?>">
						<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z"></path><path d="M4 7.5 12 12l8-4.5M12 12v9"></path></svg></span><strong><?php esc_html_e( 'Gutenberg Expert', 'baharhussain' ); ?></strong></li>
						<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M14 5c3-2 5-2 7-2 0 2 0 4-2 7l-5 5-5-5 5-5Z"></path><path d="m9 10-4 1-2 3 6 1M14 15l-1 4-3 2-1-6M16 8h.01"></path></svg></span><strong><?php esc_html_e( 'Fast Response', 'baharhussain' ); ?></strong></li>
						<li><span class="contact-hero__expertise-icon--green" aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M12 3 20 6v6c0 4.4-3.1 7.5-8 9-4.9-1.5-8-4.6-8-9V6l8-3Z"></path><path d="m9 12 2 2 4-5"></path></svg></span><strong><?php esc_html_e( 'Agency Partner', 'baharhussain' ); ?></strong></li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();

			if ( trim( get_the_content() ) ) {
				?>
				<section class="contact-page-content">
					<div class="wrapper">
						<?php the_content(); ?>
					</div>
				</section>
				<?php
			}
		}
	}
	?>
</div>

<?php
get_footer();
