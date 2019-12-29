<?php
/**
 * Link Color Visited.
 *
 * This class handles the customizer control for the component link color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Typography\Customize\Links;

use Taproot\Customize\Controls\Color\Color;
use function Taproot\Tools\theme_mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Link_Color_Visited extends Color {

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'color--visited';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Link Color: Visited';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( $this->id ),
        ]);
    }
}
