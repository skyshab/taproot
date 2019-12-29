<?php
/**
 * Color.
 *
 * This class handles an instance of the color customizer control.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Navbar\Customize\Navbar_Mobile;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Components\Navigation_Navbar\Functions;
use function Taproot\Tools\theme_mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Icon_Color extends Color {

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'icon-color';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Icon Color';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        $styles->add([
            'selector' => '.menu--navbar .menu--toggle',
            'styles' => [
                'fill'  => theme_mod( $this->id ),
                'color' => theme_mod( $this->id ),
            ],
            'screen' => Functions::get_mobile_screen(),
        ]);
    }
}
