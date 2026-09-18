<?php
/**
 * ACF data helpers trait.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Custom;

defined( 'ABSPATH' ) || exit;

/**
 * Trait TraitAcfHelpers
 *
 * Provides ACF field escaping and default helpers.
 */
trait TraitAcfHelpers {

	/**
	 * Defaults For Theme.
	 *
	 * @param string $item_id ID of the item.
	 * @return array Array of $post_id, $fields, $option_fields, $queried_object.
	 */
	public static function defaults( $item_id = null ) {
		if ( $item_id ) {
			$post_id = $item_id;
		} else {

			$post_id = get_the_ID();
			if ( is_home() ) {
				$post_id = get_option( 'page_for_posts' );
			}
		}
		$queried_object = get_queried_object();
		$option_fields  = self::get_fields_escaped( 'option' );
		$fields         = self::get_fields_escaped( $post_id );

		return array( $post_id, $fields, $option_fields, $queried_object );
	}

	/**
	 * Helper function to get escaped field from ACF
	 * and also normalize values.
	 *
	 * @param string      $field_key     ACF key or 'option'.
	 * @param string|null $escape_method Escaper (e.g. 'esc_html') or null.
	 *
	 * @return mixed
	 */
	public static function get_fields_escaped( $field_key, $escape_method = 'esc_html' ) {
		// Memoize 'option' fields — identical for every call within a request.
		static $option_cache = array();
		$cache_key           = $field_key . '|' . ( is_string( $escape_method ) ? $escape_method : 'null' );
		if ( 'option' === $field_key && isset( $option_cache[ $cache_key ] ) ) {
			return $option_cache[ $cache_key ];
		}

		// Always initialize
		$field = null;

		// Only fetch if ACF is available
		if ( function_exists( 'get_fields' ) ) {
			$field = get_fields( $field_key ); // array|false|null
		}

		// Normalize falsy to empty string for scalar branch
		if ( false === $field || null === $field ) {
			$field = '';
		}

		// Decide escaper
		$escaper = is_string( $escape_method ) && is_callable( $escape_method )
			? $escape_method
			: null;

		// Arrays/objects: recurse and keep types
		if ( is_array( $field ) || is_object( $field ) ) {
			$field_escaped = array();

			foreach ( $field as $key => $value ) {
				if ( is_array( $value ) || is_object( $value ) ) {
					$field_escaped[ $key ] = self::get_sub_field_escaped( $value, $escaper );
				} else {
					$field_escaped[ $key ] = self::if_exist(
						null === $escaper ? $value : self::keep_types( $value, $escaper( $value ) )
					);
				}
			}

			if ( 'option' === $field_key ) {
				$option_cache[ $cache_key ] = $field_escaped;
			}

			return $field_escaped;
		}

		// Scalar: escape (optional) and return with original type
		$result = self::if_exist(
			null === $escaper ? $field : self::keep_types( $field, $escaper( $field ) )
		);

		if ( 'option' === $field_key ) {
			$option_cache[ $cache_key ] = $result;
		}

		return $result;
	}

	/**
	 * Helper function to get escaped field for a sub-field from ACF inside a parent
	 * and also normalize values.
	 *
	 * @param string $parent is the acf key name.
	 * @param string $escape_method is the method of escaping html.
	 *
	 * @return mixed
	 */
	private static function get_sub_field_escaped( $parent = null, $escape_method = 'esc_html' ) {
		$field = $parent;
		/* Check for null and falsy values and always return space */
		if ( false === $field || null === $field ) {
			$field = '';
		}

		/* Handle arrays */
		if ( is_array( $field ) || is_object( $field ) ) {
			$field_escaped = array();
			foreach ( $field as $key => $value ) {
				if ( is_array( $value ) || is_object( $value ) ) {
					// Preserve WP_Post and similar objects — re-escape each property individually.
					if ( is_object( $value ) ) {
						$obj = new \stdClass();

						foreach ( $value as $obj_k => $obj_v ) {

							$obj->$obj_k = self::if_exist( ( null === $escape_method ) ? $obj_v : self::keep_types( $obj_v, $escape_method( $obj_v ) ) );
						}
						$field_escaped[ $key ] = $obj;
					} else {
						$field_escaped[ $key ] = self::get_sub_field_escaped( $value, $escape_method );
					}
				} else {

					$field_escaped[ $key ] = self::if_exist( ( null === $escape_method ) ? $value : self::keep_types( $value, $escape_method( $value ) ) );
				}
			}
			return $field_escaped;
		} else {
			return self::if_exist( ( null === $escape_method ) ? $field : self::keep_types( $field, $escape_method( $field ) ) );
		}
	}

	/**
	 * Check if value exist
	 *
	 * @param mixed $value value to be checked.
	 *
	 * @return string
	 */
	public static function if_exist( $value ) {
		return ( isset( $value ) && '' !== $value && $value ) ? $value : null;
	}

	/**
	 * Retain the type value
	 *
	 * @param mixed $item value to be checked.
	 * @param mixed $value actual value that will be returned.
	 *
	 * @return mixed
	 */
	public static function keep_types( $item, $value ) {
		$type = gettype( $item );
		settype( $value, $type );
		return $value;
	}
}
