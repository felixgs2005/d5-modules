<?php
/**
 * MovieCardModule::custom_css().
 *
 * @package MEE\Modules\MovieCardModule
 * @since ??
 */

namespace MEE\Modules\MovieCardModule\MovieCardModuleTrait;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

trait CustomCssTrait {

	/**
	 * Custom CSS fields
	 *
	 * This function is equivalent of JS const cssFields located in
	 * src/components/movie-card-module/custom-css.ts.
	 *
	 * A minor difference with the JS const cssFields, this function did not have `label` property on each array item.
	 *
	 * @since ??
	 */
	public static function custom_css() {
		return \WP_Block_Type_Registry::get_instance()->get_registered( 'example/movie-card-module' )->customCssFields;
	}

}
