<?php
/**
 * Shared testimonial section.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="home-section home-testimonials" aria-labelledby="shared-testimonials-title">
	<div class="wrapper">
		<div class="section-head home-section-head home-testimonials__head">
			<p class="section-eyebrow home-section-head__eyebrow home-testimonials__eyebrow"><?php esc_html_e( 'Client Testimonial', 'baharhussain' ); ?></p>
			<h2 id="shared-testimonials-title" class="home-section-head__title home-testimonials__title"><?php esc_html_e( 'Client’s Experience', 'baharhussain' ); ?></h2>
		</div>

		<div class="home-testimonials__stage">
			<figure class="home-testimonial-card">
					<blockquote>
						<p><?php esc_html_e( '“Bahar successfully delivered a high-quality website with excellent mobile performance and SEO. The team impressed the client with their effective communication, prompt execution, and attention to detail. Moreover, they met all deadlines and responded to the client’s needs.”', 'baharhussain' ); ?></p>
					</blockquote>
					<figcaption class="home-testimonial-card__footer">
						<div class="home-testimonial-card__person">
							<span class="home-testimonial-card__avatar">
								<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/nick-hurford.jpeg' ); ?>" alt="<?php esc_attr_e( 'Nick Hurford', 'baharhussain' ); ?>" width="64" height="64" loading="lazy" decoding="async">
							</span>
							<span><strong><?php esc_html_e( 'Nick Hurford', 'baharhussain' ); ?></strong><span><?php esc_html_e( 'Director, Source', 'baharhussain' ); ?></span></span>
						</div>
						<div class="home-testimonial-card__brand">
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/source.svg' ); ?>" alt="<?php esc_attr_e( 'Source', 'baharhussain' ); ?>" width="154" height="50" loading="lazy" decoding="async">
						</div>
					</figcaption>
			</figure>
		</div>
	</div>
</section>
