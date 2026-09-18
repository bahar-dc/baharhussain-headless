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

get_header();
list( $bh_var_post_id, $bh_fields, $bh_option_fields, $bh_query_object ) = THS::defaults();
?>

<div class="page-section">
	<section>
		<div class="wrapper">
			<div class="posts-list-with-sidebar">
				<div class="dbt-spr-40"></div>
				<div class="post-archive-ctn">
					<?php get_template_part( 'partials/index-template/index', 'hero' ); ?>
					<div class="dbt-spr-40"></div>
					<?php get_template_part( 'partials/index-template/index', 'posts' ); ?>
				</div>
			</div>
			<div class="dbt-spr-80"></div>
		</div>
	</section>
</div>
<?php
defined( 'ABSPATH' ) || exit;

get_footer();
?>
