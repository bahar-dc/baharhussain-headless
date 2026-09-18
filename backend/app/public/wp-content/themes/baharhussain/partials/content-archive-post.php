<?php
defined( 'ABSPATH' ) || exit;

/**
 * Template part for displaying posts in an archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

$bh_var_post_id = get_the_ID();
$post_type       = get_post_type( $bh_var_post_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
$taxonomies      = get_object_taxonomies( $post_type );
$taxonomies      = array_diff( $taxonomies, array( 'content_types' ) );
$author_id       = get_post_field( 'post_author', $bh_var_post_id );
$author_name     = get_the_author_meta( 'display_name', $author_id );
$author_url      = get_author_posts_url( $author_id );
$author_avatar   = get_avatar( $author_id, 32, '', $author_name );
$year            = get_the_date( 'Y', $bh_var_post_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
$month           = get_the_date( 'm', $bh_var_post_id );
$day             = get_the_date( 'd', $bh_var_post_id );
$date_link       = get_day_link( $year, $month, $day );
$post_date       = get_the_date( 'M j, Y', $bh_var_post_id );
$layout          = get_query_var( 'layout', '' );
$img_size        = get_query_var( 'thumb_size', 0 );
$is_lcp_image    = (bool) get_query_var( 'is_lcp_image', false );
set_query_var( 'is_lcp_image', false );
if ( ! $img_size ) {
	$img_size = 'small' === $layout ? 320 : 960;
}
?>

<article class="post-card">
	<div class="post-card-inner">
		<div class="post-card-image image-cover">
			<a href="<?php echo esc_url( get_the_permalink( $bh_var_post_id ) ); ?>" aria-label="<?php echo esc_attr( get_the_title( $bh_var_post_id ) ); ?>">
				<?php
				$img_attrs = $is_lcp_image ? array(
					'fetchpriority' => 'high',
					'loading'       => 'eager',
					'data-no-lazy'  => '1',
				) : array();
				THS::the_featured_image( $bh_var_post_id, $img_size, $img_attrs );
				?>
				<div class="loader-loading-effect"></div>
			</a>
			<?php
			defined( 'ABSPATH' ) || exit;

			$_format_terms = taxonomy_exists( 'content_types' ) ? get_the_terms( $bh_var_post_id, 'content_types' ) : false;
			$_is_review    = ! empty( $_format_terms ) && ! is_wp_error( $_format_terms ) &&
				in_array( 'reviews', wp_list_pluck( $_format_terms, 'slug' ), true );
			$_rating       = $_is_review && function_exists( 'get_field' ) ? get_field( 'ths_var_post_rating', $bh_var_post_id ) : null;
			if ( $_is_review && $_rating ) :
				?>
			<div class="post-card-review">
				<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M6.00021 1.5L7.17521 4.38L10.2802 4.61L7.90022 6.62L8.64522 9.64L6.00021 8L3.35521 9.64L4.10021 6.62L1.72021 4.61L4.82521 4.38L6.00021 1.5Z" fill="#F89900"/>
					<path d="M6.00021 1.5L4.82521 4.38L1.72021 4.61L4.10021 6.62L3.35521 9.64L6.00021 8M6.00021 1.5L7.17521 4.38L10.2802 4.61L7.90022 6.62L8.64522 9.64L6.00021 8" stroke="#F89900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				<span class="review-score">Score:</span>
				<span class="review-value"><?php echo esc_html( $_rating ); ?></span>
			</div>
			<?php endif; ?>
		</div>
		<div class="post-card-content">
			<div class="post-card-content-top">
				<div class="post-card-tags">
					<?php foreach ( ths_get_post_card_tags( $bh_var_post_id ) as $pct ) : ?>
						<span class="post-card-tags-item <?php echo esc_attr( $pct->display_color ); ?>">
							<a href="<?php echo esc_url( $pct->display_link ); ?>">
								<?php echo esc_html( $pct->name ); ?>
							</a>
						</span>
					<?php endforeach; ?>
				</div>
				<h3 class="post-card-title">
					<a href="<?php echo esc_url( get_the_permalink( $bh_var_post_id ) ); ?>">
						<?php echo esc_html( get_the_title() ); ?>
					</a>
				</h3>
				<?php if ( trim( THS::excerpt_nomore( 300 ) ) ) : ?>
					<p class="post-card-excerpt"><?php echo wp_kses_post( THS::excerpt_nomore( 300 ) ); ?></p>
				<?php endif; ?>
			</div>
			<div class="post-content-meta">
				<div class="post-card-author-meta">
					<div class="post-card-author-info">
						<a href="<?php echo esc_url( $author_url ); ?>" class="flex-center" aria-label="<?php echo esc_attr( sprintf( 'Posts by %s', $author_name ) ); ?>">
							<div class="post-card-author-img image-cover">
								<?php echo wp_kses_post( $author_avatar ); ?>
							</div>
							<div class="author-name"><?php echo esc_html( $author_name ); ?></div>
						</a>
					</div>
					<div class="post-card-date">
						<a href="<?php echo esc_url( $date_link ); ?>">
							<?php echo esc_html( $post_date ); ?>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>
