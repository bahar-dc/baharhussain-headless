<?php
defined( 'ABSPATH' ) || exit;

/**
 * The template for displaying all pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

// Include header.
get_header();

?>
<section id="page-section" class="page-section">
	<?php
	defined( 'ABSPATH' ) || exit;

	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'partials/content', 'page' );
		}
	} else {
		get_template_part( 'partials/content', 'none' );
	}
	?>
</section>
<?php get_footer(); ?>
