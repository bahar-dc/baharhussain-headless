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
$top_video_ids   = get_query_var( 'top_video_ids', null );
if ( null === $top_video_ids ) {
	$top_video_ids = ths_get_top_video_ids( 5 );
}
?>

<article class="post-card-video">
	<div class="post-card-video-inner">
		<div class="post-card-video-image image-cover">
			<?php THS::the_featured_image( $bh_var_post_id, 440 ); ?>
		</div>
		<div class="post-card-video-content">
			<div class="post-card-video-content-top flex-between-center">
				<?php if ( in_array( $bh_var_post_id, $top_video_ids, true ) ) : ?>
				<div class="video-status">
					<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5.75729 1.0711L5.12729 0.693604L5.00729 1.4181C4.81629 2.5621 4.03479 3.6251 3.17279 4.3721C1.48529 5.8351 1.11579 7.4251 1.63829 8.7376C2.13829 9.9936 3.40729 10.8536 4.69529 10.9971L4.99329 11.0301C4.25629 10.5796 3.78329 9.5271 3.94829 8.7406C4.11129 7.9676 4.66729 7.2436 5.73529 6.5756L6.27379 6.2396L6.47479 6.8421C6.59329 7.1981 6.79829 7.4841 7.00679 7.7746C7.10679 7.9146 7.20829 8.0561 7.30129 8.2066C7.62279 8.7291 7.70779 9.3101 7.50029 9.8866C7.31129 10.4106 6.99979 10.8226 6.57029 11.0511L7.05529 10.9971C8.26429 10.8626 9.15179 10.4491 9.72829 9.7576C10.2998 9.0721 10.5003 8.1896 10.5003 7.2501C10.5003 6.3751 10.1408 5.4731 9.71679 4.7226C9.21979 3.8436 8.57129 3.1136 7.86329 2.4061C7.74079 2.6511 7.75029 2.7501 7.49829 3.1436C7.17104 2.27458 6.55681 1.54339 5.75729 1.0711Z" fill="#CA5555"/>
					</svg>
					<span class="video-status-text">Top Video</span>
				</div>
				<?php endif; ?>
				<div class="post-card-video-button flex-center">
					<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M5.604 3.02468C5.54327 2.98867 5.47409 2.96938 5.40349 2.96877C5.33289 2.96815 5.26339 2.98623 5.20204 3.02117C5.14069 3.05611 5.08968 3.10667 5.0542 3.1677C5.01871 3.22874 5.00001 3.29808 5 3.36868V12.6313C5.00001 12.7019 5.01871 12.7713 5.0542 12.8323C5.08968 12.8934 5.14069 12.9439 5.20204 12.9789C5.26339 13.0138 5.33289 13.0319 5.40349 13.0313C5.47409 13.0306 5.54327 13.0114 5.604 12.9753L13.4193 8.34401C13.479 8.3086 13.5285 8.25826 13.5628 8.19794C13.5972 8.13763 13.6152 8.06942 13.6152 8.00001C13.6152 7.93061 13.5972 7.8624 13.5628 7.80208C13.5285 7.74177 13.479 7.69143 13.4193 7.65601L5.604 3.02468Z" fill="#111111" stroke="#111111" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
				</div>
			</div>
			<div class="post-card-video-content-inner">
				<h3 class="post-card-video-title">
					<?php echo esc_html( get_the_title() ); ?>
				</h3>
				<?php if ( trim( THS::excerpt_nomore( 300 ) ) ) : ?>
					<p class="post-card-video-excerpt"><?php echo wp_kses_post( THS::excerpt_nomore( 300 ) ); ?></p>
				<?php endif; ?>
			</div>
			<a href="<?php echo esc_url( get_the_permalink( $bh_var_post_id ) ); ?>" class="no-link-style" aria-label="<?php echo esc_attr( get_the_title( $bh_var_post_id ) ); ?>"></a>
		</div>
	</div>
</article>
