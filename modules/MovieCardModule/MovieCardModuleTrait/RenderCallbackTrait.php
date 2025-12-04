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
    // Extraction des attributs Divi
    $card1_title = $attrs['card1_title'] ?? '';
    $card1_img = $attrs['card1_img'] ?? '';
    $card1_genre = $attrs['card1_genre'] ?? '';
    $card1_rating = $attrs['card1_rating'] ?? '';
    $card1_overview = $attrs['card1_overview'] ?? '';
    $card1_date = $attrs['card1_date'] ?? '';
    $card1_runtime = $attrs['card1_runtime'] ?? '';
    $card1_genre_full = $attrs['card1_genre_full'] ?? '';

    // Exemple :
    $card2_title = $attrs['card2_title'] ?? '';
    $card2_img = $attrs['card2_img'] ?? '';
    $card2_genre = $attrs['card2_genre'] ?? '';
    $card2_rating = $attrs['card2_rating'] ?? '';
    $card2_overview = $attrs['card2_overview'] ?? '';
    $card2_date = $attrs['card2_date'] ?? '';
    $card2_runtime = $attrs['card2_runtime'] ?? '';
    $card2_genre_full = $attrs['card2_genre_full'] ?? '';

    $card3_title = $attrs['card3_title'] ?? '';
    $card3_img = $attrs['card3_img'] ?? '';
    $card3_genre = $attrs['card3_genre'] ?? '';
    $card3_rating = $attrs['card3_rating'] ?? '';
    $card3_overview = $attrs['card3_overview'] ?? '';
    $card3_date = $attrs['card3_date'] ?? '';
    $card3_runtime = $attrs['card3_runtime'] ?? '';
    $card3_genre_full = $attrs['card3_genre_full'] ?? '';

    $card4_title = $attrs['card4_title'] ?? '';
    $card4_img = $attrs['card4_img'] ?? '';
    $card4_genre = $attrs['card4_genre'] ?? '';
    $card4_rating = $attrs['card4_rating'] ?? '';
    $card4_overview = $attrs['card4_overview'] ?? '';
    $card4_date = $attrs['card4_date'] ?? '';
    $card4_runtime = $attrs['card4_runtime'] ?? '';
    $card4_genre_full = $attrs['card4_genre_full'] ?? '';

    $card5_title = $attrs['card5_title'] ?? '';
    $card5_img = $attrs['card5_img'] ?? '';
    $card5_genre = $attrs['card5_genre'] ?? '';
    $card5_rating = $attrs['card5_rating'] ?? '';
    $card5_overview = $attrs['card5_overview'] ?? '';
    $card5_date = $attrs['card5_date'] ?? '';
    $card5_runtime = $attrs['card5_runtime'] ?? '';
    $card5_genre_full = $attrs['card5_genre_full'] ?? '';

    // === HTML OUTPUT ===
    $html  = '<div class="movie-cards-container">';
    $html .= '  <div class="movie-cards-wrapper">';
    $html .= '    <div class="options">';

    // CARD 1
    $html .= '      <div class="option active" style="--optionBackground: url(' . esc_url($card1_img) . ');">';
    $html .= '        <div class="option-inner">';

    $html .= '          <div class="option-front">';
    $html .= '            <div class="shadow"></div>';
    $html .= '            <div class="label">';
    $html .= '              <div class="icon"><i class="fas fa-skull"></i></div>';
    $html .= '              <div class="info">';
    $html .= '                <div class="main">' . esc_html($card1_title) . '</div>';
    $html .= '                <div class="sub">' . esc_html($card1_genre) . '</div>';
    $html .= '              </div>';
    $html .= '            </div>';
    $html .= '          </div>';

    $html .= '          <div class="option-back">';
    $html .= '            <h2>' . esc_html($card1_title) . '</h2>';
    $html .= '            <div class="rating"><i class="fas fa-star"></i><span>' . esc_html($card1_rating) . '</span></div>';
    $html .= '            <div class="overview">' . esc_html($card1_overview) . '</div>';
    $html .= '            <div class="details">';
    $html .= '              <div><strong>Release Date:</strong> ' . esc_html($card1_date) . '</div>';
    $html .= '              <div><strong>Runtime:</strong> ' . esc_html($card1_runtime) . '</div>';
    $html .= '              <div><strong>Genre:</strong> ' . esc_html($card1_genre_full) . '</div>';
    $html .= '            </div>';
    $html .= '          </div>';

    $html .= '        </div>';
    $html .= '      </div>';

    // CARD 2
    $html .= '      <div class="option" style="--optionBackground: url(' . esc_url($card2_img) . ');">';
    $html .= '        <div class="option-inner">';

    $html .= '          <div class="option-front">';
    $html .= '            <div class="shadow"></div>';
    $html .= '            <div class="label">';
    $html .= '              <div class="icon"><i class="fas fa-skull"></i></div>';
    $html .= '              <div class="info">';
    $html .= '                <div class="main">' . esc_html($card2_title) . '</div>';
    $html .= '                <div class="sub">' . esc_html($card2_genre) . '</div>';
    $html .= '              </div>';
    $html .= '            </div>';
    $html .= '          </div>';

    $html .= '          <div class="option-back">';
    $html .= '            <h2>' . esc_html($card2_title) . '</h2>';
    $html .= '            <div class="rating"><i class="fas fa-star"></i><span>' . esc_html($card2_rating) . '</span></div>';
    $html .= '            <div class="overview">' . esc_html($card2_overview) . '</div>';
    $html .= '            <div class="details">';
    $html .= '              <div><strong>Release Date:</strong> ' . esc_html($card2_date) . '</div>';
    $html .= '              <div><strong>Runtime:</strong> ' . esc_html($card2_runtime) . '</div>';
    $html .= '              <div><strong>Genre:</strong> ' . esc_html($card2_genre_full) . '</div>';
    $html .= '            </div>';
    $html .= '          </div>';

    $html .= '        </div>';
    $html .= '      </div>';

    // CARD 3
    $html .= '      <div class="option" style="--optionBackground: url(' . esc_url($card3_img) . ');">';
    $html .= '        <div class="option-inner">';

    $html .= '          <div class="option-front">';
    $html .= '            <div class="shadow"></div>';
    $html .= '            <div class="label">';
    $html .= '              <div class="icon"><i class="fas fa-skull"></i></div>';
    $html .= '              <div class="info">';
    $html .= '                <div class="main">' . esc_html($card3_title) . '</div>';
    $html .= '                <div class="sub">' . esc_html($card3_genre) . '</div>';
    $html .= '              </div>';
    $html .= '            </div>';
    $html .= '          </div>';

    $html .= '          <div class="option-back">';
    $html .= '            <h2>' . esc_html($card3_title) . '</h2>';
    $html .= '            <div class="rating"><i class="fas fa-star"></i><span>' . esc_html($card3_rating) . '</span></div>';
    $html .= '            <div class="overview">' . esc_html($card3_overview) . '</div>';
    $html .= '            <div class="details">';
    $html .= '              <div><strong>Release Date:</strong> ' . esc_html($card3_date) . '</div>';
    $html .= '              <div><strong>Runtime:</strong> ' . esc_html($card3_runtime) . '</div>';
    $html .= '              <div><strong>Genre:</strong> ' . esc_html($card3_genre_full) . '</div>';
    $html .= '            </div>';
    $html .= '          </div>';

    $html .= '        </div>';
    $html .= '      </div>';

    // CARD 4
    $html .= '      <div class="option" style="--optionBackground: url(' . esc_url($card4_img) . ');">';
    $html .= '        <div class="option-inner">';

    $html .= '          <div class="option-front">';
    $html .= '            <div class="shadow"></div>';
    $html .= '            <div class="label">';
    $html .= '              <div class="icon"><i class="fas fa-skull"></i></div>';
    $html .= '              <div class="info">';
    $html .= '                <div class="main">' . esc_html($card4_title) . '</div>';
    $html .= '                <div class="sub">' . esc_html($card4_genre) . '</div>';
    $html .= '              </div>';
    $html .= '            </div>';
    $html .= '          </div>';

    $html .= '          <div class="option-back">';
    $html .= '            <h2>' . esc_html($card4_title) . '</h2>';
    $html .= '            <div class="rating"><i class="fas fa-star"></i><span>' . esc_html($card4_rating) . '</span></div>';
    $html .= '            <div class="overview">' . esc_html($card4_overview) . '</div>';
    $html .= '            <div class="details">';
    $html .= '              <div><strong>Release Date:</strong> ' . esc_html($card4_date) . '</div>';
    $html .= '              <div><strong>Runtime:</strong> ' . esc_html($card4_runtime) . '</div>';
    $html .= '              <div><strong>Genre:</strong> ' . esc_html($card4_genre_full) . '</div>';
    $html .= '            </div>';
    $html .= '          </div>';

    $html .= '        </div>';
    $html .= '      </div>';

    // CARD 5
    $html .= '      <div class="option" style="--optionBackground: url(' . esc_url($card5_img) . ');">';
    $html .= '        <div class="option-inner">';

    $html .= '          <div class="option-front">';
    $html .= '            <div class="shadow"></div>';
    $html .= '            <div class="label">';
    $html .= '              <div class="icon"><i class="fas fa-skull"></i></div>';
    $html .= '              <div class="info">';
    $html .= '                <div class="main">' . esc_html($card5_title) . '</div>';
    $html .= '                <div class="sub">' . esc_html($card5_genre) . '</div>';
    $html .= '              </div>';
    $html .= '            </div>';
    $html .= '          </div>';

    $html .= '          <div class="option-back">';
    $html .= '            <h2>' . esc_html($card5_title) . '</h2>';
    $html .= '            <div class="rating"><i class="fas fa-star"></i><span>' . esc_html($card5_rating) . '</span></div>';
    $html .= '            <div class="overview">' . esc_html($card5_overview) . '</div>';
    $html .= '            <div class="details">';
    $html .= '              <div><strong>Release Date:</strong> ' . esc_html($card5_date) . '</div>';
    $html .= '              <div><strong>Runtime:</strong> ' . esc_html($card5_runtime) . '</div>';
    $html .= '              <div><strong>Genre:</strong> ' . esc_html($card5_genre_full) . '</div>';
    $html .= '            </div>';
    $html .= '          </div>';

    $html .= '        </div>';
    $html .= '      </div>';

    // FERMETURE STRUCTURE
    $html .= '    </div>';
    $html .= '  </div>';
    $html .= '</div>';

    // === RETURN DIVI WRAPPER ===
    return $html;
}


}
