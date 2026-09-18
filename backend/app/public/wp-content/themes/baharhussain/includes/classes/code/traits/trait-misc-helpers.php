<?php
/**
 * Miscellaneous helpers trait.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Custom;

defined( 'ABSPATH' ) || exit;

/**
 * Trait TraitMiscHelpers
 *
 * Provides author data, navigation, taxonomy, and other utility helpers.
 */
trait TraitMiscHelpers {

	/**
	 * Get Author data.
	 *
	 * @param int $post_id post id.
	 */
	public static function get_author_data( $post_id ) {
		$author_id = (int) get_post_field( 'post_author', $post_id );

		$avatar = get_avatar_url( $author_id );

		// Build author name with sane fallbacks
		$first   = (string) get_the_author_meta( 'first_name', $author_id );
		$last    = (string) get_the_author_meta( 'last_name', $author_id );
		$display = (string) get_the_author_meta( 'display_name', $author_id );

		$author_name = trim( "{$first} {$last}" );
		if ( '' === $author_name ) {
			$author_name = $display ? $display : '';
		}

		return array( $avatar, $author_name );
	}

	/**
	 * A Function that return text color based on bg color
	 *
	 * @param string $bg_color  background color.
	 *
	 * @return string
	 */
	public static function get_contrasting_text_color( $bg_color ) {
		// Remove the leading '#' if present.
		if ( $bg_color ) {

			if ( strpos( $bg_color, '#' ) === 0 ) {
				$bg_color = substr( $bg_color, 1 );
			}

			// Convert the hexadecimal color to RGB values.
			$r = hexdec( substr( $bg_color, 0, 2 ) );
			$g = hexdec( substr( $bg_color, 2, 2 ) );
			$b = hexdec( substr( $bg_color, 4, 2 ) );

			// Calculate the relative luminance of the color.
			$luminance = ( 0.299 * $r + 0.587 * $g + 0.114 * $b ) / 255;

			// Choose the text color based on the luminance threshold (adjust the threshold as needed).
			$text_color = $luminance > 0.5 ? '#000000' : '#ffffff';

			return $text_color;
		}
		return '#000000';
	}

	/**
	 * Fallback function for menus
	 *
	 * @return void
	 */
	public static function nav_fallback() {

		if ( is_user_logged_in() ) {
			?>
			<ul>
				<li> <?php echo esc_html__( 'Go to admin area to create navigation menu', 'baharhussain' ); ?></li>
			</ul>
			<?php
			defined( 'ABSPATH' ) || exit;

		}
	}

	/**
	 * A Function that check if post exist then print class;
	 *
	 * @param string $class post class.
	 *
	 * @return void
	 */
	public static function have_post_class( $class ) {
		if ( have_posts() ) {
			echo esc_html( $class );
		}
	}

	/**
	 * A Function that check if site is live of not
	 *
	 * @return boolean
	 */
	public static function if_live() {
		return function_exists( 'ths_is_live' ) ? ths_is_live() : true;
	}

	/**
	 * Check if the taxonomy terms exist.
	 *
	 * @param mixed $taxonomy        Contains the taxonomy name.
	 * @param bool  $hide_empty      Flag to hide empty terms.
	 *
	 * @return bool                  Returns true if terms exist, false otherwise.
	 */
	public static function is_taxonomy_terms_exist( $taxonomy, $hide_empty = false ) {
		$taxonomies     = get_taxonomies();
		$taxonomy_exist = false;

		foreach ( $taxonomies as $reg_taxonomy ) {
			if ( $reg_taxonomy === $taxonomy ) {
				$taxonomy_exist = true;
				break;
			}
		}

		if ( $taxonomy_exist ) {
			$terms = get_terms(
				array(
					'taxonomy'   => $taxonomy,
					'hide_empty' => $hide_empty,
				)
			);

			return ! empty( $terms ); // Return true if terms exist, false otherwise.
		} else {
			return false; // Taxonomy doesn't exist.
		}
	}

	/**
	 * Getting the Post Read Time
	 *
	 * @param mixed $post_id post id.
	 *
	 * @return void
	 */
	public static function calculate_post_read_time( $post_id ) {
		// Get the post content.
		$post_content = get_post_field( 'post_content', $post_id );

		// Remove HTML tags and decode HTML entities.
		$stripped_content = wp_strip_all_tags( $post_content );

		// Calculate the number of words in the post.
		$word_count = str_word_count( $stripped_content );

		// Set an average reading speed (words per minute).
		$average_reading_speed = 200; // You can adjust this value.

		// Calculate the estimated reading time in minutes.
		$read_time = ceil( $word_count / $average_reading_speed );

		echo esc_html( $read_time );
	}

	/**
	 * Page by Template.
	 *
	 * @param string $template_name template name.
	 *
	 * @return id
	 */
	public static function page_by_template( $template_name ) {

		$template_name = 'templates/template-' . $template_name . '.php';

		// Get all pages.
		$pages = get_pages();

		// Loop through each page.
		foreach ( $pages as $page ) {
			// Get the template file name for the page.
			$template_slug = get_page_template_slug( $page->ID );

			// Check if the page is assigned to the specified template.
			if ( $template_slug === $template_name ) {
				return $page->ID;
			}
		}
	}

	/**
	 * Check if template is /blog.
	 */
	public static function is_blog() {
		// Get the current URL.
		$current_url = ( isset( $_SERVER['REQUEST_URI'] ) ) ? sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) ) : null;
		if ( $current_url ) {

			// Define the pattern for "/blog/page/" followed by any number.
			$pattern = '/\/blog\/page\/\d+/';

			// Check if the pattern is present in the URL.
			if ( preg_match( $pattern, $current_url ) ) {
				return true;
			}
			return false;
		}
		return false;
	}
}
