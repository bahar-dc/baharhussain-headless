<?php
/**
 * Homepage frequently asked questions.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

$home_faqs = array(
	array(
		'question' => __( 'What do you need before providing an estimate?', 'baharhussain' ),
		'answer'   => __( 'I need the designs, page list, required features, integrations, content status, and expected launch date. I then provide a clear scope, estimate, and timeline.', 'baharhussain' ),
	),
	array(
		'question' => __( 'Can we begin with a small task?', 'baharhussain' ),
		'answer'   => __( 'Yes. We can start with one clearly defined task before planning a larger project. This helps you understand my communication, workflow, and code quality.', 'baharhussain' ),
	),
	array(
		'question' => __( 'Can you work with an existing WordPress theme or codebase?', 'baharhussain' ),
		'answer'   => __( 'Yes. I review the current setup and issues before making changes. I then confirm the safest way to continue the work.', 'baharhussain' ),
	),
	array(
		'question' => __( 'Will the website be easy for clients to edit?', 'baharhussain' ),
		'answer'   => __( 'Yes. I create focused Gutenberg and ACF controls based on what the client needs to manage.', 'baharhussain' ),
	),
	array(
		'question' => __( 'What testing do you complete before delivery?', 'baharhussain' ),
		'answer'   => __( 'I test responsive layouts, major browsers, forms, editor controls, and any features developed for the project.', 'baharhussain' ),
	),
	array(
		'question' => __( 'What happens if the project requirements change?', 'baharhussain' ),
		'answer'   => __( 'I explain how the change affects the scope, cost, and timeline. Additional work begins after the updated requirements are confirmed.', 'baharhussain' ),
	),
	array(
		'question' => __( 'How do you manage communication across different time zones?', 'baharhussain' ),
		'answer'   => __( 'I keep communication simple and flexible. I share regular progress updates, reply during agreed hours, and schedule calls when needed so everyone stays informed.', 'baharhussain' ),
	),
);
?>
<section class="home-section landing-faq home-faq" aria-labelledby="home-faq-title">
	<div class="wrapper">
		<div class="landing-faq__header">
			<p class="section-eyebrow landing-faq__eyebrow"><?php esc_html_e( 'FAQs', 'baharhussain' ); ?></p>
			<h2 id="home-faq-title" class="landing-faq__title"><?php esc_html_e( 'Planning Your Project?', 'baharhussain' ); ?></h2>
			<p class="landing-faq__intro"><?php esc_html_e( 'Helpful answers about estimates, existing projects, changing requirements, and communication.', 'baharhussain' ); ?></p>
		</div>

		<div class="landing-faq__grid">
			<ul class="landing-faq__questions" aria-label="<?php esc_attr_e( 'Frequently asked questions about planning a project', 'baharhussain' ); ?>">
				<?php foreach ( $home_faqs as $faq_index => $faq ) { ?>
					<li>
						<button class="landing-faq__question<?php echo 0 === $faq_index ? ' landing-faq__question--active' : ''; ?>" type="button" data-faq-title="<?php echo esc_attr( $faq['question'] ); ?>" data-faq-answer="<?php echo esc_attr( $faq['answer'] ); ?>" aria-controls="home-faq-mobile-answer-<?php echo esc_attr( $faq_index ); ?>" aria-expanded="<?php echo 0 === $faq_index ? 'true' : 'false'; ?>" aria-pressed="<?php echo 0 === $faq_index ? 'true' : 'false'; ?>">
							<span><?php echo esc_html( $faq['question'] ); ?></span><span aria-hidden="true"><?php echo 0 === $faq_index ? '−' : '+'; ?></span>
						</button>
						<div id="home-faq-mobile-answer-<?php echo esc_attr( $faq_index ); ?>" class="landing-faq__mobile-answer<?php echo 0 === $faq_index ? ' is-open' : ''; ?>">
							<p><?php echo esc_html( $faq['answer'] ); ?></p>
						</div>
					</li>
				<?php } ?>
			</ul>

			<article id="home-faq-answer" class="landing-faq__answer" aria-live="polite">
				<span class="landing-faq__answer-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M9.6 9.2a2.6 2.6 0 0 1 4.8 1.4c0 1.8-2.4 2-2.4 3.7M12 17.5h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></span>
				<h3 class="landing-faq__answer-title"><?php echo esc_html( $home_faqs[0]['question'] ); ?></h3>
				<p class="landing-faq__answer-text"><?php echo esc_html( $home_faqs[0]['answer'] ); ?></p>
				<div class="landing-faq__answer-footer">
					<span class="landing-faq__help-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M9.6 9.2a2.6 2.6 0 0 1 4.8 1.4c0 1.8-2.4 2-2.4 3.7M12 17.5h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></span>
					<span><?php esc_html_e( 'Still have questions?', 'baharhussain' ); ?></span>
					<a class="landing-faq__answer-link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><span><?php esc_html_e( 'Ask Me a Question', 'baharhussain' ); ?></span><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
				</div>
			</article>
		</div>
	</div>
</section>
