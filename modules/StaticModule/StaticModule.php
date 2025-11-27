<?php
/**
 * Module: Static Module class.
 *
 * @package MEE\Modules\StaticModule
 * @since ??
 */

namespace MEE\Modules\StaticModule;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;


/**
 * `StaticModule` is consisted of functions used for Static Module such as Front-End rendering, REST API Endpoints etc.
 *
 * This is a dependency class and can be used as a dependency for `DependencyTree`.
 *
 * @since ??
 */
class StaticModule implements DependencyInterface {
	use StaticModuleTrait\RenderCallbackTrait;
	use StaticModuleTrait\ModuleClassnamesTrait;
	use StaticModuleTrait\ModuleStylesTrait;
	use StaticModuleTrait\ModuleScriptDataTrait;

	/**
	 * Loads `StaticModule` and registers Front-End render callback and REST API Endpoints.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load() {
		$plugin_root = dirname( dirname( __DIR__ ) );
		$module_json_folder_path = trailingslashit( $plugin_root ) . 'modules-json/static-module/';

		// DEBUG : log au chargement
		error_log('[StaticModule] load() called');
		error_log('[StaticModule] JSON path: ' . $module_json_folder_path);
		error_log(
			'[StaticModule] module.json exists: ' .
			( file_exists( $module_json_folder_path . 'module.json' ) ? 'YES' : 'NO' )
		);

		add_action(
			'init',
			function() use ( $module_json_folder_path ) {
				ModuleRegistration::register_module(
					$module_json_folder_path,
					[
						'render_callback' => [ StaticModule::class, 'render_callback' ],
					]
				);
			}
		);
	}


}
