<?php
/**
 * Register all modules with dependency tree.
 */

namespace MEE\Modules;

if (!defined('ABSPATH')) {
	die('Direct access forbidden.');
}

use MEE\Modules\MovieCardModule\MovieCardModule;
use MEE\Modules\HelloWorldModule\HelloWorldModule;
use MEE\Modules\DemoCardModule\DemoCardModule;
use MEE\Modules\DemoEtudiantModule\DemoEtudiantModule;

/**
 * 1. Add modules to Divi dependency tree
 */
add_action(
	'divi_module_library_modules_dependency_tree',
	function ($dependency_tree) {
		$dependency_tree->add_dependency(new MovieCardModule());
		$dependency_tree->add_dependency(new HelloWorldModule());
		$dependency_tree->add_dependency(new DemoCardModule());
		$dependency_tree->add_dependency(new DemoEtudiantModule());
	}
);