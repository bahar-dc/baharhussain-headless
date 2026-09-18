<?php
defined( 'ABSPATH' ) || exit;

/**
 * Archive — Hero / Heading section.
 *
 * Displays the archive title, description, and the responsive
 * search controls (mobile + desktop).
 *
 * @package Bahar Hussain Theme
 */
?>

<div class="categories-with-search-area flex-between-end">
	<div class="categories-left-column col-60">
		<h1 class="post-list-section-heading heading">
			<?php echo esc_html( get_bloginfo( 'name' ) ); ?>
		</h1>
		<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
		<div class="desktop-hide">
			<div class="dbt-spr-24"></div>
			<div class="search-right-column flex col-39">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	<div class="search-right-column flex col-39 mobile-hide">
		<?php get_search_form(); ?>
	</div>
</div>
