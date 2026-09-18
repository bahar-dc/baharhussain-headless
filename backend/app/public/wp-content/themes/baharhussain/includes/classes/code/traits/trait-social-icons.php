<?php
/**
 * Social icon rendering trait.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Custom;

defined( 'ABSPATH' ) || exit;

/**
 * Trait TraitSocialIcons
 *
 * Provides social icon SVG and link output helpers.
 */
trait TraitSocialIcons {

	/**
	 * Output Social Icons.
	 *
	 * @param array $social_icons Social icon array.
	 * @param bool  $output_type  True for inline SVG, false for img tag.
	 */
	public static function the_social_icons( $social_icons, $output_type = true ) {
		if ( $social_icons ) {
			foreach ( $social_icons as $social_icon ) {
				$acf_fc_layout = $social_icon['acf_fc_layout'];
				$svg_code      = self::get_social_svg( $acf_fc_layout );
				$svg_link      = self::get_social_link( $acf_fc_layout );
				$social_link   = $social_icon['social_link'];

				// Create a title and aria-label based on the social icon layout or link.
				$title      = 'Visit our ' . ucfirst( $acf_fc_layout ) . ' page';
				$aria_label = 'Link to our ' . ucfirst( $acf_fc_layout ) . ' page';

				if ( $social_link ) {
					echo '<a href="' . esc_url( $social_link ) . '" target="_blank" class="' . esc_html( $acf_fc_layout ) . ' flex-center" title="' . esc_attr( $title ) . '" aria-label="' . esc_attr( $aria_label ) . '">';
					if ( $output_type ) {

						// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- SVG markup from admin-only ACF field.
						echo $svg_code;
					} else {
						echo '<img height="20" width="20" src="' . esc_url( $svg_link ) . '" title="' . esc_attr( $title ) . '" alt="' . esc_attr( $title ) . '">';
					}
					echo '</a>';
				}
			}
		}
	}

	/**
	 * Output Social icon svg.
	 *
	 * @param string $key social icon array.
	 */
	public static function get_social_svg( $key ) {
		$allowed_keys = array( 'facebook', 'instagram', 'linkedin', 'pinterest', 'tiktok', 'twitter', 'vimeo', 'youtube' );
		if ( ! in_array( $key, $allowed_keys, true ) ) {
			return '';
		}
		$path = get_template_directory() . '/assets/build/images/social-icons/' . $key . '.svg';
		// phpcs:ignore WordPress.WP.AlternativeFunctions.file_get_contents_file_get_contents -- local file read for SVG icons.
		return file_get_contents( $path );
	}

	/**
	 * Output Social icon link.
	 *
	 * @param string $key social icon array.
	 */
	public static function get_social_link( $key ) {
		return get_template_directory_uri() . '/assets/build/images/social-icons/' . $key . '.svg';
	}
}
