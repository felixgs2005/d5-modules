<?php
/**
 * MovieCardModule::render_callback()
 *
 * @package MEE\Modules\MovieCardModule
 */

namespace MEE\Modules\MovieCardModule\MovieCardModule;

if (!defined('ABSPATH')) {
	die('Direct access forbidden.');
}

use ET\Builder\Packages\Module\Module;
use ET\Builder\Framework\Utility\HTMLUtility;
use ET\Builder\FrontEnd\BlockParser\BlockParserStore;
use ET\Builder\Packages\Module\Options\Element\ElementComponents;
use MEE\Modules\MovieCardModule\MovieCardModule;

trait RenderCallbackTrait
{

	public static function render_callback($attrs, $content, $block, $elements)
	{

		// ================================
		// 1. Get Movie ID from Divi field
		// ================================
		$movie_id = $attrs['movieId']['innerContent']['desktop']['value'] ?? '';

		if (empty($movie_id)) {
			return '<div style="color:red;">No Movie ID provided.</div>';
		}

		// ================================
		// 2. Fetch TMDB API
		// ================================
		$api_key = "cda3a22976c1df786a2d28c0e5fce01e";
		$api_url = "https://api.themoviedb.org/3/movie/{$movie_id}?api_key={$api_key}&language=fr-FR";

		$response = wp_remote_get($api_url);
		$api_data = json_decode(wp_remote_retrieve_body($response));

		if (empty($api_data) || isset($api_data->status_code)) {
			return '<div style="color:red;">Invalid Movie ID or TMDB error.</div>';
		}

		// Extract data
		$title = esc_html($api_data->title ?? '');
		$tagline = esc_html($api_data->tagline ?? '');
		$rating = esc_html($api_data->vote_average ?? '');
		$synopsis = esc_html($api_data->overview ?? '');
		$releaseDate = esc_html($api_data->release_date ?? '');
		$runtime = esc_html($api_data->runtime ?? '');

		$genres_list = [];
		if (isset($api_data->genres)) {
			foreach ($api_data->genres as $g) {
				$genres_list[] = $g->name;
			}
		}
		$genres = esc_html(implode(', ', $genres_list));

		// Poster
		$poster_path = '';
		if (!empty($api_data->poster_path)) {
			$poster_path = "https://image.tmdb.org/t/p/w780{$api_data->poster_path}";
		}

		// ================================
		// 3. Build HTML
		// ================================

		$image_html = HTMLUtility::render([
			'tag' => 'img',
			'attributes' => [
				'src' => $poster_path,
				'alt' => $title,
			],
			'attributesSanitizers' => [
				'src' => fn($value) => esc_url($value),
			]
		]);

		$image_container = HTMLUtility::render([
			'tag' => 'div',
			'attributes' => [
				'class' => 'example_movie_card_module__image',
			],
			'children' => $image_html,
			'childrenSanitizer' => 'et_core_esc_previously'
		]);

		// Content container
		$content_html = "
      <h2 class='example_movie_card_module__title'>{$title}</h2>
      <p class='example_movie_card_module__tagline'>{$tagline}</p>
      <p class='example_movie_card_module__genres'>{$genres}</p>
      <p class='example_movie_card_module__rating'>Note : {$rating}</p>
      <p class='example_movie_card_module__synopsis'>{$synopsis}</p>
      <p class='example_movie_card_module__release-date'>Sortie : {$releaseDate}</p>
      <p class='example_movie_card_module__runtime'>Durée : {$runtime} min</p>
    ";

		$content_container = HTMLUtility::render([
			'tag' => 'div',
			'attributes' => [
				'class' => 'example_movie_card_module__content-container',
			],
			'children' => $content_html,
			'childrenSanitizer' => 'et_core_esc_previously'
		]);

		// ================================
		// 4. Render with Divi Module::render
		// ================================
		$parent = BlockParserStore::get_parent(
			$block->parsed_block['id'],
			$block->parsed_block['storeInstance']
		);

		$parent_attrs = $parent->attrs ?? [];

		return Module::render([
			'orderIndex' => $block->parsed_block['orderIndex'],
			'storeInstance' => $block->parsed_block['storeInstance'],
			'attrs' => $attrs,
			'elements' => $elements,
			'id' => $block->parsed_block['id'],
			'name' => $block->block_type->name,
			'moduleCategory' => $block->block_type->category,
			'classnamesFunction' => [MovieCardModule::class, 'module_classnames'],
			'stylesComponent' => [MovieCardModule::class, 'module_styles'],
			'scriptDataComponent' => [MovieCardModule::class, 'module_script_data'],
			'parentAttrs' => $parent_attrs,
			'parentId' => $parent->id ?? '',
			'parentName' => $parent->blockName ?? '',
			'children' => [
				ElementComponents::component([
					'attrs' => $attrs['module']['decoration'] ?? [],
					'id' => $block->parsed_block['id'],
					'orderIndex' => $block->parsed_block['orderIndex'],
					'storeInstance' => $block->parsed_block['storeInstance'],
				]),
				HTMLUtility::render([
					'tag' => 'div',
					'attributes' => [
						'class' => 'example_movie_card_module__inner'
					],
					'childrenSanitizer' => 'et_core_esc_previously',
					'children' => $image_container . $content_container
				])
			]
		]);

	}
}
