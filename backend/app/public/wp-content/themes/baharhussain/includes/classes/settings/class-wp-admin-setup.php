<?php
/**
 * Admin dashboard setup — roles, restrictions, and UI customisations.
 *
 * Everything here applies to wp-admin only. Super Admins (ths_super_admin
 * capability) bypass all restrictions.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Admin;

defined( 'ABSPATH' ) || exit;

class THS_Admin_Setup {

	/**
	 * Wire up all admin hooks.
	 */
	public function __construct() {
		// ── Super Admin role ────────────────────────────────────
		add_action( 'after_switch_theme', array( $this, 'register_super_admin_role' ) );
		add_action( 'admin_init', array( $this, 'maybe_register_super_admin_role' ) );

		// ── Admin color scheme lock ─────────────────────────────
		add_filter( 'get_user_option_admin_color', array( $this, 'force_admin_color' ) );
		add_action( 'admin_init', array( $this, 'hide_color_picker' ) );

		// ── Hide plugin menus from non-super-admins ─────────────
		add_action( 'admin_menu', array( $this, 'restrict_plugin_menus' ), 999 );

		// ── Hide plugins from the plugins list page ─────────────
		add_filter( 'all_plugins', array( $this, 'hide_plugins_from_list' ) );

		// ── Prevent non-super-admins from assigning super admin role ─
		add_filter( 'editable_roles', array( $this, 'restrict_super_admin_role' ) );

		// ── Hide noisy columns on edit.php via CSS ──────────────
		add_action( 'admin_head', array( $this, 'hide_edit_columns_css' ) );
	}

	/*
	|--------------------------------------------------------------------------
	| Super Admin Role
	|--------------------------------------------------------------------------
	*/

	/**
	 * Register the THS Super Admin role with all administrator capabilities
	 * plus the custom 'ths_super_admin' capability.
	 */
	public function register_super_admin_role() {
		$admin = get_role( 'administrator' );
		if ( ! $admin ) {
			return;
		}

		// Remove first to refresh capabilities if they changed.
		remove_role( 'ths_super_admin' );

		$caps                    = $admin->capabilities;
		$caps['ths_super_admin'] = true;

		// Gravity Forms capabilities — GF adds these at runtime and they may
		// not be present on the administrator role object in the DB yet.
		$gf_caps = array(
			'gravityforms_edit_forms',
			'gravityforms_delete_forms',
			'gravityforms_create_form',
			'gravityforms_view_entries',
			'gravityforms_edit_entries',
			'gravityforms_delete_entries',
			'gravityforms_view_entry_notes',
			'gravityforms_edit_entry_notes',
			'gravityforms_export_entries',
			'gravityforms_view_settings',
			'gravityforms_edit_settings',
			'gravityforms_view_updates',
			'gravityforms_view_addons',
			'gravityforms_preview_forms',
			'gravityforms_system_status',
			'gravityforms_uninstall',
			'gravityforms_logging',
			'gravityforms_api_settings',
		);
		foreach ( $gf_caps as $cap ) {
			$caps[ $cap ] = true;
		}

		add_role( 'ths_super_admin', 'Super Admin', $caps );
	}

	/**
	 * Ensure the super admin role exists on every admin load (handles fresh
	 * installs or DB imports where after_switch_theme never fired).
	 */
	public function maybe_register_super_admin_role() {
		$admin = get_role( 'administrator' );
		if ( ! $admin ) {
			return;
		}

		$super = get_role( 'ths_super_admin' );

		// Re-create if role is missing, administrator gained caps, or GF caps are absent.
		$needs_refresh = ! $super
			|| array_diff_key( $admin->capabilities, $super->capabilities )
			|| empty( $super->capabilities['gravityforms_edit_forms'] );

		if ( $needs_refresh ) {
			$this->register_super_admin_role();
		}

		// Ensure administrator role also has Gravity Forms capabilities.
		if ( ! empty( $admin->capabilities ) && empty( $admin->capabilities['gravityforms_edit_forms'] ) ) {
			$gf_caps = array(
				'gravityforms_edit_forms',
				'gravityforms_delete_forms',
				'gravityforms_create_form',
				'gravityforms_view_entries',
				'gravityforms_edit_entries',
				'gravityforms_delete_entries',
				'gravityforms_view_entry_notes',
				'gravityforms_edit_entry_notes',
				'gravityforms_export_entries',
				'gravityforms_view_settings',
				'gravityforms_edit_settings',
				'gravityforms_view_updates',
				'gravityforms_view_addons',
				'gravityforms_preview_forms',
				'gravityforms_system_status',
				'gravityforms_uninstall',
				'gravityforms_logging',
				'gravityforms_api_settings',
			);
			foreach ( $gf_caps as $cap ) {
				$admin->add_cap( $cap );
			}
		}
	}

	/*
	|--------------------------------------------------------------------------
	| Admin Color Scheme
	|--------------------------------------------------------------------------
	*/

	/**
	 * Force "Modern" color scheme for all users except super admins.
	 *
	 * @param string $color Current admin color option.
	 * @return string
	 */
	public function force_admin_color( $color ) {
		if ( current_user_can( 'ths_super_admin' ) ) {
			return $color;
		}
		return 'modern';
	}

	/**
	 * Remove the color scheme picker from the profile page for non-super-admins.
	 */
	public function hide_color_picker() {
		if ( ! current_user_can( 'ths_super_admin' ) ) {
			remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
		}
	}

	/*
	|--------------------------------------------------------------------------
	| Plugin Menu Restrictions
	|--------------------------------------------------------------------------
	*/

	/**
	 * Hide plugin admin menus that only super admins should see.
	 */
	public function restrict_plugin_menus() {
		if ( current_user_can( 'ths_super_admin' ) ) {
			return;
		}

		remove_menu_page( 'publishpress-hub' );
		remove_menu_page( 'ppch-checklists' );
		remove_menu_page( 'publishpress-statuses' );
		remove_menu_page( 'advanced-ads' );

		// ACF is visible for administrators and above.
		if ( ! current_user_can( 'manage_options' ) ) {
			remove_menu_page( 'edit.php?post_type=acf-field-group' );
		}

		// Super-admin-only sub-pages under visible menus.
		remove_submenu_page( 'ths-freshness', 'ths-freshness-settings' );
		remove_submenu_page( 'ths-freshness', 'ths-freshness-sync-log' );
		remove_submenu_page( 'ths-freshness', 'ths-freshness-ga4-status' );
		remove_submenu_page( 'ths-freshness', 'ths-freshness-ga4-setup' );

		// Stale Queue URL (merged into parent page).
		remove_submenu_page( 'ths-freshness', 'ths-freshness-queue' );

		// Built-in file editors.
		remove_submenu_page( 'plugins.php', 'plugin-editor.php' );
		remove_submenu_page( 'themes.php', 'theme-editor.php' );

		// Site Editor & Customizer.
		remove_submenu_page( 'themes.php', 'site-editor.php' );
		remove_submenu_page( 'themes.php', 'customize.php' );

		// TinyPNG Bulk Optimization — admins and super admins only.
		if ( ! current_user_can( 'manage_options' ) ) {
			remove_submenu_page( 'upload.php', 'tiny-bulk-optimization' );
		}
	}

	/**
	 * Hide noisy / low-value columns on the Posts list table via CSS.
	 * Applies to all users (super admins can re-enable via Screen Options).
	 */
	public function hide_edit_columns_css() {
		$screen = get_current_screen();
		if ( ! $screen || 'edit-post' !== $screen->id ) {
			return;
		}
		?>
		<style>
			th#thscf_audit,
			th#ad-status,
			th#wpseo-score,
			th#wpseo-score-readability,
			th#wpseo-title,
			th#wpseo-metadesc,
			th#wpseo-focuskw,
			th#wpseo-links,
			th#wpseo-linked,
			th#wpseo-cornerstone,
			th#comments,
			th#thscf_status,
			th#thscf_priority,
			th#thscf_next_review,
			th#thscf_last_review,
			th#thscf_last_updated,
			td.thscf_audit,
			td.ad-status,
			td.wpseo-score,
			td.wpseo-score-readability,
			td.wpseo-title,
			td.wpseo-metadesc,
			td.wpseo-focuskw,
			td.wpseo-links,
			td.wpseo-linked,
			td.wpseo-cornerstone,
			td.comments,
			td.thscf_status,
			td.thscf_priority,
			td.thscf_next_review,
			td.thscf_last_review,
			td.thscf_last_updated,

			th.column-thscf_audit,
			th.column-ad-status,
			th.column-wpseo-score,
			th.column-wpseo-score-readability,
			th.column-wpseo-title,
			th.column-wpseo-metadesc,
			th.column-wpseo-focuskw,
			th.column-wpseo-links,
			th.column-wpseo-linked,
			th.column-wpseo-cornerstone,
			th.column-comments,
			th.column-thscf_status,
			th.column-thscf_priority,
			th.column-thscf_next_review,
			th.column-thscf_last_review,
			th.column-thscf_last_updated


			{
				display: none;
			}
		</style>
		<?php
	}

	/*
	|--------------------------------------------------------------------------
	| Plugins List Restrictions
	|--------------------------------------------------------------------------
	*/

	/**
	 * Plugins hidden from the plugins page for non-super-admins.
	 *
	 * @var string[]
	 */
	private const HIDDEN_PLUGINS = array(
		'publishpress-checklists-pro/publishpress-checklists-pro.php',
		'publishpress-hub/publishpress-hub.php',
		'publishpress-pro/publishpress-pro.php',
		'publishpress-statuses-pro/publishpress-statuses-pro.php',
		'revisionary-pro/revisionary-pro.php',
		'advanced-ads/advanced-ads.php',
		'advanced-ads-pro/advanced-ads-pro.php',
		'advanced-ads-gam/advanced-ads-gam.php',
		'advanced-ads-tracking/tracking.php',
		'ths-plugin/ths-plugin.php',
		'ths-content-freshness-tracker/ths-content-freshness-tracker.php',
		'secure-custom-fields/secure-custom-fields.php',
	);

	/**
	 * Remove hidden plugins from the plugins list for non-super-admins.
	 *
	 * @param array $plugins All registered plugins.
	 * @return array Filtered plugins list.
	 */
	public function hide_plugins_from_list( $plugins ) {
		if ( current_user_can( 'ths_super_admin' ) ) {
			return $plugins;
		}

		foreach ( self::HIDDEN_PLUGINS as $file ) {
			unset( $plugins[ $file ] );
		}

		return $plugins;
	}

	/*
	|--------------------------------------------------------------------------
	| Role Assignment Restrictions
	|--------------------------------------------------------------------------
	*/

	/**
	 * Remove ths_super_admin from the roles dropdown for non-super-admins.
	 *
	 * @param array $roles All editable roles.
	 * @return array Filtered roles.
	 */
	public function restrict_super_admin_role( $roles ) {
		if ( current_user_can( 'ths_super_admin' ) ) {
			return $roles;
		}

		unset( $roles['ths_super_admin'] );

		return $roles;
	}
}
