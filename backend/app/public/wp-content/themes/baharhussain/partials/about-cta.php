<?php
/**
 * About page project enquiry call to action.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Gravity Form used by the about-page CTA.
 *
 * Override with the bh_about_cta_gravity_form_id filter when the project form
 * uses an ID other than 1.
 */
$bh_about_cta_form_id = (int) apply_filters( 'bh_about_cta_gravity_form_id', 1 );
$bh_about_cta_section_id = ! empty( $args['section_id'] ) ? $args['section_id'] : 'about-project-cta';

add_filter(
	'gform_pre_render_' . $bh_about_cta_form_id,
	static function ( $form ) {
		$field_labels = array(
			'name'     => __( 'Your Name', 'baharhussain' ),
			'email'    => __( 'Email Address', 'baharhussain' ),
			'text'     => __( 'Company or Agency (Optional)', 'baharhussain' ),
			'select'   => __( 'Select Project Budget (Optional)', 'baharhussain' ),
			'textarea' => __( 'Tell Me About Your Project', 'baharhussain' ),
		);

		foreach ( $form['fields'] as $field ) {
			if ( isset( $field_labels[ $field->type ] ) ) {
				$field->label = $field_labels[ $field->type ];
			}
		}

		$form['button']['text'] = __( 'Send Message', 'baharhussain' );

		return $form;
	}
);
?>
<section id="<?php echo esc_attr( $bh_about_cta_section_id ); ?>" class="site-section about-project-cta" aria-labelledby="about-project-cta-title">
	<div class="wrapper">
		<div class="about-project-cta__panel">
			<div class="about-project-cta__main">
				<div class="about-project-cta__content">
					<p class="section-eyebrow about-project-cta__eyebrow"><?php esc_html_e( 'Start a Conversation', 'baharhussain' ); ?></p>
					<h2 id="about-project-cta-title" class="about-project-cta__title"><?php esc_html_e( 'Have a WordPress Project in Mind', 'baharhussain' ); ?><span>?</span></h2>
					<p class="about-project-cta__intro"><?php esc_html_e( 'Share a few details about your project. I will review your needs and get back to you with a clear next step.', 'baharhussain' ); ?></p>
					<ul class="contact-hero__benefits about-project-cta__benefits" aria-label="<?php esc_attr_e( 'Trust points', 'baharhussain' ); ?>">
						<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="m13 2-9 12h7l-1 8 9-12h-7l1-8Z"></path></svg></span><strong><?php esc_html_e( 'Usually reply within 24 hours', 'baharhussain' ); ?></strong></li>
						<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M4 5h16v11H8l-4 3V5Z"></path><path d="M8 10h.01M12 10h.01M16 10h.01"></path></svg></span><strong><?php esc_html_e( 'Direct and clear communication', 'baharhussain' ); ?></strong></li>
						<li><span aria-hidden="true"><svg viewBox="0 0 24 24"><rect x="4" y="2" width="16" height="20" rx="2"></rect><path d="M7 5h10v4H7zM8 13h.01M12 13h.01M16 13h.01M8 17h.01M12 17h.01M16 17h.01"></path></svg></span><strong><?php esc_html_e( 'Honest estimates and timelines', 'baharhussain' ); ?></strong></li>
					</ul>
					<a class="button main-btn about-project-cta__schedule" href="https://calendly.com/baharhussain/schedule" target="_blank" rel="noopener noreferrer" aria-label="<?php esc_attr_e( 'Schedule Discovery Call (opens in a new tab)', 'baharhussain' ); ?>" title="<?php esc_attr_e( 'Schedule Discovery Call', 'baharhussain' ); ?>">
						<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false"><rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.7"></rect><path d="M7 3v4M17 3v4M3 10h18" stroke="currentColor" stroke-width="1.7" stroke-linecap="round"></path></svg>
						<span class="button-text"><?php esc_html_e( 'Schedule Discovery Call', 'baharhussain' ); ?></span>
					</a>
				</div>

				<div class="about-project-cta__form-card">
					<header class="about-project-cta__form-head">
						<span aria-hidden="true"><svg viewBox="0 0 24 24"><path d="M21 3 10 14"></path><path d="m21 3-7 20-4-9-9-4 20-7Z"></path></svg></span>
						<div><h3><?php esc_html_e( 'Tell Me About Your Project', 'baharhussain' ); ?></h3><p><?php esc_html_e( 'Complete the form below and I will reply as soon as possible.', 'baharhussain' ); ?></p></div>
					</header>

					<div class="about-project-cta__form project-form">
						<?php if ( function_exists( 'gravity_form' ) ) { ?>
							<?php gravity_form( $bh_about_cta_form_id, false, false, false, null, true, 0, true ); ?>
						<?php } elseif ( current_user_can( 'activate_plugins' ) ) { ?>
							<p class="about-project-cta__form-admin-notice"><?php esc_html_e( 'Gravity Forms must be active to display the project enquiry form.', 'baharhussain' ); ?></p>
						<?php } ?>
						<p class="about-project-cta__privacy"><svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="10" width="14" height="11" rx="2"></rect><path d="M8 10V7a4 4 0 0 1 8 0v3"></path></svg><?php esc_html_e( 'Your details will only be used to reply to your enquiry.', 'baharhussain' ); ?></p>
					</div>
				</div>
			</div>

			<ul class="about-project-cta__proof">
				<li><span aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="m12 3 2.6 5.3 5.9.86-4.25 4.14 1 5.84L12 16.38l-5.25 2.76 1-5.84L3.5 9.16l5.9-.86L12 3Z"></path></svg></span><div><strong><?php esc_html_e( '6+ Years Experience', 'baharhussain' ); ?></strong><small><?php esc_html_e( 'Building WordPress solutions that perform', 'baharhussain' ); ?></small></div></li>
				<li><span aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><path d="M12 3 20 6v6c0 4.4-3.1 7.5-8 9-4.9-1.5-8-4.6-8-9V6l8-3Z"></path><path d="m9 12 2 2 4-5"></path></svg></span><div><strong><?php esc_html_e( 'Available for new projects', 'baharhussain' ); ?></strong><small><?php esc_html_e( 'Let’s discuss your upcoming work', 'baharhussain' ); ?></small></div></li>
				<li><span aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="8"></circle><path d="m8.5 12.5 2.25 2.25L16 9.5"></path></svg></span><div><strong><?php esc_html_e( 'Working with clients', 'baharhussain' ); ?></strong><small><?php esc_html_e( 'across USA, UK, Canada & Australia', 'baharhussain' ); ?></small></div></li>
			</ul>
		</div>
	</div>
</section>
