<?php
defined( 'ABSPATH' ) || exit;

/**
 * THS Originals Section: The Best On THS
 *
 * Displays up to 8 popular THS Originals posts ranked by 7-day GA4 trending
 * score via the cached ths_ga4_best_originals() wrapper. Uses label
 * taxonomy (term = originals) for filtering.
 *
 * @package Bahar Hussain Theme
 */

$block_title   = $attributes['blockTitle'] ?? '';
$section_title = $block_title ? $block_title : 'The best On THS';
$show_title    = ! is_admin();

// GA4 cached post IDs when available; fall back to latest originals.
$_bo_final_ids = function_exists( 'ths_ga4_best_originals' )
	? array_filter( array_map( 'absint', (array) ths_ga4_best_originals( 8 ) ) )
	: array();

$bg_color      = $attributes['bgColor'] ?? 'dbt-ctn-dft-bg';
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
		<div class="post-slider-container">
			<div class="section-head flex-between-center hide-in-editor">
				<div class="section-head-left">
					<div class="section-head-left-title flex">
						<?php if ( $show_title ) { ?>
							<h2 class="heading-3"><?php echo wp_kses_post( $section_title ); ?></h2>
						<?php } ?>
					</div>
				</div>
				<div class="section-head-right flex-end">
					<div class="post-slider-buttons">
					<div class="post-slider-button" role="button" aria-label="Previous" data-post-slider-prev disabled>
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
							<path d="M21 11.9995H3M3 11.9995L11.5 3.49951M3 11.9995L11.5 20.4995" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</div>
					<div class="post-slider-button" role="button" aria-label="Next" data-post-slider-next>
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
								<path d="M3 11.9995H21M21 11.9995L12.5 3.49951M21 11.9995L12.5 20.4995" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</div>
					</div>
				</div>
			</div>
			<div class="post-slider" data-post-slider>
				<ul class="post_slider__track" data-post-slider-track>
					<?php
					defined( 'ABSPATH' ) || exit;

					$_bo_query_args = array(
						'post_type'      => 'post',
						'posts_per_page' => 8,
						'no_found_rows'  => true,
					);

					if ( ! empty( $_bo_final_ids ) ) {
						$_bo_query_args['posts_per_page'] = count( $_bo_final_ids );
						$_bo_query_args['post__in']       = $_bo_final_ids;
						$_bo_query_args['orderby']        = 'post__in';
					} else {
						$_bo_query_args['tax_query'] = array(
							array(
								'taxonomy' => 'labels',
								'field'    => 'slug',
								'terms'    => 'originals',
							),
						);
					}

					$_bo_query = new WP_Query( $_bo_query_args );

					if ( $_bo_query->have_posts() ) {
						while ( $_bo_query->have_posts() ) {
							$_bo_query->the_post();
							set_query_var( 'thumb_size', 440 );
							?>
								<li class="post-slide">
								<?php get_template_part( 'partials/content', 'archive-post' ); ?>
								</li>
								<?php
							defined( 'ABSPATH' ) || exit;

						}
					} else {
						echo '<h4 class="center-align">' . esc_html__( 'No related articles found.', 'baharhussain' ) . '</h4>';
					}
					wp_reset_postdata();
					?>
				</ul>
			</div>
		</div>
	</div>
</section>
