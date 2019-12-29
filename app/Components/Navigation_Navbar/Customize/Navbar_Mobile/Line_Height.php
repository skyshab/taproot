<?php
/**
 * Hero height.
 *
 * This class handles the customizer control for the hero height.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Navbar\Customize\Navbar_Mobile;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Components\Navigation_Navbar\Functions;
use function Taproot\Tools\theme_mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Line_Height extends Range {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'line-height';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Line Height';

    /**
     * Default values
     *
     * @since 2.0.0
     * @var array
     */
    public $default = '2.5';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'unitless' => [
            'min' => 0.5,
            'max' => 5,
            'step' => 0.01,
            'default' => 1
        ],
        'px' => [
            'min' => 0,
            'max' => 72,
        ]
    ];

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        $styles->customProperty([
            'name' => 'navigation--navbar--line-height',
            'value' => theme_mod( $this->id ),
            'screen' => Functions::get_mobile_screen(),
        ]);
    }
}
