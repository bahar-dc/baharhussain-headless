<?php
defined( 'ABSPATH' ) || exit;

/**
 * Shared Sidebar: Ad Image + Top 3 Reviews Widget
 *
 * Used alongside the latest articles / latest originals grid sections.
 *
 * @package Bahar Hussain Theme
 *
 */

$sidebar_heading   = get_field( 'ths_sidebar_heading', 'option' );
$sidebar_heading   = $sidebar_heading ? $sidebar_heading : 'Top 3 movies 2025';
$sidebar_link_text = get_field( 'ths_sidebar_link_text', 'option' );
$sidebar_link_text = $sidebar_link_text ? $sidebar_link_text : 'Discover';
$sidebar_link_url  = get_field( 'ths_sidebar_link_url', 'option' );
$sidebar_link_url  = $sidebar_link_url ? $sidebar_link_url : '#';
?>
<div class="post-archive-right col-39">
	<?php if ( function_exists( 'the_ad_placement' ) ) : ?>
		<?php
		ob_start();
		the_ad_placement( 'sidebar-ads-placement' );
		$ad_output_sidebar = ob_get_clean();
		?>
		<?php if ( trim( $ad_output_sidebar ) ) : ?>
		<div class="ths-ad-area sidebar-ad-image">
			<div class="ad-image"><?php echo $ad_output_sidebar; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
			<div class="ad-sm-text">Advertisement</div>
		</div>
		<?php endif; ?>
	<?php endif; ?>
	<div class="section-head flex-between-center">
		<div class="section-head-left">
			<div class="section-head-left-title flex">
				<h2 class="heading-4"><?php echo esc_html( $sidebar_heading ); ?></h2>
			</div>
		</div>
		<div class="section-head-right flex-end">
			<a href="<?php echo esc_url( $sidebar_link_url ); ?>" class="link-arrow flex">
				<div class="button-text">
					<?php echo esc_html( $sidebar_link_text ); ?>
				</div>
				<div class="button-icon">
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M4 12.6667L12.6667 4M12.6667 4V12.32M12.6667 4H4.34667" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</div>
			</a>
		</div>
	</div>
	<div class="post-cards-horizontal">
		<?php
		defined( 'ABSPATH' ) || exit;

			$_review_ids = function_exists( 'ths_ga4_top_reviews' )
				? array_filter( array_map( 'absint', (array) ths_ga4_top_reviews( 3 ) ) )
				: array();

			$_sidebar_reviews_args = array(
				'post_type'      => 'post',
				'posts_per_page' => 3,
				'no_found_rows'  => true,
			);

			if ( ! empty( $_review_ids ) ) {
				$_sidebar_reviews_args['posts_per_page'] = count( $_review_ids );
				$_sidebar_reviews_args['post__in']       = $_review_ids;
				$_sidebar_reviews_args['orderby']        = 'post__in';
			} else {
				$_sidebar_reviews_args['tax_query'] = array(
					array(
						'taxonomy' => 'content_types',
						'field'    => 'slug',
						'terms'    => 'reviews',
					),
				);
			}

			$_sidebar_reviews_query = new WP_Query( $_sidebar_reviews_args );
			$_prime_ids             = wp_list_pluck( $_sidebar_reviews_query->posts, 'ID' );
			// Batch-prime meta, term, and user caches to avoid N+1 queries in the loop.
			update_postmeta_cache( $_prime_ids );
			update_object_term_cache( $_prime_ids, 'post' );
			cache_users( array_unique( wp_list_pluck( $_sidebar_reviews_query->posts, 'post_author' ) ) );
			if ( $_sidebar_reviews_query->have_posts() ) {
				while ( $_sidebar_reviews_query->have_posts() ) {
					$_sidebar_reviews_query->the_post();
					set_query_var( 'thumb_size', 320 );
					get_template_part( 'partials/content', 'archive-post' );
				}
			} else {
				echo '<h4 class="center-align">' . esc_html__( 'No related articles found.', 'baharhussain' ) . '</h4>';
			}
			wp_reset_postdata();
			?>
	</div>
</div>
