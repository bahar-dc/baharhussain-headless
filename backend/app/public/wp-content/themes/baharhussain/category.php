<?php
defined( 'ABSPATH' ) || exit;

/**
 * The template for displaying category archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

get_header();
?>
<div class="page-section">
	<?php
	defined( 'ABSPATH' ) || exit;

		get_template_part( 'partials/category-template/category', 'hero' );
		get_template_part( 'partials/category-template/category', 'most-viewed' );
		get_template_part( 'partials/category-template/category', 'trending' );
		get_template_part( 'partials/category-template/category', 'browse' );
	?>
</div>
<?php
defined( 'ABSPATH' ) || exit;

get_footer();
?>
