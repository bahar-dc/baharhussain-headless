<?php
/**
 * Block/spacer/CSS utilities trait.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Custom;

defined( 'ABSPATH' ) || exit;

/**
 * Trait TraitBlockHelpers
 *
 * Provides block title, spacer, and CSS conversion helpers.
 */
trait TraitBlockHelpers {

	/**
	 * Getting the Post Data
	 *
	 * @param array  $data title data.
	 * @param string $class_name optional class name.
	 *
	 * @return void
	 */
	public static function the_block_title( $data, $class_name = '' ) {
		if ( isset( $data['title'] ) ) {
			$title        = $data['title'];
			$allowed_tags = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'p', 'span', 'div' );
			$title_tag    = in_array( strtolower( $data['title_tag'] ), $allowed_tags, true ) ? $data['title_tag'] : 'h2';

			if ( ! empty( $class_name ) ) {
				$sanitized_class_name = ' class="' . esc_attr( $class_name ) . '"';
			} else {
				$sanitized_class_name = '';
			}

			// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- tag_escape, esc_attr, and wp_kses_post handle escaping.
			echo '<' . tag_escape( $title_tag ) . $sanitized_class_name . '>' . wp_kses_post( $title ) . '</' . tag_escape( $title_tag ) . '>';
		}
	}

	/**
	 * Check if title is not empty
	 *
	 * @param array $data title data.
	 *
	 * @return boolean
	 */
	public static function is_block_title( $data ) {
		// Check if "title" key is set and not NULL.
		return ! empty( $data['title'] );
	}

	/**
	 * Getting the Post Data
	 *
	 * @param array  $spacer spacer array.
	 * @param string $position spacer position.
	 *
	 * @return void
	 */
	public static function the_spacer( $spacer, $position = 'top' ) {
		// Check if the spacer array contains 'top_spacer' and 'bottom_spacer'.
		if ( isset( $spacer['top_spacer'] ) ) {
			$top_spacer = $spacer['top_spacer'];
		} else {
			$top_spacer = '';
		}

		if ( isset( $spacer['bottom_spacer'] ) ) {
			$bottom_spacer = $spacer['bottom_spacer'];
		} else {
			$bottom_spacer = '';
		}

		// Check the value of the $topBott parameter and echo the appropriate spacer.
		if ( 'top' === $position ) {
			echo '<div class="' . esc_attr( $top_spacer ) . '"></div>';
		} elseif ( 'bottom' === $position ) {
			echo '<div class="' . esc_attr( $bottom_spacer ) . '"></div>';
		} else {
			echo 'Invalid value for $topBott parameter. Use "top" or "bottom".';
		}
	}

	/**
	 * Convert block style attributes to an inline CSS string.
	 *
	 * Translates Gutenberg typography settings (camelCase keys) to CSS properties.
	 *
	 * @param array $block Block attributes array.
	 * @return string Inline CSS string.
	 */
	public static function convert_to_css( $block ) {
		$typography = ( isset( $block['style']['typography'] ) ) ? $block['style']['typography'] : null;
		// Named font sizes → pixel values.
		$font_sizes = array(
			'small'   => '16px',
			'medium'  => '18px',
			'large'   => '20px',
			'x-large' => '26px',
		);
		$font_size  = ( isset( $block['fontSize'] ) ) ? $block['fontSize'] : null;
		$css        = '';
		if ( $typography ) {

			foreach ( $typography as $property => $value ) {
				$property = preg_replace( '/(?<!^)[A-Z]/', '-$0', $property );
				$css     .= $property . ': ' . $value . '; ';
			}
		}
		if ( $font_size ) {

			$css .= 'font-size:' . $font_sizes[ $font_size ];
		}
		return $css;
	}
}
