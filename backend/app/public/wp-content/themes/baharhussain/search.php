<?php
/**
 * Search results template.
 *
 * @package Bahar Hussain Theme
 */

defined( 'ABSPATH' ) || exit;

get_header();

global $wp_query;

$search_query = get_search_query();
$result_count = (int) $wp_query->found_posts;
?>

<div id="primary" class="site-main search-page-template">
	<div id="page-section" class="page-section">
		<section class="hero-section background-light-blue search-page-hero" aria-labelledby="search-page-title">
			<div class="dbt-spr-48"></div>
			<div class="hero-ctn center-align">
				<div class="wrapper">
					<p class="section-eyebrow"><?php esc_html_e( 'Search', 'baharhussain' ); ?></p>
					<h1 id="search-page-title">
						<?php
						if ( $search_query ) {
							printf(
								/* translators: %s: search query. */
								esc_html__( 'Results for “%s”', 'baharhussain' ),
								esc_html( $search_query )
							);
						} else {
							esc_html_e( 'Search the Website', 'baharhussain' );
						}
						?>
					</h1>
					<div class="banner-text">
						<p>
							<?php
							printf(
								/* translators: %s: number of search results. */
								esc_html( _n( '%s result found.', '%s results found.', $result_count, 'baharhussain' ) ),
								number_format_i18n( $result_count )
							);
							?>
						</p>
					</div>
					<div class="search-page-hero__form"><?php get_search_form(); ?></div>
				</div>
			</div>
			<div class="dbt-spr-48"></div>
		</section>

		<section class="home-section search-page-results" aria-labelledby="search-results-title">
			<div class="wrapper">
				<h2 id="search-results-title" class="search-page-results__title">
					<?php echo $result_count ? esc_html__( 'Search Results', 'baharhussain' ) : esc_html__( 'No Results Found', 'baharhussain' ); ?>
				</h2>

				<?php if ( have_posts() ) { ?>
					<div class="search-results-grid">
						<?php
						while ( have_posts() ) {
							the_post();
							?>
							<article <?php post_class( 'search-result-card' ); ?>>
								<span class="search-result-card__icon" aria-hidden="true">
									<svg viewBox="0 0 24 24" focusable="false">
										<path d="M6 3h9l3 3v15H6V3Z"></path>
										<path d="M15 3v4h4M9 11h6M9 15h6"></path>
									</svg>
								</span>
								<div class="search-result-card__content">
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 28 ) ); ?></p>
									<a class="home-service-card__link search-result-card__link" href="<?php the_permalink(); ?>">
										<span><?php esc_html_e( 'Read More', 'baharhussain' ); ?></span>
										<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M5 12h14M13 6l6 6-6 6"></path></svg>
									</a>
								</div>
							</article>
							<?php
						}
						?>
					</div>

					<?php
					the_posts_pagination(
						array(
							'mid_size'  => 1,
							'prev_text' => esc_html__( 'Previous', 'baharhussain' ),
							'next_text' => esc_html__( 'Next', 'baharhussain' ),
						)
					);
					?>
				<?php } else { ?>
					<div class="search-page-empty">
						<p><?php esc_html_e( 'Try a different keyword or browse the main pages below.', 'baharhussain' ); ?></p>
						<div class="search-page-empty__actions">
							<a class="button main-btn" href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Explore Services', 'baharhussain' ); ?></a>
							<a class="button outline-btn" href="<?php echo esc_url( home_url( '/portfolio/' ) ); ?>"><?php esc_html_e( 'View Portfolio', 'baharhussain' ); ?></a>
						</div>
					</div>
				<?php } ?>
			</div>
		</section>
	</div>
</div>

<?php
get_footer();
