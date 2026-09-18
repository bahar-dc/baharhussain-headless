<?php
defined( 'ABSPATH' ) || exit;

/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 * cSpell:ignore stvar yoast wpseo
 */

list( $bh_var_post_id, $bh_fields, $bh_option_fields, $bh_queried_object ) = THS::defaults();

$year      = get_the_date( 'Y', $bh_var_post_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
$month     = get_the_date( 'm', $bh_var_post_id );
$day       = get_the_date( 'd', $bh_var_post_id );
$date_link = get_day_link( $year, $month, $day );
$post_date = get_the_date( 'M j, Y', $bh_var_post_id );

$post_type  = get_post_type( $bh_var_post_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
$taxonomies = get_object_taxonomies( $post_type );
$taxonomies = array_diff( $taxonomies, array( 'content_types' ) );

/**
 * Calculate estimated reading time based on word count (~200 wpm).
 *
 * @param int|null $post_id Post ID (defaults to current post).
 * @return int Minutes to read.
 */
function get_post_reading_time( $post_id = null ) {
	$post       = get_post( $post_id );
	$content    = strip_tags( $post->post_content );
	$word_count = str_word_count( $content );
	$minutes    = ceil( $word_count / 200 );
	return $minutes;
}

// Star-rating breakdown: full stars, half star (0 or 1), empty stars (out of 5).
$rating = function_exists( 'get_field' ) ? (float) get_field( 'ths_var_post_rating' ) : 0;
$full   = floor( $rating );
$half   = ( $rating - $full ) == 0.5 ? 1 : 0;
$empty  = 5 - ( $full + $half );


if ( function_exists( 'get_fields' ) && function_exists( 'get_fields_escaped' ) ) {
	$post_fields = get_fields_escaped( $bh_var_post_id );
}

// Post Tags & Categories.
$bh_var_post_categories = get_the_category( $bh_var_post_id );
$bh_post_tags           = get_the_terms( $bh_var_post_id, 'post_tag' );
$bh_post_content_type   = taxonomy_exists( 'content_types' ) ? get_the_terms( $bh_var_post_id, 'content_types' ) : false;
$author_id               = get_the_author_meta( $bh_var_post_id );
$author_avatar           = get_avatar_url( $author_id, array( 'size' => 32 ) );
$author_name             = get_the_author_meta( 'display_name', $author_id ) ?? null;
$author_description      = get_the_author_meta( 'description', $author_id ) ?? null;
$bh_var_posttitle       = get_the_title();
// Post Detail
$post_url   = urlencode( get_permalink() );
$post_title = urlencode( get_the_title() );

// Review Meta
$bh_var_post_movie_name            = $bh_fields['ths_var_post_movie_name'] ?? null;
$bh_var_post_movie_description     = $bh_fields['ths_var_post_movie_description'] ?? null;
$bh_var_post_movie_director_writer = $bh_fields['ths_var_post_movie_director_writer'] ?? null;
$bh_var_post_movie_starring        = $bh_fields['ths_var_post_movie_starring'] ?? null;
$bh_var_post_movie_genre           = $bh_fields['ths_var_post_movie_genre'] ?? null;
$bh_var_post_movie_runtime         = $bh_fields['ths_var_post_movie_runtime'] ?? null;
$bh_var_post_movie_release         = $bh_fields['ths_var_post_movie_release'] ?? null;

?>

<section id="page-section" class="page-section">
	<?php
	defined( 'ABSPATH' ) || exit;

	get_template_part(
		'partials/single-post-template/post-hero',
		null,
		array(
			'post_id'           => $bh_var_post_id,
			'post_content_type' => $bh_post_content_type,
			'rating'            => $rating,
			'date_link'         => $date_link,
			'post_date'         => $post_date,
		)
	);
	?>
	<div class="dbt-spr-40"></div>
	<section>
		<div class="wrapper">
			<div class="post-detail-area flex-between-start">
				<div class="post-detail-content">
					<div class="post-content-inner is-layout-flow wp-block-post-content">
						<?php
						if ( $bh_post_content_type && ! is_wp_error( $bh_post_content_type ) ) {
							// Render review widget only for "reviews" content type.
							foreach ( $bh_post_content_type as $term ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
								if ( 'reviews' === $term->slug ) {
									?>
										<div class="movie-detail-widget">
											<div class="movie-detail-widget-top flex-between-start">
												<div class="movie-detail-widget-top-left">
													<strong class="movie-detail-widget-title">
													<?php echo html_entity_decode( $bh_var_post_movie_name ?? '' ); ?>
													</strong>
													<div class="movie-detail-widget-subtitle">
														<p><?php echo html_entity_decode( $bh_var_post_movie_description ?? '' ); ?></p>
													</div>
												</div>
												<div class="movie-detail-widget-top-right">
													<div class="post-card-review flex">
														<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M6.00021 1.5L7.17521 4.38L10.2802 4.61L7.90022 6.62L8.64522 9.64L6.00021 8L3.35521 9.64L4.10021 6.62L1.72021 4.61L4.82521 4.38L6.00021 1.5Z" fill="#F89900"/>
															<path d="M6.00021 1.5L4.82521 4.38L1.72021 4.61L4.10021 6.62L3.35521 9.64L6.00021 8M6.00021 1.5L7.17521 4.38L10.2802 4.61L7.90022 6.62L8.64522 9.64L6.00021 8" stroke="#F89900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
														</svg>
														<span class="review-score">Score:</span>
															<span class="review-value"><?php echo esc_html( $rating ); ?></span>
													</div>
												</div>
											</div>
										<?php if ( ! empty( $bh_var_post_movie_director_writer ) || ! empty( $bh_var_post_movie_starring ) || ! empty( $bh_var_post_movie_genre ) || ! empty( $bh_var_post_movie_runtime ) || ! empty( $bh_var_post_movie_release ) ) { ?>
											<div class="movie-detail-widget-bottom">
												<?php if ( ! empty( $bh_var_post_movie_director_writer ) ) { ?>
													<div class="movie-detail-widget-row flex">
														<div class="movie-detail-widget-row-icon">
															<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M4.08398 9.91699V10.5003C4.08398 10.655 4.14544 10.8034 4.25484 10.9128C4.36424 11.0222 4.51261 11.0837 4.66732 11.0837H9.33398C9.48869 11.0837 9.63707 11.0222 9.74646 10.9128C9.85586 10.8034 9.91732 10.655 9.91732 10.5003V9.91699C9.91732 9.45286 9.73294 9.00774 9.40475 8.67955C9.07657 8.35137 8.63145 8.16699 8.16732 8.16699H5.83398C5.36986 8.16699 4.92474 8.35137 4.59655 8.67955C4.26836 9.00774 4.08398 9.45286 4.08398 9.91699ZM8.75065 4.66699C8.75065 5.13112 8.56628 5.57624 8.23809 5.90443C7.9099 6.23262 7.46478 6.41699 7.00065 6.41699C6.53652 6.41699 6.0914 6.23262 5.76321 5.90443C5.43503 5.57624 5.25065 5.13112 5.25065 4.66699C5.25065 4.20286 5.43503 3.75774 5.76321 3.42956C6.0914 3.10137 6.53652 2.91699 7.00065 2.91699C7.46478 2.91699 7.9099 3.10137 8.23809 3.42956C8.56628 3.75774 8.75065 4.20286 8.75065 4.66699Z" stroke="currentcolor"/>
															</svg>
														</div>
														<div class="movie-detail-widget-row-title">Director / Writer:</div>
														<div class="movie-detail-widget-row-description">
															<?php echo html_entity_decode( $bh_var_post_movie_director_writer ); ?>
														</div>
													</div>
												<?php } ?>
												<?php if ( ! empty( $bh_var_post_movie_starring ) ) { ?>
													<div class="movie-detail-widget-row flex">
														<div class="movie-detail-widget-row-icon">
															<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M9.33333 11.0837H11.6667C11.8214 11.0837 11.9697 11.0222 12.0791 10.9128C12.1885 10.8034 12.25 10.655 12.25 10.5003V9.91699C12.25 9.45286 12.0656 9.00774 11.7374 8.67956C11.4092 8.35137 10.9641 8.16699 10.5 8.16699H9.33333M8.029 5.83366C8.26528 6.09783 8.5762 6.28403 8.92062 6.36762C9.26504 6.45121 9.62672 6.42826 9.95781 6.30179C10.2889 6.17533 10.5738 5.95132 10.7748 5.6594C10.9758 5.36748 11.0834 5.02141 11.0834 4.66699C11.0834 4.31257 10.9758 3.96651 10.7748 3.67459C10.5738 3.38267 10.2889 3.15866 9.95781 3.03219C9.62672 2.90573 9.26504 2.88277 8.92062 2.96636C8.5762 3.04996 8.26528 3.23616 8.029 3.50033M1.75 10.5003V9.91699C1.75 9.45286 1.93437 9.00774 2.26256 8.67956C2.59075 8.35137 3.03587 8.16699 3.5 8.16699H5.83333C6.29746 8.16699 6.74258 8.35137 7.07077 8.67956C7.39896 9.00774 7.58333 9.45286 7.58333 9.91699V10.5003C7.58333 10.655 7.52187 10.8034 7.41248 10.9128C7.30308 11.0222 7.15471 11.0837 7 11.0837H2.33333C2.17862 11.0837 2.03025 11.0222 1.92085 10.9128C1.81146 10.8034 1.75 10.655 1.75 10.5003ZM6.41667 4.66699C6.41667 5.13112 6.23229 5.57624 5.9041 5.90443C5.57591 6.23262 5.1308 6.41699 4.66667 6.41699C4.20254 6.41699 3.75742 6.23262 3.42923 5.90443C3.10104 5.57624 2.91667 5.13112 2.91667 4.66699C2.91667 4.20286 3.10104 3.75774 3.42923 3.42956C3.75742 3.10137 4.20254 2.91699 4.66667 2.91699C5.1308 2.91699 5.57591 3.10137 5.9041 3.42956C6.23229 3.75774 6.41667 4.20286 6.41667 4.66699Z" stroke="currentcolor" stroke-linecap="round"/>
															</svg>
														</div>
														<div class="movie-detail-widget-row-title">Starring:</div>
														<div class="movie-detail-widget-row-description">
															<?php echo html_entity_decode( $bh_var_post_movie_starring ); ?>
														</div>
													</div>
												<?php } ?>
												<?php if ( ! empty( $bh_var_post_movie_genre ) ) { ?>
													<div class="movie-detail-widget-row flex">
														<div class="movie-detail-widget-row-icon">
															<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M6.99935 12.8337C10.2211 12.8337 12.8327 10.2221 12.8327 7.00033C12.8327 3.77858 10.2211 1.16699 6.99935 1.16699C3.7776 1.16699 1.16602 3.77858 1.16602 7.00033C1.16602 10.2221 3.7776 12.8337 6.99935 12.8337Z" stroke="currentcolor" stroke-linejoin="round"/>
																<path d="M7 5.25C7.23206 5.25 7.45462 5.15781 7.61872 4.99372C7.78281 4.82962 7.875 4.60706 7.875 4.375C7.875 4.14294 7.78281 3.92038 7.61872 3.75628C7.45462 3.59219 7.23206 3.5 7 3.5C6.76794 3.5 6.54538 3.59219 6.38128 3.75628C6.21719 3.92038 6.125 4.14294 6.125 4.375C6.125 4.60706 6.21719 4.82962 6.38128 4.99372C6.54538 5.15781 6.76794 5.25 7 5.25ZM7 10.5C7.23206 10.5 7.45462 10.4078 7.61872 10.2437C7.78281 10.0796 7.875 9.85706 7.875 9.625C7.875 9.39294 7.78281 9.17038 7.61872 9.00628C7.45462 8.84219 7.23206 8.75 7 8.75C6.76794 8.75 6.54538 8.84219 6.38128 9.00628C6.21719 9.17038 6.125 9.39294 6.125 9.625C6.125 9.85706 6.21719 10.0796 6.38128 10.2437C6.54538 10.4078 6.76794 10.5 7 10.5ZM4.375 7.875C4.60706 7.875 4.82962 7.78281 4.99372 7.61872C5.15781 7.45462 5.25 7.23206 5.25 7C5.25 6.76794 5.15781 6.54538 4.99372 6.38128C4.82962 6.21719 4.60706 6.125 4.375 6.125C4.14294 6.125 3.92038 6.21719 3.75628 6.38128C3.59219 6.54538 3.5 6.76794 3.5 7C3.5 7.23206 3.59219 7.45462 3.75628 7.61872C3.92038 7.78281 4.14294 7.875 4.375 7.875ZM9.625 7.875C9.85706 7.875 10.0796 7.78281 10.2437 7.61872C10.4078 7.45462 10.5 7.23206 10.5 7C10.5 6.76794 10.4078 6.54538 10.2437 6.38128C10.0796 6.21719 9.85706 6.125 9.625 6.125C9.39294 6.125 9.17038 6.21719 9.00628 6.38128C8.84219 6.54538 8.75 6.76794 8.75 7C8.75 7.23206 8.84219 7.45462 9.00628 7.61872C9.17038 7.78281 9.39294 7.875 9.625 7.875Z" fill="#111111"/>
																<path d="M7 12.834H12.8333" stroke="currentcolor" stroke-linecap="round"/>
															</svg>
														</div>
														<div class="movie-detail-widget-row-title">Genre:</div>
														<div class="movie-detail-widget-row-description">
															<?php echo html_entity_decode( $bh_var_post_movie_genre ); ?>
														</div>
													</div>
												<?php } ?>
												<?php if ( ! empty( $bh_var_post_movie_runtime ) ) { ?>
													<div class="movie-detail-widget-row flex">
														<div class="movie-detail-widget-row-icon">
															<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M7 12.25C9.8995 12.25 12.25 9.8995 12.25 7C12.25 4.1005 9.8995 1.75 7 1.75C4.1005 1.75 1.75 4.1005 1.75 7C1.75 9.8995 4.1005 12.25 7 12.25Z" stroke="currentcolor" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round"/>
																<path d="M6.41602 4.66602V7.58268H9.33268" stroke="currentcolor" stroke-width="0.75" stroke-linecap="round" stroke-linejoin="round"/>
															</svg>
														</div>
														<div class="movie-detail-widget-row-title">Runtime:</div>
														<div class="movie-detail-widget-row-description">
															<?php echo html_entity_decode( $bh_var_post_movie_runtime ); ?>
														</div>
													</div>
												<?php } ?>
												<?php if ( ! empty( $bh_var_post_movie_release ) ) { ?>
													<div class="movie-detail-widget-row flex">
														<div class="movie-detail-widget-row-icon">
															<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
																<path d="M1.16602 7.00065C1.16602 4.8009 1.16602 3.70073 1.84968 3.01765C2.53335 2.33457 3.63293 2.33398 5.83268 2.33398H8.16602C10.3658 2.33398 11.4659 2.33398 12.149 3.01765C12.8321 3.70132 12.8327 4.8009 12.8327 7.00065V8.16732C12.8327 10.3671 12.8327 11.4672 12.149 12.1503C11.4653 12.8334 10.3658 12.834 8.16602 12.834H5.83268C3.63293 12.834 2.53277 12.834 1.84968 12.1503C1.1666 11.4667 1.16602 10.3671 1.16602 8.16732V7.00065Z" stroke="currentcolor"/>
																<path d="M4.08203 2.33398V1.45898M9.91537 2.33398V1.45898M1.45703 5.25065H12.5404" stroke="currentcolor" stroke-linecap="round"/>
																<path d="M10.5 9.91667C10.5 10.0714 10.4385 10.2197 10.3291 10.3291C10.2197 10.4385 10.0714 10.5 9.91667 10.5C9.76196 10.5 9.61358 10.4385 9.50419 10.3291C9.39479 10.2197 9.33333 10.0714 9.33333 9.91667C9.33333 9.76196 9.39479 9.61358 9.50419 9.50419C9.61358 9.39479 9.76196 9.33333 9.91667 9.33333C10.0714 9.33333 10.2197 9.39479 10.3291 9.50419C10.4385 9.61358 10.5 9.76196 10.5 9.91667ZM10.5 7.58333C10.5 7.73804 10.4385 7.88642 10.3291 7.99581C10.2197 8.10521 10.0714 8.16667 9.91667 8.16667C9.76196 8.16667 9.61358 8.10521 9.50419 7.99581C9.39479 7.88642 9.33333 7.73804 9.33333 7.58333C9.33333 7.42862 9.39479 7.28025 9.50419 7.17085C9.61358 7.06146 9.76196 7 9.91667 7C10.0714 7 10.2197 7.06146 10.3291 7.17085C10.4385 7.28025 10.5 7.42862 10.5 7.58333ZM7.58333 9.91667C7.58333 10.0714 7.52187 10.2197 7.41248 10.3291C7.30308 10.4385 7.15471 10.5 7 10.5C6.84529 10.5 6.69692 10.4385 6.58752 10.3291C6.47812 10.2197 6.41667 10.0714 6.41667 9.91667C6.41667 9.76196 6.47812 9.61358 6.58752 9.50419C6.69692 9.39479 6.84529 9.33333 7 9.33333C7.15471 9.33333 7.30308 9.39479 7.41248 9.50419C7.52187 9.61358 7.58333 9.76196 7.58333 9.91667ZM7.58333 7.58333C7.58333 7.73804 7.52187 7.88642 7.41248 7.99581C7.30308 8.10521 7.15471 8.16667 7 8.16667C6.84529 8.16667 6.69692 8.10521 6.58752 7.99581C6.47812 7.88642 6.41667 7.73804 6.41667 7.58333C6.41667 7.42862 6.47812 7.28025 6.58752 7.17085C6.69692 7.06146 6.84529 7 7 7C7.15471 7 7.30308 7.06146 7.41248 7.17085C7.52187 7.28025 7.58333 7.42862 7.58333 7.58333ZM4.66667 9.91667C4.66667 10.0714 4.60521 10.2197 4.49581 10.3291C4.38642 10.4385 4.23804 10.5 4.08333 10.5C3.92862 10.5 3.78025 10.4385 3.67085 10.3291C3.56146 10.2197 3.5 10.0714 3.5 9.91667C3.5 9.76196 3.56146 9.61358 3.67085 9.50419C3.78025 9.39479 3.92862 9.33333 4.08333 9.33333C4.23804 9.33333 4.38642 9.39479 4.49581 9.50419C4.60521 9.61358 4.66667 9.76196 4.66667 9.91667ZM4.66667 7.58333C4.66667 7.73804 4.60521 7.88642 4.49581 7.99581C4.38642 8.10521 4.23804 8.16667 4.08333 8.16667C3.92862 8.16667 3.78025 8.10521 3.67085 7.99581C3.56146 7.88642 3.5 7.73804 3.5 7.58333C3.5 7.42862 3.56146 7.28025 3.67085 7.17085C3.78025 7.06146 3.92862 7 4.08333 7C4.23804 7 4.38642 7.06146 4.49581 7.17085C4.60521 7.28025 4.66667 7.42862 4.66667 7.58333Z" fill="#111111"/>
															</svg>
														</div>
														<div class="movie-detail-widget-row-title">Release:</div>
														<div class="movie-detail-widget-row-description">
															<?php echo html_entity_decode( $bh_var_post_movie_release ); ?>
														</div>
													</div>
												<?php } ?>
											</div>
											<?php } ?>
										</div>
										<div class="dbt-spr-48"></div>
										<?php
										break;
								}
							}
						}
						?>
						<?php get_template_part( 'partials/content' ); ?>
					</div>
					<div class="dbt-spr-40"></div>
					<div class="post-navigation-buttons flex-between-center">
						<?php
							defined( 'ABSPATH' ) || exit;
							$prev_post = get_previous_post();
							$next_post = get_next_post();
						if ( $prev_post ) {
							$prev_class = 'button outline-btn post-prev-link has-prev';

							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static HTML/SVG markup, dynamic values escaped with esc_attr/esc_url.
							echo '<a class="' . esc_attr( $prev_class ) . '" href="' . esc_url( get_permalink( $prev_post->ID ) ) . '">
									<span class="button-icon">
									<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M14 8H2M2 8L7.66667 2.33333M2 8L7.66667 13.6667" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
									</span>
									<span>Previous</span>
									</a>';
						}
						if ( $next_post ) {
							$next_class = 'button outline-btn post-next-link has-next';

							// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Static HTML/SVG markup, dynamic values escaped with esc_attr/esc_url.
							echo '<a class="' . esc_attr( $next_class ) . '" href="' . esc_url( get_permalink( $next_post->ID ) ) . '">
									<span>Next</span>
									<span class="button-icon">
									<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M2 8H14M14 8L8.33333 2.33333M14 8L8.33333 13.6667" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
									</span>
									</a>';
						}
						?>
					</div>
					<div class="dbt-spr-64"></div>
					<div class="mbl-sidebar desktop-hide">
						<?php
							defined( 'ABSPATH' ) || exit;
							get_template_part(
								'partials/single-post-template/post-sidebar',
								null,
								array(
									'variant'     => 'mobile',
									'post_id'     => $bh_var_post_id,
									'post_url'    => $post_url,
									'post_title'  => $post_title,
									'full'        => $full,
									'half'        => $half,
									'empty_stars' => $empty,
									'rating'      => $rating,
								)
							);
							?>
						<div class="dbt-spr-64"></div>
					</div>
					<div class="suggested-posts">
						<?php
						defined( 'ABSPATH' ) || exit;

						// "More you might like": use editor-selected posts, or fall back to same-category latest.
						$_max_posts      = 4;
						$_selected_posts = get_field( 'ths_var_selected_posts', $bh_var_post_id );
						$_selected_ids   = array();
						if ( ! empty( $_selected_posts ) && is_array( $_selected_posts ) ) {
							$_selected_ids = array_map(
								'absint',
								array_map(
									function ( $_selected_post ) {
										return is_object( $_selected_post ) ? $_selected_post->ID : $_selected_post;
									},
									$_selected_posts
								)
							);
							$_selected_ids = array_filter( $_selected_ids );
						}

						if ( ! empty( $_selected_ids ) ) {
							$top_stories = array(
								'posts_per_page' => $_max_posts,
								'post__in'       => array_slice( $_selected_ids, 0, $_max_posts ),
								'orderby'        => 'post__in',
								'post_type'      => 'post',
								'post_status'    => 'publish',
								'no_found_rows'  => true,
							);
						} else {
							// Fallback: most recent post in same category.
							$_cats       = wp_get_post_categories( $bh_var_post_id, array( 'fields' => 'ids' ) );
							$top_stories = array(
								'posts_per_page' => '1',
								'orderby'        => 'date',
								'order'          => 'DESC',
								'post_type'      => 'post',
								'post_status'    => 'publish',
								'post__not_in'   => array( $bh_var_post_id ),
								'no_found_rows'  => true,
							);
							if ( ! empty( $_cats ) ) {
								$top_stories['category__in'] = $_cats;
							}
						}
						$bh_top_stories = new WP_Query( $top_stories );
						$post_count      = $bh_top_stories->post_count;

						if ( $bh_top_stories->have_posts() ) {
							if ( 1 === $post_count ) { ?>
								<div class="section-head flex-between-center">
									<div class="section-head-left">
										<h2 class="heading-3">More you might like</h2>
									</div>
								</div>
								<div class="suggested-posts-inner">
									<div class="post-cards-horizontal">
										<?php
										while ( $bh_top_stories->have_posts() ) {
											$bh_top_stories->the_post();
											get_template_part( 'partials/content', 'archive-post' );
										}
										?>
									</div>
								</div>
								<?php
							} else { ?>
								<div class="post-slider-container post-card-essential" data-post-slider-container>
									<div class="wrapper">
										<div class="section-head flex-between-end hide-in-editor">
											<div class="section-head-left">
												<h2 class="post-slider-title" style="text-transform: none"><?php esc_html_e( 'More you might like', 'baharhussain' ); ?></h2>
											</div>
											<?php if($post_count > 2) { ?>
												<div class="section-head-right flex-end">
													<div class="post-slider-buttons">
														<div class="post-slider-button" role="button" aria-label="<?php esc_attr_e( 'Previous', 'baharhussain' ); ?>" data-post-slider-prev disabled>
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
																<path d="M21 11.9995H3M3 11.9995L11.5 3.49951M3 11.9995L11.5 20.4995" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
															</svg>
														</div>
														<div class="post-slider-button" role="button" aria-label="<?php esc_attr_e( 'Next', 'baharhussain' ); ?>" data-post-slider-next>
															<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
																<path d="M3 11.9995H21M21 11.9995L12.5 3.49951M21 11.9995L12.5 20.4995" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"></path>
															</svg>
														</div>
													</div>
												</div>
											<?php } ?>
										</div>
										<div class="post-slider" data-post-slider>
											<ul class="post_slider__track" data-post-slider-track>
												<?php
												while ( $bh_top_stories->have_posts() ) {
													$bh_top_stories->the_post();
													?>
													<li class="post-slide">
														<?php get_template_part( 'partials/content', 'archive-post' ); ?>
													</li>
													<?php
												}
												?>
											</ul>
										</div>
									</div>
								</div>
								<?php
							}
						} else {
							echo '<h4 class="center-align">' . esc_html__( 'No related articles found.', 'baharhussain' ) . '</h4>';
						}

						wp_reset_postdata();
						?>
					</div>
					<div class="dbt-spr-40"></div>
					<hr>
					<div class="dbt-spr-40"></div>
					<div class="post-comments">
						<div class="section-head flex-between-center">
							<div class="section-head-left">
								<h2 class="heading-3">Reviews</h2>
							</div>
						</div>
						<?php
						defined( 'ABSPATH' ) || exit;

						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
						?>
					</div>
				</div>
				<div class="post-detail-sidebar mobile-hide">
					<?php
					defined( 'ABSPATH' ) || exit;

					get_template_part(
						'partials/single-post-template/post-sidebar',
						null,
						array(
							'variant'     => 'desktop',
							'post_id'     => $bh_var_post_id,
							'post_url'    => $post_url,
							'post_title'  => $post_title,
							'full'        => $full,
							'half'        => $half,
							'empty_stars' => $empty,
							'rating'      => $rating,
						)
					);
					?>
				</div>
			</div>
			<div class="dbt-spr-80"></div>
		</div>
	</section>
	<?php get_template_part( 'partials/single-post-template/post-related-slider' ); ?>
</section>
