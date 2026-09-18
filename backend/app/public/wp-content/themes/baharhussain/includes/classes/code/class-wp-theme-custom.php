<?php
/**
 * Custom related functions
 *
 * @link
 *
 * @package Bahar Hussain Theme
 * @since 1.0.0
 */

namespace THS\Custom;

defined( 'ABSPATH' ) || exit;

// Load trait files.
require_once __DIR__ . '/traits/trait-acf-helpers.php';
require_once __DIR__ . '/traits/trait-media-helpers.php';
require_once __DIR__ . '/traits/trait-text-helpers.php';
require_once __DIR__ . '/traits/trait-youtube-helpers.php';
require_once __DIR__ . '/traits/trait-pagination.php';
require_once __DIR__ . '/traits/trait-block-helpers.php';
require_once __DIR__ . '/traits/trait-social-icons.php';
require_once __DIR__ . '/traits/trait-asset-enqueue.php';
require_once __DIR__ . '/traits/trait-misc-helpers.php';

/**
 * Template Class For Custom
 *
 * Template Class
 *
 * @category Setting_Class
 * @package  Bahar Hussain Theme
 */
class THS_Custom extends \Boilerplate {

	use TraitAcfHelpers;
	use TraitMediaHelpers;
	use TraitTextHelpers;
	use TraitYoutubeHelpers;
	use TraitPagination;
	use TraitBlockHelpers;
	use TraitSocialIcons;
	use TraitAssetEnqueue;
	use TraitMiscHelpers;

	/**
	 * Define class Constructor
	 **/
	public function __construct() {
	}
}

class_alias( 'THS\Custom\THS_Custom', 'THS' );
