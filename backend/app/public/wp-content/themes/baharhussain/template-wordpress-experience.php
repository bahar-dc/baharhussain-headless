<?php
/**
 * Template Name: WordPress Experience
 *
 * Page template for presenting WordPress experience content.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>

<div id="primary" class="site-main wordpress-experience-page-template">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'partials/wordpress-experience', 'hero' );
			get_template_part( 'partials/wordpress-experience', 'editor-overview' );
			get_template_part( 'partials/wordpress-experience', 'edit-content' );
			get_template_part( 'partials/wordpress-experience', 'manage-page-sections' );
			get_template_part( 'partials/wordpress-experience', 'create-new-pages' );
			get_template_part( 'partials/wordpress-experience', 'preview-and-publish' );
			// get_template_part( 'partials/wordpress-experience', 'protected-design-system' );
			get_template_part( 'partials/wordpress-experience', 'team-benefits' );
			get_template_part(
				'partials/services',
				'faq',
				array(
					'section_id' => 'frequently-asked-questions',
				)
			);
			get_template_part(
				'partials/about',
				'cta',
				array(
					'section_id' => 'discuss-your-project',
				)
			);
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'wordpress-experience-page' ); ?>>
				<?php if ( trim( get_the_content() ) ) { ?>
					<div class="site-section wordpress-experience-content">
						<div class="wrapper">
							<?php the_content(); ?>
						</div>
					</div>
				<?php } ?>
			</article>
			<?php
		}
	}
	?>
</div>

<?php
get_footer();
