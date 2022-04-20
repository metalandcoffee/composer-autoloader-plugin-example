<?php
/**
 * Plugin Name: Plugin Example with Autoloader
 * Plugin URI: https://themetalhead.dev
 * Description: Insert Description
 * Author: Metal & Coffee
 * Text Domain: plugin-example
 * Version: 1.0
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package MetalAndCoffee\ExamplePlugin;
 */

namespace MetalAndCoffee\ExamplePlugin;

// Only run this within WordPress.
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

if ( ! class_exists( Plugin::class ) ) {
	// Require vendor packages.
	require_once __DIR__ . '/vendor/autoload.php';

	// Instantiate the plugin.
	new Plugin();
}
