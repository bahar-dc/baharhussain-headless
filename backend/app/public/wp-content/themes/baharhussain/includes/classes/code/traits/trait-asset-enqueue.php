<?php
/**
 * Script/style registration trait.
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Custom;

defined( 'ABSPATH' ) || exit;

/**
 * Trait TraitAssetEnqueue
 *
 * Provides script and style enqueue/register helpers.
 */
trait TraitAssetEnqueue {

	/**
	 * Enqueue Script.
	 *
	 * @param string      $path path of the file.
	 * @param array       $dependencies file dependencies.
	 * @param string|null $local_vars local var name.
	 * @param array       $data local var data.
	 */
	public static function enqueue_script( $path, $dependencies = array( 'jquery' ), $local_vars = null, $data = array(), $args = array() ) {

		$full_path = get_template_directory() . '/' . $path;
		$version   = file_exists( $full_path ) ? filemtime( $full_path ) : null;
		$name      = explode( '.', basename( $path ) )[0] ?? basename( $path );
		$name      = 'wp-theme-' . $name;

		wp_register_script(
			$name,
			get_template_directory_uri() . '/' . $path,
			$dependencies,
			$version,
			$args
		);

		if ( $local_vars ) {
			wp_localize_script( $name, $local_vars, $data );
		}

		wp_enqueue_script( $name );

		return $name;
	}

	/**
	 * Enqueue Scripts.
	 *
	 * @param array $paths paths of the file.
	 */
	public static function enqueue_scripts( $paths ) {
		$dependencies = array( 'jquery' );
		foreach ( $paths as $path ) {
			$dependencies[] = self::enqueue_script( $path, $dependencies );
		}
		return $dependencies;
	}

	/**
	 * Enqueue Script.
	 *
	 * @param string      $path path of the file.
	 * @param array       $dependencies file dependencies.
	 * @param string|null $local_vars local var name.
	 * @param array       $data local var data.
	 */
	public static function register_script( $path, $dependencies = array( 'jquery' ), $local_vars = null, $data = array(), $args = array() ) {
		$version = filemtime( get_template_directory() . '/' . $path );
		$name    = explode( '.', basename( $path ) )[0] ?? basename( $path );
		$name    = 'wp-theme-' . $name;
		wp_register_script( $name, get_template_directory_uri() . '/' . $path, $dependencies, $version, $args );
		if ( $local_vars ) {
			wp_localize_script(
				$name,
				$local_vars,
				$data
			);
		}
		return $name;
	}

	/**
	 * Register Scripts.
	 *
	 * @param array $paths paths of the file.
	 */
	public static function register_scripts( $paths ) {
		$dependencies = array( 'jquery' );
		foreach ( $paths as $path ) {
			$dependencies[] = self::register_script( $path, $dependencies );
		}
		return $dependencies;
	}

	/**
	 * Enqueue Style.
	 *
	 * @param string $path path of the file.
	 */
	public static function enqueue_style( $path ) {

		$full_path = get_template_directory() . '/' . $path;
		$version   = file_exists( $full_path ) ? filemtime( $full_path ) : null;
		$name      = explode( '.', basename( $path ) )[0] ?? basename( $path );

		wp_enqueue_style(
			'wp-theme-' . $name,
			get_template_directory_uri() . '/' . $path,
			array(),
			$version
		);
	}
}
