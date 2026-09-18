<?php
defined( 'ABSPATH' ) || exit;

/**
 * Query helpers: paged archive routing, search form placeholder,
 * and index fallbacks.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

// Search form: custom placeholder text.
add_filter(
	'get_search_form',
	function ( $form ) {
		return preg_replace(
			'/placeholder="[^"]*"/',
			'placeholder="Search the website…"',
			$form,
			1
		);
	}
);

// =============================================================================
// /page/N/ blog archive when a static front page is active.
//
// WordPress routes /page/N/ to ?page_id={front_page}&page=N (inner-page
// pagination of the static front page). We intercept those vars in the
// 'request' filter — which runs after URL parsing but before WP_Query is
// built — and convert them to a standard paged blog-archive query instead.
// A global flag then tells template_include to serve index.php.
// =============================================================================

add_filter(
	'request',
	function ( $vars ) {
		$front_id = (int) get_option( 'page_on_front' );
		if (
		$front_id
		&& isset( $vars['page'], $vars['page_id'] )
		&& (int) $vars['page_id'] === $front_id
		&& (int) $vars['page'] > 1
		) {
			$paged = (int) $vars['page'];
			unset( $vars['page'], $vars['page_id'] );
			$vars['paged']                   = $paged;
			$vars['post_type']               = 'post';
			$GLOBALS['ths_paged_blog_index'] = true;
		}
		return $vars;
	}
);

add_filter(
	'template_include',
	function ( $template ) {
		if ( ! empty( $GLOBALS['ths_paged_blog_index'] ) ) {
			$index = locate_template( 'index.php' );
			if ( $index ) {
				return $index;
			}
		}
		return $template;
	}
);

// =============================================================================
// Global sticky-post suppression.
//
// Only the most-viewed-articles block honours sticky posts — it reads
// get_option('sticky_posts') directly and merges them into its own ID list.
// Every other WP_Query (main or secondary) must ignore sticky so they don't
// get unexpected posts prepended.
// =============================================================================

add_action(
	'pre_get_posts',
	function ( WP_Query $q ) {
		if ( is_admin() ) {
			return;
		}
		$q->set( 'ignore_sticky_posts', true );
	}
);

// =============================================================================
// Listing query defaults.
// =============================================================================

add_action(
	'pre_get_posts',
	function ( WP_Query $q ) {
		if ( is_admin() || ! $q->is_main_query() ) {
			return;
		}
		if ( ! $q->is_home() && ! $q->is_archive() && ! $q->is_search() ) {
			return;
		}

		// Search public posts and pages, but exclude attachments and other types.
		if ( $q->is_search() ) {
			$q->set( 'post_type', array( 'post', 'page' ) );
		}

		// Archive/listing cards only use title, excerpt, thumbnail, author, date.
		// Skip the bulk meta-cache prime (ACF, Yoast, etc.) – saves one SELECT per page load.
		$q->set( 'update_post_meta_cache', false );

		// Category & topic archives: 8 posts per page (matching their browse sections).
		if ( $q->is_category() || $q->is_tax( 'topics' ) ) {
			$q->set( 'posts_per_page', 8 );
		}

	}
);
