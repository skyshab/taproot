<?php
/**
 * Padding.
 *
 * This class handles the customizer control for the padding.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Top\Customize\Top_Fixed;

use Taproot\Customize\Controls\Range\Range;
use function Taproot\Tools\theme_mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Padding extends Range {

    /**
     * Custom control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'padding';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Menu Item Padding';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max' => 64,
        ],
        'em' => [
            'max' => 4,
        ],
    ];

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        $styles->add([
            'selector' => '.app-header--fixed .menu--top__link',
            'styles' => [
                'padding-left'  => theme_mod( $this->id ),
                'padding-right' => theme_mod( $this->id ),
            ],
            'screen' => 'desktop',
        ]);
    }
}
