<?php
defined( 'ABSPATH' ) || exit;

/**
 * Post bottom sections — ad area, related posts slider, bottom ad.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */
?>
<?php if ( function_exists( 'the_ad_placement' ) ) : ?>
	<?php
	ob_start();
	the_ad_placement( 'full-width-ads-placement' );
	$ad_output_top = ob_get_clean();
	?>
	<?php if ( trim( $ad_output_top ) ) : ?>
		<section>
			<div class="wrapper">
				<div class="ths-ad-area">
					<div class="ad-image"><?php echo $ad_output_top; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<div class="ad-sm-text center-align">Advertisement</div>
				</div>
			</div>
		</section>
		<div class="dbt-spr-40"></div>
	<?php endif; ?>
<?php endif; ?>
<section>
	<div class="dbt-spr-40"></div>
	<div class="wrapper">
		<div class="post-slider-container">
			<div class="section-head flex-between-center">
				<div class="section-head-left">
					<div class="section-head-left-title flex">
						<h2 class="heading-3">Related Posts</h2>
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

						$_current_post_id = get_the_ID();
						// Use Yoast primary category; fall back to first assigned category.
						$_primary_cat = get_post_meta( $_current_post_id, '_yoast_wpseo_primary_category', true );
					if ( ! $_primary_cat ) {
						$_cats        = wp_get_post_categories( $_current_post_id, array( 'fields' => 'ids' ) );
						$_primary_cat = ! empty( $_cats ) ? $_cats[0] : 0;
					}
						$bh_arg = array(
							'posts_per_page' => 8,
							'orderby'        => 'date',
							'order'          => 'DESC',
							'post_type'      => 'post',
							'post__not_in'   => array( $_current_post_id ),
							'no_found_rows'  => true,
						);
						if ( $_primary_cat ) {
							$bh_arg['category__in'] = array( (int) $_primary_cat );
						}
						$bh_movies_query = new WP_Query( $bh_arg );
						// The Loop.
						if ( $bh_movies_query->have_posts() ) {
							while ( $bh_movies_query->have_posts() ) {
								$bh_movies_query->the_post();
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
	<div class="dbt-spr-40"></div>
</section>
<?php if ( function_exists( 'the_ad_placement' ) ) : ?>
	<?php
	ob_start();
	the_ad_placement( 'full-width-ads-placement' );
	$ad_output_bottom = ob_get_clean();
	?>
	<?php if ( trim( $ad_output_bottom ) ) : ?>
		<section>
			<div class="dbt-spr-40"></div>
			<div class="wrapper">
				<div class="ths-ad-area">
					<div class="ad-image"><?php echo $ad_output_bottom; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
					<div class="ad-sm-text center-align">Advertisement</div>
				</div>
			</div>
		</section>
	<div class="dbt-spr-40"></div>
	<?php endif; ?>
<?php endif; ?>
