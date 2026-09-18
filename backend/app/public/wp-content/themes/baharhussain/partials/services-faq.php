<?php
/**
 * Services page frequently asked questions.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

$services_faq_section_id = ! empty( $args['section_id'] ) ? $args['section_id'] : '';

$services_faqs = array(
	array(
		'question' => __( 'Can you work with an existing WordPress theme or codebase?', 'baharhussain' ),
		'answer'   => __( 'Yes. I review the existing setup before making changes. This includes the theme structure, plugins, build tools, custom code, staging website, and known issues.', 'baharhussain' ),
	),
	array(
		'question' => __( 'How do you decide between a plugin and custom code?', 'baharhussain' ),
		'answer'   => __( 'I use a trusted plugin when it solves the requirement cleanly. I recommend custom code when the project needs unique logic, better control, or fewer unnecessary dependencies.', 'baharhussain' ),
	),
	array(
		'question' => __( 'Will the website be easy for clients to edit?', 'baharhussain' ),
		'answer'   => __( 'Yes. I create focused Gutenberg and ACF controls based on what the client needs to manage. I avoid unnecessary options that can make editing confusing.', 'baharhussain' ),
	),
	array(
		'question' => __( 'What testing do you complete before delivery?', 'baharhussain' ),
		'answer'   => __( 'Testing can include responsive layouts, major browsers, forms, interactive features, editor controls, WooCommerce workflows, accessibility checks, and performance review.', 'baharhussain' ),
	),
	array(
		'question' => __( 'Can another developer maintain your code later?', 'baharhussain' ),
		'answer'   => __( 'Yes. I organize the code clearly, follow WordPress Coding Standards, and avoid unnecessary complexity. Handoff notes can also be provided when required.', 'baharhussain' ),
	),
	array(
		'question' => __( 'Can you guarantee a performance score or search ranking?', 'baharhussain' ),
		'answer'   => __( 'No one can honestly guarantee a specific score or ranking. Hosting, content, plugins, third party scripts, competition, and ongoing SEO can all affect the result. I improve the technical areas within my control and set realistic expectations.', 'baharhussain' ),
	),
	array(
		'question' => __( 'How do you manage staging, Git, and deployment?', 'baharhussain' ),
		'answer'   => __( 'I normally develop locally or on staging, track code changes with Git, and test before deployment. The final process is adjusted to match your hosting and existing workflow.', 'baharhussain' ),
	),
);
?>
<section<?php echo $services_faq_section_id ? ' id="' . esc_attr( $services_faq_section_id ) . '"' : ''; ?> class="home-section landing-faq services-faq" aria-labelledby="services-faq-title">
	<div class="wrapper">
		<div class="landing-faq__header">
			<p class="section-eyebrow landing-faq__eyebrow"><?php esc_html_e( 'FAQs', 'baharhussain' ); ?></p>
			<h2 id="services-faq-title" class="landing-faq__title"><?php echo wp_kses_post( __( 'Your Project Questions, <br />Answered', 'baharhussain' ) ); ?></h2>
			<p class="landing-faq__intro"><?php esc_html_e( 'Practical details about code, testing, editing, performance, and project delivery.', 'baharhussain' ); ?></p>
		</div>

		<div class="landing-faq__grid">
			<ul class="landing-faq__questions" aria-label="<?php esc_attr_e( 'Frequently asked questions about WordPress services', 'baharhussain' ); ?>">
				<?php foreach ( $services_faqs as $faq_index => $faq ) { ?>
					<li>
						<button class="landing-faq__question<?php echo 0 === $faq_index ? ' landing-faq__question--active' : ''; ?>" type="button" data-faq-title="<?php echo esc_attr( $faq['question'] ); ?>" data-faq-answer="<?php echo esc_attr( $faq['answer'] ); ?>" aria-controls="services-faq-mobile-answer-<?php echo esc_attr( $faq_index ); ?>" aria-expanded="<?php echo 0 === $faq_index ? 'true' : 'false'; ?>" aria-pressed="<?php echo 0 === $faq_index ? 'true' : 'false'; ?>">
							<span><?php echo esc_html( $faq['question'] ); ?></span><span aria-hidden="true"><?php echo 0 === $faq_index ? '−' : '+'; ?></span>
						</button>
						<div id="services-faq-mobile-answer-<?php echo esc_attr( $faq_index ); ?>" class="landing-faq__mobile-answer<?php echo 0 === $faq_index ? ' is-open' : ''; ?>">
							<p><?php echo esc_html( $faq['answer'] ); ?></p>
						</div>
					</li>
				<?php } ?>
			</ul>

			<article id="services-faq-answer" class="landing-faq__answer" aria-live="polite">
				<span class="landing-faq__answer-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M9.6 9.2a2.6 2.6 0 0 1 4.8 1.4c0 1.8-2.4 2-2.4 3.7M12 17.5h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></span>
				<h3 class="landing-faq__answer-title"><?php echo esc_html( $services_faqs[0]['question'] ); ?></h3>
				<p class="landing-faq__answer-text"><?php echo esc_html( $services_faqs[0]['answer'] ); ?></p>
				<div class="landing-faq__answer-footer">
					<span class="landing-faq__help-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M9.6 9.2a2.6 2.6 0 0 1 4.8 1.4c0 1.8-2.4 2-2.4 3.7M12 17.5h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></span>
					<span><?php esc_html_e( 'Still have questions?', 'baharhussain' ); ?></span>
					<a class="landing-faq__answer-link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><span><?php esc_html_e( 'Ask Me a Question', 'baharhussain' ); ?></span><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
				</div>
			</article>
		</div>
	</div>
</section>
