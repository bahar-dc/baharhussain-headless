<?php
/**
 * Portfolio page frequently asked questions.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

$portfolio_faqs = array(
	array(
		'question' => __( 'What types of WordPress projects do you work on?', 'baharhussain' ),
		'answer'   => __( 'I work on custom WordPress websites, Gutenberg block builds, WooCommerce projects, performance improvements, integrations, and ongoing development support for agencies and businesses.', 'baharhussain' ),
	),
	array(
		'question' => __( 'Can you work from an existing design?', 'baharhussain' ),
		'answer'   => __( 'Yes. I can translate approved Figma, Adobe XD, or other supplied designs into responsive, accessible WordPress websites while staying faithful to the original design system.', 'baharhussain' ),
	),
	array(
		'question' => __( 'Can you improve an existing WordPress website?', 'baharhussain' ),
		'answer'   => __( 'Yes. I can improve existing builds, resolve bugs, add features, modernise templates, clean up code, and address performance or accessibility issues without requiring a complete rebuild.', 'baharhussain' ),
	),
	array(
		'question' => __( 'Do you build custom Gutenberg blocks?', 'baharhussain' ),
		'answer'   => __( 'Yes. I build reusable Gutenberg blocks that match the website design, provide a clear editing experience, and remain maintainable as the site grows.', 'baharhussain' ),
	),
	array(
		'question' => __( 'Do you provide support after launch?', 'baharhussain' ),
		'answer'   => __( 'Yes. Ongoing support can include fixes, updates, improvements, new functionality, performance monitoring, and technical assistance as requirements evolve.', 'baharhussain' ),
	),
	array(
		'question' => __( 'How can we start a project together?', 'baharhussain' ),
		'answer'   => __( 'Send the project goals, designs, timeline, and technical requirements through the contact page. I will review the scope, ask any necessary questions, and recommend the best next step.', 'baharhussain' ),
	),
);
?>
<section class="home-section landing-faq portfolio-faq" aria-labelledby="portfolio-faq-title">
	<div class="wrapper">
		<div class="landing-faq__header">
			<p class="section-eyebrow landing-faq__eyebrow"><?php esc_html_e( 'FAQs', 'baharhussain' ); ?></p>
			<h2 id="portfolio-faq-title" class="landing-faq__title"><?php esc_html_e( 'Questions About My Portfolio & Process', 'baharhussain' ); ?></h2>
			<p class="landing-faq__intro"><?php esc_html_e( 'Helpful answers about the projects I build and what it is like to work together.', 'baharhussain' ); ?></p>
		</div>

		<div class="landing-faq__grid">
			<ul class="landing-faq__questions" aria-label="<?php esc_attr_e( 'Frequently asked questions', 'baharhussain' ); ?>">
				<?php foreach ( $portfolio_faqs as $faq_index => $faq ) { ?>
					<li>
						<button class="landing-faq__question<?php echo 0 === $faq_index ? ' landing-faq__question--active' : ''; ?>" type="button" data-faq-title="<?php echo esc_attr( $faq['question'] ); ?>" data-faq-answer="<?php echo esc_attr( $faq['answer'] ); ?>" aria-controls="portfolio-faq-answer" aria-pressed="<?php echo 0 === $faq_index ? 'true' : 'false'; ?>">
							<span><?php echo esc_html( $faq['question'] ); ?></span><span aria-hidden="true"><?php echo 0 === $faq_index ? '−' : '+'; ?></span>
						</button>
					</li>
				<?php } ?>
			</ul>

			<article id="portfolio-faq-answer" class="landing-faq__answer" aria-live="polite">
				<span class="landing-faq__answer-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M9.6 9.2a2.6 2.6 0 0 1 4.8 1.4c0 1.8-2.4 2-2.4 3.7M12 17.5h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></span>
				<h3 class="landing-faq__answer-title"><?php echo esc_html( $portfolio_faqs[0]['question'] ); ?></h3>
				<p class="landing-faq__answer-text"><?php echo esc_html( $portfolio_faqs[0]['answer'] ); ?></p>
				<div class="landing-faq__answer-footer">
					<span class="landing-faq__help-icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8"/><path d="M9.6 9.2a2.6 2.6 0 0 1 4.8 1.4c0 1.8-2.4 2-2.4 3.7M12 17.5h.01" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/></svg></span>
					<span><?php esc_html_e( 'Still have questions?', 'baharhussain' ); ?></span>
					<a class="landing-faq__answer-link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><span><?php esc_html_e( 'Ask Me a Question', 'baharhussain' ); ?></span><svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></a>
				</div>
			</article>
		</div>
	</div>
</section>
