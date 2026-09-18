<?php
/**
 * YouTube embed utilities trait.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Custom;

defined( 'ABSPATH' ) || exit;

/**
 * Trait TraitYoutubeHelpers
 *
 * Provides YouTube ID/URL parsing and advance video/form output.
 */
trait TraitYoutubeHelpers {

	/**
	 * Youtube id handler.
	 *
	 * Possible Combination are following.
	 *
	 * https://youtu.be/osCyC2whgW8
	 * https://www.youtube.com/watch?v=osCyC2whgW8
	 * https://www.youtube.com/embed/osCyC2whgW8
	 *
	 * @param string $url facebook url.
	 *
	 * @return string
	 */
	public static function youtube_id( $url ) {
		if ( str_contains( $url, 'youtu.be' ) ) {
			$youtube_id = explode( '/', $url )[ count( explode( '/', $url ) ) - 1 ];
		} elseif ( str_contains( $url, 'youtube.com' ) && str_contains( $url, 'watch' ) ) {
			$youtube_id = explode( '=', $url )[1];
		} elseif ( str_contains( $url, 'youtube.com' ) && str_contains( $url, 'embed' ) ) {
			$youtube_id = explode( '/', $url )[ count( explode( '/', $url ) ) - 1 ];
		} else {
			$youtube_id = 0;
		}
		return $youtube_id;
	}

	/**
	 * Youtube url handler.
	 *
	 * Possible Combination are following.
	 *
	 * https://youtu.be/osCyC2whgW8
	 * https://www.youtube.com/watch?v=osCyC2whgW8
	 * https://www.youtube.com/embed/osCyC2whgW8
	 *
	 * @param string $url facebook url.
	 *
	 * @return string
	 */
	public static function youtube_url( $url ) {
		if ( 0 === self::youtube_id( $url ) ) {
			$youtube_url = 'Wrong Url';
		} else {
			$youtube_url = 'https://www.youtube.com/watch?v=' . self::youtube_id( $url );
		}
		return $youtube_url;
	}

	/**
	 * Advance Video field output.
	 *
	 * @param array $video Video ACF field data.
	 *
	 * @return string
	 */
	public static function advance_video( $video ) {
		return '';
	}

	/**
	 * Output advance form ACF field data.
	 *
	 * @param array $form Form ACF field data.
	 *
	 * @return string
	 */
	public static function advance_form( $form ) {
		$bh_form_provider = $form['form_provider'] ?? null;
		if ( 'gform' === $form['form_provider'] ) {
			$bh_gform = $form['gform'] ?? null;
			if ( $bh_gform ) {
				echo do_shortcode( '[gravityform id="' . $bh_gform . '" title="false" description="false" ajax="true"]' );
			}
		} else {
			$bh_hubspot = $form['hubspot'] ?? null;
			if ( $bh_hubspot ) {
				// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- admin-only ACF HubSpot tracking snippet.
				echo $bh_hubspot;
			}
		}
		return '';
	}
}
