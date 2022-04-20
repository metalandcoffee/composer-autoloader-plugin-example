<?php
/**
 * Template Loader Class.
 *
 * @package MetalAndCoffee\ExamplePlugin
 */

namespace MetalAndCoffee\ExamplePlugin;

/**
 * Template Loader Class.
 */
class Loader {

	/**
	 * Loads a template part into a template.
	 *
	 * @param string $slug The slug name for the generic template.
	 * @param string $name The name of the specialised template.
	 * @param array  $args Optional. Additional arguments passed to the template.
	 *                     Default empty array.
	 * @return void|false Void on success, false if the template does not exist.
	 */
	public static function get_template_part( $slug, $name = null, $args = array() ) {

		// Setup possible parts.
		$templates = array();
		if ( isset( $name ) ) {
			$templates[] = $slug . '-' . $name . '.php';
		}
		$templates[] = $slug . '.php';

		// Allow template parts to be filtered.
		$templates = apply_filters( 'prefix_get_template_part', $templates, $slug, $name );

		// Return the part that is found.
		if ( ! self::locate_template( $templates, true, false, $args ) ) {
			return false;
		}
	}

	/**
	 * Retrieve the name of the highest priority template file that exists.
	 *
	 * Searches in the theme directory before searching in the plugin template
	 * files.
	 *
	 * @param string|array $template_names Template file(s) to search for, in order.
	 * @param bool         $load           If true the template file will be loaded if it is found.
	 * @param bool         $require_once   Whether to require_once or require. Has no effect if `$load` is false.
	 *                                     Default true.
	 * @param array        $args           Optional. Additional arguments passed to the template.
	 *                                     Default empty array.
	 * @return string The template filename if one is located.
	 */
	public static function locate_template( $template_names, $load = false, $require_once = true, $args = array() ) : string {
		$located = '';
		foreach ( (array) $template_names as $template_name ) {
			if ( ! $template_name ) {
				continue;
			}
			if ( file_exists( get_template_directory() . 'example-plugin-templates/' . $template_name ) ) {
				$located = get_template_directory() . 'example-plugin-templates/' . $template_name;
				break;
			} elseif ( file_exists( EXAMPLE_PLUGIN_PATH . 'templates/partials/' . $template_name ) ) {
				$located = EXAMPLE_PLUGIN_PATH . 'templates/partials/' . $template_name;
				break;
			}
		}

		if ( $load && '' !== $located ) {
			load_template( $located, $require_once, $args );
		}

		return $located;
	}
}
