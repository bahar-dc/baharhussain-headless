<?php
/**
 * Boilerplate Class.
 *
 * @link
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Boilerplate;

defined( 'ABSPATH' ) || exit;

use THS;
/**
 * Template Class For Custom
 *
 * Template Class
 *
 * @category Setting_Class
 * @package  Bahar Hussain Theme
 */
class THS_Boilerplate {

	/**
	 * Block Render Boilerplate.
	 *
	 * @param array $block block data.
	 * @param mixed $callback_function callback function.
	 */
	public static function block( $block, $callback_function ) {
		// Unpack block defaults: unique ID, ACF fields, and global option fields.
		list( $bh_block_id, $bh_block_fields, $bh_option_fields ) = THS::defaults( $block['id'] );

		// Set the block name for it's ID & class from it's file name.
		$bh_block_name   = $block['name'];
		$bh_block_name   = str_replace( 'acf/', '', $bh_block_name );
		$bh_block_styles = THS::convert_to_css( $block );
		// Set the preview thumbnail for this block for gutenberg editor view.
		if ( isset( $block['data']['preview'] ) && 'preview' === $block['mode'] && isset( $block['data']['preview'] ) ) {
			$version = filemtime( get_template_directory() . '/blocks/' . $bh_block_name . '/' . $block['data']['preview'] );
			echo '<img src="' . esc_url( get_template_directory_uri() . '/blocks/' . $bh_block_name . '/' . $block['data']['preview'] ) . '?v=' . esc_html( $version ) . '" alt="' . esc_attr( $bh_block_name . ' block preview' ) . '" style="width:100%; height:auto;">';
		}

		// create align class ("alignwide") from block setting ("wide").
		$bh_var_align_class = $block['align'] ? 'align' . $block['align'] : '';

		// Get the class name for the block to be used for it.
		$bh_var_class_name = ( isset( $block['className'] ) ) ? $block['className'] : null;

		// Making the unique ID for the block.
		$bh_block_html_id = 'block-' . $bh_block_name . '-' . $block['id'];

		// Making the unique ID for the block.
		if ( $block['name'] ) {
			$bh_block_name = $block['name'];
			$bh_block_name = str_replace( '/', '-', $bh_block_name );
			$bh_var_name   = 'block-' . $bh_block_name;
		}
		echo '<div id="' . esc_html( $bh_block_html_id ) . '" class="' . esc_html( $bh_var_align_class . ' ' . $bh_var_class_name . ' ' . $bh_var_name ) . ' block-' . esc_html( $bh_block_name ) . '" style="' . esc_html( $bh_block_styles ) . '"> ';

		// Render: spacer-top → block callback → spacer-bottom.
		$spacers = self::get_spacer( $bh_block_fields );
		THS::the_spacer( $spacers, 'top' );
		$callback_function( $bh_block_id, $bh_block_name, $bh_block_fields, $bh_option_fields );
		THS::the_spacer( $spacers, 'bottom' );
		echo '</div>';
		wp_enqueue_script( 'wp-theme-' . str_replace( 'acf-', '', $bh_block_name ) );
	}
	/**
	 * Query Boilerplate.
	 *
	 * @param array $args Arguments for the WP_Query.
	 * @param array $display_args Display arguments for the WP_Query.
	 * @param array $html_args HTML arguments for the WP_Query.
	 * @param array $pagination_fun HTML arguments for the WP_Query.
	 */
	public static function query( $args = array(), $display_args = array(), $html_args = array(), $pagination_fun = 'pagination' ) {
		if ( $args ) {
			return self::custom_query( $args, $display_args, $html_args, $pagination_fun );
		} else {
			global $wp_query;
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					// Include specific template for the content.
					if ( is_search() || is_archive() ) {
						get_template_part( 'partials/content-archive', get_post_type() );
					} elseif ( is_single() ) {
						get_template_part( 'partials/content', get_post_type() );
					} else {
						get_template_part( 'partials/content', 'page' );
					}
				}
			} else {
				// If no content, include the "No posts found" template.
				get_template_part( 'partials/content', 'none' );
			}
			return $wp_query;
		}
		wp_reset_postdata();
	}

	/**
	 * Query Boilerplate.
	 *
	 * @param array $args Arguments for the WP_Query.
	 * @param array $display_args Display arguments for the WP_Query.
	 * @param array $html_args HTML arguments for the WP_Query.
	 * @param array $pagination_fun HTML arguments for the WP_Query.
	 */
	private static function custom_query( $args, $display_args = array(), $html_args = array(), $pagination_fun = 'pagination' ) {
		$post_type = $args['post_type'] ?? null;
		if ( $post_type ) {

			$args['posts_per_page'] = ( isset( $args['posts_per_page'] ) && -1 === $args['posts_per_page'] ) ? $args['posts_per_page'] : ( ( 'post' === $post_type ) ? get_option( 'posts_per_page' ) : get_option( $post_type . '_per_page' ) );
			$args['paged']          = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
			$pagination             = true;
			if ( $display_args ) {
				// Override query order/limit based on display type (random, recent, custom, menu_order).
				list($type, $option, $pagination) = $display_args;

				if ( 'random' === $type ) {
					$args['orderby']        = 'rand';
					$args['order']          = 'DESC';
					$args['posts_per_page'] = $option;
				}
				if ( 'recent' === $type ) {
					$args['orderby']        = 'date';
					$args['order']          = 'DESC';
					$args['posts_per_page'] = $option;
				}
				if ( 'custom' === $type ) {
					$args['post__in'] = $option;
				}
				if ( 'menu_order' === $type ) {
					$args['orderby']        = 'menu_order';
					$args['order']          = 'ASC';
					$args['posts_per_page'] = $option;
				}
			}

			// Convert column count to word (e.g. 3 → "three") for CSS class.
			$columns        = 3;
			$classes        = '';
			$number_formate = new \NumberFormatter( 'en', \NumberFormatter::SPELLOUT );
			if ( $html_args ) {
				list($columns, $classes) = $html_args;
			}
			$columns  = $number_formate->format( $columns );
			$classes .= ' ' . $post_type . '-archive ' . $columns . '-columns';
			echo '<div class="' . esc_html( $classes ) . '">';
			$render_fun    = $args['render'] ?? null;
			$template      = $args['template'] ?? null;
			$template_none = $args['template_none'] ?? 'partials/content-none';
			unset( $args['render'] );
			unset( $args['template'] );
			unset( $args['template_none'] );
			// The Query.
			$query = new \WP_Query( $args );

			// The Loop.
			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();
					$bh_var_post_id = get_the_ID();

					list( $bh_var_post_id, $bh_fields, $bh_option_fields ) = THS::defaults( $bh_var_post_id );
					// Include specific template for the content.
					if ( isset( $template ) ) {
						get_template_part( 'partials/content', $template );
					} else {
						$render_fun( $bh_var_post_id, $bh_fields, $bh_option_fields );
					}
				}
			} else {
				// If no content, include the "No posts found" template.
				get_template_part( 'partials/content', $template_none );
			}
			echo '</div>';
			if ( $query->have_posts() && $query->max_num_pages > 1 && $pagination ) {
				echo '<div class="s-48"></div><div class="center-align">';
				THS::$pagination_fun( $query->max_num_pages );
				echo '</div>';
			}
			return $query;
		}
		return null;
	}

	/**
	 * Helper Function
	 *
	 * @param mixed $bh_block_fields block fields data.
	 *
	 * @return array
	 */
	private static function get_spacer( $bh_block_fields ) {
		if ( $bh_block_fields ) {
			foreach ( $bh_block_fields as $bh_block_field ) {
				if ( is_array( $bh_block_field ) ) {
					foreach ( $bh_block_field as $bh_key => $bh_block_sub_field ) {
						if ( 'top_spacer' === $bh_key || 'bottom_spacer' === $bh_key ) {
							return $bh_block_field;
						}
					}
				}
			}
		}
	}
}


class_alias( 'THS\Boilerplate\THS_Boilerplate', 'Boilerplate' );
