<?php
/**
 * Image/media output helpers trait.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Custom;

defined( 'ABSPATH' ) || exit;

/**
 * Trait TraitMediaHelpers
 *
 * Provides image attachment and featured image output helpers.
 */
trait TraitMediaHelpers {

	/**
	 * Echo the image attachment Image
	 *
	 * @param int     $image_id contain image the id that be echoed.
	 * @param int     $thumb_size contain the size of image.
	 * @param array   $args extra args if needed.
	 * @param boolean $hide_backup hide the backup image.
	 *
	 * @return void
	 */
	public static function the_attachment_image( $image_id, $thumb_size, $args = array(), $hide_backup = false ) {
		$alt                = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
		$title              = get_the_title( $image_id );
		if ( empty( $alt ) ) {
			$alt = $title;
		}
		$desktop_thumb_size = 900;
		$mobile_thumb_size  = 400;
		if ( is_array( $thumb_size ) ) {
			list($desktop_thumb_size, $mobile_thumb_size) = $thumb_size;
		} else {
			$desktop_thumb_size = $thumb_size;
			$mobile_thumb_size  = $thumb_size;
		}
		$desktop_thumb_size_with_prefix = 'thumb_' . $desktop_thumb_size;
		$mobile_thumb_size_with_prefix  = 'thumb_' . $mobile_thumb_size;

		$thumb_size_with_prefix = ( wp_is_mobile() ) ? $mobile_thumb_size_with_prefix : $desktop_thumb_size_with_prefix;

		$args_all = array(
			'alt'   => $alt,
			'title' => $title,
		);

		$args_all = array_merge( $args_all, $args );

		$attachment_image = wp_get_attachment_image( $image_id, $thumb_size_with_prefix, null, $args_all );
		// Check if the attachment image is empty and a backup image is provided.
		if ( empty( $attachment_image ) && ! $hide_backup ) {
			echo '<img class="is-default-image" loading="lazy" src="' . esc_url( THS_DEFAULT_IMAGE ) . '" alt="THS" />';
		} else {
			// wp_get_attachment_image() output is already escaped by WordPress core.
			echo $attachment_image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}

	/**
	 * Echo the image attachment Image
	 *
	 * @param int     $image_id contain image the id that be echoed.
	 * @param int     $thumb_size contain the size of image.
	 * @param array   $args extra args if needed.
	 * @param boolean $hide_backup hide the backup image.
	 *
	 * @return void
	 */
	public static function the_attachment_image_no_default_image( $image_id, $thumb_size, $args = array(), $hide_backup = false ) {
		$alt                = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
		$title              = get_the_title( $image_id );
		if ( empty( $alt ) ) {
			$alt = $title;
		}
		$desktop_thumb_size = 900;
		$mobile_thumb_size  = 400;
		if ( is_array( $thumb_size ) ) {
			list($desktop_thumb_size, $mobile_thumb_size) = $thumb_size;
		} else {
			$desktop_thumb_size = $thumb_size;
			$mobile_thumb_size  = $thumb_size;
		}
		$desktop_thumb_size_with_prefix = 'thumb_' . $desktop_thumb_size;
		$mobile_thumb_size_with_prefix  = 'thumb_' . $mobile_thumb_size;

		$thumb_size_with_prefix = ( wp_is_mobile() ) ? $mobile_thumb_size_with_prefix : $desktop_thumb_size_with_prefix;

		$args_all = array(
			'alt'   => $alt,
			'title' => $title,
		);

		$args_all = array_merge( $args_all, $args );

		$attachment_image = wp_get_attachment_image( $image_id, $thumb_size_with_prefix, null, $args_all );
		// Check if the attachment image is empty and a backup image is provided.
		if ( empty( $attachment_image ) && ! $hide_backup ) {
			echo '<img class="is-default-image" loading="lazy" src="' . esc_url( THS_DEFAULT_IMAGE ) . '" alt="THS" />';
		} else {
			// wp_get_attachment_image() output is already escaped by WordPress core.
			echo $attachment_image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}

	/**
	 * Echo the Post attachment Image
	 *
	 * @param int     $post_id contain image the id that be echoed.
	 * @param int     $thumb_size contain the size of image.
	 * @param array   $args extra args if needed.
	 * @param boolean $hide_backup hide the backup image.
	 *
	 * @return void
	 */
	public static function the_featured_image( $post_id, $thumb_size, $args = array(), $hide_backup = false ) {
		$post_image_id = get_post_thumbnail_id( $post_id );

		if ( is_array( $thumb_size ) ) {
			list($desktop_thumb_size, $mobile_thumb_size) = $thumb_size;
		} else {
			$desktop_thumb_size = $thumb_size;
			$mobile_thumb_size  = $thumb_size;
		}
		$desktop_thumb_size_with_prefix = 'thumb_' . $desktop_thumb_size;
		$mobile_thumb_size_with_prefix  = 'thumb_' . $mobile_thumb_size;

		$thumb_size_with_prefix = ( wp_is_mobile() ) ? $mobile_thumb_size_with_prefix : $desktop_thumb_size_with_prefix;

		if ( $post_image_id ) {
			$alt_text = get_post_meta( $post_image_id, '_wp_attachment_image_alt', true );
			if ( empty( $alt_text ) ) {
				$alt_text = get_the_title( $post_id );
			}
			$args_all = array(
				'alt'   => $alt_text,
				'title' => get_the_title( $post_image_id ),
			);

			$args_all = array_merge( $args_all, $args );

			$post_image = wp_get_attachment_image(
				$post_image_id,
				$thumb_size_with_prefix,
				false,
				$args_all
			);
		} elseif ( ! $hide_backup ) {
				$post_image = '<img class="is-default-image" loading="lazy" src="' . esc_url( THS_DEFAULT_IMAGE ) . '" alt="THS" />';
		}

		// wp_get_attachment_image() output is already escaped by WordPress core.
		echo $post_image; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
