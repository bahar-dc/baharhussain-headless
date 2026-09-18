<?php
/**
 * Functions for advanced custom fields plugin
 *
 * @link https://www.advancedcustomfields.com/resources/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Acf;

defined( 'ABSPATH' ) || exit;

/**
 * Template Class For Acf Settings
 *
 * Template Class
 *
 * @category Setting_Class
 * @package  Bahar Hussain Theme
 */
class THS_Acf {
	/**
	 * Define class Constructor
	 **/
	public function __construct() {

		// Theme Options page is registered via acf-json/ui_options_page_689e11ad9fe79.json (slug: theme-options).
	}

	/**
	 * Register custom Gutenberg blocks category
	 *
	 *  @param array $categories is a array of theme categories.
	 *
	 *  @return array
	 */
	public function blocks_category( $categories ) {
		$custom_block = array(
			'slug'  => 'theme-blocks',
			'title' => __( 'Theme Blocks', 'baharhussain' ),
			'icon'  => 'theme-blocks',
		);

		$categories_sorted    = array();
		$categories_sorted[0] = $custom_block;

		foreach ( $categories as $category ) {
			$categories_sorted[] = $category;
		}

		return $categories_sorted;
	}

	/**
	 * Render height on ACF WYSIWYG
	 *
	 *  @param array $field is a array field data.
	 */
	public function wysiwyg_render_field( $field ) {
		$field_class    = '.acf-' . str_replace( '_', '-', $field['key'] );
		$wysiwyg_height = ( isset( $field['wysiwyg_height'] ) ) ? $field['wysiwyg_height'] : null;
		if ( ! $wysiwyg_height ) {
			$custom_acf_wysiwyg_height = '200';
		} else {
			$custom_acf_wysiwyg_height = $field['wysiwyg_height'];
		}
		?>
		<script>
			jQuery(document).ready(function(){
				setTimeout(() => {
					jQuery('<?php echo esc_html( $field_class ); ?>').find('iframe').css('height','<?php echo esc_html( $custom_acf_wysiwyg_height ); ?>px');
				}, 1000);
			});
		</script>

		<?php
		defined( 'ABSPATH' ) || exit;
	}
	/**
	 * Render height on ACF image
	 *
	 *  @param array $field is a array field data.
	 */
	public function image_custom_setting( $field ) {
		acf_render_field_setting(
			$field,
			array(
				'label'        => 'Thumb Size - Desktop',
				'instructions' => 'Select a thumbnail desktop size.',
				'type'         => 'select',
				'name'         => 'thumb_size_desktop',
				'choices'      => acf_get_image_sizes(),
			)
		);
		acf_render_field_setting(
			$field,
			array(
				'label'        => 'Thumb Size - Mobile',
				'instructions' => 'Select a thumbnail mobile size.',
				'type'         => 'select',
				'name'         => 'thumb_size_mobile',
				'choices'      => acf_get_image_sizes(),
			)
		);
	}

	/**
	 * Convert ACF image field value to the appropriate return format.
	 *
	 * @param mixed  $value   The field value (attachment ID).
	 * @param int    $post_id The post ID.
	 * @param array  $field   The ACF field settings.
	 * @return mixed Formatted image value or false.
	 */
	public function load_image_field_value( $value, $post_id, $field ) {
		// bail early if no value
		if ( empty( $value ) ) {
			return false;
		}

			// bail early if not numeric (error message)
		if ( ! is_numeric( $value ) ) {
			return false;
		}

			// convert to int
			$value = intval( $value );

			// format
		if ( 'url' === $field['return_format'] ) {
			return wp_get_attachment_url( $value );
		} elseif ( 'array' === $field['return_format'] ) {
			// Retrieve the custom settings
			$thumb_size_desktop = isset( $field['thumb_size_desktop'] ) ? $field['thumb_size_desktop'] : '';
			$thumb_size_mobile  = isset( $field['thumb_size_mobile'] ) ? $field['thumb_size_mobile'] : '';

			$value_arr = acf_get_attachment( $value );
			// Include the custom settings in the value
			$value_arr['thumb_size_desktop'] = $thumb_size_desktop;
			$value_arr['thumb_size_mobile']  = $thumb_size_mobile;
			return $value_arr;
		}

			// return
			return $value;
	}
	/**
	 * Set Wysiwyg Height
	 *
	 *  @param array $field is a array field data.
	 */
	public function wysiwyg_render_field_settings( $field ) {
		acf_render_field_setting(
			$field,
			array(
				'label'        => __( 'Height of Editor', 'baharhussain' ),
				'instructions' => __( 'Height of Editor after Init', 'baharhussain' ),
				'name'         => 'wysiwyg_height',
				'type'         => 'number',
			)
		);
	}



	/**
	 * Registers the ACF field type.
	 */
	public function include_acf_fields() {
		if ( ! function_exists( 'acf_register_field_type' ) ) {
			return;
		}
		require_once __DIR__ . '/acf-field-types/class-acf-field-block-label.php';
		require_once __DIR__ . '/acf-field-types/class-acf-field-headings.php';
		require_once __DIR__ . '/acf-field-types/class-acf-field-spacer.php';
		require_once __DIR__ . '/acf-field-types/class-acf-field-spacers.php';
		require_once __DIR__ . '/acf-field-types/class-acf-field-block-title.php';
		require_once __DIR__ . '/acf-field-types/class-acf-field-relational-taxonomy.php';
		require_once __DIR__ . '/acf-field-types/class-acf-field-advance-form.php';
		require_once __DIR__ . '/acf-field-types/class-acf-field-advance-video.php';

		acf_register_field_type( '\THS\Acf\Acf_Fields\Acf_Field_Block_Label' );
		acf_register_field_type( '\THS\Acf\Acf_Fields\Acf_Field_Headings' );
		acf_register_field_type( '\THS\Acf\Acf_Fields\Acf_Field_Spacer' );
		acf_register_field_type( '\THS\Acf\Acf_Fields\Acf_Field_Spacers' );
		acf_register_field_type( '\THS\Acf\Acf_Fields\Acf_Field_Block_Title' );
		acf_register_field_type( '\THS\Acf\Acf_Fields\Acf_Field_Relational_Taxonomy' );
		acf_register_field_type( '\THS\Acf\Acf_Fields\Acf_Field_Advance_Form' );
		acf_register_field_type( '\THS\Acf\Acf_Fields\Acf_Field_Advance_Video' );
	}
}
