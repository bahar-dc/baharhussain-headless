<?php
defined( 'ABSPATH' ) || exit;

/**
 * Theme functions and definitions
 *
 * Split into purpose-based modules inside includes/:
 *   setup.php                  — Constants, class autoloader, font preloading
 *   block-pattern-categories.php — Block category registration
 *   admin-menus.php            — Editor role admin sidebar menus
 *   query-filters.php          — pre_get_posts, paged routing, search form
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

$bh_includes_dir = __DIR__ . '/includes';

require_once $bh_includes_dir . '/setup.php';
require_once $bh_includes_dir . '/block-pattern-categories.php';
require_once $bh_includes_dir . '/admin-menus.php';
require_once $bh_includes_dir . '/query-filters.php';
require_once $bh_includes_dir . '/schema.php';

add_filter( 'gform_validation', 'ths_gravity_forms_validate_login_form' );
add_filter( 'gform_confirmation', 'ths_gravity_forms_login_user', 10, 4 );
add_filter( 'gform_field_validation', 'ths_gravity_forms_allow_username_login_field', 20, 4 );
add_filter( 'gform_disable_notification', 'ths_gravity_forms_disable_login_notifications', 10, 4 );

/**
 * Check whether the submitted Gravity Form is the Sign In form.
 *
 * @param array $form Gravity Forms form data.
 *
 * @return bool
 */
function ths_gravity_forms_is_login_form( $form ) {
	$form_title = isset( $form['title'] ) ? sanitize_title( $form['title'] ) : '';

	return 8 === (int) rgar( $form, 'id' ) || 'sign-in' === $form_title || 'signin' === $form_title;
}

/**
 * Get the email and password field IDs from the Sign In form.
 *
 * The password field may be a normal text field, so this also checks the label.
 *
 * @param array $form Gravity Forms form data.
 *
 * @return array
 */
function ths_gravity_forms_get_login_field_ids( $form ) {
	$field_ids = array(
		'email'    => null,
		'password' => null,
	);

	foreach ( rgar( $form, 'fields' ) as $field ) {
		$field_id    = (string) $field->id;
		$field_label = sanitize_title( $field->label );

		if ( ! $field_ids['email'] && 'email' === $field->type ) {
			$field_ids['email'] = $field_id;
		}

		if ( ! $field_ids['password'] && ( 'password' === $field->type || 'password' === $field_label ) ) {
			$field_ids['password'] = $field_id;
		}
	}

	return $field_ids;
}

/**
 * Read login credentials from the submitted Sign In form.
 *
 * @param array $form  Gravity Forms form data.
 * @param array $entry Gravity Forms entry data.
 *
 * @return array
 */
function ths_gravity_forms_get_login_credentials( $form, $entry = array() ) {
	$field_ids = ths_gravity_forms_get_login_field_ids( $form );
	$login     = '';
	$password  = '';

	if ( $field_ids['email'] ) {
		$login = $entry ? rgar( $entry, $field_ids['email'] ) : rgpost( 'input_' . $field_ids['email'] );
	}

	if ( $field_ids['password'] ) {
		$password = $entry ? rgar( $entry, $field_ids['password'] ) : rgpost( 'input_' . $field_ids['password'] );
	}

	return array(
		'login'    => sanitize_text_field( $login ),
		'password' => (string) $password,
		'fields'   => $field_ids,
	);
}

/**
 * Find a WordPress user from a submitted email address or username.
 *
 * @param string $login Email address or username.
 *
 * @return WP_User|false
 */
function ths_gravity_forms_get_login_user( $login ) {
	if ( ! $login ) {
		return false;
	}

	if ( is_email( $login ) ) {
		return get_user_by( 'email', sanitize_email( $login ) );
	}

	return get_user_by( 'login', sanitize_user( $login ) );
}

/**
 * Let the Sign In form's email field accept a username too.
 *
 * @param array    $result Gravity Forms field validation result.
 * @param string   $value  Submitted field value.
 * @param array    $form   Gravity Forms form data.
 * @param GF_Field $field  Gravity Forms field object.
 *
 * @return array
 */

function ths_gravity_forms_allow_username_login_field( $result, $value, $form, $field ) {
	if ( ! ths_gravity_forms_is_login_form( $form ) || ! $value ) {
		return $result;
	}

	$field_ids = ths_gravity_forms_get_login_field_ids( $form );

	if ( (string) $field->id !== (string) $field_ids['email'] ) {
		return $result;
	}

	$result['is_valid'] = true;
	$result['message']  = '';

	return $result;
}

/**
 * Disable admin/customer email notifications for the Sign In form.
 *
 * @param bool  $is_disabled Whether the notification is disabled.
 * @param array $notification Gravity Forms notification data.
 * @param array $form Gravity Forms form data.
 * @param array $entry Gravity Forms entry data.
 *
 * @return bool
 */
function ths_gravity_forms_disable_login_notifications( $is_disabled, $notification, $form, $entry ) {
	if ( ths_gravity_forms_is_login_form( $form ) ) {
		return true;
	}

	return $is_disabled;
}

/**
 * Validate WordPress credentials before Gravity Forms creates the entry.
 *
 * @param array $validation_result Gravity Forms validation data.
 *
 * @return array
 */
function ths_gravity_forms_validate_login_form( $validation_result ) {
	$form = $validation_result['form'];

	if ( ! ths_gravity_forms_is_login_form( $form ) ) {
		return $validation_result;
	}

	$credentials = ths_gravity_forms_get_login_credentials( $form );
	$user        = ths_gravity_forms_get_login_user( $credentials['login'] );
	$auth_user   = $user ? wp_authenticate( $user->user_login, $credentials['password'] ) : false;

	if ( $auth_user && ! is_wp_error( $auth_user ) ) {
		return $validation_result;
	}

	$validation_result['is_valid'] = false;
	$error_field_id                = $credentials['fields']['password'] ?: $credentials['fields']['email'];

	foreach ( $form['fields'] as &$field ) {
		if ( (string) $field->id !== (string) $error_field_id ) {
			continue;
		}

		$field->failed_validation  = true;
		$field->validation_message = esc_html__( 'The email or password you entered is incorrect.', 'baharhussain' );
	}
	unset( $field );

	$validation_result['form'] = $form;

	return $validation_result;
}

/**
 * Sign the visitor into WordPress after the Sign In form passes validation.
 *
 * @param mixed $confirmation Gravity Forms confirmation.
 * @param array $form         Gravity Forms form data.
 * @param array $entry        Gravity Forms entry data.
 * @param bool  $ajax         Whether the form was submitted with AJAX.
 *
 * @return mixed
 */
function ths_gravity_forms_login_user( $confirmation, $form, $entry, $ajax ) {
	if ( ! ths_gravity_forms_is_login_form( $form ) ) {
		return $confirmation;
	}

	$credentials = ths_gravity_forms_get_login_credentials( $form, $entry );
	$user        = ths_gravity_forms_get_login_user( $credentials['login'] );

	if ( ! $user ) {
		return $confirmation;
	}

	$signon = wp_signon(
		array(
			'user_login'    => $user->user_login,
			'user_password' => $credentials['password'],
			'remember'      => true,
		),
		is_ssl()
	);

	if ( is_wp_error( $signon ) ) {
		return $confirmation;
	}

	wp_set_current_user( $signon->ID );
	wp_set_auth_cookie( $signon->ID, true, is_ssl() );

	return array(
		'redirect' => home_url( '/' ),
	);
}
