<?php
defined( 'ABSPATH' ) || exit;

/**
 * Archive — Posts listing + Sidebar + Pagination.
 *
 * Uses the main WordPress loop for the current archive query,
 * the shared sidebar (ad + top 3 reviews), and ths_pagination_section().
 *
 * @package Bahar Hussain Theme
 */

global $wp_query;
?>

<div class="post-archive-area flex-between-start archive-page-posts">
	<div class="post-archive-left col-60">
		<div class="post-cards-horizontal">
			<?php
			defined( 'ABSPATH' ) || exit;

			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					set_query_var( 'thumb_size', 660 );
					get_template_part( 'partials/content', 'archive-post' );
				}
			} else {
				get_template_part( 'partials/content', 'none' );
			}
			?>
		</div>
		<?php ths_pagination_section( $wp_query ); ?>
	</div>
	<?php get_template_part( 'partials/sidebar', 'latest-reviews' ); ?>
</div>
