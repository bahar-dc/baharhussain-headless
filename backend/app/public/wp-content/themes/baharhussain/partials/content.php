<?php
defined( 'ABSPATH' ) || exit;

/**
 * Template part for displaying the_content() function
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

the_content(
	sprintf(
		wp_kses(
		/* translators: %s: Name of current post. Only visible to screen readers */
			__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'baharhussain' ),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),
		get_the_title()
	)
);
wp_link_pages(
	array(
		'before' => '<div class="page-links">' . __( 'Pages:', 'baharhussain' ),
		'after'  => '</div>',
	)
);
