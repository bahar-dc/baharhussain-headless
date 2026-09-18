<?php
defined( 'ABSPATH' ) || exit;

/**
 * Block category registration.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

// Custom block categories.
add_filter(
	'block_categories_all',
	function ( $categories, $post ) {
		$custom_categories = array(
			array(
				'slug'  => 'ths-articles',
				'title' => __( '1. Bahar Hussain - Articles', 'baharhussain' ),
			),
			array(
				'slug'  => 'ths-pages',
				'title' => __( '2. Bahar Hussain - Pages', 'baharhussain' ),
			),
			array(
				'slug'  => 'ths-heroes',
				'title' => __( '3. Bahar Hussain - Heroes', 'baharhussain' ),
			),
			array(
				'slug'  => 'ths-home',
				'title' => __( '4. Bahar Hussain - Home', 'baharhussain' ),
			),
			array(
				'slug'  => 'ths-originals',
				'title' => __( '5. Bahar Hussain - Originals', 'baharhussain' ),
			),
			array(
				'slug'  => 'ths-recommends',
				'title' => __( '6. Bahar Hussain - Recommends', 'baharhussain' ),
			),
		);

		$categories = array_merge( $custom_categories, $categories );

		return $categories;
	},
	10,
	2
);
