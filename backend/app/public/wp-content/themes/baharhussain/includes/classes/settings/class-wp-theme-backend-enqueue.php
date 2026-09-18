<?php
/**
 * Setup function for the project
 *
 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Script;

defined( 'ABSPATH' ) || exit;

use THS;

/**
 * Theme assets
 *
 * Define variable to store asset directory folder in it.
 *
 * That can be used afterward to call stylesheet / scripts etc
 */

// Time format for the_time().
define( 'THS_PROJECT_DTFORMAT', 'F j, Y' );

/**
 * Theme assets
 *
 * Enqueue and Dequeue required files
 */

class THS_Scripts {
	/**
	 * Define class Constructor
	 **/
	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_ui_assets' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_ui_js' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_canvas_styles' ) );
		add_action( 'after_setup_theme', array( $this, 'enable_editor_global' ) );
		// add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_shell_js' ) );
	}

	/**
	 * ✅ Enqueue Editor Assets for Block Editor (iframe preview)
	 *
	 * @return void
	 */

	public function enable_editor_global() {
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/build/css/style-global.min.css' );
	}

	/**
	 * Enqueue WP Admin UI assets
	 * (Dashboard, Inspector sidebar, meta boxes)
	 */
	public function enqueue_admin_ui_assets() {
		THS::enqueue_style( 'assets/build/css/style-admin.min.css' );
	}


	/**
	 * ✅ Enqueue Editor Assets for Block Editor (iframe preview)
	 *
	 * @return void
	 */

	public function enqueue_editor_canvas_styles() {
		$editor_style_path = get_template_directory() . '/assets/build/css/style-editor.min.css';

		if ( file_exists( $editor_style_path ) ) {
			wp_enqueue_style(
				'ths-editor-canvas-style',
				get_template_directory_uri() . '/assets/build/css/style-editor.min.css',
				array(),
				filemtime( $editor_style_path )
			);
		}
	}

	public function enqueue_admin_ui_js() {
		$path = get_template_directory() . '/assets/build/js/script-admin.min.js';
		if ( ! file_exists( $path ) ) {
			return;
		}
		wp_enqueue_script(
			'ths-admin-js',
			get_template_directory_uri() . '/assets/build/js/script-admin.min.js',
			array( 'jquery' ),
			filemtime( $path ),
			true
		);
	}
}
