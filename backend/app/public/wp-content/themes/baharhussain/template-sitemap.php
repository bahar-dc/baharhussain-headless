<?php
/**
 * Template Name: Sitemap Page
 *
 * Human-readable sitemap of the primary site pages.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

$bh_sitemap_pages = array(
	array( __( 'Home', 'baharhussain' ), home_url( '/' ) ),
	array( __( 'About', 'baharhussain' ), home_url( '/about/' ) ),
	array( __( 'Services', 'baharhussain' ), home_url( '/services/' ) ),
	array( __( 'Portfolio', 'baharhussain' ), home_url( '/portfolio/' ) ),
	array( __( 'Contact', 'baharhussain' ), home_url( '/contact/' ) ),
	array( __( 'Agency', 'baharhussain' ), home_url( '/agency/' ) ),
	array( __( 'WordPress Experience', 'baharhussain' ), home_url( '/wordpress-experience/' ) ),
	array( __( 'Request Private Work Examples', 'baharhussain' ), home_url( '/request-private-work-examples/' ) ),
);
?>

<div id="primary" class="site-main sitemap-page-template">
	<div id="page-section" class="page-section">
		<section id="sitemap-hero" class="hero-section background-light-blue" aria-labelledby="sitemap-hero-title">
			<div class="dbt-spr-48"></div>
			<section class="page-section">
				<div class="hero-ctn center-align">
					<div class="wrapper">
						<h1 id="sitemap-hero-title"><?php esc_html_e( 'Website Sitemap', 'baharhussain' ); ?></h1>
						<div class="banner-text">
							<p><?php esc_html_e( 'Use this page to quickly find the information, services, and resources available across the website.', 'baharhussain' ); ?></p>
						</div>
					</div>
				</div>
			</section>
			<div class="dbt-spr-48"></div>
		</section>
		<div class="dbt-spr-48"></div>
		<div class="dbt-spr-48"></div>
		<section class="home-section sitemap-content" aria-labelledby="sitemap-pages-title">
			<div class="wrapper">
				<div class="sitemap-content__panel">
					<h2 id="sitemap-pages-title"><?php esc_html_e( 'Pages', 'baharhussain' ); ?></h2>
					<ul class="sitemap-content__list">
						<?php foreach ( $bh_sitemap_pages as $bh_sitemap_page ) : ?>
							<li><a href="<?php echo esc_url( $bh_sitemap_page[1] ); ?>"><?php echo esc_html( $bh_sitemap_page[0] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
		</section>
	</div>
</div>

<?php
get_footer();
