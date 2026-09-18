<?php
defined( 'ABSPATH' ) || exit;

/**
 * Reusable pagination for the posts page.
 *
 * Always shows 5 page numbers centered on the current page, then "…" + last.
 *
 * Required variables (set via set_query_var before get_template_part):
 *   int $_pp_current   — current page number
 *   int $_pp_total     — total number of pages
 *   callable $_pp_link — function( int $n ) : string — returns URL for page $n
 *
 * @package Bahar Hussain Theme
 */

$_pp_current = (int) get_query_var( '_pp_current', 1 );
$_pp_total   = (int) get_query_var( '_pp_total', 1 );
$_pp_link    = get_query_var( '_pp_link' );

if ( $_pp_total <= 1 ) {
	return;
}

// Build a window of 5 pages centered on current.
$_window_start = max( 1, $_pp_current - 2 );
$_window_end   = min( $_pp_total, $_window_start + 4 );
// Shift window back if it hit the end.
$_window_start = max( 1, $_window_end - 4 );
?>
<div class="pagination-list">
	<div class="pagination">
		<?php if ( $_pp_current > 1 ) : ?>
			<a href="<?php echo esc_url( call_user_func( $_pp_link, $_pp_current - 1 ) ); ?>" class="pre-page d-flex" data-page="<?php echo (int) ( $_pp_current - 1 ); ?>" title="previous">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M10 4L6 8L10 12" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				<span class="pagination-btn-text">Previous</span>
			</a>
		<?php else : ?>
			<span class="pre-page d-flex disabled" title="previous">
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M10 4L6 8L10 12" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				<span class="pagination-btn-text">Previous</span>
			</span>
		<?php endif; ?>

		<div class="pagination-numbers flex">
			<?php if ( $_window_start > 1 ) : ?>
				<a href="<?php echo esc_url( call_user_func( $_pp_link, 1 ) ); ?>" class="inactive" data-page="1">1</a>
				<?php if ( $_window_start > 2 ) : ?>
					<div class="pagination-dots">…</div>
				<?php endif; ?>
			<?php endif; ?>

			<?php for ( $_i = $_window_start; $_i <= $_window_end; $_i++ ) : ?>
				<?php if ( $_i === $_pp_current ) : ?>
					<span class="current"><?php echo (int) $_i; ?></span>
				<?php else : ?>
					<a href="<?php echo esc_url( call_user_func( $_pp_link, $_i ) ); ?>" class="inactive" data-page="<?php echo (int) $_i; ?>"><?php echo (int) $_i; ?></a>
				<?php endif; ?>
			<?php endfor; ?>

			<?php if ( $_window_end < $_pp_total ) : ?>
				<?php if ( $_window_end < $_pp_total - 1 ) : ?>
					<div class="pagination-dots">…</div>
				<?php endif; ?>
				<a href="<?php echo esc_url( call_user_func( $_pp_link, $_pp_total ) ); ?>" class="inactive" data-page="<?php echo (int) $_pp_total; ?>"><?php echo (int) $_pp_total; ?></a>
			<?php endif; ?>
		</div>

		<?php if ( $_pp_current < $_pp_total ) : ?>
			<a href="<?php echo esc_url( call_user_func( $_pp_link, $_pp_current + 1 ) ); ?>" class="next-page d-flex" data-page="<?php echo (int) ( $_pp_current + 1 ); ?>" title="next">
				<span class="pagination-btn-text">Next</span>
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M6 4L10 8L6 12" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</a>
		<?php else : ?>
			<span class="next-page d-flex disabled" title="next">
				<span class="pagination-btn-text">Next</span>
				<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M6 4L10 8L6 12" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</span>
		<?php endif; ?>
	</div>
</div>
