<?php
/**
 * Module: Demo Card Module class.
 *
 * @package MEE\Modules\DemoCardModule
 * @since ??
 */

namespace MEE\Modules\DemoCardModule;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;


/**
 * `DemoCardModule` is consisted of functions used for Demo Card Module such as Front-End rendering, REST API Endpoints etc.
 *
 * This is a dependency class and can be used as a dependency for `DependencyTree`.
 *
 * @since ??
 */
class DemoCardModule implements DependencyInterface {
	use DemoCardModuleTrait\RenderCallbackTrait;
	use DemoCardModuleTrait\ModuleClassnamesTrait;
	use DemoCardModuleTrait\ModuleStylesTrait;
	use DemoCardModuleTrait\ModuleScriptDataTrait;

	/**
	 * Loads `DemoCardModule` and registers Front-End render callback and REST API Endpoints.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load() {
		$plugin_root = dirname( dirname( __DIR__ ) );
		$module_json_folder_path = trailingslashit( $plugin_root ) . 'modules-json/demo-card-module/';

		// DEBUG : log au chargement
		error_log('[DemoCardModule] load() called');
		error_log('[DemoCardModule] JSON path: ' . $module_json_folder_path);
		error_log(
			'[DemoCardModule] module.json exists: ' .
			( file_exists( $module_json_folder_path . 'module.json' ) ? 'YES' : 'NO' )
		);
		
		add_action(
			'init',
			function() use ( $module_json_folder_path ) {
				ModuleRegistration::register_module(
					$module_json_folder_path,
					[
						'render_callback' => [ DemoCardModule::class, 'render_callback' ],
					]
				);
			}
		);
	}


}
