<?php
defined( 'ABSPATH' ) || exit;

/**
 * Custom functions added to current project
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

// Add filter to modify the button block HTML on frontend and backend
add_filter(
	'render_block',
	function ( $block_content, $block ) {
		if ( 'core/button' === $block['blockName'] ) {
			$processor = new WP_HTML_Tag_Processor( $block_content );
			$processor->next_tag( 'a' );
			$matches  = array();
			$new_html = '';
			preg_match( '/<a[^>]*>(.*?)<\/a>/', html_entity_decode( $processor->get_updated_html() ), $matches );

			if ( isset( $matches[1] ) ) {
				$text_got = $matches[1];
				$new_html = str_replace( $text_got, '<span>' . $text_got . '</span>', html_entity_decode( $processor->get_updated_html() ) );
			}

			return $new_html;
		}
		return $block_content;
	},
	10,
	2
);

// Provide a default date format fallback when WordPress date_format option is empty
add_filter(
	'option_date_format',
	function ( $value ) {
		// If the stored date format is empty, use WordPress default (Y-m-d)
		if ( '' === $value || ! $value ) {
			return 'M j, Y';
		}
		return $value;
	}
);

// // Enqueue JavaScript to handle button preview modifications in the block editor
// add_action( 'enqueue_block_editor_assets', function() {
//     wp_enqueue_script(
//         'custom-button-editor-script',
//         get_template_directory_uri() . '/js/custom-button-editor.js',
//         array( 'wp-blocks', 'wp-dom' ),
//         null,
//         true
//     );
// });

/**
 * Normalise a social profile value to a full URL.
 *
 * Yoast SEO stores the X/Twitter field as a bare username (without @).
 * All other Yoast social fields store full URLs. This helper converts a
 * bare username to a full URL and passes valid URLs through unchanged.
 * Normalises all URLs to https, strips www, and redirects twitter.com → x.com.
 *
 * @param string $value    Raw meta value — username or full URL.
 * @param string $base_url Base URL to prepend when value is not a URL, e.g. 'https://x.com/'.
 * @return string Full URL, or empty string when value is empty or base_url is missing.
 */
function ths_social_url( $value, $base_url = '' ) {
	if ( ! $value ) {
		return '';
	}
	// Strip a leading @ so "@https://twitter.com/user" is treated as a full URL.
	$stripped = ltrim( $value, '@' );
	if ( filter_var( $stripped, FILTER_VALIDATE_URL ) ) {
		$url = $stripped;
	} elseif ( $base_url ) {
		$url = rtrim( $base_url, '/' ) . '/' . ltrim( $value, '@/' );
	} else {
		return '';
	}

	// Enforce https.
	$url = preg_replace( '#^http://#i', 'https://', $url );

	// Strip www. subdomain.
	$url = preg_replace( '#^(https://)www\.#i', '$1', $url );

	// Redirect twitter.com to x.com.
	$url = preg_replace( '#^(https://)twitter\.com/#i', '$1x.com/', $url );

	return $url;
}

/**
 * Render link-based pagination for a given WP_Query.
 *
 * Delegates to partials/pagination-posts-page.php via set_query_var so
 * the HTML structure and 5-page window logic lives in one canonical place.
 *
 * @param WP_Query      $query   The query whose pages we are paginating.
 * @param callable|null $link_fn A callable that accepts a page number (int)
 *                               and returns the URL for that page.
 *                               When null, falls back to get_pagenum_link().
 */
function ths_pagination( $query, $link_fn = null ) {
	if ( (int) $query->max_num_pages <= 1 ) {
		return;
	}

	$current = get_query_var( 'paged' )
		? absint( get_query_var( 'paged' ) )
		: ( get_query_var( 'page' ) ? absint( get_query_var( 'page' ) ) : 1 );

	if ( null === $link_fn ) {
		$link_fn = function ( $n ) {
			return get_pagenum_link( $n );
		};
	}

	set_query_var( '_pp_current', $current );
	set_query_var( '_pp_total', (int) $query->max_num_pages );
	set_query_var( '_pp_link', $link_fn );
	get_template_part( 'partials/pagination', 'posts-page' );
}

/**
 * Output the complete pagination section: Load More button (mobile) + pagination wrapper.
 *
 * Centralises the repeated pattern used on homepage, originals, paged
 * template, and search results so every listing page stays consistent.
 *
 * @param WP_Query $query      The query whose pagination to render.
 * @param callable|null $link_fn  Page-link builder.  null → get_pagenum_link().
 * @param string   $wrapper_id   The id attribute for the pagination wrapper div.
 */
function ths_pagination_section( $query, $link_fn = null, $wrapper_id = 'pagination' ) {
	?>
	<div id="<?php echo esc_attr( $wrapper_id ); ?>"><?php ths_pagination( $query, $link_fn ); ?></div>
	<?php
	defined( 'ABSPATH' ) || exit;
}
