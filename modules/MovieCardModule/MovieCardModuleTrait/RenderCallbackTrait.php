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

	public static function render_callback($attrs, $content, $block, $elements)
	{

		// Prepare Divi parent wrapping
		$parent = BlockParserStore::get_parent($block->parsed_block['id'], $block->parsed_block['storeInstance']);
		$parent_attrs = $parent->attrs ?? [];

		// HTML en NOWDOC (aucun conflit de guillemets)
		$cards_html = <<<'HTML'
<div class="movie-cards-container">
  <div class="movie-cards-wrapper">
    <div class="options">

      <!-- CARD 1 — DEADPOOL & WOLVERINE -->
      <div class="option active"
        style="--optionBackground: url(https://media.themoviedb.org/t/p/w1920_and_h800_multi_faces/ufpeVEM64uZHPpzzeiDNIAdaeOD.jpg);">
        <div class="option-inner">

          <div class="option-front">
            <div class="shadow"></div>
            <div class="label">
              <div class="icon"><i class="fas fa-skull"></i></div>
              <div class="info">
                <div class="main">Deadpool &amp; Wolverine</div>
                <div class="sub">Action • Comedy</div>
              </div>
            </div>
          </div>

          <div class="option-back">
            <h2>Deadpool &amp; Wolverine</h2>
            <div class="rating"><i class="fas fa-star"></i><span>7.6/10</span></div>
            <div class="overview">
              Deadpool franchit les frontières du Multivers pour rencontrer Wolverine et former une alliance explosive.
            </div>
            <div class="details">
              <div><strong>Release Date:</strong> 26 juillet 2024</div>
              <div><strong>Runtime:</strong> 2h 7m</div>
              <div><strong>Genre:</strong> Action, Comédie</div>
            </div>
          </div>

        </div>
      </div>

      <!-- CARD 2 — INSIDE OUT 2 -->
      <div class="option"
        style="--optionBackground: url(https://media.themoviedb.org/t/p/w1920_and_h800_multi_faces/p5ozvmdgsmbWe0H8Xk7Rc8SCwAB.jpg);">
        <div class="option-inner">
          <div class="option-front">
            <div class="shadow"></div>
            <div class="label">
              <div class="icon"><i class="fas fa-heart"></i></div>
              <div class="info">
                <div class="main">Inside Out 2</div>
                <div class="sub">Animation • Family</div>
              </div>
            </div>
          </div>

          <div class="option-back">
            <h2>Inside Out 2</h2>
            <div class="rating"><i class="fas fa-star"></i><span>8.0/10</span></div>
            <div class="overview">
              Riley fait face à de nouvelles émotions alors qu'elle grandit : Anxiété, Envie, Ennui et Embarras bouleversent son esprit.
            </div>
            <div class="details">
              <div><strong>Release Date:</strong> 14 juin 2024</div>
              <div><strong>Runtime:</strong> 1h 36m</div>
              <div><strong>Genre:</strong> Animation, Famille</div>
            </div>
          </div>

        </div>
      </div>

      <!-- CARD 3 — DUNE 2 -->
      <div class="option"
        style="--optionBackground: url(https://media.themoviedb.org/t/p/w1920_and_h800_multi_faces/xOMo8BRK7PfcJv9JCnx7s5hj0PX.jpg);">
        <div class="option-inner">
          <div class="option-front">
            <div class="shadow"></div>
            <div class="label">
              <div class="icon"><i class="fas fa-water"></i></div>
              <div class="info">
                <div class="main">Dune: Part Two</div>
                <div class="sub">Sci-Fi • Adventure</div>
              </div>
            </div>
          </div>

          <div class="option-back">
            <h2>Dune: Part Two</h2>
            <div class="rating"><i class="fas fa-star"></i><span>8.5/10</span></div>
            <div class="overview">
              Paul Atreides s’allie aux Fremen pour mener la guerre contre l’Empire et les Harkonnen.
            </div>
            <div class="details">
              <div><strong>Release Date:</strong> 1 mars 2024</div>
              <div><strong>Runtime:</strong> 2h 46m</div>
              <div><strong>Genre:</strong> Science-fiction, Aventure</div>
            </div>
          </div>

        </div>
      </div>

      <!-- CARD 4 — JOKER 2 -->
      <div class="option"
        style="--optionBackground: url(https://media.themoviedb.org/t/p/w1920_and_h800_multi_faces/AVWlQpVhpudyFsSh3OQIieHHYf.jpg);">
        <div class="option-inner">

          <div class="option-front">
            <div class="shadow"></div>
            <div class="label">
              <div class="icon"><i class="fas fa-mask"></i></div>
              <div class="info">
                <div class="main">Joker: Folie à Deux</div>
                <div class="sub">Drama • Crime</div>
              </div>
            </div>
          </div>

          <div class="option-back">
            <h2>Joker: Folie à Deux</h2>
            <div class="rating"><i class="fas fa-star"></i><span>6.9/10</span></div>
            <div class="overview">
              Arthur Fleck poursuit sa descente dans la folie, accompagné d’Harley Quinn.
            </div>
            <div class="details">
              <div><strong>Release Date:</strong> 4 octobre 2024</div>
              <div><strong>Runtime:</strong> 2h 12m</div>
              <div><strong>Genre:</strong> Drame, Crime</div>
            </div>
          </div>

        </div>
      </div>

      <!-- CARD 5 — KINGDOM OF THE PLANET OF THE APES -->
      <div class="option"
        style="--optionBackground: url(https://media.themoviedb.org/t/p/w1920_and_h800_multi_faces/iHYh4cdO8ylA3W0dUxTDVdyJ5G9.jpg);">
        <div class="option-inner">

          <div class="option-front">
            <div class="shadow"></div>
            <div class="label">
              <div class="icon"><i class="fas fa-paw"></i></div>
              <div class="info">
                <div class="main">Kingdom of the Planet of the Apes</div>
                <div class="sub">Action • Sci-Fi</div>
              </div>
            </div>
          </div>

          <div class="option-back">
            <h2>Kingdom of the Planet of the Apes</h2>
            <div class="rating"><i class="fas fa-star"></i><span>7.2/10</span></div>
            <div class="overview">
              Plusieurs générations après César, un jeune singe remet en question l'ordre établi dans un empire de primates.
            </div>
            <div class="details">
              <div><strong>Release Date:</strong> 10 mai 2024</div>
              <div><strong>Runtime:</strong> 2h 25m</div>
              <div><strong>Genre:</strong> Action, Science-fiction</div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>
HTML;

		// ==== WRAP DIVI ====
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
