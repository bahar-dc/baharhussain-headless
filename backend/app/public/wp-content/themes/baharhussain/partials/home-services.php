<?php
/**
 * Homepage services section.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

$home_services = array(
	array(
		'slug'  => 'white_label_wordpress_development',
		'title' => __( 'White Label WordPress Development', 'baharhussain' ),
		'text'  => __( 'Behind the scenes development support that helps your team complete client projects with confidence.', 'baharhussain' ),
		'label' => __( 'View details about white label WordPress development', 'baharhussain' ),
		'icon'  => '<path d="M5 5h5v5H5zM14 5h5v5h-5zM5 14h5v5H5zM14 14h5v5h-5z" />',
	),
	array(
		'slug'  => 'custom_gutenberg_development',
		'title' => __( 'Custom Gutenberg Development', 'baharhussain' ),
		'text'  => __( 'Flexible custom blocks that make content editing simple and keep website layouts consistent.', 'baharhussain' ),
		'label' => __( 'View details about custom Gutenberg development', 'baharhussain' ),
		'icon'  => '<path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z" /><path d="M4 7.5 12 12l8-4.5M12 12v9" />',
	),
	array(
		'slug'  => 'custom_wordpress_theme_development',
		'title' => __( 'Custom WordPress Theme Development', 'baharhussain' ),
		'text'  => __( 'Fast and responsive WordPress themes developed from Figma with clean code and flexible ACF fields for easy content management.', 'baharhussain' ),
		'label' => __( 'View details about custom WordPress theme development', 'baharhussain' ),
		'icon'  => '<path d="M5 5h14v14H5zM5 9h14M8 7h.01M11 7h.01" />',
	),
	array(
		'slug'  => 'custom_plugin_development',
		'title' => __( 'Custom Plugin Development', 'baharhussain' ),
		'text'  => __( 'Purpose built WordPress plugins for custom features, business workflows, and third party integrations.', 'baharhussain' ),
		'label' => __( 'View details about custom plugin development', 'baharhussain' ),
		'icon'  => '<path d="M8 3v4M16 3v4M6 7h12v4a6 6 0 0 1-12 0V7ZM9 17v4M15 17v4" />',
	),
	array(
		'slug'  => 'woocommerce_development',
		'title' => __( 'WooCommerce Development', 'baharhussain' ),
		'text'  => __( 'Custom product features, checkout improvements, order workflows, and store support.', 'baharhussain' ),
		'label' => __( 'View details about WooCommerce development', 'baharhussain' ),
		'icon'  => '<path d="M4 5h2l2.2 10.5a2 2 0 0 0 2 1.5h6.9a2 2 0 0 0 1.9-1.4L21 8H7" /><circle cx="10" cy="20" r="1" /><circle cx="18" cy="20" r="1" />',
	),
	array(
		'slug'  => 'performance_optimization',
		'title' => __( 'Performance Optimization', 'baharhussain' ),
		'text'  => __( 'Practical improvements that make WordPress websites faster and improve Core Web Vitals.', 'baharhussain' ),
		'label' => __( 'View details about performance optimization', 'baharhussain' ),
		'icon'  => '<path d="M4 14a8 8 0 1 1 16 0M4 14h2M18 14h2M12 6v2M7.8 9.8 6.4 8.4M16.2 9.8l1.4-1.4M12 14l4-4" />',
	),
);
?>

<section class="home-section home-services" aria-labelledby="home-services-title">
	<div class="wrapper">
		<div class="section-head home-section-head home-services__header">
			<p class="section-eyebrow home-section-head__eyebrow home-services__eyebrow"><?php esc_html_e( 'Services', 'baharhussain' ); ?></p>
			<h2 id="home-services-title" class="home-section-head__title home-services__title"><?php esc_html_e( 'WordPress Solutions for Your Needs', 'baharhussain' ); ?></h2>
			<p class="home-section-head__text home-services__text"><?php esc_html_e( 'I build WordPress solutions that match your project needs, from custom themes and Gutenberg blocks to plugins, WooCommerce, and performance improvements.', 'baharhussain' ); ?></p>
		</div>

		<ul class="home-services__list">
			<?php foreach ( $home_services as $service ) { ?>
				<li class="home-services__item">
					<article class="home-service-card">
						<span class="home-service-card__icon" aria-hidden="true"><svg viewBox="0 0 24 24" focusable="false"><?php echo $service['icon']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static SVG markup. ?></svg></span>
						<h3 class="home-service-card__title"><?php echo esc_html( $service['title'] ); ?></h3>
						<p class="home-service-card__text"><?php echo esc_html( $service['text'] ); ?></p>
						<a class="home-service-card__link" href="<?php echo esc_url( home_url( '/services/#' . $service['slug'] ) ); ?>" aria-label="<?php echo esc_attr( $service['label'] ); ?>">
							<span><?php esc_html_e( 'View Details', 'baharhussain' ); ?></span>
							<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14M13 6l6 6-6 6" /></svg>
						</a>
					</article>
				</li>
			<?php } ?>
		</ul>
	</div>
</section>
