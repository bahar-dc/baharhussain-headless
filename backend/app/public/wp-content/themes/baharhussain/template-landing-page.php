<?php
/**
 * Template Name: Landing Page
 *
 * Static landing page template.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$landing_hero_image_url = get_template_directory_uri() . '/assets/build/images/uploads/bahar-profile-hero.webp';

get_header();
?>

<div id="primary" class="site-main landing-page-template">
	
	<section class="home-section landing-hero" aria-labelledby="landing-hero-title">
		<div class="wrapper">
			<div class="landing-hero__grid">
				<div class="landing-hero__content">
					<p class="section-eyebrow landing-hero__eyebrow"><?php esc_html_e( 'Hi, I am Bahar Hussain, I provide', 'baharhussain' ); ?></p>
					<h1 id="landing-hero-title" class="landing-hero__title">
						<?php esc_html_e( 'Enterprise Level WordPress Support', 'baharhussain' ); ?>
						<span><?php esc_html_e( 'for Busy Teams', 'baharhussain' ); ?></span>
					</h1>
					<p class="landing-hero__text"><?php esc_html_e( 'I provide flexible development support when workloads increase, deadlines are tight, or a project needs deeper WordPress experience.', 'baharhussain' ); ?></p>

					<div class="landing-hero__actions" aria-label="<?php esc_attr_e( 'Landing page actions', 'baharhussain' ); ?>">
						<a class="button main-btn landing-hero__button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
							<span class="button-text"><?php esc_html_e( 'Discuss Your Project', 'baharhussain' ); ?></span>
							<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
								<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</a>
						<a class="button outline-btn landing-hero__button" href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>">
							<span class="button-text"><?php esc_html_e( 'View My Work', 'baharhussain' ); ?></span>
							<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
								<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</a>
					</div>
				</div>

				<div class="landing-hero__media" aria-label="<?php esc_attr_e( 'Agency development partner preview', 'baharhussain' ); ?>">
					<div class="landing-hero__image">
						<img
							src="<?php echo esc_url( $landing_hero_image_url ); ?>"
							alt="<?php esc_attr_e( 'Bahar Hussain, WordPress developer ready to support agency projects', 'baharhussain' ); ?>"
							width="1448"
							height="1086"
							fetchpriority="high"
						/>
					</div>

					<div class="landing-hero__partner-card">
						<span class="landing-hero__partner-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></circle>
								<path d="M3.5 19a5.5 5.5 0 0 1 11 0M16 11a2.5 2.5 0 1 0 0-5M17.5 14.5A4.5 4.5 0 0 1 21 19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"></path>
							</svg>
						</span>
						<span>
							<strong><?php esc_html_e( 'Flexible WordPress', 'baharhussain' ); ?></strong>
							<span><?php esc_html_e( 'Support', 'baharhussain' ); ?></span>
						</span>
					</div>

					<ul class="landing-hero__feature-card" aria-label="<?php esc_attr_e( 'Service highlights', 'baharhussain' ); ?>">
						<li>
							<span aria-hidden="true"></span>
							<?php esc_html_e( 'White Label Support', 'baharhussain' ); ?>
						</li>
						<li>
							<span aria-hidden="true"></span>
							<?php esc_html_e( 'Gutenberg Development', 'baharhussain' ); ?>
						</li>
						<li>
							<span aria-hidden="true"></span>
							<?php esc_html_e( 'Plugin Development', 'baharhussain' ); ?>
						</li>
						<li>
							<span aria-hidden="true"></span>
							<?php esc_html_e( 'WooCommerce Development', 'baharhussain' ); ?>
						</li>
					</ul>
				</div>
			</div>

			<ul class="landing-stats" aria-label="<?php esc_attr_e( 'Experience summary', 'baharhussain' ); ?>">
				<li>
					<span class="landing-stats__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false">
							<rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.8" />
							<path d="M7 3v4M17 3v4M3 10h18" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" />
						</svg>
					</span>
					<span>
						<strong><?php esc_html_e( '6+', 'baharhussain' ); ?></strong>
						<span><?php esc_html_e( 'Years Experience', 'baharhussain' ); ?></span>
					</span>
				</li>
				<li>
					<span class="landing-stats__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false">
							<path d="M4 8 12 4l8 4-8 4-8-4ZM4 12l8 4 8-4M4 16l8 4 8-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</span>
					<span>
						<strong><?php esc_html_e( '50+', 'baharhussain' ); ?></strong>
						<span><?php esc_html_e( 'Projects Completed', 'baharhussain' ); ?></span>
					</span>
				</li>
				<li>
					<span class="landing-stats__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false">
							<circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.8" />
							<path d="M3.5 19a5.5 5.5 0 0 1 11 0M16 11a2.5 2.5 0 1 0 0-5M17.5 14.5A4.5 4.5 0 0 1 21 19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</span>
					<span>
						<strong><?php esc_html_e( 'Agency', 'baharhussain' ); ?></strong>
						<span><?php esc_html_e( 'White-Label Partner', 'baharhussain' ); ?></span>
					</span>
				</li>
				<li>
					<span class="landing-stats__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false">
							<path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M4 7.5 12 12l8-4.5M12 12v9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</span>
					<span>
						<strong><?php esc_html_e( 'Gutenberg', 'baharhussain' ); ?></strong>
						<span><?php esc_html_e( 'Block Specialist', 'baharhussain' ); ?></span>
					</span>
				</li>
			</ul>
		</div>
	</section>

	<section class="home-section landing-pain-points" aria-labelledby="landing-pain-points-title">
		<div class="wrapper">
			<div class="landing-pain-points__grid">
				<div class="landing-pain-points__content">
					<p class="section-eyebrow landing-pain-points__eyebrow"><?php esc_html_e( 'Common Challenges', 'baharhussain' ); ?></p>
					<h2 id="landing-pain-points-title" class="landing-pain-points__title">
						<?php esc_html_e( 'When WordPress Projects', 'baharhussain' ); ?>
						<span><?php esc_html_e( 'Need Extra Support', 'baharhussain' ); ?></span>
					</h2>
					<p class="landing-pain-points__text"><?php esc_html_e( 'Tight deadlines, complex requirements, and limited capacity can slow delivery. I provide focused support to keep work moving.', 'baharhussain' ); ?></p>
				</div>

				<ul class="landing-pain-points__list">
					<li class="landing-pain-card">
						<span class="landing-pain-card__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M12 7v5l3 2" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
						<h3><?php esc_html_e( 'Tight Deadlines', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Extra help to keep important work on schedule.', 'baharhussain' ); ?></p>
					</li>
					<li class="landing-pain-card">
						<span class="landing-pain-card__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M3.5 19a5.5 5.5 0 0 1 11 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M16 11a2.5 2.5 0 1 0 0-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M17.5 14.5A4.5 4.5 0 0 1 21 19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
						<h3><?php esc_html_e( 'Limited Capacity', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Flexible support when your team is fully booked.', 'baharhussain' ); ?></p>
					</li>
					<li class="landing-pain-card">
						<span class="landing-pain-card__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" fill="none" focusable="false">
								<path d="m8 8-4 4 4 4M16 8l4 4-4 4M14 4l-4 16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
						<h3><?php esc_html_e( 'Complex Requirements', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Help with custom WordPress features and integrations.', 'baharhussain' ); ?></p>
					</li>
					<li class="landing-pain-card">
						<span class="landing-pain-card__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<path d="M8 8h8v8H8z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M3 12h3M18 12h3M12 3v3M12 18v3M5.6 5.6l2.1 2.1M16.3 16.3l2.1 2.1M18.4 5.6l-2.1 2.1M7.7 16.3l-2.1 2.1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
						<h3><?php esc_html_e( 'Technical Issues', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Fast support for bugs and unexpected problems.', 'baharhussain' ); ?></p>
					</li>
					<li class="landing-pain-card">
						<span class="landing-pain-card__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<path d="M4 14a8 8 0 1 1 16 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M4 14h2M18 14h2M12 6v2M7.8 9.8 6.4 8.4M16.2 9.8l1.4-1.4M12 14l4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
						<h3><?php esc_html_e( 'Performance Problems', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Practical improvements for speed and Core Web Vitals.', 'baharhussain' ); ?></p>
					</li>
					<li class="landing-pain-card">
						<span class="landing-pain-card__icon landing-pain-card__icon--fill" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<path d="M20,13c-0.6,0-1-0.4-1-1c0-3.9-3.1-7-7-7c-1.9,0-3.6,0.7-5,2C6.7,7.4,6,7.4,5.6,7c-0.4-0.4-0.4-1,0-1.4C7.3,3.9,9.6,3,12,3c5,0,9,4,9,9C21,12.6,20.6,13,20,13z" />
								<path d="M12,21c-5,0-9-4-9-9c0-0.6,0.4-1,1-1s1,0.4,1,1c0,3.9,3.1,7,7,7c1.9,0,3.6-0.7,5-2c0.4-0.4,1-0.4,1.4,0c0.4,0.4,0.4,1,0,1.4C16.7,20.1,14.4,21,12,21z" />
								<path d="M20,13c-0.2,0-0.4-0.1-0.6-0.2L16,10.3c-0.4-0.3-0.5-1-0.2-1.4c0.3-0.4,1-0.5,1.4-0.2l3.4,2.5c0.4,0.3,0.5,1,0.2,1.4C20.6,12.9,20.3,13,20,13z" />
								<path d="M20,13c-0.2,0-0.4-0.1-0.6-0.2c-0.4-0.3-0.5-1-0.2-1.4L21.7,8c0.3-0.4,1-0.5,1.4-0.2c0.4,0.3,0.5,1,0.2,1.4l-2.5,3.4C20.6,12.9,20.3,13,20,13z" />
								<path d="M7.4,15.5c-0.2,0-0.4-0.1-0.6-0.2l-3.4-2.5c-0.4-0.3-0.5-1-0.2-1.4c0.3-0.4,0.9-0.5,1.4-0.2L8,13.7c0.4,0.3,0.5,1,0.2,1.4C8,15.4,7.7,15.5,7.4,15.5z" />
								<path d="M1.5,16.4c-0.2,0-0.4-0.1-0.6-0.2c-0.4-0.3-0.5-1-0.2-1.4l2.5-3.4c0.3-0.4,0.9-0.5,1.4-0.2c0.4,0.3,0.5,1,0.2,1.4L2.3,16C2.1,16.3,1.8,16.4,1.5,16.4z" />
							</svg>
						</span>
						<h3><?php esc_html_e( 'Ongoing Requests', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Help with updates, fixes, and improvements after launch.', 'baharhussain' ); ?></p>
					</li>
				</ul>

				<div class="landing-pain-points__goal">
					<span class="landing-pain-points__goal-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false">
							<path d="M9 21h6" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M10 17h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M8.5 14.5A6 6 0 1 1 15.5 14.5c-1.25.72-1.5 1.78-1.5 2.5h-4c0-.72-.25-1.78-1.5-2.5Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M10 10.5h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</span>
					<div>
						<h3><?php esc_html_e( 'My Goal', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Reduce development pressure and help your team deliver WordPress projects with confidence.', 'baharhussain' ); ?></p>
					</div>
				</div>
			</div>

			<div class="landing-pain-points__cta">
				<span class="landing-pain-points__cta-icon" aria-hidden="true">
					<svg viewBox="0 0 24 24" focusable="false">
						<circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
						<path d="m8.5 12.5 2.25 2.25L16 9.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</span>
				<div>
					<h3><?php esc_html_e( 'Need Extra WordPress Support?', 'baharhussain' ); ?></h3>
					<p><?php esc_html_e( 'Tell me where your team needs help.', 'baharhussain' ); ?></p>
				</div>
				<a class="button main-btn landing-pain-points__cta-button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
					<span class="button-text"><?php esc_html_e( 'Discuss Your Challenge', 'baharhussain' ); ?></span>
					<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
						<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
				</a>
			</div>
		</div>
	</section>

	<?php ob_start(); ?>
	<section class="home-section landing-agency-support" aria-labelledby="landing-agency-support-title">
		<div class="wrapper">
			<div class="landing-agency-support__grid">
				<div class="landing-agency-support__content">
					<p class="section-eyebrow landing-agency-support__eyebrow"><?php esc_html_e( 'Development Support', 'baharhussain' ); ?></p>
					<h2 id="landing-agency-support-title" class="landing-agency-support__title">
						<?php esc_html_e( 'Support That Fits Your Workflow', 'baharhussain' ); ?>
					</h2>
					<p class="landing-agency-support__text"><?php esc_html_e( 'I work with your tools and process, helping your team complete WordPress projects without extra pressure.', 'baharhussain' ); ?></p>
					<div class="landing-agency-support__actions" aria-label="<?php esc_attr_e( 'Agency support actions', 'baharhussain' ); ?>">
						<a class="button main-btn landing-agency-support__button" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
							<span class="button-text"><?php esc_html_e( 'Discuss Your Project', 'baharhussain' ); ?></span>
							<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
								<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</a>
					</div>
				</div>

				<ul class="landing-agency-support__list">
					<li class="landing-agency-support__item">
						<span class="landing-agency-support__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<circle cx="5" cy="6" r="2" stroke="currentColor" stroke-width="1.44" />
								<circle cx="12" cy="12" r="2" stroke="currentColor" stroke-width="1.44" />
								<circle cx="19" cy="6" r="2" stroke="currentColor" stroke-width="1.44" />
								<circle cx="19" cy="18" r="2" stroke="currentColor" stroke-width="1.44" />
								<path d="M7 6h3a2 2 0 0 1 2 2v2M14 12h3a2 2 0 0 0 2-2V8M14 12h3a2 2 0 0 1 2 2v2" stroke="currentColor" stroke-width="1.44" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
						<div>
							<h3><?php esc_html_e( 'Follow Your Process', 'baharhussain' ); ?></h3>
							<p><?php esc_html_e( 'I use your tools, communication methods, and review steps.', 'baharhussain' ); ?></p>
						</div>
					</li>
					<li class="landing-agency-support__item">
						<span class="landing-agency-support__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.44" />
								<path d="M3.5 19a5.5 5.5 0 0 1 11 0M16 11a2.5 2.5 0 1 0 0-5M17.5 14.5A4.5 4.5 0 0 1 21 19" stroke="currentColor" stroke-width="1.44" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
						<div>
							<h3><?php esc_html_e( 'Flexible Support', 'baharhussain' ); ?></h3>
							<p><?php esc_html_e( 'Get extra help when work increases or deadlines are close.', 'baharhussain' ); ?></p>
						</div>
					</li>
					<li class="landing-agency-support__item">
						<span class="landing-agency-support__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<path d="M6 17h12l-1.5-2.2V10a4.5 4.5 0 0 0-9 0v4.8L6 17Z" stroke="currentColor" stroke-width="1.44" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M10 20h4M12 3v2" stroke="currentColor" stroke-width="1.44" stroke-linecap="round" />
							</svg>
						</span>
						<div>
							<h3><?php esc_html_e( 'Clear Updates', 'baharhussain' ); ?></h3>
							<p><?php esc_html_e( 'I keep you informed about progress and any problems.', 'baharhussain' ); ?></p>
						</div>
					</li>
					<li class="landing-agency-support__item">
						<span class="landing-agency-support__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<rect x="3" y="5" width="18" height="16" rx="2" stroke="currentColor" stroke-width="1.44" />
								<path d="M7 3v4M17 3v4M3 10h18m5 5 2 2 4-4" stroke="currentColor" stroke-width="1.44" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
						<div>
							<h3><?php esc_html_e( 'On Time Delivery', 'baharhussain' ); ?></h3>
							<p><?php esc_html_e( 'Work is tested and delivered on the agreed date.', 'baharhussain' ); ?></p>
						</div>
					</li>
					<li class="landing-agency-support__item">
						<span class="landing-agency-support__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<path d="M12 3 20 6v6c0 4.4-3.1 7.5-8 9-4.9-1.5-8-4.6-8-9V6l8-3Z" stroke="currentColor" stroke-width="1.44" stroke-linecap="round" stroke-linejoin="round" />
								<path d="m9 12 2 2 4-5" stroke="currentColor" stroke-width="1.44" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</span>
						<div>
							<h3><?php esc_html_e( 'Help After Launch', 'baharhussain' ); ?></h3>
							<p><?php esc_html_e( 'I can continue with fixes, updates, and new requests.', 'baharhussain' ); ?></p>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</section>
	<?php $agency_support_section = ob_get_clean(); ?>

	<?php if ( false ) : // Deprecated inline service breakdown retained temporarily during shared partial migration. ?>
	<section class="home-section landing-service-breakdown" aria-labelledby="landing-service-breakdown-title">
		<div class="wrapper">
			<div class="landing-service-breakdown__header">
				<p class="section-eyebrow landing-service-breakdown__eyebrow"><?php esc_html_e( 'Service Details', 'baharhussain' ); ?></p>
				<h2 id="landing-service-breakdown-title" class="landing-service-breakdown__title"><?php esc_html_e( 'Detailed Service Breakdown', 'baharhussain' ); ?></h2>
				<p class="landing-service-breakdown__intro"><?php esc_html_e( 'A closer look at the WordPress development support I provide for digital agencies.', 'baharhussain' ); ?></p>
			</div>

			<div class="landing-service-breakdown__list">
				<article class="landing-service-card">
					<div class="landing-service-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false">
							<path d="m8 8-4 4 4 4M16 8l4 4-4 4M14 4l-4 16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="landing-service-card__main">
						<div>
							<h3><?php esc_html_e( 'White-Label WordPress Development', 'baharhussain' ); ?></h3>
							<p><?php esc_html_e( 'I work behind the scenes as your development partner, helping your agency deliver WordPress projects without adding internal pressure.', 'baharhussain' ); ?></p>
						</div>
					</div>
					<div class="landing-service-card__includes">
						<h4><?php esc_html_e( 'Includes', 'baharhussain' ); ?></h4>
						<ul>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Custom WordPress builds', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Frontend development', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Theme customization', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Bug fixing', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Agency handoff support', 'baharhussain' ); ?></li>
						</ul>
					</div>
					<div class="landing-service-card__best">
						<h4><?php esc_html_e( 'Best for', 'baharhussain' ); ?></h4>
						<p><?php esc_html_e( 'Agencies that need dependable development capacity.', 'baharhussain' ); ?></p>
					</div>
				</article>

				<article class="landing-service-card landing-service-card--reverse">
					<div class="landing-service-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false">
							<path d="M5 5h5v5H5zM14 5h5v5h-5zM5 14h5v5H5zM14 14h5v5h-5z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="landing-service-card__main">
						<div>
							<h3><?php esc_html_e( 'Gutenberg Block Development', 'baharhussain' ); ?></h3>
							<p><?php esc_html_e( 'Flexible custom Gutenberg blocks that make websites easier to manage and easier to scale.', 'baharhussain' ); ?></p>
						</div>
					</div>
					<div class="landing-service-card__includes">
						<h4><?php esc_html_e( 'Includes', 'baharhussain' ); ?></h4>
						<ul>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Custom ACF blocks', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Dynamic blocks', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Reusable sections', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Editor-friendly controls', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Responsive frontend output', 'baharhussain' ); ?></li>
						</ul>
					</div>
					<div class="landing-service-card__best">
						<h4><?php esc_html_e( 'Best for', 'baharhussain' ); ?></h4>
						<p><?php esc_html_e( 'Agencies building custom content-focused websites.', 'baharhussain' ); ?></p>
					</div>
				</article>

				<article class="landing-service-card">
					<div class="landing-service-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false">
							<path d="M4 20c4.5-.4 7.7-2.2 10-5.5M14 14.5l4.8-4.8a2.7 2.7 0 0 0-3.8-3.8L10.2 10.7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M9 11.8 12.2 15 9 18.2 5.8 15z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="landing-service-card__main">
						<div>
							<h3><?php esc_html_e( 'Custom Theme Development', 'baharhussain' ); ?></h3>
							<p><?php esc_html_e( 'Lightweight custom WordPress themes built for performance, scalability, and long-term maintainability.', 'baharhussain' ); ?></p>
						</div>
					</div>
					<div class="landing-service-card__includes">
						<h4><?php esc_html_e( 'Includes', 'baharhussain' ); ?></h4>
						<ul>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Custom theme development', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Template building', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'SCSS architecture', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Responsive layouts', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Reusable templates', 'baharhussain' ); ?></li>
						</ul>
					</div>
					<div class="landing-service-card__best">
						<h4><?php esc_html_e( 'Best for', 'baharhussain' ); ?></h4>
						<p><?php esc_html_e( 'Agencies that need clean custom WordPress builds.', 'baharhussain' ); ?></p>
					</div>
				</article>

				<article class="landing-service-card landing-service-card--reverse">
					<div class="landing-service-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false">
							<path d="M5 6h2l2 10h8l2-7H8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							<circle cx="10" cy="20" r="1" stroke="currentColor" stroke-width="1.8" />
							<circle cx="17" cy="20" r="1" stroke="currentColor" stroke-width="1.8" />
						</svg>
					</div>
					<div class="landing-service-card__main">
						<div>
							<h3><?php esc_html_e( 'WooCommerce Development', 'baharhussain' ); ?></h3>
							<p><?php esc_html_e( 'Custom WooCommerce development for stores that need flexible product, checkout, and workflow support.', 'baharhussain' ); ?></p>
						</div>
					</div>
					<div class="landing-service-card__includes">
						<h4><?php esc_html_e( 'Includes', 'baharhussain' ); ?></h4>
						<ul>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Product page customization', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Checkout improvements', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Custom order flows', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Admin fields and logic', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'WooCommerce support', 'baharhussain' ); ?></li>
						</ul>
					</div>
					<div class="landing-service-card__best">
						<h4><?php esc_html_e( 'Best for', 'baharhussain' ); ?></h4>
						<p><?php esc_html_e( 'Agencies handling ecommerce projects.', 'baharhussain' ); ?></p>
					</div>
				</article>

				<article class="landing-service-card">
					<div class="landing-service-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false">
							<path d="M4 14a8 8 0 1 1 16 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M4 14h2M18 14h2M12 6v2M7.8 9.8 6.4 8.4M16.2 9.8l1.4-1.4M12 14l4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="landing-service-card__main">
						<div>
							<h3><?php esc_html_e( 'Performance Optimization', 'baharhussain' ); ?></h3>
							<p><?php esc_html_e( 'I improve WordPress speed, frontend performance, and Core Web Vitals for a better user experience.', 'baharhussain' ); ?></p>
						</div>
					</div>
					<div class="landing-service-card__includes">
						<h4><?php esc_html_e( 'Includes', 'baharhussain' ); ?></h4>
						<ul>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'CSS and JS cleanup', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Image optimization', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Font loading improvements', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'LCP improvements', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Performance fixes', 'baharhussain' ); ?></li>
						</ul>
					</div>
					<div class="landing-service-card__best">
						<h4><?php esc_html_e( 'Best for', 'baharhussain' ); ?></h4>
						<p><?php esc_html_e( 'Agencies working on slow or heavy websites.', 'baharhussain' ); ?></p>
					</div>
				</article>

				<article class="landing-service-card landing-service-card--reverse">
					<div class="landing-service-card__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false">
							<path d="M12 3 20 6v6c0 4.4-3.1 7.5-8 9-4.9-1.5-8-4.6-8-9V6l8-3Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							<path d="m9 12 2 2 4-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</div>
					<div class="landing-service-card__main">
						<div>
							<h3><?php esc_html_e( 'Maintenance & Support', 'baharhussain' ); ?></h3>
							<p><?php esc_html_e( 'Ongoing support for updates, fixes, improvements, and long-term WordPress help.', 'baharhussain' ); ?></p>
						</div>
					</div>
					<div class="landing-service-card__includes">
						<h4><?php esc_html_e( 'Includes', 'baharhussain' ); ?></h4>
						<ul>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Bug fixes', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Plugin updates', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Layout fixes', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Small improvements', 'baharhussain' ); ?></li>
							<li><span aria-hidden="true"></span><?php esc_html_e( 'Ongoing support', 'baharhussain' ); ?></li>
						</ul>
					</div>
					<div class="landing-service-card__best">
						<h4><?php esc_html_e( 'Best for', 'baharhussain' ); ?></h4>
						<p><?php esc_html_e( 'Agencies managing multiple client websites.', 'baharhussain' ); ?></p>
					</div>
				</article>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php get_template_part( 'partials/home', 'services' ); ?>

	<?php get_template_part( 'partials/portfolio', 'projects' ); ?>
	<?php get_template_part( 'partials/home', 'standards', array( 'section_id' => 'agency-standards-title' ) ); ?>
	<?php get_template_part( 'partials/home', 'process', array( 'section_id' => 'agency-process-title' ) ); ?>
	<?php echo $agency_support_section; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Buffered static template markup. ?>
	<?php get_template_part( 'partials/services', 'pricing' ); ?>

	<?php if ( false ) : // Deprecated inline FAQ retained temporarily during shared partial migration. ?>
	<section class="home-section landing-faq" aria-labelledby="landing-faq-title">
		<div class="wrapper">
			<div class="landing-faq__header">
				<p class="section-eyebrow landing-faq__eyebrow"><?php esc_html_e( 'FAQs', 'baharhussain' ); ?></p>
				<h2 id="landing-faq-title" class="landing-faq__title"><?php esc_html_e( 'Common Questions from Agencies', 'baharhussain' ); ?></h2>
				<p class="landing-faq__intro"><?php esc_html_e( 'Clear answers to the most common questions agencies ask about working together.', 'baharhussain' ); ?></p>
			</div>

			<div class="landing-faq__grid">
				<ul class="landing-faq__questions" aria-label="<?php esc_attr_e( 'Frequently asked questions', 'baharhussain' ); ?>">
					<li>
						<button class="landing-faq__question landing-faq__question--active" type="button" data-faq-title="<?php echo esc_attr__( 'Can you work white-label for our agency?', 'baharhussain' ); ?>" data-faq-answer="<?php echo esc_attr__( 'Absolutely. We work behind the scenes as your development partner, so your clients only see your brand. We’re comfortable following your processes, tools, and communication style to ensure a seamless experience for you and your clients.', 'baharhussain' ); ?>" aria-controls="landing-faq-answer" aria-pressed="true">
							<span><?php esc_html_e( 'Can you work white-label for our agency?', 'baharhussain' ); ?></span>
							<span aria-hidden="true">-</span>
						</button>
					</li>
					<li>
						<button class="landing-faq__question" type="button" data-faq-title="<?php echo esc_attr__( 'Do you work with existing WordPress websites?', 'baharhussain' ); ?>" data-faq-answer="<?php echo esc_attr__( 'Yes. I can work with existing WordPress websites, improve older builds, fix issues, add new features, clean up code, and support ongoing client requests without requiring a full rebuild.', 'baharhussain' ); ?>" aria-controls="landing-faq-answer" aria-pressed="false">
							<span><?php esc_html_e( 'Do you work with existing WordPress websites?', 'baharhussain' ); ?></span>
							<span aria-hidden="true">+</span>
						</button>
					</li>
					<li>
						<button class="landing-faq__question" type="button" data-faq-title="<?php echo esc_attr__( 'Can you build custom Gutenberg blocks?', 'baharhussain' ); ?>" data-faq-answer="<?php echo esc_attr__( 'Yes. I build custom Gutenberg blocks that match your design system, are easy for clients to edit, and stay maintainable for long-term agency support.', 'baharhussain' ); ?>" aria-controls="landing-faq-answer" aria-pressed="false">
							<span><?php esc_html_e( 'Can you build custom Gutenberg blocks?', 'baharhussain' ); ?></span>
							<span aria-hidden="true">+</span>
						</button>
					</li>
					<li>
						<button class="landing-faq__question" type="button" data-faq-title="<?php echo esc_attr__( 'Can you help with WooCommerce websites?', 'baharhussain' ); ?>" data-faq-answer="<?php echo esc_attr__( 'Yes. I can help with WooCommerce builds, theme customisation, checkout improvements, template work, integrations, bug fixes, and performance-focused updates.', 'baharhussain' ); ?>" aria-controls="landing-faq-answer" aria-pressed="false">
							<span><?php esc_html_e( 'Can you help with WooCommerce websites?', 'baharhussain' ); ?></span>
							<span aria-hidden="true">+</span>
						</button>
					</li>
					<li>
						<button class="landing-faq__question" type="button" data-faq-title="<?php echo esc_attr__( 'Do you provide ongoing support after launch?', 'baharhussain' ); ?>" data-faq-answer="<?php echo esc_attr__( 'Yes. I can support your agency after launch with fixes, improvements, small changes, plugin updates, new features, and technical help as client needs come up.', 'baharhussain' ); ?>" aria-controls="landing-faq-answer" aria-pressed="false">
							<span><?php esc_html_e( 'Do you provide ongoing support after launch?', 'baharhussain' ); ?></span>
							<span aria-hidden="true">+</span>
						</button>
					</li>
					<li>
						<button class="landing-faq__question" type="button" data-faq-title="<?php echo esc_attr__( 'How do we start a project together?', 'baharhussain' ); ?>" data-faq-answer="<?php echo esc_attr__( 'Start by sharing the project details, timeline, designs, and any technical requirements. I’ll review the scope, ask the right questions, and suggest the cleanest way to move forward.', 'baharhussain' ); ?>" aria-controls="landing-faq-answer" aria-pressed="false">
							<span><?php esc_html_e( 'How do we start a project together?', 'baharhussain' ); ?></span>
							<span aria-hidden="true">+</span>
						</button>
					</li>
				</ul>

				<article id="landing-faq-answer" class="landing-faq__answer" aria-live="polite">
					<span class="landing-faq__answer-icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false">
							<circle cx="9" cy="8" r="3" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M3.5 19a5.5 5.5 0 0 1 11 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							<circle cx="16.5" cy="9" r="2.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
							<path d="M15.5 14.5A4.4 4.4 0 0 1 21 19" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
						</svg>
					</span>
					<h3 class="landing-faq__answer-title"><?php esc_html_e( 'Can you work white-label for our agency?', 'baharhussain' ); ?></h3>
					<p class="landing-faq__answer-text"><?php esc_html_e( 'Absolutely. We work behind the scenes as your development partner, so your clients only see your brand. We’re comfortable following your processes, tools, and communication style to ensure a seamless experience for you and your clients.', 'baharhussain' ); ?></p>
					<div class="landing-faq__answer-footer">
						<span class="landing-faq__help-icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false">
								<circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="1.8" />
								<path d="M9.6 9.2a2.6 2.6 0 0 1 4.8 1.4c0 1.8-2.4 2-2.4 3.7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
								<path d="M12 17.5h.01" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" />
							</svg>
						</span>
						<span><?php esc_html_e( 'Still have questions?', 'baharhussain' ); ?></span>
						<a class="landing-faq__answer-link" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">
							<span><?php esc_html_e( 'Ask Me a Question', 'baharhussain' ); ?></span>
							<svg viewBox="0 0 24 24" fill="none" aria-hidden="true" focusable="false">
								<path d="M5 12h14M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							</svg>
						</a>
					</div>
				</article>
			</div>
		</div>
	</section>
	<?php endif; ?>

	<?php get_template_part( 'partials/services', 'faq' ); ?>

	<?php get_template_part( 'partials/about', 'cta' ); ?>

</div>

<?php
get_footer();
