<?php
defined( 'ABSPATH' ) || exit;

/**
 * Block Name: Latest Articles + Sidebar
 *
 * Displays a grid of latest articles alongside a sidebar
 * (ad image + top 3 reviews widget), followed by a full-width ad banner.
 *
 * @package Bahar Hussain Theme
 */

$block_title   = $attributes['blockTitle'] ?? '';
$section_title = $block_title ? $block_title : 'Latest Articles';
$show_title    = ! is_admin();

$bg_color      = $attributes['bgColor'] ?? '';
$bg_width      = $attributes['bgWidth'] ?? 'dbt-ctn-1360';
$margin_top    = $attributes['marginTop'] ?? 'dbt-spr-48';
$margin_bottom = $attributes['marginBottom'] ?? 'dbt-spr-48';

$spr_to_var = static function ( $spr_class ) {
	if ( empty( $spr_class ) || 'dbt-spr-0' === $spr_class ) {
		return '0';
	}
	if ( preg_match( '/^dbt-spr-(\d+)$/', $spr_class, $matches ) ) {
		return 'var(--bh_spr_' . $matches[1] . ')';
	}
	return '0';
};

$container_classes = trim( implode( ' ', array_filter( array( $bg_color, $bg_width, 'fr-ctn' ) ) ) );
$wrapper_styles    = sprintf(
	'padding-top:%s;padding-bottom:%s;',
	$spr_to_var( $margin_top ),
	$spr_to_var( $margin_bottom )
);
?>

<section class="<?php echo esc_attr( $container_classes ); ?>">
	<div class="wrapper" style="<?php echo esc_attr( $wrapper_styles ); ?>">
		<div class="posts-list-with-sidebar">
			<div class="post-archive-ctn">
				<div class="categories-with-search-area flex-between-end">
					<div class="categories-left-column col-60">
						<?php if ( $show_title ) { ?>
							<h2 class="heading-3 hide-in-editor"><?php echo wp_kses_post( $section_title ); ?></h2>
						<?php } ?>
						<div class="desktop-hide">
							<div class="search-right-column flex col-39">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
					<div class="search-right-column flex col-39 mobile-hide">
						<?php get_search_form(); ?>
					</div>
				</div>
				<div class="dbt-spr-24"></div>
				<div class="post-archive-area flex-between-start">
					<div class="post-archive-left col-60">
						<div class="two-columns" id="latest-articles-posts">
							<?php
							defined( 'ABSPATH' ) || exit;

								$_la_paged        = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : ( get_query_var( 'page' ) ? absint( get_query_var( 'page' ) ) : 1 );
								$bh_arg          = array(
									'post_type'      => 'post',
									'posts_per_page' => 8,
									'paged'          => $_la_paged,
									'orderby'        => 'date',
									'order'          => 'DESC',
									'post_status'    => 'publish',
								);
								$bh_movies_query = new WP_Query( $bh_arg );
								// The Loop.
								if ( $bh_movies_query->have_posts() ) {
									while ( $bh_movies_query->have_posts() ) {
										$bh_movies_query->the_post();
										set_query_var( 'thumb_size', 660 );
										?>
											<?php get_template_part( 'partials/content', 'archive-post' ); ?>
										<?php
										defined( 'ABSPATH' ) || exit;

									}
								} else {
									echo '<h4 class="center-align">' . esc_html__( 'No related articles found.', 'baharhussain' ) . '</h4>';
								}
								wp_reset_postdata();
								?>
						</div>
						<?php
						defined( 'ABSPATH' ) || exit;

							$_la_base = trailingslashit( home_url( '/' ) );
							ths_pagination_section(
								$bh_movies_query,
								function ( $n ) use ( $_la_base ) {
									return 1 === $n ? $_la_base : $_la_base . 'page/' . $n . '/';
								},
								'latest-articles-pagination'
							);
							?>
					</div>
					<?php get_template_part( 'partials/sidebar', 'latest-reviews' ); ?>
				</div>
			</div>
		</div>
	</div>
</section>
