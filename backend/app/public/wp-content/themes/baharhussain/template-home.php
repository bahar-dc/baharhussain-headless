<?php
/**
 * Template Name: Home
 *
 * Static home page template.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;
get_header();
?>

<?php get_template_part( 'partials/home', 'hero' ); ?>
<?php get_template_part( 'partials/home', 'stats' ); ?>
<?php get_template_part( 'partials/home', 'services' ); ?>
<?php get_template_part( 'partials/portfolio', 'projects' ); ?>
<?php get_template_part( 'partials/home', 'why' ); ?>
<?php get_template_part( 'partials/home', 'testimonials' ); ?>
<?php get_template_part( 'partials/home', 'faq' ); ?>
<?php get_template_part( 'partials/home', 'cta' ); ?>


<?php
get_footer();
