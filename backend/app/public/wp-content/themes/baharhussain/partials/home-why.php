<?php
/**
 * Homepage partnership benefits section.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

$partner_image_url = get_template_directory_uri() . '/assets/build/images/uploads/bahar-profile-hero.webp';
$why_items         = array(
	array( '01', __( 'Clean & Scalable Code', 'baharhussain' ), __( 'Writing maintainable, standards-based code that’s easy to extend, update, and built to scale.', 'baharhussain' ) ),
	array( '02', __( 'Agency-Friendly Workflow', 'baharhussain' ), __( 'I work the way agencies work: clear communication, organized processes, and tools that keep projects moving.', 'baharhussain' ) ),
	array( '03', __( 'Performance Focused', 'baharhussain' ), __( 'Every build is optimized for speed, Core Web Vitals, and a seamless user experience.', 'baharhussain' ) ),
	array( '04', __( 'Long-Term Support', 'baharhussain' ), __( 'I’m here beyond launch, providing ongoing updates, fixes, and ongoing improvements.', 'baharhussain' ) ),
);
$why_proof         = array(
	__( '6+ Years of WordPress Experience', 'baharhussain' ),
	__( '50+ WordPress Projects Completed', 'baharhussain' ),
	__( 'White-Label Agency Development Partner', 'baharhussain' ),
	__( 'Gutenberg Custom Block Specialist', 'baharhussain' ),
);
$why_values        = array(
	array( __( 'Professional Approach', 'baharhussain' ), __( 'Structured processes and attention to detail in every step.', 'baharhussain' ) ),
	array( __( 'On-Time Delivery', 'baharhussain' ), __( 'Clear timelines and proactive communication you can trust.', 'baharhussain' ) ),
	array( __( 'Client Focused', 'baharhussain' ), __( 'Your goals come first. I listen, adapt, and deliver.', 'baharhussain' ) ),
	array( __( 'Results That Matter', 'baharhussain' ), __( 'Solutions that drive performance, usability, and business growth.', 'baharhussain' ) ),
);
?>

<section class="home-section home-why" aria-labelledby="home-why-title">
	<div class="wrapper">
		<div class="home-why__layout">
			<div class="home-why__content">
				<div class="section-head home-section-head home-why__head">
					<p class="section-eyebrow home-section-head__eyebrow home-why__eyebrow"><?php esc_html_e( 'Why Work With Me', 'baharhussain' ); ?></p>
					<h2 id="home-why-title" class="home-section-head__title home-why__title"><?php esc_html_e( 'Quality Development. Better Results.', 'baharhussain' ); ?></h2>
				</div>

				<ol class="home-why__list">
					<?php foreach ( $why_items as $item ) { ?>
						<li class="home-why__item">
							<span class="home-why__number"><?php echo esc_html( $item[0] ); ?></span>
							<div class="home-why__item-content">
								<h3 class="home-why__item-title"><?php echo esc_html( $item[1] ); ?></h3>
								<p class="home-why__item-text"><?php echo esc_html( $item[2] ); ?></p>
							</div>
						</li>
					<?php } ?>
				</ol>
			</div>

			<aside class="home-why__panel" aria-label="<?php esc_attr_e( 'Partnership highlights', 'baharhussain' ); ?>">
				<div class="home-why__portrait image-cover">
					<img src="<?php echo esc_url( $partner_image_url ); ?>" alt="<?php esc_attr_e( 'Bahar Hussain, WordPress development partner', 'baharhussain' ); ?>" width="1448" height="1086" loading="lazy">
				</div>

				<div class="home-why__proof">
					<ul class="home-why__proof-list">
						<?php foreach ( $why_proof as $index => $proof ) { ?>
							<li>
								<span class="home-why__proof-icon" aria-hidden="true">
									<?php if ( 0 === $index ) { ?>
										<svg viewBox="0 0 24 24" focusable="false"><path d="M7 3v3M17 3v3M4.5 9.5h15M6.5 5h11A2.5 2.5 0 0 1 20 7.5v10A2.5 2.5 0 0 1 17.5 20h-11A2.5 2.5 0 0 1 4 17.5v-10A2.5 2.5 0 0 1 6.5 5Z" /><path d="m9 14 2 2 4-5" /></svg>
									<?php } elseif ( 1 === $index ) { ?>
										<svg viewBox="0 0 24 24" focusable="false"><path d="M4 8 12 4l8 4-8 4-8-4ZM4 12l8 4 8-4M4 16l8 4 8-4" /></svg>
									<?php } elseif ( 2 === $index ) { ?>
										<svg viewBox="0 0 24 24" focusable="false"><circle cx="9" cy="8" r="3" /><path d="M3.5 19a5.5 5.5 0 0 1 11 0M16 11a2.5 2.5 0 1 0 0-5M17.5 14.5A4.5 4.5 0 0 1 21 19" /></svg>
									<?php } else { ?>
										<svg viewBox="0 0 24 24" focusable="false"><path d="M12 3 20 6v6c0 4.4-3.1 7.5-8 9-4.9-1.5-8-4.6-8-9V6l8-3Z" /><path d="m9 12 2 2 4-5" /></svg>
									<?php } ?>
								</span>
								<span><?php echo esc_html( $proof ); ?></span>
							</li>
						<?php } ?>
					</ul>
				</div>
			</aside>
		</div>

		<ul class="home-why__values" aria-label="<?php esc_attr_e( 'Working values', 'baharhussain' ); ?>">
			<?php foreach ( $why_values as $index => $value ) { ?>
				<li>
					<span class="home-why__value-icon" aria-hidden="true">
						<?php if ( 0 === $index ) { ?>
							<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="8" /><path d="m8.5 12.5 2.25 2.25L16 9.5" /></svg>
						<?php } elseif ( 1 === $index ) { ?>
							<svg viewBox="0 0 24 24" focusable="false"><circle cx="12" cy="12" r="9" /><path d="M12 7v6l4 2" /></svg>
						<?php } elseif ( 2 === $index ) { ?>
							<svg viewBox="0 0 24 24" focusable="false"><circle cx="9" cy="8" r="3" /><path d="M3.5 19a5.5 5.5 0 0 1 11 0M16 11a2.5 2.5 0 1 0 0-5M17.5 14.5A4.5 4.5 0 0 1 21 19" /></svg>
						<?php } else { ?>
							<svg viewBox="0 0 592 374" focusable="false"><path d="M112 314L240 186L325 271L496 100" /><path d="M390 101H496V207" /></svg>
						<?php } ?>
					</span>
					<div>
						<h3><?php echo esc_html( $value[0] ); ?></h3>
						<p><?php echo esc_html( $value[1] ); ?></p>
					</div>
				</li>
			<?php } ?>
		</ul>
	</div>
</section>
