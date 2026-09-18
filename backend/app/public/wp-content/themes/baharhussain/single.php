<?php
defined( 'ABSPATH' ) || exit;

/**
 * The template for displaying all posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

// Include header.
get_header();
?>

<?php
defined( 'ABSPATH' ) || exit;

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();
		// Include specific template for the content.
		get_template_part( 'partials/content', get_post_type() );
	}
}
?>
<?php
defined( 'ABSPATH' ) || exit;

get_footer();
