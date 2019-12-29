<?php
/**
 * Font Size.
 *
 * This class handles the customizer control for the taglin font size.
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
class Font_Size extends Range {

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'font-size';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Font Size';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'em' => [
            'min' => 0.6,
            'max' => 2,
        ],
        'rem' => [
            'min' => 0.6,
            'max' => 2,
        ],
        'px' => [
            'min' => 10,
            'max' => 32,
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

        // Desktop Link Styles
        $styles->add([
            'selector' => '.app-header--fixed .menu--top__link',
            'styles' => [
                'font-size' => theme_mod( $this->id ),
            ],
            'screen' => 'desktop',
        ]);
    }
}
