<?php
defined( 'ABSPATH' ) || exit;

/**
 * Admin menus: role-based sidebar cleanup.
 *
 * The editor-role menu restructuring (Content Types accordion, Manage Media,
 * Admin Tools) has been disabled. Editors now see the standard WP menu with
 * selective removals handled in class-wp-admin-setup.php.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

// Remove Comments and Tools menus for authors and contributors.
add_action(
	'admin_menu',
	function () {
		if ( current_user_can( 'author' ) || current_user_can( 'contributor' ) ) {
			remove_menu_page( 'edit-comments.php' );
			remove_menu_page( 'tools.php' );
		}
	},
	999
);
