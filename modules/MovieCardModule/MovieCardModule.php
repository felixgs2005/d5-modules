<?php
/**
 * Module: Movie Card Module class.
 *
 * @package MEE\Modules\MovieCardModule
 * @since ??
 */

namespace MEE\Modules\MovieCardModule;

if (!defined('ABSPATH')) {
	die('Direct access forbidden.');
}

use ET\Builder\Framework\DependencyManagement\Interfaces\DependencyInterface;
use ET\Builder\Packages\ModuleLibrary\ModuleRegistration;

/**
 * MovieCardModule
 *
 * Handles registration, rendering and script/style integration for the Movie Card Module.
 *
 * @since ??
 */
class MovieCardModule implements DependencyInterface
{

	use MovieCardModuleTrait\RenderCallbackTrait;
	use MovieCardModuleTrait\ModuleClassnamesTrait;
	use MovieCardModuleTrait\ModuleStylesTrait;
	use MovieCardModuleTrait\ModuleScriptDataTrait;

	/**
	 * REQUIRED BY DIVI 5 :
	 * Register the module with Divi’s module library.
	 *
	 * @return void
	 */
	public static function register()
	{
		(new self())->load();
	}

	/**
	 * Loads MovieCardModule and registers render callback + JSON module definition.
	 *
	 * @return void
	 */
	public function load()
	{

		$plugin_root = dirname(dirname(__DIR__));
		$module_json_folder_path = trailingslashit($plugin_root) . 'modules-json/movie-card-module/';

		// Debug.
		error_log('[MovieCardModule] load() called');
		error_log('[MovieCardModule] JSON path: ' . $module_json_folder_path);
		error_log(
			'[MovieCardModule] module.json exists: ' .
			(file_exists($module_json_folder_path . 'module.json') ? 'YES' : 'NO')
		);

		// Register module with Divi.
		add_action(
			'init',
			function () use ($module_json_folder_path) {
				ModuleRegistration::register_module(
					$module_json_folder_path,
					[
						'render_callback' => [MovieCardModule::class, 'render_callback'],
					]
				);
			}
		);
	}
}
