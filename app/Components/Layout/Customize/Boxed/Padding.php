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

namespace Taproot\Components\Layout\Customize\Boxed;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Components\Layout\Functions;
use Taproot\Tools\Mod;

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
    public $name = 'outer-padding';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Outer Padding';

    /**
     * Default value
     *
     * @since 2.0.0
     * @var array
     */
    public $default = '4vw';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'vw' => [
            'max' => 20,
            'default' => 4
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

        $padding = Mod::get( $this->id );

        $styles->customProperty([
            'name' => $this->id,
            'value' => $padding,
            'callback' => Functions::is_boxed_layout(),
        ]);

        // if boxed layout and using 100vh for the max-height, account for boxed layout padding
        if( Functions::is_boxed_layout() && $padding) {
            $styles->add([
                'screen' => 'desktop',
                'selector' => '.app-header--has-custom-header.boxed-layout:not(.app-header--fixed)',
                'styles' => [
                    'max-height' => sprintf( "calc(100vh - %s)", $padding ),
                ],
            ]);
        }
    }
}
