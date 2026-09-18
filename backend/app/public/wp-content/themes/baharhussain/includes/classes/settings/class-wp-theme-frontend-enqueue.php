<?php
/**
 * Functions for editor styles
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Frontend;

defined( 'ABSPATH' ) || exit;

use THS;

class Frontend_Assets_Loader {

	/** Register front-end enqueue hook. */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'load_frontend_assets' ) );
		add_action( 'gform_enqueue_scripts', array( $this, 'load_form_tracking' ), 10, 0 );
	}

	/** Enqueue front-end CSS/JS and remove unneeded defaults. */
	public function load_frontend_assets() {
		THS::enqueue_style( 'assets/build/css/style-frontend.min.css' );

		if ( is_single() ) {
			THS::enqueue_style( 'assets/build/css/style-single.min.css' );
		}

		if ( is_page() ) {
			THS::enqueue_style( 'assets/build/css/style-page.min.css' );
		}

		if ( is_404() ) {
			THS::enqueue_style( 'assets/build/css/style-error-page.min.css' );
		}

		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		if ( ! is_admin() && ! is_user_logged_in() ) {
			wp_deregister_style( 'dashicons' );
		}

		// Stats counter — registered only; enqueued automatically by WordPress when
		// ths/stats-boxes, ths/stats-rows, or ths/hero-advertise blocks appear on the page.
		$stats_counter_path = get_template_directory() . '/assets/build/js/script-stats-counter.min.js';
		wp_register_script(
			'wp-theme-stats-counter',
			get_template_directory_uri() . '/assets/build/js/script-stats-counter.min.js',
			array(),
			file_exists( $stats_counter_path ) ? filemtime( $stats_counter_path ) : null,
			array( 'in_footer' => true, 'strategy' => 'defer' )
		);

		// Post slider — registered only; auto-enqueued by WordPress when any of the
		// 10 post-slider blocks appear. Also conditionally enqueued below for PHP
		// partials (post-related-slider, category-trending, topics-*) that render
		// slider HTML without a block wrapper.
		$post_slider_path = get_template_directory() . '/assets/build/js/script-post-slider.min.js';
		wp_register_script(
			'wp-theme-post-slider',
			get_template_directory_uri() . '/assets/build/js/script-post-slider.min.js',
			array(),
			file_exists( $post_slider_path ) ? filemtime( $post_slider_path ) : null,
			array( 'in_footer' => true, 'strategy' => 'defer' )
		);

		// Core scripts — loaded on every page (navigation, sticky header, dark mode, etc.).
		// No jQuery dependency — all core scripts converted to vanilla JS.
		THS::enqueue_script(
			'assets/build/js/script-core.min.js',
			array(),
			args: array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);

		// Author page scripts — show-more bio toggle.
		if ( is_author() ) {
			THS::enqueue_script(
				'assets/build/js/script-author.min.js',
				array(),
				args: array(
					'in_footer' => true,
					'strategy'  => 'defer',
				)
			);
		}

		// TOC + heading scroll + comment reply scroll.
		if ( is_singular( 'post' ) ) {
			THS::enqueue_script(
				'assets/build/js/script-toc.min.js',
				array(),
				args: array(
					'in_footer' => true,
					'strategy'  => 'defer',
				)
			);
		}

		// Post slider — PHP partials (not blocks) that render slider HTML directly.
		// Block-based sliders get this via "viewScript": "wp-theme-post-slider" in block.json.
		if ( is_singular( 'post' ) || is_category() || is_tax( 'topics' ) ) {
			wp_enqueue_script( 'wp-theme-post-slider' );
		}

	}

	/** Enqueue GA4 tracking whenever Gravity Forms loads a form. */
	public function load_form_tracking() {
		if ( is_admin() ) {
			return;
		}

		THS::enqueue_script(
			'assets/build/js/script-form-tracking.min.js',
			array( 'jquery' ),
			args: array(
				'in_footer' => true,
				'strategy'  => 'defer',
			)
		);
	}
}
