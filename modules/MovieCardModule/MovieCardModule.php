<?php
/**
 * Module: Movie Card Module class.
 *
 * @package MEE\Modules\MovieCardModule
 * @since ??
 */

namespace MEE\Modules\MovieCardModule;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;


/**
 * `MovieCardModule` is consisted of functions used for Movie Card Module such as Front-End rendering, REST API Endpoints etc.
 *
 * This is a dependency class and can be used as a dependency for `DependencyTree`.
 *
 * @since ??
 */
class MovieCardModule implements DependencyInterface {
	use MovieCardModuleTrait\RenderCallbackTrait;
	use MovieCardModuleTrait\ModuleClassnamesTrait;
	use MovieCardModuleTrait\ModuleStylesTrait;
	use MovieCardModuleTrait\ModuleScriptDataTrait;

	/**
	 * Loads `MovieCardModule` and registers Front-End render callback and REST API Endpoints.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load() {
		$plugin_root = dirname( dirname( __DIR__ ) );
		$module_json_folder_path = trailingslashit( $plugin_root ) . 'modules-json/movie-card-module/';

		// DEBUG : log au chargement
		error_log('[MovieCardModule] load() called');
		error_log('[MovieCardModule] JSON path: ' . $module_json_folder_path);
		error_log(
			'[MovieCardModule] module.json exists: ' .
			( file_exists( $module_json_folder_path . 'module.json' ) ? 'YES' : 'NO' )
		);

		add_action(
			'init',
			function() use ( $module_json_folder_path ) {
				ModuleRegistration::register_module(
					$module_json_folder_path,
					[
						'render_callback' => [ MovieCardModule::class, 'render_callback' ],
					]
				);
			}
		);
	}


}
