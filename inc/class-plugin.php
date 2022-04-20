<?php
/**
 * Main Plugin Class.
 *
 * @package MetalAndCoffee\ExamplePlugin
 */

namespace MetalAndCoffee\ExamplePlugin;

/**
 * Main Plugin Class.
 */
class Plugin {

	/**
	 * Class Constructor
	 */
	public function __construct() {

		// Define plugin constants.
		$this->define_constants();
	}

	/**
	 * Define our constants
	 *
	 * @return void
	 */
	private function define_constants() {
		/**
		 * Define the plugin's version
		 */
		if ( ! defined( 'EXAMPLE_PLUGIN_VERSION' ) ) {
			define( 'EXAMPLE_PLUGIN_VERSION', '1.0.0' );
		}
		/**
		 * Define the plugin's file path
		 */
		if ( ! defined( 'EXAMPLE_PLUGIN_PATH_FILE' ) ) {
			define( 'EXAMPLE_PLUGIN_PATH_FILE', __FILE__ );
		}

		/**
		 * Define the plugin's path
		 */
		if ( ! defined( 'EXAMPLE_PLUGIN_PATH' ) ) {
			define( 'EXAMPLE_PLUGIN_PATH', plugin_dir_path( EXAMPLE_PLUGIN_PATH_FILE ) . '../' );
		}
		/**
		 * Define the plugin's url
		 */
		if ( ! defined( 'EXAMPLE_PLUGIN_URL' ) ) {
			define( 'EXAMPLE_PLUGIN_URL', plugin_dir_url( EXAMPLE_PLUGIN_PATH_FILE ) );
		}
	}
}
