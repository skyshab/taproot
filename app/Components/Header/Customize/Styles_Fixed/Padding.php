<?php
/**
 * Fixed Header Padding.
 *
 * This class handles the customizer control for the fixed header padding.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Styles_Fixed;

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
     * Control ID
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
    public $label = 'Fixed Header Padding';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'vw' => [
            'max' => 20,
            'default' => 5
        ],
        'px' => [
            'max' => 100,
            'default' => 24
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

        $padding = theme_mod( $this->id );

        $styles->add([
            'selector' => '.app-header--fixed .app-header__container',
            'styles' => [
                'padding-top'    => $padding,
                'padding-bottom' => $padding,
            ],
            'screen' => 'desktop'
        ]);
    }
}