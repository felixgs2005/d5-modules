<?php
/**
 * Module: Hello World Module class.
 *
 * @package MEE\Modules\HelloWorldModule
 * @since ??
 */

namespace MEE\Modules\HelloWorldModule;

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;


/**
 * `HelloWorldModule` is consisted of functions used for Hello World Module such as Front-End rendering, REST API Endpoints etc.
 *
 * This is a dependency class and can be used as a dependency for `DependencyTree`.
 *
 * @since ??
 */
class HelloWorldModule implements DependencyInterface {
	use HelloWorldModuleTrait\RenderCallbackTrait;
	use HelloWorldModuleTrait\ModuleClassnamesTrait;
	use HelloWorldModuleTrait\ModuleStylesTrait;
	use HelloWorldModuleTrait\ModuleScriptDataTrait;

	/**
	 * Loads `HelloWorldModule` and registers Front-End render callback and REST API Endpoints.
	 *
	 * @since ??
	 *
	 * @return void
	 */
	public function load() {
		$plugin_root = dirname( dirname( __DIR__ ) );
		$module_json_folder_path = trailingslashit( $plugin_root ) . 'modules-json/hello-world-module/';

		// DEBUG : log au chargement
		error_log('[HelloWorldModule] load() called');
		error_log('[HelloWorldModule] JSON path: ' . $module_json_folder_path);
		error_log(
			'[HelloWorldModule] module.json exists: ' .
			( file_exists( $module_json_folder_path . 'module.json' ) ? 'YES' : 'NO' )
		);
		
		add_action(
			'init',
			function() use ( $module_json_folder_path ) {
				ModuleRegistration::register_module(
					$module_json_folder_path,
					[
						'render_callback' => [ HelloWorldModule::class, 'render_callback' ],
					]
				);
			}
		);
	}


}
