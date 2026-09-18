<?php
defined( 'ABSPATH' ) || exit;

/**
 * Theme setup: constants, autoloader, and font preloading.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

if ( ! defined( 'THS_BLOCK_DIR' ) ) {
	define( 'THS_BLOCK_DIR', __DIR__ . '/../blocks' );
}

if ( ! defined( 'THS_DEFAULT_IMAGE' ) ) {
	define( 'THS_DEFAULT_IMAGE', esc_url( get_template_directory_uri() ) . '/assets/build/images/admin/defaults/default-image.webp' );
}

/*
|--------------------------------------------------------------------------
| Autoloader
|--------------------------------------------------------------------------
| Classmap-based spl_autoload_register for all namespaced theme classes.
| Traits are loaded by their parent class (THS_Custom), ACF field types
| are loaded by THS_Acf, so neither needs the autoloader.
|
| Procedural files (project.php, class-post-card-tags.php) are
| require_once'd below.
*/
spl_autoload_register(
	function ( string $class ): void {
		static $map = null;

		if ( null === $map ) {
				$base = __DIR__ . '/classes';
				$map  = array(
					// code/
					'THS\\Boilerplate\\THS_Boilerplate' => $base . '/code/class-wp-theme-boilerplate.php',
					'THS\\Custom\\THS_Custom'           => $base . '/code/class-wp-theme-custom.php',
					'THS\\Blocks\\THS_Blocks'           => $base . '/code/class-wp-theme-blocks.php',
					'THS\\Core\\WP_Core_Blocks'         => $base . '/code/class-wp-theme-core-blocks.php',
					'THS\\TopicImage\\THS_Topic_Image'  => $base . '/code/class-topic-image.php',

					// settings/
					'THS\\Setup\\THS_Setup'             => $base . '/settings/class-wp-theme-setup.php',
					'THS\\Admin\\THS_Admin_Setup'       => $base . '/settings/class-wp-admin-setup.php',
					'THS\\Settings\\THS_Settings'       => $base . '/settings/class-wp-theme-settings.php',
					'THS\\Settings\\THS_GForm_Settings' => $base . '/settings/class-wp-theme-gform-settings.php',
					'THS\\Frontend\\Frontend_Assets_Loader' => $base . '/settings/class-wp-theme-frontend-enqueue.php',
					'THS\\Script\\THS_Scripts'          => $base . '/settings/class-wp-theme-backend-enqueue.php',
					'THS\\Blog\\THS_Blog_Url'           => $base . '/settings/class-wp-theme-blog-url.php',

					// walker/
					'THS\\Walker\\THS_Walker_Nav'       => $base . '/walker/class-wp-theme-walker-nav.php',
					'THS\\Walker\\Settings\\THS_Walker_Settings' => $base . '/walker/class-wp-theme-walker-settings.php',
					'THS\\Walker\\Settings\\ACF\\THS_Walker_Acf_Settings' => $base . '/walker/class-wp-theme-walker-acf-settings.php',

					// acf/
					'THS\\Acf\\THS_Acf'                 => $base . '/acf/class-wp-theme-acf.php',

					// acf/acf-field-types/ (also loaded manually by THS_Acf — map as fallback).
					'THS\\Acf\\Acf_Fields\\Acf_Field_Advance_Form' => $base . '/acf/acf-field-types/class-acf-field-advance-form.php',
					'THS\\Acf\\Acf_Fields\\Acf_Field_Advance_Video' => $base . '/acf/acf-field-types/class-acf-field-advance-video.php',
					'THS\\Acf\\Acf_Fields\\Acf_Field_Block_Label' => $base . '/acf/acf-field-types/class-acf-field-block-label.php',
					'THS\\Acf\\Acf_Fields\\Acf_Field_Block_Title' => $base . '/acf/acf-field-types/class-acf-field-block-title.php',
					'THS\\Acf\\Acf_Fields\\Acf_Field_Headings' => $base . '/acf/acf-field-types/class-acf-field-headings.php',
					'THS\\Acf\\Acf_Fields\\Acf_Field_Relational_Taxonomy' => $base . '/acf/acf-field-types/class-acf-field-relational-taxonomy.php',
					'THS\\Acf\\Acf_Fields\\Acf_Field_Spacer' => $base . '/acf/acf-field-types/class-acf-field-spacer.php',
					'THS\\Acf\\Acf_Fields\\Acf_Field_Spacers' => $base . '/acf/acf-field-types/class-acf-field-spacers.php',
				);
		}

		if ( isset( $map[ $class ] ) && file_exists( $map[ $class ] ) ) {
			require_once $map[ $class ];
		}
	}
);

/*
|--------------------------------------------------------------------------
| Eager-load classes that self-register via constructors
|--------------------------------------------------------------------------
| These classes hook into WordPress during construction (add_action,
| add_filter, etc.), so they must be instantiated at boot time.
| The autoloader resolves them on first `new` or `::` reference.
*/
new \THS\Setup\THS_Setup();
new \THS\Admin\THS_Admin_Setup();
new \THS\Settings\THS_Settings();
new \THS\Settings\THS_GForm_Settings();
new \THS\Frontend\Frontend_Assets_Loader();
new \THS\Script\THS_Scripts();
new \THS\Blog\THS_Blog_Url();
new \THS\Blocks\THS_Blocks();
new \THS\Core\WP_Core_Blocks();
new \THS\TopicImage\THS_Topic_Image();
new \THS\Walker\Settings\THS_Walker_Settings();

// Boilerplate + THS_Custom are loaded on first static call (THS::... / Boilerplate::...).
// Force-load them so the class_alias() calls execute early.
class_exists( 'THS\\Boilerplate\\THS_Boilerplate' );
class_exists( 'THS\\Custom\\THS_Custom' );

// ACF integration — conditional on ACF being active.
if ( class_exists( 'ACF' ) ) {
	new \THS\Acf\THS_Acf();
}

// Procedural helpers.
require_once __DIR__ . '/classes/code/class-post-card-tags.php';
require_once __DIR__ . '/project.php';

// Preload critical web fonts.
add_action(
	'wp_head',
	function () {
		$theme = get_stylesheet_directory_uri(); ?>
		<link rel="preload" href="<?php echo esc_url( $theme . '/assets/build/fonts/Manrope-SemiBold.woff2' ); ?>" as="font" type="font/woff2" crossorigin>
		<link rel="preload" href="<?php echo esc_url( $theme . '/assets/build/fonts/Inter18pt-Regular.woff2' ); ?>" as="font" type="font/woff2" crossorigin>
		<?php
	},
	1
);
