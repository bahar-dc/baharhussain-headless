<?php
/**
 * Template Name: Services
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$service_breakdown = array(
	array(
		'id'       => 'white_label_wordpress_development',
		'icon'     => '<path d="m8 8-4 4 4 4M16 8l4 4-4 4M14 4l-4 16" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />',
		'title'    => __( 'White-Label WordPress Development', 'baharhussain' ),
		'text'     => __( 'I work behind the scenes as your development partner, helping your agency deliver WordPress projects without adding internal pressure.', 'baharhussain' ),
		'items'    => array( __( 'Custom WordPress builds', 'baharhussain' ), __( 'Frontend development', 'baharhussain' ), __( 'Theme customization', 'baharhussain' ), __( 'Bug fixing', 'baharhussain' ), __( 'Agency handoff support', 'baharhussain' ) ),
		'best_for' => __( 'Agencies that need dependable development capacity.', 'baharhussain' ),
	),
	array(
		'id'       => 'custom_gutenberg_development',
		'icon'     => '<path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" /><path d="M4 7.5 12 12l8-4.5M12 12v9" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />',
		'title'    => __( 'Gutenberg Block Development', 'baharhussain' ),
		'text'     => __( 'Flexible custom Gutenberg blocks that make websites easier to manage and easier to scale.', 'baharhussain' ),
		'items'    => array( __( 'Custom ACF blocks', 'baharhussain' ), __( 'Dynamic blocks', 'baharhussain' ), __( 'Reusable sections', 'baharhussain' ), __( 'Editor-friendly controls', 'baharhussain' ), __( 'Responsive frontend output', 'baharhussain' ) ),
		'best_for' => __( 'Agencies building custom content-focused websites.', 'baharhussain' ),
	),
	array(
		'id'       => 'custom_wordpress_theme_development',
		'icon'     => '<path d="M4 20c4.5-.4 7.7-2.2 10-5.5M14 14.5l4.8-4.8a2.7 2.7 0 0 0-3.8-3.8L10.2 10.7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" /><path d="M9 11.8 12.2 15 9 18.2 5.8 15z" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />',
		'title'    => __( 'Custom Theme Development', 'baharhussain' ),
		'text'     => __( 'Lightweight custom WordPress themes built for performance, scalability, and long-term maintainability.', 'baharhussain' ),
		'items'    => array( __( 'Custom theme development', 'baharhussain' ), __( 'Template building', 'baharhussain' ), __( 'SCSS architecture', 'baharhussain' ), __( 'Responsive layouts', 'baharhussain' ), __( 'Reusable templates', 'baharhussain' ) ),
		'best_for' => __( 'Agencies that need clean custom WordPress builds.', 'baharhussain' ),
	),
	array(
		'id'       => 'custom_plugin_development',
		'icon'     => '<path d="M8 3v4M16 3v4M6 7h12v4a6 6 0 0 1-12 0V7ZM9 17v4M15 17v4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />',
		'title'    => __( 'Custom Plugin Development', 'baharhussain' ),
		'text'     => __( 'Purpose-built WordPress plugins for custom features, business workflows, and third-party integrations.', 'baharhussain' ),
		'items'    => array( __( 'Custom feature development', 'baharhussain' ), __( 'Business workflow automation', 'baharhussain' ), __( 'Third-party integrations', 'baharhussain' ), __( 'Admin tools and settings', 'baharhussain' ), __( 'Plugin maintenance', 'baharhussain' ) ),
		'best_for' => __( 'Agencies that need project-specific WordPress functionality.', 'baharhussain' ),
	),
	array(
		'id'       => 'woocommerce_development',
		'icon'     => '<path d="M5 6h2l2 10h8l2-7H8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" /><circle cx="10" cy="20" r="1" stroke="currentColor" stroke-width="1.8" /><circle cx="17" cy="20" r="1" stroke="currentColor" stroke-width="1.8" />',
		'title'    => __( 'WooCommerce Development', 'baharhussain' ),
		'text'     => __( 'Custom WooCommerce development for stores that need flexible product, checkout, and workflow support.', 'baharhussain' ),
		'items'    => array( __( 'Product page customization', 'baharhussain' ), __( 'Checkout improvements', 'baharhussain' ), __( 'Custom order flows', 'baharhussain' ), __( 'Admin fields and logic', 'baharhussain' ), __( 'WooCommerce support', 'baharhussain' ) ),
		'best_for' => __( 'Agencies handling ecommerce projects.', 'baharhussain' ),
	),
	array(
		'id'       => 'performance_optimization',
		'icon'     => '<path d="M4 14a8 8 0 1 1 16 0" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" /><path d="M4 14h2M18 14h2M12 6v2M7.8 9.8 6.4 8.4M16.2 9.8l1.4-1.4M12 14l4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />',
		'title'    => __( 'Performance Optimization', 'baharhussain' ),
		'text'     => __( 'I improve WordPress speed, frontend performance, and Core Web Vitals for a better user experience.', 'baharhussain' ),
		'items'    => array( __( 'CSS and JS cleanup', 'baharhussain' ), __( 'Image optimization', 'baharhussain' ), __( 'Font loading improvements', 'baharhussain' ), __( 'LCP improvements', 'baharhussain' ), __( 'Performance fixes', 'baharhussain' ) ),
		'best_for' => __( 'Agencies working on slow or heavy websites.', 'baharhussain' ),
	),
);
?>

<div id="primary" class="site-main services-page-template">
	<section class="site-section services-hero" aria-labelledby="services-hero-title">
		<div class="wrapper services-hero__grid">
			<div class="services-hero__content">
				<p class="section-eyebrow services-hero__eyebrow"><?php esc_html_e( 'Services', 'baharhussain' ); ?></p>
				<h1 id="services-hero-title" class="services-hero__title"><?php esc_html_e( 'Custom WordPress Development Services', 'baharhussain' ); ?></h1>
				<p class="services-hero__text"><?php esc_html_e( 'Get the WordPress development support you need, from custom themes, Gutenberg blocks, and plugins to WooCommerce, performance improvements, and ongoing maintenance.', 'baharhussain' ); ?></p>
				<div class="services-hero__actions">
					<a class="button main-btn" href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><span class="button-text"><?php esc_html_e( 'Discuss Your Project', 'baharhussain' ); ?></span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
					<a class="button outline-btn" href="#services-list"><span class="button-text"><?php esc_html_e( 'Explore Services', 'baharhussain' ); ?></span><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14M6 13l6 6 6-6"/></svg></a>
				</div>
			</div>

			<div class="services-hero__showcase">
				<img class="services-hero__image" src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/uploads/portfolio-patch-marketing.png' ); ?>" alt="<?php esc_attr_e( 'Responsive preview of the Patch Marketing website', 'baharhussain' ); ?>" width="1254" height="1254" loading="eager" fetchpriority="high" decoding="async">
			</div>
		</div>
	</section>

	<section id="services-list" class="home-section landing-service-breakdown" aria-labelledby="landing-service-breakdown-title">
		<div class="wrapper">
			<div class="landing-service-breakdown__header">
				<p class="section-eyebrow landing-service-breakdown__eyebrow"><?php esc_html_e( 'Service Details', 'baharhussain' ); ?></p>
				<h2 id="landing-service-breakdown-title" class="landing-service-breakdown__title"><?php esc_html_e( 'Detailed Service Breakdown', 'baharhussain' ); ?></h2>
				<p class="landing-service-breakdown__intro"><?php esc_html_e( 'A closer look at the WordPress development support I provide for digital agencies.', 'baharhussain' ); ?></p>
			</div>

			<div class="landing-service-breakdown__list">
				<?php foreach ( $service_breakdown as $index => $service ) { ?>
					<article id="<?php echo esc_attr( $service['id'] ); ?>" class="landing-service-card<?php echo 1 === $index % 2 ? ' landing-service-card--reverse' : ''; ?>">
						<div class="landing-service-card__icon" aria-hidden="true">
							<svg viewBox="0 0 24 24" focusable="false"><?php echo $service['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG markup defined above. ?></svg>
						</div>
						<div class="landing-service-card__main">
							<div>
								<h3><?php echo esc_html( $service['title'] ); ?></h3>
								<p><?php echo esc_html( $service['text'] ); ?></p>
							</div>
						</div>
						<div class="landing-service-card__includes">
							<h4><?php esc_html_e( 'Includes', 'baharhussain' ); ?></h4>
							<ul>
								<?php foreach ( $service['items'] as $item ) { ?>
									<li><span aria-hidden="true"></span><?php echo esc_html( $item ); ?></li>
								<?php } ?>
							</ul>
						</div>
						<div class="landing-service-card__best">
							<h4><?php esc_html_e( 'Best for', 'baharhussain' ); ?></h4>
							<p><?php echo esc_html( $service['best_for'] ); ?></p>
						</div>
					</article>
				<?php } ?>
			</div>
		</div>
	</section>

	<?php get_template_part( 'partials/home', 'process', array( 'section_id' => 'services-process-title' ) ); ?>

	<?php get_template_part( 'partials/home', 'standards', array( 'section_id' => 'services-standards-title' ) ); ?>
	<?php if ( false ) : // Deprecated inline standards retained temporarily during partial extraction. ?>
	<section class="home-section home-standards" aria-labelledby="services-standards-title">
		<div class="wrapper">
			<div class="home-standards__intro">
				<div class="section-head home-section-head home-standards__head">
					<p class="section-eyebrow home-section-head__eyebrow home-standards__eyebrow"><?php esc_html_e( 'Technical Standards', 'baharhussain' ); ?></p>
					<h2 id="services-standards-title" class="home-section-head__title home-standards__title"><?php esc_html_e( 'Quality Code. Modern Standards. Better Performance.', 'baharhussain' ); ?></h2>
					<p class="home-section-head__text home-standards__text"><?php esc_html_e( 'I follow industry best practices and coding standards to build secure, scalable and future-proof WordPress websites.', 'baharhussain' ); ?></p>
				</div>
				<div class="home-standards__note">
					<p><?php esc_html_e( 'Every project I deliver is built with clean architecture, performance in mind and accessibility at the core — so your website not only looks great but also runs fast, ranks well and provides the best experience.', 'baharhussain' ); ?></p>
				</div>
			</div>
			<ul class="home-standards__grid">
				<li class="home-standard-item">
					<span class="home-standard-item__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" fill="none" focusable="false"><path d="M7 8 3 11.7 7 16M17 8l4 3.7L17 16M14 4l-4 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /></svg>
					</span>
					<div>
						<h3><?php esc_html_e( 'Clean & Maintainable Code', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Well-structured, modular and commented code following WordPress Coding Standards.', 'baharhussain' ); ?></p>
					</div>
				</li>
				<li class="home-standard-item">
					<span class="home-standard-item__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="M12 3 20 6v6c0 4.4-3.1 7.5-8 9-4.9-1.5-8-4.6-8-9V6l8-3Z" /><path d="m9 12 2 2 4-5" /></svg>
					</span>
					<div>
						<h3><?php esc_html_e( 'Security First', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Following security best practices to protect your website and user data from vulnerabilities.', 'baharhussain' ); ?></p>
					</div>
				</li>
				<li class="home-standard-item">
					<span class="home-standard-item__icon" aria-hidden="true">
						<svg viewBox="0 0 512 512" focusable="false">
							<path d="M491.896 264.561c-19.448-45.944-51.883-84.992-92.734-112.589C358.311 124.367 308.96 108.214 256 108.214c-35.29 0-69 7.169-99.633 20.129C110.4 147.786 71.351 180.23 43.75 221.076 16.154 261.899 0 311.287 0 364.214c0 4.427.109 8.814.331 13.185h80.202v-26.371H37.775c1.512-25.395 7.338-49.589 16.766-71.895 9.315-22.04 22.174-42.25 37.819-59.903l30.234 30.242 18.656-18.661-30.214-30.218c7.186-6.363 14.766-12.307 22.746-17.677 31.508-21.274 68.754-34.501 109.033-36.896v42.734h26.37v-42.766c25.423 1.524 49.617 7.338 71.92 16.774 22.044 9.315 42.258 22.17 59.903 37.814l-30.234 30.234 18.632 18.661 30.238-30.218c6.371 7.186 12.279 14.766 17.69 22.75 21.266 31.509 34.5 68.758 36.891 109.024h-42.738v26.371h80.162c.242-4.371.35-8.758.35-13.185.026-35.282-7.161-68.991-20.103-99.652Z" fill="currentColor" />
							<path d="M329.375 199.471c-1.415-.621-3.169.073-4.133 1.653l-75.383 124.072c-18.915 2.96-33.4 19.291-33.4 39.033 0 21.847 17.706 39.556 39.553 39.556 21.842 0 39.553-17.709 39.553-39.556 0-7.395-2.064-14.282-5.593-20.202l40.968-140.396c.52-1.772-.149-3.538-1.565-4.16Zm-73.363 184.533c-10.924 0-19.778-8.847-19.778-19.774 0-10.927 8.854-19.782 19.778-19.782 10.92 0 19.774 8.855 19.774 19.782 0 10.927-8.854 19.774-19.774 19.774Z" fill="currentColor" />
						</svg>
					</span>
					<div>
						<h3><?php esc_html_e( 'Performance Optimized', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Optimized queries, assets and resources to ensure fast loading and top Core Web Vitals.', 'baharhussain' ); ?></p>
					</div>
				</li>
				<li class="home-standard-item">
					<span class="home-standard-item__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><rect x="7" y="3" width="10" height="18" rx="2" /><path d="M11 18h2" /></svg>
					</span>
					<div>
						<h3><?php esc_html_e( 'Responsive & Accessible', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Mobile-first approach with WCAG accessibility standards for an inclusive web experience.', 'baharhussain' ); ?></p>
					</div>
				</li>
				<li class="home-standard-item">
					<span class="home-standard-item__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z" /><path d="M4 7.5 12 12l8-4.5M12 12v9" /></svg>
					</span>
					<div>
						<h3><?php esc_html_e( 'Gutenberg Native', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Developed with modern Gutenberg blocks and Full Site Editing for flexibility and future scalability.', 'baharhussain' ); ?></p>
					</div>
				</li>
				<li class="home-standard-item">
					<span class="home-standard-item__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="M12 8a4 4 0 1 1 0 8 4 4 0 0 1 0-8Z" /><path d="M12 2v3M12 19v3M4.93 4.93l2.12 2.12M16.95 16.95l2.12 2.12M2 12h3M19 12h3M4.93 19.07l2.12-2.12M16.95 7.05l2.12-2.12" /></svg>
					</span>
					<div>
						<h3><?php esc_html_e( 'Scalable Architecture', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Built with scalability in mind so your website can grow with your business needs.', 'baharhussain' ); ?></p>
					</div>
				</li>
				<li class="home-standard-item">
					<span class="home-standard-item__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><circle cx="11" cy="11" r="6" /><path d="m16 16 5 5" /></svg>
					</span>
					<div>
						<h3><?php esc_html_e( 'SEO Friendly', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Clean markup, semantic HTML and SEO best practices implemented in every project.', 'baharhussain' ); ?></p>
					</div>
				</li>
				<li class="home-standard-item">
					<span class="home-standard-item__icon" aria-hidden="true">
						<svg viewBox="0 0 24 24" focusable="false"><path d="M6 3h12v18H6z" /><path d="M9 8h6M9 12h6M9 16h4" /></svg>
					</span>
					<div>
						<h3><?php esc_html_e( 'Well Documented', 'baharhussain' ); ?></h3>
						<p><?php esc_html_e( 'Proper documentation and structured code for easy handover and long term maintenance.', 'baharhussain' ); ?></p>
					</div>
				</li>
			</ul>
			<div class="home-standards__tools">
				<div class="home-standards__tools-head">
					<h3 class="heading-4 mb-0"><?php echo wp_kses_post( __( 'Modern stack. <br /> Trusted tools. <br /> Better results.', 'baharhussain' ) ); ?></h3>
				</div>
				<?php
				$service_tools = array(
					array( 'name' => __( 'WordPress', 'baharhussain' ), 'icon' => 'wordpress.png' ),
					array( 'name' => __( 'Gutenberg', 'baharhussain' ), 'icon' => 'gutenberg.svg' ),
					array( 'name' => __( 'ACF', 'baharhussain' ), 'icon' => 'acf.png' ),
					array( 'name' => __( 'Tailwind CSS', 'baharhussain' ), 'icon' => 'tailwind.svg' ),
					array( 'name' => __( 'JavaScript', 'baharhussain' ), 'icon' => 'js.png' ),
					array( 'name' => __( 'React', 'baharhussain' ), 'icon' => 'React.svg' ),
					array( 'name' => __( 'Webpack', 'baharhussain' ), 'icon' => 'webpack.svg' ),
					array( 'name' => __( 'PHP', 'baharhussain' ), 'icon' => 'php.svg' ),
				);
				?>
				<ul class="home-standards__tools-list" aria-label="<?php esc_attr_e( 'Technologies and tools', 'baharhussain' ); ?>">
					<?php foreach ( $service_tools as $service_tool ) { ?>
						<li>
							<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/' . $service_tool['icon'] ); ?>" alt="" width="48" height="48" loading="lazy" decoding="async">
							<span><?php echo esc_html( $service_tool['name'] ); ?></span>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</section>

	<?php endif; ?>

	<?php get_template_part( 'partials/services', 'pricing' ); ?>

	<?php get_template_part( 'partials/services', 'faq' ); ?>

	<?php get_template_part( 'partials/about', 'cta' ); ?>
</div>

<?php
get_footer();
