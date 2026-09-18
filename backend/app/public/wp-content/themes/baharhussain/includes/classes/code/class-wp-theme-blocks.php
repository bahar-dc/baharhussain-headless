<?php
/**
 * Blocks related functions
 *
 * @link
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Blocks;

defined( 'ABSPATH' ) || exit;

use THS;

/**
 * Template Class For Blocks
 *
 * Template Class
 *
 * @category Setting_Class
 * @package  Bahar Hussain Theme
 */
class THS_Blocks {
	/**
	 * Define class Constructor
	 **/
	public function __construct() {
		add_action( 'init', array( $this, 'register_theme_blocks' ) );
	}

	/**
	 * A function in which all acf blocks are registered
	 *
	 *  @return void
	 */
	public function register_theme_blocks() {
		foreach ( self::get_folder_name( THS_BLOCK_DIR ) as $bh_block ) {
			register_block_type( THS_BLOCK_DIR . '/' . $bh_block );
		}

		$child_dynamic_blocks = array(
			array(
				'name'       => 'thspack/testimonials-item',
				'attributes' => array(
					'itemId' => array(
						'type'    => 'string',
						'default' => '',
					),
				),
			),
			array(
				'name'       => 'thspack/home-hero-item',
				'attributes' => array(
					'itemId' => array(
						'type'    => 'string',
						'default' => '',
					),
				),
			),
			array(
				'name'       => 'thspack/location-facilities-item',
				'attributes' => array(
					'itemId' => array(
						'type'    => 'string',
						'default' => '',
					),
				),
			),
			array(
				'name'       => 'thspack/theme-map-item',
				'attributes' => array(
					'lat' => array(
						'type'    => 'string',
						'default' => '',
					),
					'lng' => array(
						'type'    => 'string',
						'default' => '',
					),
				),
			),
		);
		foreach ( $child_dynamic_blocks as $child_dynamic_block ) {
			register_block_type(
				$child_dynamic_block['name'],
				array(
					'attributes'      => $child_dynamic_block['attributes'],
					'render_callback' => array( $this, 'block_plugin_render_block' ),
				)
			);
		}
	}
	/**
	 * Render callback for dynamic child blocks. Loads render-child.php from the block folder.
	 *
	 * @param array     $attributes Block attributes.
	 * @param string    $content    Inner block content.
	 * @param \WP_Block $block      The block instance.
	 * @return string Rendered block HTML.
	 */
	public function block_plugin_render_block( $attributes, $content, $block ) {
		ob_start();
		$folder_name = str_replace( '-item', '', explode( '/', $block->parsed_block['blockName'] )[1] ) ?? null;
		if ( $folder_name ) {
			$folder_path = THS_BLOCK_DIR . '/' . $folder_name . '/render-child.php';
			$real_path   = realpath( $folder_path );
			$real_base   = realpath( THS_BLOCK_DIR );
			// Prevent path traversal — only include if resolved path is within block dir.
			if ( $real_path && $real_base && 0 === strpos( $real_path, $real_base . DIRECTORY_SEPARATOR ) ) {
				include $folder_path;
			}
		}

		return ob_get_clean();
	}
	/**
	 * A function which is used to register a block
	 *
	 * @param string $directory is the name of the block.
	 *
	 *  @return string
	 */
	public static function get_folder_name( $directory ) {
		$folder_names = array();

		// Check if the directory exists.
		if ( is_dir( $directory ) ) {
			// Scan the directory and get the list of items.
			$items = scandir( $directory );

			// Loop through each item.
			foreach ( $items as $item ) {
				// Check if it is a directory and not "." or "..".
				if ( is_dir( $directory . '/' . $item ) && '.' !== $item && '..' !== $item ) {
					$folder_names[] = $item;
				}
			}
		}

		return $folder_names;
	}
}
