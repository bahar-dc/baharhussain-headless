<?php
defined( 'ABSPATH' ) || exit;

/**
 * Single post hero section — breadcrumbs, content-type badges, title, meta, featured image.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 *
 * Expected $args keys: post_id, post_content_type, rating, date_link, post_date
 */

$post_id           = $args['post_id'] ?? get_the_ID(); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
$post_content_type = $args['post_content_type'] ?? false;
$rating            = $args['rating'] ?? 0;
$date_link         = $args['date_link'] ?? '';
$post_date         = $args['post_date'] ?? '';
?>
<section>
	<div class="wrapper">
		<div class="hero-section">
			<div class="yoast-breadcrumbs">
				<?php
				defined( 'ABSPATH' ) || exit;

				if ( function_exists( 'yoast_breadcrumb' ) ) {
					yoast_breadcrumb( '<span>', '</span>' );
				}
				?>
			</div>
			<div class="hero-section-content center-align">
				<?php
				defined( 'ABSPATH' ) || exit;

					$has_review    = false;
					$has_video     = false;
					$has_feature   = false;
					$has_interview = false;
					$has_guide     = false;

				if ( $post_content_type && ! is_wp_error( $post_content_type ) ) {
					foreach ( $post_content_type as $term ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
						if ( 'reviews' === $term->slug ) {
							$has_review = true;
							break;
						}
						if ( 'videos' === $term->slug ) {
							$has_video = true;
						}
						if ( 'features' === $term->slug ) {
							$has_feature = true;
						}
						if ( 'interviews' === $term->slug ) {
							$has_interview = true;
						}
						if ( 'guides' === $term->slug ) {
							$has_guide = true;
						}
					}
				}
				?>

				<?php if ( $has_review && $rating > 0 ) { ?>
					<div class="post-card-review flex hero-section-review-tag">
						<svg width="12" height="12" viewBox="0 0 12 12" fill="none">
							<path d="M6.00021 1.5L7.17521 4.38L10.2802 4.61L7.90022 6.62L8.64522 9.64L6.00021 8L3.35521 9.64L4.10021 6.62L1.72021 4.61L4.82521 4.38L6.00021 1.5Z" fill="#F89900"/>
							<path d="M6.00021 1.5L4.82521 4.38L1.72021 4.61L4.10021 6.62L3.35521 9.64L6.00021 8M6.00021 1.5L7.17521 4.38L10.2802 4.61L7.90022 6.62L8.64522 9.64L6.00021 8" stroke="#F89900" stroke-width="2"/>
						</svg>
						<span class="review-score">Score:</span>
						<span class="review-value"><?php echo esc_html( $rating ); ?></span>
					</div>
				<?php } elseif ( $has_video ) { ?>
					<div class="post-card-review top-video-tag flex hero-section-review-tag">
						<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M6.24707 11.9072L6.23926 11.9053M6.24707 11.9072L6.24512 11.9014L6.24023 11.9023L6.23926 11.9053M6.24707 11.9072L6.25293 11.9053L6.25098 11.9023H6.24805L6.24707 11.9072ZM6.23926 11.9053L6.23535 11.9023H6.23926V11.9053Z" stroke="#2563EB" stroke-width="1.33333"/>
							<path d="M5.7568 1.07086L5.1268 0.693359L5.0068 1.41786C4.8158 2.56186 4.0343 3.62486 3.1723 4.37186C1.4848 5.83486 1.1153 7.42486 1.6378 8.73736C2.1378 9.99336 3.4068 10.8534 4.6948 10.9969L4.9928 11.0299C4.2558 10.5794 3.7828 9.52686 3.9478 8.74036C4.1108 7.96736 4.6668 7.24336 5.7348 6.57536L6.2733 6.23936L6.4743 6.84186C6.5928 7.19786 6.7978 7.48386 7.0063 7.77436C7.1063 7.91436 7.2078 8.05586 7.3008 8.20636C7.6223 8.72886 7.7073 9.30986 7.4998 9.88636C7.3108 10.4104 6.9993 10.8224 6.5698 11.0509L7.0548 10.9969C8.2638 10.8624 9.1513 10.4489 9.7278 9.75736C10.2993 9.07186 10.4998 8.18936 10.4998 7.24986C10.4998 6.37486 10.1403 5.47286 9.7163 4.72236C9.2193 3.84336 8.5708 3.11336 7.8628 2.40586C7.7403 2.65086 7.7498 2.74986 7.4978 3.14336C7.17055 2.27434 6.55632 1.54315 5.7568 1.07086Z" fill="#E50914"/>
						</svg>
						<span class="review-value">Top List</span>
					</div>
				<?php } elseif ( $has_feature ) { ?>
					<div class="post-card-review top-feature-tag exclusive-tag flex hero-section-review-tag">
						<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M5.125 5.75V9.04395L2.37988 5.75H5.125ZM9.62012 5.75L6.875 9.04395V5.75H9.62012ZM9.19141 2.375L10.0039 4H8.53516L7.73047 2.375H9.19141ZM6.58789 4H5.41211L6 2.83496L6.58789 4ZM4.26953 2.375L3.46484 4H1.99609L2.80859 2.375H4.26953Z" fill="#111111" stroke="#2563EB"/>
						</svg>
						<span class="review-value">Exclusive</span>
					</div>
				<?php } elseif ( $has_interview ) { ?>
					<div class="post-card-review interview-tag flex hero-section-review-tag">
						<span class="review-value">Interview</span>
					</div>
				<?php } elseif ( $has_guide ) { ?>
					<div class="post-card-review hero-guide-tag flex hero-section-review-tag">
						<span class="review-value">Guide</span>
					</div>
				<?php } else { ?>
					<div class="hero-tags">
						<div class="post-card-tags flex-center">
							<?php foreach ( ths_get_post_card_tags( $post_id ) as $pct ) : ?>
								<span class="post-card-tags-item <?php echo esc_attr( $pct->display_color ); ?>">
									<a href="<?php echo esc_url( $pct->display_link ); ?>">
										<?php echo esc_html( $pct->name ); ?>
									</a>
								</span>
							<?php endforeach; ?>
						</div>
					</div>
				<?php } ?>
				<div class="dbt-spr-24"></div>
				<h1><?php echo esc_html( get_the_title() ); ?></h1>
				<div class="hero-section-meta flex-center">
					<div class="post-card-date">
						<a href="<?php echo esc_url( $date_link ); ?>">
							<?php echo esc_html( $post_date ); ?>
						</a>
					</div>
					|
					<div class="hero-section-post-time">
						<?php echo esc_html( get_post_reading_time( get_the_ID() ) ); ?> min
					</div>
				</div>
			</div>
			<?php if ( has_post_thumbnail( $post_id ) ) : ?>
			<div class="dbt-spr-40"></div>
			<div class="hero-section-image image-cover single-post-hero-image">
				<?php THS::the_featured_image( $post_id, 1680 ); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
