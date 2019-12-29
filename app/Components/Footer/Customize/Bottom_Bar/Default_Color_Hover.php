<?php
/**
 * Footer Default Hover Color.
 *
 * This class handles the customizer control for the footer hover color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Footer\Customize\Bottom_Bar;

use Taproot\Customize\Controls\Color\Color;
use function Taproot\Tools\theme_mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Default_Color_Hover extends Color {

    /**
     * Stores name
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'default-color--hover';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Default Color: Hover';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {
        $styles->add([
            'selector' => '.app-footer a:hover',
            'styles' => [
                'color' => theme_mod( $this->id ),
            ]
        ]);
    }
}