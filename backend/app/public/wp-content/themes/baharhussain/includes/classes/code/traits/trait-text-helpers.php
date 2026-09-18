<?php
/**
 * Text/content utilities trait.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Custom;

defined( 'ABSPATH' ) || exit;

/**
 * Trait TraitTextHelpers
 *
 * Provides button, excerpt, and text sanitization helpers.
 */
trait TraitTextHelpers {

	/**
	 * Helper function that builds button from ACF link object
	 *
	 * @param object $object is a acf button object.
	 * @param string $classes are the string of classes of acf button.
	 *
	 * @return string
	 */
	public static function button( $object, $classes = '' ) {
		if ( $object['url'] ) {
			$link  = '';
			$link  = "<a href='" . esc_url( $object['url'] ) . "'";
			$link .= " title='" . esc_html( $object['title'] ) . "'";
			$link .= " aria-label='" . esc_html( $object['title'] ) . "'";
			if ( '' !== $object['target'] && null !== $object['target'] ) {
				$link .= " target='" . esc_attr( $object['target'] ) . "'";
			}
			if ( '' !== $classes ) {
				$link .= " class='" . esc_attr( $classes ) . "'";
			}
			$link .= '><span>' . esc_html( $object['title'] ) . '</span></a>';
			return $link;
		}
		return null;
	}

	/**
	 * Excerpt Function
	 *
	 * @param number $count is a number of words needed in the excerpt
	 *
	 * Function used to create custom excerpt.
	 */
	public static function excerpt( $count ) {
		global $post;
		if ( has_excerpt() ) {

			$excerpt = get_the_excerpt();
			$excerpt = wp_strip_all_tags( $excerpt );
			$excerpt = substr( $excerpt, 0, $count );
			$excerpt = substr( $excerpt, 0, strripos( $excerpt, ' ' ) );
			$excerpt = $excerpt . ' ...';
			$excerpt = $excerpt;
			return $excerpt;
		}
		return '';
	}


	/**
	 * Excerpt with no read more option
	 *
	 * Function used to create custom excerpt.
	 * Uses manual excerpt if available, otherwise auto-generates excluding headings.
	 *
	 * @param number $count is a number of characters needed in the excerpt.
	 *
	 * @return string
	 */
	public static function excerpt_nomore( $count ) {
		global $post;

		$excerpt = '';

		// Priority 1: Use manually added excerpt if it exists.
		if ( has_excerpt() ) {
			$excerpt = get_the_excerpt();
		} else {
			// Priority 2: Auto-generate from post content, excluding headings.
			$content = get_the_content();

			// Remove heading blocks from content.
			$content = preg_replace( '/<!--\s*wp:heading[^>]*-->.*?<!--\s*\/wp:heading\s*-->/s', '', $content );

			$excerpt = wp_strip_all_tags( $content );
			$excerpt = strip_shortcodes( $excerpt );
		}

		// Additional cleanup: remove URLs
		$excerpt = preg_replace( '/https?:\/\/\S+/', '', $excerpt );
		$excerpt = preg_replace( '/\s+/', ' ', $excerpt ); // Collapse multiple spaces
		$excerpt = trim( $excerpt );

		// Truncate to character count if needed.
		if ( strlen( $excerpt ) > $count ) {
			$excerpt    = substr( $excerpt, 0, $count );
			$last_space = strripos( $excerpt, ' ' );
			if ( false !== $last_space ) {
				$excerpt = substr( $excerpt, 0, $last_space );
			}
		}

		return $excerpt;
	}

	/**
	 * Return escaped string
	 *
	 * @param string $string string to decode.
	 *
	 * @return string
	 */
	public static function html_entity_remove( $string ) {
		return sanitize_text_field( $string );
	}

	/**
	 * Recursive sanitation for an array
	 *
	 * @param array $array array data.
	 *
	 * @return mixed
	 */
	public static function recursive_sanitize_text_field( $array ) {
		foreach ( $array as $key => &$value ) {
			if ( is_array( $value ) || is_object( $value ) ) {
				$value = self::recursive_sanitize_text_field( $value );
			} else {
				$value = sanitize_text_field( $value );
			}
		}

		return $array;
	}
}
