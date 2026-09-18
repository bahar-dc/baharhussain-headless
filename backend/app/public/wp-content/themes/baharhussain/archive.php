<?php
defined( 'ABSPATH' ) || exit;

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */
get_header();
?>
<div class="page-section">
	<section>
		<div class="wrapper">
			<div class="posts-list-with-sidebar">
				<div class="dbt-spr-40"></div>
				<div class="post-archive-ctn">
					<?php get_template_part( 'partials/archive-template/archive', 'hero' ); ?>
					<div class="dbt-spr-40"></div>
					<?php get_template_part( 'partials/archive-template/archive', 'posts' ); ?>
				</div>
			</div>
		</div>
	</section>
	<div class="dbt-spr-80"></div>
	<?php if ( function_exists( 'the_ad_placement' ) ) : ?>
	<section class="ths-ad-area">
		<div class="wrapper">
			<div class="ths-ad-area">
				<div class="ad-image">
					<?php the_ad_placement( 'full-width-ads-placement' ); ?>
				</div>
				<div class="ad-sm-text center-align">Advertisement</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<div class="dbt-spr-40"></div>
</div>
<?php
defined( 'ABSPATH' ) || exit;

get_footer();
?>
