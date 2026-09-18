<?php
/**
 * Setup function for the project
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Setup;

defined( 'ABSPATH' ) || exit;

/**
 * Template Class For Theme Setup
 *
 * Template Class
 *
 * @category Setting_Class
 * @package  Bahar Hussain Theme
 */
class THS_Setup {
	/**
	 * Define class Constructor
	 **/
	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'setup_function' ) );
	}

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	public function setup_function() {
		// Make theme available for translation.
		load_theme_textdomain( 'baharhussain' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for RSS Feed.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Add custom thumbnail sizes for frontend theme.
		add_image_size( 'thumb_1680', 1680 );
		add_image_size( 'thumb_1280', 1280 );
		add_image_size( 'thumb_960', 960 );
		add_image_size( 'thumb_660', 660 );
		add_image_size( 'thumb_440', 440 );
		add_image_size( 'thumb_320', 320 );

		// Register wp_nav_menu() menus.
		register_nav_menus(
			array(
				'header-nav'     => __( 'Header Nav', 'baharhussain' ),
				'footer-nav'     => __( 'Footer Nav', 'baharhussain' ),
				'footer-nav-two' => __( 'Footer Nav Two', 'baharhussain' ),
				'legal-nav'      => __( 'Legal Nav', 'baharhussain' ),
			)
		);

		// Add HTML5 theme support for required functionalities.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		// Align support for Gutenberg - Enabling theme support for align full and align wide option for the block editor.
		add_theme_support( 'align-wide' );

		// Convert all generated thumbnails to WebP regardless of upload format.
		add_filter(
			'image_editor_output_format',
			function ( $formats ) {
				$formats['image/jpeg'] = 'image/webp';
				$formats['image/jpg']  = 'image/webp'; // non-standard but occasionally used
				$formats['image/png']  = 'image/webp';
				$formats['image/gif']  = 'image/webp';
				$formats['image/bmp']  = 'image/webp';
				return $formats;
			}
		);

		// Set WebP and JPEG quality to 90%.
		add_filter(
			'wp_editor_set_quality',
			function ( $quality, $mime_type ) {
				if ( in_array( $mime_type, array( 'image/webp', 'image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp' ), true ) ) {
					return 95;
				}
				return $quality;
			},
			10,
			2
		);

		// Scale down uploaded images to max 1920px.
		add_filter(
			'big_image_size_threshold',
			function () {
				return 1920;
			}
		);

		// Remove unnecessary image sizes registered by plugins/core.
		add_action(
			'init',
			function () {
				remove_image_size( 'gform-image-choice-sm' );
				remove_image_size( 'gform-image-choice-md' );
				remove_image_size( 'gform-image-choice-lg' );
				remove_image_size( '1536x1536' );
				remove_image_size( '2048x2048' );
			}
		);

		// Suppress generation of unused sizes on upload.
		// intermediate_image_sizes_advanced filters the associative array WP uses
		// to decide which sizes to generate — unset here = never generated.
		add_filter(
			'intermediate_image_sizes_advanced',
			function ( $sizes ) {
				unset( $sizes['medium'] );
				unset( $sizes['medium_large'] );
				unset( $sizes['large'] );
				unset( $sizes['1536x1536'] );
				unset( $sizes['2048x2048'] );
				return $sizes;
			}
		);
		// intermediate_image_sizes filters the flat array returned by
		// get_intermediate_image_sizes() — used by Regenerate Thumbnails,
		// compression plugins, and similar tools to list/regenerate sizes.
		add_filter(
			'intermediate_image_sizes',
			function ( $sizes ) {
				return array_values( array_diff( $sizes, array( 'medium', 'medium_large', 'large', '1536x1536', '2048x2048' ) ) );
			}
		);

		// Use thumb_1280 for the editor featured image preview.
		add_filter(
			'admin_post_thumbnail_size',
			function () {
				return 'thumb_1280';
			}
		);

		// Replace default image size labels in the block editor Image block dropdown
		// with the theme's custom thumb_* sizes.
		add_filter(
			'image_size_names_choose',
			function ( $sizes ) {
				// Remove default sizes that are deregistered.
				unset( $sizes['medium'] );
				unset( $sizes['medium_large'] );
				unset( $sizes['large'] );
				unset( $sizes['1536x1536'] );
				unset( $sizes['2048x2048'] );

				// Add theme sizes with human-readable labels.
				$sizes['thumb_320']  = __( 'Small (320px)', 'baharhussain' );
				$sizes['thumb_440']  = __( 'Small-Medium (440px)', 'baharhussain' );
				$sizes['thumb_660']  = __( 'Medium (660px)', 'baharhussain' );
				$sizes['thumb_960']  = __( 'Medium-Large (960px)', 'baharhussain' );
				$sizes['thumb_1280'] = __( 'Large (1280px)', 'baharhussain' );
				$sizes['thumb_1680'] = __( 'Extra Large (1680px)', 'baharhussain' );

				return $sizes;
			}
		);

		// Gutenberg's PostFeaturedImage component hardcodes looking for a size
		// named "large" in the REST API response. Since we removed the default
		// large size, alias thumb_1280 as "large" in REST only (block editor).
		// Note: wp_prepare_attachment_for_js is intentionally NOT filtered here
		// because it affects the Media Library grid/modal and causes oversized thumbnails.
		add_filter(
			'rest_prepare_attachment',
			function ( $response ) {
				$data = $response->get_data();
				if ( ! empty( $data['media_details']['sizes']['thumb_1280'] ) ) {
					// Alias thumb_1280 as "large" — required by Gutenberg's PostFeaturedImage
					// component which hardcodes looking for "large" in the REST response.
					if ( empty( $data['media_details']['sizes']['large'] ) ) {
						$data['media_details']['sizes']['large'] = $data['media_details']['sizes']['thumb_1280'];
					}
					// Alias thumb_1280 as "post-thumbnail" — Gutenberg uses this size for the
					// featured image sidebar panel preview. Without it, falls back to thumbnail (150px).
					if ( empty( $data['media_details']['sizes']['post-thumbnail'] ) ) {
						$data['media_details']['sizes']['post-thumbnail'] = $data['media_details']['sizes']['thumb_1280'];
					}
					$response->set_data( $data );
				}
				return $response;
			}
		);

		// After all intermediate sizes are generated, delete the original non-WebP source
		// file so only WebP variants remain on the server, and correct the mime type in DB.
		//
		// WP by design: keeps the raw upload as _wp_original_image (recovery backup) and
		// records post_mime_type as the original upload format, not the converted format.
		// We deliberately override both since the site is WebP-only.
		//
		// Three cases handled:
		//   (a) Main file already .webp (image_editor_output_format converted it):
		//       Fix post_mime_type to image/webp. Delete original backup if present.
		//   (b) Main file still JPEG/PNG (edge case — image editor unavailable for source):
		//       Convert to WebP, update paths + mime type, delete original.
		add_filter(
			'wp_generate_attachment_metadata',
			function ( $metadata, $attachment_id ) {
				$mime = get_post_mime_type( $attachment_id );
				if ( ! in_array( $mime, array( 'image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/bmp' ), true ) ) {
					return $metadata;
				}

				$upload_dir = wp_upload_dir();
				$base_dir   = $upload_dir['basedir'];

				// Delete the original non-WebP file stored as _wp_original_image backup.
				// _wp_original_image stores only the BASENAME (e.g. "photo.jpeg"), so we use
				// wp_get_original_image_path() which correctly resolves it via dirname( attached_file ).
				$original_path = wp_get_original_image_path( $attachment_id );
				if ( $original_path && file_exists( $original_path ) ) {
					wp_delete_file( $original_path );
				}
				delete_post_meta( $attachment_id, '_wp_original_image' );

				$file = get_attached_file( $attachment_id );
				if ( ! $file ) {
					return $metadata;
				}

				$ext = strtolower( pathinfo( $file, PATHINFO_EXTENSION ) );

				// Case (a): main file is already WebP — fix mime type and clear original_image
				// from the metadata array (stored in _wp_attachment_metadata) so no JPEG
				// reference remains in the DB.
				if ( 'webp' === $ext ) {
					wp_update_post(
						array(
							'ID'             => $attachment_id,
							'post_mime_type' => 'image/webp',
						)
					);
					unset( $metadata['original_image'] );
					return $metadata;
				}

				if ( ! file_exists( $file ) ) {
					return $metadata;
				}

				// Case (b): main file still JPEG/PNG — convert, update paths, delete original.
				$editor = wp_get_image_editor( $file );
				if ( is_wp_error( $editor ) ) {
					return $metadata;
				}

				$webp_path = preg_replace( '/\.(jpe?g|png)$/i', '.webp', $file );
				$saved     = $editor->save( $webp_path, 'image/webp' );
				if ( is_wp_error( $saved ) ) {
					return $metadata;
				}

				$relative = ltrim( str_replace( $base_dir, '', $webp_path ), '/\\' );
				update_attached_file( $attachment_id, $webp_path );
				wp_update_post(
					array(
						'ID'             => $attachment_id,
						'post_mime_type' => 'image/webp',
					)
				);
				if ( isset( $metadata['file'] ) ) {
					$metadata['file'] = $relative;
				}
				unset( $metadata['original_image'] );
				wp_delete_file( $file );

				return $metadata;
			},
			20,
			2
		);
	}
}
