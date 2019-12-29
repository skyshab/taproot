<?php
/**
 * Link Color Hover.
 *
 * This class handles the customizer control for the component link color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Header\Customize\Header_Fixed;

use Taproot\Customize\Controls\Color\Color;
use function Taproot\Tools\theme_mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Dropdown_Link_Color_Hover extends Color {

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'dropdown--link-color--hover';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Dropdown Link Color: Hover';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        $styles->add([
            'selector' => '.app-header--fixed .menu__sub-menu .menu--header__link:hover',
            'styles' => [
                'color' => theme_mod( $this->id ),
            ],
            'screen' => 'desktop',
        ]);
    }
}
