<?php
/**
 * When you only need one.
 *
 * @package MetalAndCoffee\ExamplePlugin
 */

namespace MetalAndCoffee\ExamplePlugin;

trait Singleton {

	/**
	 * Class instance.
	 *
	 * @var array
	 */
	protected static array $instance = array();

	/**
	 * Class constructor. Should be overridden. Will only be called once.
	 */
	protected function __construct() {
	}

	/**
	 * This method returns a new or existing Singleton instance.
	 * Should not be overridden.
	 *
	 * @return object|static Instance of the class.
	 */
	final public static function get_instance() {
		$called_class = get_called_class();

		if ( ! isset( static::$instance[ $called_class ] ) ) {

			static::$instance[ $called_class ] = new $called_class();

			/**
			 * Allow other code to do something after this class is initialized.
			 */
			do_action( 'singleton_init_' . $called_class );
		}

		return static::$instance[ $called_class ];

	}

	/**
	 * Prevents object cloning.
	 */
	final protected function __clone() {
	}

}
