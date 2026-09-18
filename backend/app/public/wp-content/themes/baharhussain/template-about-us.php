<?php
/**
 * Template Name: About Us
 *
 * Static about page template.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

$about_hero_image_path = '/assets/build/images/uploads/bahar-profile-hero.webp';
$about_trust_image_url = get_template_directory_uri() . '/assets/build/images/uploads/baharhussain-profile-black-shirt-2.png';

$about_hero_image_url = get_template_directory_uri() . $about_hero_image_path;

get_header();
?>

	<?php
		get_template_part(
			'partials/about',
			'hero',
			array(
				'image_url' => $about_hero_image_url,
			)
		);
	?>
	<?php get_template_part( 'partials/about', 'experience' ); ?>
	<?php get_template_part( 'partials/about', 'journey' ); ?>
	<?php get_template_part( 'partials/about', 'trust', array( 'image_url' => $about_trust_image_url ) ); ?>
	<?php
		get_template_part(
			'partials/home',
			'standards',
			array(
				'section_id'      => 'about-standards-title',
				'section_classes' => 'site-section home-standards about-standards',
			)
		);
	?>
	<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				if ( trim( get_the_content() ) ) {
					?>
					<section class="about-page-content">
						<div class="wrapper">
							<?php the_content(); ?>
						</div>
					</section>
					<?php
				}
			}
		}
	?>
	<?php get_template_part( 'partials/about', 'agency-experience' ); ?>
	<?php get_template_part( 'partials/home', 'process', array( 'section_id' => 'about-process-title' ) ); ?>
	<?php get_template_part( 'partials/about', 'cta' ); ?>

<?php
get_footer();
