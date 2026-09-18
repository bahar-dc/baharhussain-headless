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
		<h1 class="post-list-section-heading heading mb-0">
			<?php the_archive_title(); ?>
		</h1>
		<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
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
