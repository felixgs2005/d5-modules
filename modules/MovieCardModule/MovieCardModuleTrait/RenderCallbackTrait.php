<?php
/**
 * MovieCardModule::render_callback()
 *
 * @package MEE\Modules\MovieCardModule
 */

namespace MEE\Modules\MovieCardModule\MovieCardModuleTrait;

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
  /**
   * Fetch TMDB data for a movie ID
   */
  private static function fetch_movie($id)
  {
    if (!$id)
      return null;

    $apiKey = "cda3a22976c1df786a2d28c0e5fce01e";

    $url = "https://api.themoviedb.org/3/movie/$id?api_key=$apiKey&language=fr-FR";

    $response = wp_remote_get($url);
    if (is_wp_error($response)) {
      return null;
    }

    $data = json_decode(wp_remote_retrieve_body($response), true);
    return $data ?: null;
  }

  /**
   * Build one movie card HTML
   */
  private static function build_card($movie, $isActive = false)
  {
    if (!$movie) {
      return '<div class="option"><div class="option-inner"><div class="option-front"><div class="label"><div class="info"><div class="main">Invalid ID</div></div></div></div></div></div>';
    }

    $bg = "https://image.tmdb.org/t/p/w1920_and_h800_multi_faces{$movie['backdrop_path']}";
    $title = esc_html($movie['title']);
    $tagline = esc_html($movie['tagline']);
    $rating = esc_html($movie['vote_average']);
    $overview = esc_html($movie['overview']);
    $release = esc_html($movie['release_date']);
    $runtime = esc_html($movie['runtime']) . " min";
    $genres = implode(', ', array_column($movie['genres'], 'name'));

    $activeClass = $isActive ? "active" : "";

    return <<<HTML
<div class="option $activeClass" style="--optionBackground: url($bg);">
  <div class="option-inner">

    <div class="option-front">
      <div class="shadow"></div>
      <div class="label">
        <div class="icon"><i class="fas fa-film"></i></div>
        <div class="info">
          <div class="main">$title</div>
          <div class="sub">$genres</div>
        </div>
      </div>
    </div>

    <div class="option-back">
      <h2>$title</h2>
      <div class="rating"><i class="fas fa-star"></i><span>$rating / 10</span></div>

      <div class="overview">$overview</div>

      <div class="details">
        <div><strong>Date de sortie:</strong> $release</div>
        <div><strong>Durée:</strong> $runtime</div>
        <div><strong>Genres:</strong> $genres</div>
      </div>
    </div>

  </div>
</div>
HTML;
  }

  /**
   * Main render callback
   */
  public static function render_callback($attrs, $content, $block, $elements)
  {
    // Lire les 5 Movie IDs depuis Divi
    $ids = [
      $attrs['movieId1']['innerContent']['desktop']['value'] ?? '',
      $attrs['movieId2']['innerContent']['desktop']['value'] ?? '',
      $attrs['movieId3']['innerContent']['desktop']['value'] ?? '',
      $attrs['movieId4']['innerContent']['desktop']['value'] ?? '',
      $attrs['movieId5']['innerContent']['desktop']['value'] ?? '',
    ];

    // Récupérer données TMDB
    $movies = [];
    foreach ($ids as $i => $id) {
      $movies[$i] = self::fetch_movie($id);
    }

    // Construire HTML dynamique
    $cards_html = '<div class="movie-cards-container"><div class="movie-cards-wrapper"><div class="options">';

    foreach ($movies as $i => $movie) {
      $cards_html .= self::build_card($movie, $i === 0); // première carte = active
    }

    $cards_html .= '</div></div></div>';

    // Divi wrapping
    $parent = BlockParserStore::get_parent($block->parsed_block['id'], $block->parsed_block['storeInstance']);
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
        HTMLUtility::render([
          'tag' => 'div',
          'attributes' => ['class' => 'example_movie_card_module__inner'],
          'childrenSanitizer' => 'et_core_esc_previously',
          'children' => $cards_html,
        ])
      ],
    ]);
  }
}
