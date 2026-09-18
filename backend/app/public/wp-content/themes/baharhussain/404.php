<?php
defined( 'ABSPATH' ) || exit;

/**
 * The template  displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bahar Hussain Theme
 * @since   1.0.0
 */

// Include header.
get_header();

?>
<section id="hero-section" class="hero-section background-light-blue">
	 <div class="dbt-spr-48"></div>
	<section class="page-section">
		<div class="hero-ctn center-align error-page-hero">
			<div class="wrapper">
				<h1>Page Not Found</h1>
				<div class="banner-text">
					<p>The page you are looking for may have been moved, deleted, or the link may be incorrect.</p>
					<p>
						Back to <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Homepage</a>
						or <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>">Explore My Services</a>
					</p>
				</div>
			</div>
		</div>
	</section>
	 <div class="dbt-spr-48"></div>
</section>
<?php
defined( 'ABSPATH' ) || exit;

get_footer();
