<?php
/**
 * Custom functions added to all projects
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Settings;

defined( 'ABSPATH' ) || exit;

/**
 * Template Class For Theme Settings
 *
 * Template Class
 *
 * @category Gform_Setting_Class
 * @package  Bahar Hussain Theme
 */
class THS_GForm_Settings {

	/**
	 * Define class Constructor
	 **/
	public function __construct() {
		add_filter( 'gform_init_scripts_footer', '__return_true' );
		add_filter( 'gform_tabindex', '__return_false' );
		add_filter( 'gform_disable_css', '__return_true' );
		add_filter( 'gform_confirmation_anchor', '__return_false' );
		add_filter( 'gform_submit_button', array( $this, 'gform_submit_button_callback' ), 10, 2 );
		add_filter( 'gform_field_validation', array( $this, 'gform_field_validation_callback' ), 10, 4 );
	}


	/**
	 * Gravity form messages override
	 *
	 * @param array  $result the return message value.
	 * @param mixed  $value the field value.
	 * @param array  $form all form settings.
	 * @param object $field all field settings.
	 *
	 * @return $results.
	 */
	public function gform_field_validation_callback( $result, $value, $form, $field ) {

		$error_messages = array(
			'text'          => 'Please enter text in this field.',
			'number'        => 'This field requires a numeric value.',
			'textarea'      => 'Please enter text in this field.',
			'select'        => 'Please select an option from the dropdown menu. ',
			'checkbox'      => 'No checkbox selected. Please choose at least one option.',
			'radio'         => 'Error: This field is required. Please select one option from the available choices.',
			'phone'         => 'Error: Please enter your phone number.',
			'email'         => 'Error: Please enter your email address.',
			'list'          => 'This field cannot be left empty.',
			'website'       => 'Error: Please enter the website URL.',
			'multiselect'   => 'Please select at least one option.',
			'date'          => 'Please enter a date.',
			'time'          => 'Please enter a time.',
			'fileupload'    => 'Please enter a file.',
			'post_title'    => 'Please enter a title for your post.',
			'post_content'  => 'Please enter content for your post.',
			'post_excerpt'  => 'Post excerpt is required.',
			'post_category' => 'Please select an option from the dropdown menu. ',
			'post_tags'     => 'Please enter tags for your post.',
			'post_image'    => 'Please select a file.',
			'product'       => 'Error: Negative values are not allowed. Please enter a positive price.',
			'quantity'      => 'Please enter a quantity.',

		);
		foreach ( $error_messages as $field_type => $error_message ) {
			if ( $field_type === $field->type ) {
				if ( $field->isRequired ) { // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase -- Gravity Forms property.
					$result['message'] = $error_message;
				}
			}
		}
		return $result;
	}

	/**
	 * Replace submit input with button element
	 *
	 * @param string $button The default button HTML.
	 * @param array  $form   Form settings.
	 *
	 * @return string
	 */
	public function gform_submit_button_callback( $button, $form ) {
		$input_id      = sprintf( 'gform_submit_button_%d', $form['id'] );
		$form_tabindex = isset( $form['tabindex'] ) ? $form['tabindex'] : 0;
		$tabindex      = gf_apply_filters( 'gform_submit_button_tabindex', $form['id'], $form_tabindex );
		$tabindex      = $tabindex ? sprintf( " tabindex='%d'", $tabindex ) : '';

		return sprintf(
			"<button class='gform_button button' id='%s'%s><span class='button-text'>%s</span></button>",
			esc_attr( $input_id ),
			$tabindex,
			esc_html( $form['button']['text'] )
		);
	}
}
