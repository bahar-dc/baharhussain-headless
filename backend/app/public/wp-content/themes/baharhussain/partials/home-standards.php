<?php
/**
 * Shared technical standards section.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

$section_id = ! empty( $args['section_id'] ) ? $args['section_id'] : 'home-standards-title';
$section_classes = ! empty( $args['section_classes'] ) ? $args['section_classes'] : 'home-section home-standards';
$standards  = array(
	array( __( 'Clean & Maintainable Code', 'baharhussain' ), __( 'Well-structured, modular and commented code following WordPress Coding Standards.', 'baharhussain' ), '<path d="M7 8 3 12l4 4M17 8l4 4-4 4M14 4l-4 16" />' ),
	array( __( 'Security First', 'baharhussain' ), __( 'Following security best practices to protect your website and user data from vulnerabilities.', 'baharhussain' ), '<path d="M12 3 20 6v6c0 4.4-3.1 7.5-8 9-4.9-1.5-8-4.6-8-9V6l8-3Z" /><path d="m9 12 2 2 4-5" />' ),
	array( __( 'Performance Optimized', 'baharhussain' ), __( 'Optimized queries, assets and resources to ensure fast loading and top Core Web Vitals.', 'baharhussain' ), '<path d="M4 14a8 8 0 1 1 16 0M4 14h2M18 14h2M12 6v2M7.8 9.8 6.4 8.4M16.2 9.8l1.4-1.4M12 14l4-4" />' ),
	array( __( 'Responsive & Accessible', 'baharhussain' ), __( 'Mobile-first approach with WCAG accessibility standards for an inclusive web experience.', 'baharhussain' ), '<rect x="7" y="3" width="10" height="18" rx="2" /><path d="M11 18h2" />' ),
	array( __( 'Gutenberg Native', 'baharhussain' ), __( 'Developed with modern Gutenberg blocks and Full Site Editing for flexibility and future scalability.', 'baharhussain' ), '<path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z" /><path d="M4 7.5 12 12l8-4.5M12 12v9" />' ),
	array( __( 'Scalable Architecture', 'baharhussain' ), __( 'Built with scalability in mind so your website can grow with your business needs.', 'baharhussain' ), '<circle cx="12" cy="12" r="4" /><path d="M12 2v3M12 19v3M4.93 4.93l2.12 2.12M16.95 16.95l2.12 2.12M2 12h3M19 12h3M4.93 19.07l2.12-2.12M16.95 7.05l2.12-2.12" />' ),
	array( __( 'SEO Friendly', 'baharhussain' ), __( 'Clean markup, semantic HTML and SEO best practices implemented in every project.', 'baharhussain' ), '<circle cx="11" cy="11" r="6" /><path d="m16 16 5 5" />' ),
	array( __( 'Well Documented', 'baharhussain' ), __( 'Proper documentation and structured code for easy handover and long term maintenance.', 'baharhussain' ), '<path d="M6 3h12v18H6zM9 8h6M9 12h6M9 16h4" />' ),
);
$tools      = array(
	array( __( 'WordPress', 'baharhussain' ), 'wordpress.png' ),
	array( __( 'Gutenberg', 'baharhussain' ), 'gutenberg.svg' ),
	array( __( 'ACF', 'baharhussain' ), 'acf.png' ),
	array( __( 'Tailwind CSS', 'baharhussain' ), 'tailwind.svg' ),
	array( __( 'JavaScript', 'baharhussain' ), 'js.png' ),
	array( __( 'React', 'baharhussain' ), 'React.svg' ),
	array( __( 'Webpack', 'baharhussain' ), 'webpack.svg' ),
	array( __( 'PHP', 'baharhussain' ), 'php.svg' ),
);
?>

<section class="<?php echo esc_attr( $section_classes ); ?>" aria-labelledby="<?php echo esc_attr( $section_id ); ?>">
	<div class="wrapper">
		<div class="home-standards__intro">
			<div class="section-head home-section-head home-standards__head">
				<p class="section-eyebrow home-section-head__eyebrow home-standards__eyebrow"><?php esc_html_e( 'Technical Standards', 'baharhussain' ); ?></p>
				<h2 id="<?php echo esc_attr( $section_id ); ?>" class="home-section-head__title home-standards__title"><?php esc_html_e( 'Quality Behind Every Build', 'baharhussain' ); ?></h2>
			</div>
			<div class="home-standards__note">
				<p><?php esc_html_e( 'Strong development creates a website that works well today and stays ready for future growth.', 'baharhussain' ); ?></p>
			</div>
		</div>

		<ul class="home-standards__grid">
			<?php foreach ( $standards as $standard ) { ?>
				<li class="home-standard-item">
					<span class="home-standard-item__icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><?php echo $standard[2]; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG markup. ?></svg></span>
					<div>
						<h3><?php echo esc_html( $standard[0] ); ?></h3>
						<p><?php echo esc_html( $standard[1] ); ?></p>
					</div>
				</li>
			<?php } ?>
		</ul>

		<div class="home-standards__tools">
			<div class="home-standards__tools-head">
				<h3 class="heading-4 mb-0"><?php echo wp_kses_post( __( 'Modern stack. <br /> Trusted tools. <br /> Better results.', 'baharhussain' ) ); ?></h3>
			</div>
			<ul class="home-standards__tools-list" aria-label="<?php esc_attr_e( 'Technologies and tools', 'baharhussain' ); ?>">
				<?php foreach ( $tools as $tool ) { ?>
					<li>
						<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/build/images/' . $tool[1] ); ?>" alt="" width="48" height="48" loading="lazy" decoding="async">
						<span><?php echo esc_html( $tool[0] ); ?></span>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</section>
