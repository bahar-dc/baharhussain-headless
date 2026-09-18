<?php
/**
 * Post Card Tags helper.
 *
 * Returns the display terms for a post card, always aiming for 3 tags
 * in the fixed order: category → topic → tag.
 *
 * Categories fill any empty slots (topic/tag missing), but topic and
 * tag are each limited to 1.
 *
 * @package Bahar Hussain Theme
 * @since 1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Derive a deterministic CSS colour class from a term ID.
 *
 * Returns one of 'tag-1' through 'tag-12', evenly distributed
 * by modulo arithmetic — no database query required.
 *
 * @param int $term_id Term ID.
 * @return string CSS class, e.g. 'tag-5'.
 */
function ths_get_term_color( $term_id ) {
	return 'tag-' . ( ( absint( $term_id ) % 12 ) + 1 );
}

/**
 * Get the ordered array of terms to display in a post card tag bar.
 *
 * Each element is an object with ->term_id, ->name, plus the resolved
 * link and colour class added as custom properties:
 *   ->display_link  (string)  Term archive URL.
 *   ->display_color (string)  CSS colour class from term meta.
 *
 * @param int $post_id Post ID.
 * @return array Array of term objects (max 3).
 */
function ths_get_post_card_tags( $post_id ) {
	$target = 3;

	// ── 1. Gather candidate terms per taxonomy ──────────────────────────
	$category_terms = ths_pct_pick_terms( $post_id, 'category', $target );
	$topic_terms    = ths_pct_pick_terms( $post_id, 'topics', 1 );
	$tag_terms      = ths_pct_pick_terms( $post_id, 'post_tag', 1 );

	// ── 2. Slot allocation ──────────────────────────────────────────────
	$topic_count = count( $topic_terms ); // 0 or 1
	$tag_count   = count( $tag_terms );   // 0 or 1
	$cat_slots   = $target - $topic_count - $tag_count;

	$categories = array_slice( $category_terms, 0, max( $cat_slots, 0 ) );

	// ── 3. Assemble in order: categories, topic, tag ────────────────────
	$result = array_merge( $categories, $topic_terms, $tag_terms );

	// Decorate each term with link + colour.
	foreach ( $result as $term ) {
		$term->display_link  = get_term_link( $term );
		$term->display_color = ths_get_term_color( $term->term_id );
	}

	return $result;
}

/**
 * Pick display terms for a single taxonomy, primary first.
 *
 * @param int    $post_id  Post ID.
 * @param string $taxonomy Taxonomy slug.
 * @param int    $limit    Max terms to return.
 * @return array Array of WP_Term objects.
 */
function ths_pct_pick_terms( $post_id, $taxonomy, $limit ) {
	if ( ! taxonomy_exists( $taxonomy ) ) {
		return array();
	}

	$terms = get_the_terms( $post_id, $taxonomy );
	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		return array();
	}

	// Put the Yoast primary term first if set.
	$primary_id = get_post_meta( $post_id, '_yoast_wpseo_primary_' . $taxonomy, true );
	if ( $primary_id ) {
		usort(
			$terms,
			function ( $a, $b ) use ( $primary_id ) {
				if ( (int) $a->term_id === (int) $primary_id ) {
					return -1;
				}
				if ( (int) $b->term_id === (int) $primary_id ) {
					return 1;
				}
				return 0;
			}
		);
	}

	return array_slice( $terms, 0, $limit );
}

/**
 * Get all terms for a post grouped by taxonomy for the sidebar display.
 *
 * Returns an associative array keyed by taxonomy label, each containing
 * an array of decorated term objects (->name, ->display_link, ->display_color).
 * Empty taxonomies are omitted.
 *
 * @param int $post_id Post ID.
 * @return array { 'Categories' => [ terms ], 'Topics' => [ terms ], 'Tags' => [ terms ] }
 */
function ths_get_sidebar_tags( $post_id ) {
	$groups = array(
		'Categories' => 'category',
		'Topics'     => 'topics',
		'Tags'       => 'post_tag',
	);

	$result = array();

	foreach ( $groups as $label => $taxonomy ) {
		$terms = ths_pct_pick_terms( $post_id, $taxonomy, PHP_INT_MAX );
		if ( empty( $terms ) ) {
			continue;
		}
		foreach ( $terms as $term ) {
			$term->display_link  = get_term_link( $term );
			$term->display_color = ths_get_term_color( $term->term_id );
		}
		$result[ $label ] = $terms;
	}

	return $result;
}
