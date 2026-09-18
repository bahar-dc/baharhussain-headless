<?php
/**
 * Custom functions added to all projects
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Settings;

defined( 'ABSPATH' ) || exit;

/**
 * Template Class For Theme Settings
 *
 * Template Class
 *
 * @category Setting_Class
 * @package  Bahar Hussain Theme
 */
class THS_Settings {
	/**
	 * Define class Constructor
	 **/
	public function __construct() {
		add_filter( 'upload_mimes', array( $this, 'svg_upload_support' ) );
		add_filter( 'wp_handle_upload_prefilter', array( $this, 'sanitize_svg_upload' ) );
		add_filter( 'login_headerurl', array( $this, 'login_logo_url' ) );
		add_filter( 'wp_nav_menu_objects', array( $this, 'first_last_menu_classes' ) );
		add_filter( 'get_the_archive_title', array( $this, 'theme_archive_title' ) );

		add_action( 'login_head', array( $this, 'login_logo' ) );
		add_action( 'wp_head', array( $this, 'viewport' ) );

		add_filter( 'body_class', array( $this, 'add_custom_body_class' ) );

		add_filter( 'post_thumbnail_html', array( $this, 'post_thumbnail_fallback' ), 15, 5 );
		add_filter( 'wp_get_attachment_image', array( $this, 'wp_get_attachment_image_callback' ), 15, 5 );
	}



	/**
	 * Add Svg to default mime types
	 *
	 * @param array $mimes is the mime type in WordPress.
	 *
	 * @return array
	 */
	public function svg_upload_support( $mimes ) {
		$mimes['svg'] = 'image/svg+xml';
		return $mimes;
	}

	/**
	 * Sanitize SVG uploads by stripping dangerous elements and attributes.
	 *
	 * Blocks script tags, event handlers, xlink:href with javascript:,
	 * and other XSS vectors commonly found in malicious SVG files.
	 *
	 * @param array $file The uploaded file array from $_FILES.
	 * @return array The file array, possibly with an error set.
	 */
	public function sanitize_svg_upload( $file ) {
		if ( 'image/svg+xml' !== $file['type'] ) {
			return $file;
		}

		$svg_content = file_get_contents( $file['tmp_name'] );

		if ( false === $svg_content || empty( $svg_content ) ) {
			$file['error'] = __( 'SVG file is empty or could not be read.', 'baharhussain' );
			return $file;
		}

		// Block dangerous elements.
		$dangerous_elements = array( 'script', 'iframe', 'object', 'embed', 'foreignObject', 'set', 'animate', 'animateTransform', 'animateMotion' );
		foreach ( $dangerous_elements as $tag ) {
			if ( preg_match( '/<' . preg_quote( $tag, '/' ) . '[\s>\/]/i', $svg_content ) ) {
				$file['error'] = __( 'SVG contains a disallowed element: ', 'baharhussain' ) . esc_html( $tag );
				return $file;
			}
		}

		// Block event handler attributes (on*).
		if ( preg_match( '/\bon\w+\s*=/i', $svg_content ) ) {
			$file['error'] = __( 'SVG contains event handler attributes.', 'baharhussain' );
			return $file;
		}

		// Block javascript: protocol in href/xlink:href.
		if ( preg_match( '/(?:href|xlink:href)\s*=\s*["\']?\s*javascript\s*:/i', $svg_content ) ) {
			$file['error'] = __( 'SVG contains a javascript: URL.', 'baharhussain' );
			return $file;
		}

		// Block data: URIs (can embed scripts).
		if ( preg_match( '/(?:href|xlink:href|src)\s*=\s*["\']?\s*data\s*:/i', $svg_content ) ) {
			$file['error'] = __( 'SVG contains a data: URI.', 'baharhussain' );
			return $file;
		}

		return $file;
	}

	/**
	 * Remove default WordPress login logo link & set it to homepage of site
	 *
	 * @param string $url is logo url.
	 *
	 * @return url
	 */
	public function login_logo_url( $url ) {
		return '"' . home_url() . '"';
	}

	/**
	 * Add viewport meta tag in head
	 *
	 *  @return void
	 */
	public function viewport() {
		echo '
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		';
	}

	/**
	 * First and last menu item classes
	 *
	 *  @param string $items is menu item.
	 *
	 *  @return object
	 */
	public function first_last_menu_classes( $items ) {
		if ( $items ) {
			$items[1]->classes[]                 = 'first-menu-item';
			$items[ count( $items ) ]->classes[] = 'last-menu-item';
			return $items;
		}
		return $items;
	}

	/**
	 * Custom logo for WordPress login screen
	 *
	 * This function replaces the default WordPress logo on the login with website logo.
	 */
	public function login_logo() {
		echo '
			<style type="text/css">
				.login h1 a {
					background-image: url(' . esc_url( get_stylesheet_directory_uri() ) . '/assets/build/images/site-logo.svg) !important;
					background-position: center center;
					color:rgba(0, 0, 0, 0);
					background-size: 38%;
					height: 100px;
					width: 80%;
					outline: 0;
				}
			</style>
		';
	}

	/**
	 * Function to remove the starting words from the_archive_title()
	 *
	 * E.g. from Category : Dallas Neighborhoods => Dallas Neighborhoods
	 *
	 * @param string $title is the title of template.
	 *
	 *  @return string
	 */
	public function theme_archive_title( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = get_the_author_meta( 'display_name' );
		} elseif ( is_post_type_archive() ) {
			$title = post_type_archive_title( '', false );
		} elseif ( is_tax() ) {
			$title = single_term_title( '', false );
		}

		return $title;
	}

	/**
	 * Add custom class to single based on post type for styling.
	 *
	 * @param array $classes list of body classes.
	 *
	 * @return array
	 */
	public function add_custom_body_class( $classes ) {
		if ( is_single() ) {
			$classes[] = get_post_type() . '-detail-single';
		}
		return $classes;
	}

	/**
	 * Function to make size full a warning.
	 *
	 * @param string $html HTML of the image tag.
	 * @param int    $post_thumbnail_id thumbnail id.
	 * @param string $size thumbnail size.
	 * @param string $icon thumbnail icon.
	 * @param array  $attr array of image attributes.
	 *
	 * @return string
	 */
	public function wp_get_attachment_image_callback( $html, $post_thumbnail_id, $size, $icon, $attr ) {
		if ( 'full' === $size ) {
			trigger_error( 'You cannot use full as a size', E_USER_WARNING );
		}
		return $html;
	}
	/**
	 * Function to make size full a warning.
	 *
	 * @param string $html HTML of the image tag.
	 * @param int    $post_id thumbnail icon.
	 * @param int    $post_thumbnail_id thumbnail id.
	 * @param string $size thumbnail size.
	 * @param array  $attr array of image attributes.
	 *
	 * @return string
	 */
	public function post_thumbnail_fallback( $html, $post_id, $post_thumbnail_id, $size, $attr ) {
		if ( 'full' === $size ) {
			trigger_error( 'You cannot use full as a size', E_USER_WARNING );
		}
		return $html;
	}
}
