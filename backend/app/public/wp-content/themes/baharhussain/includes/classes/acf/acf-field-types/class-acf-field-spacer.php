<?php
/**
 * Functions for advanced custom fields plugin
 *
 * @link https://www.advancedcustomfields.com/resources/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Acf\Acf_Fields;

defined( 'ABSPATH' ) || exit;

/**
 * Template Class For Acf Block Field Headings
 *
 * Template Class
 *
 * @category Acf_Field
 * @package  Bahar Hussain Theme
 */
class Acf_Field_Spacer extends \acf_field {
	/**
	 * Controls field type visibility in REST requests.
	 *
	 * @var bool
	 */
	public $show_in_rest = true;

	/**
	 * Environment values relating to the theme or plugin.
	 *
	 * @var array $env Plugin or theme context such as 'url' and 'version'.
	 */
	private $env;

	/**
	 * Constructor.
	 */
	public function __construct() {
		/**
		 * Field type reference used in PHP and JS code.
		 *
		 * No spaces. Underscores allowed.
		 */
		$this->name = 'spacer';

		/**
		 * Field type label.
		 *
		 * For public-facing UI. May contain spaces.
		 */
		$this->label = __( 'Spacer', 'baharhussain' );

		/**
		 * The category the field appears within in the field type picker.
		 */
		$this->category = 'basic'; // basic | content | choice | relational | jquery | layout | CUSTOM GROUP NAME.

		/**
		 * Defaults for your custom user-facing settings for this field type.
		 */
		$this->defaults = array( 'default_value' => '' );

		/**
		 * Strings used in JavaScript code.
		 *
		 * Allows JS strings to be translated in PHP and loaded in JS via:
		 *
		 * ```js
		 * const errorMessage = acf._e("spacer", "error");
		 * ```
		 */
		$this->l10n = array( 'error' => __( 'Error! Please enter a higher value', 'baharhussain' ) );

		$this->env = array(
			'url'     => site_url( str_replace( ABSPATH, '', __DIR__ ) ), // URL to the acf-FIELD-NAME directory.
			'version' => '1.0', // Replace this with your theme or plugin version constant.
		);

		parent::__construct();
	}

	/**
	 * Render Acf Field
	 *
	 *  @param array $field is a array of theme categories.
	 *
	 *  @return void
	 */
	public function render_field_settings( $field ) {
		/*
		 * Repeat for each setting you wish to display for this field type.
		 */
		acf_render_field_setting(
			$field,
			array(
				'label'        => __( 'Default Value', 'baharhussain' ),
				'instructions' => __( 'Customize the input default Value', 'baharhussain' ),
				'type'         => 'text',
				'name'         => 'default_value',
				'append'       => '',
			)
		);

		// To render field settings on other tabs in ACF 6.0+:
		// https://www.advancedcustomfields.com/resources/adding-custom-settings-fields/#moving-field-setting.
	}

	/**
	 * HTML content to show when a publisher edits the field on the edit screen.
	 *
	 * @param array $field The field settings and values.
	 * @return void
	 */
	public function render_field( $field ) {
		// Debug output to show what field data is available.
		$option_html = '';

		$options = array(
			'dbt-spr-0'   => 'No Margin',
			'dbt-spr-12'  => '12 Pixels',
			'dbt-spr-24'  => '24 Pixels',
			'dbt-spr-36'  => '36 Pixels',
			'dbt-spr-48'  => '48 Pixels',
			'dbt-spr-64'  => '64 Pixels',
			'dbt-spr-80'  => '80 Pixels',
			'dbt-spr-96'  => '96 Pixels',
			'dbt-spr-112' => '112 Pixels',
			'dbt-spr-128' => '128 Pixels',
			'dbt-spr-152' => '152 Pixels',
			'dbt-spr-184' => '184 Pixels',
			'dbt-spr-216' => '216 Pixels',
			'dbt-spr-248' => '248 Pixels',
			'dbt-spr-280' => '280 Pixels',
		);
		if ( $options ) {
			foreach ( $options as $key => $option ) {
				if ( esc_attr( $field['value'] ) === $key ) {
					$selected = 'selected';
				} else {
					$selected = '';
				}
				$option_html .= '<option ' . $selected . ' value="' . $key . '">' . $option . '</option>';
			}
			?>
		<select name="<?php echo esc_attr( $field['name'] ); ?>">
			<?php echo html_entity_decode( $option_html ); ?>
		</select>
			<?php
			defined( 'ABSPATH' ) || exit;

		} else {
			echo 'please set default spacer values';
		}
	}
}
