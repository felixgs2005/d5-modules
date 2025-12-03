<?php
/*
Plugin Name: D5 Demo Modules: Modules
Plugin URI:
Description: Example modules.
Version:     0.1.0
Author:      Elegant Themes
Author URI:  https://elegantthemes.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: d5-modules-demo
Domain Path: /languages
*/

if (!defined('ABSPATH')) {
	die('Direct access forbidden.');
}

define('D5_DEMO_MODULES_PATH', plugin_dir_path(__FILE__));
define('D5_DEMO_MODULES_JSON_PATH', D5_DEMO_MODULES_PATH . 'modules-json/');

/**
 * Requires Autoloader + Modules
 */
require D5_DEMO_MODULES_PATH . 'vendor/autoload.php';
require D5_DEMO_MODULES_PATH . 'modules/Modules.php';



/**
 * ---------------------------------------------------------
 *  VISUAL BUILDER (VB) — Charge les scripts + CSS du builder
 * ---------------------------------------------------------
 */
function d5_demo_modules_enqueue_vb_scripts()
{

	if (et_builder_d5_enabled() && et_core_is_fb_enabled()) {
		$plugin_url = plugin_dir_url(__FILE__);

		// JS du builder
		\ET\Builder\VisualBuilder\Assets\PackageBuildManager::register_package_build(
			[
				'name' => 'd5-demo-modules-builder-js',
				'version' => '1.0.0',
				'script' => [
					'src' => $plugin_url . 'scripts/bundle.js',
					'deps' => [
						'divi-module-library',
						'divi-vendor-wp-hooks'
					],
					'enqueue_top_window' => false,
					'enqueue_app_window' => true,
				],
			]
		);

		// CSS du builder
		\ET\Builder\VisualBuilder\Assets\PackageBuildManager::register_package_build(
			[
				'name' => 'd5-demo-modules-builder-css',
				'version' => '1.0.0',
				'style' => [
					'src' => $plugin_url . 'styles/vb-bundle.css',
					'deps' => [],
					'enqueue_top_window' => false,
					'enqueue_app_window' => true,
				],
			]
		);
	}
}
add_action('divi_visual_builder_assets_before_enqueue_scripts', 'd5_demo_modules_enqueue_vb_scripts');




/**
 * ---------------------------------------------------------
 *  FRONT-END — Charge le CSS public du module
 * ---------------------------------------------------------
 */
function d5_demo_modules_enqueue_frontend_scripts()
{

	$plugin_url = plugin_dir_url(__FILE__);

	// CSS public (bundle.css)
	wp_enqueue_style(
		'd5-demo-modules-frontend-css',
		$plugin_url . 'styles/bundle.css',
		[],
		'1.0.0'
	);
}
add_action('wp_enqueue_scripts', 'd5_demo_modules_enqueue_frontend_scripts');

/**
 * Enqueue Movie Card flip JavaScript
 */
add_action('wp_enqueue_scripts', function () {
	$plugin_url = plugin_dir_url(__FILE__);

	wp_enqueue_script(
		'movie-card-flip-js',
		$plugin_url . 'scripts/movie-cards.js',
		[],
		'1.0.0',
		true
	);
});