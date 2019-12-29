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

namespace Taproot\Components\Header\Customize\Hero;

use Taproot\Customize\Controls\Range\Range;
use function Taproot\Tools\theme_mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Height extends Range {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'height';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Hero Height';

    /**
     * Default values
     *
     * @since 2.0.0
     * @var array
     */
    public $default = 'disabled';

    /**
     * Devices
     *
     * @since 2.0.0
     * @var array
     */
    public $devices = ['mobile', 'tablet', 'desktop'];

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'vw' => [
            'min' => 0,
            'max' => 100,
        ],
        'vh' => [
            'min' => 0,
            'max' => 100,
        ],
        'px' => [
            'min' => 0,
            'max' => 1200,
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

        $selector = '.app-header--has-custom-header:not(.app-header--fixed)';

        // Mobile header image height
        $styles->add([
            'selector' => $selector,
            'styles' => [
                'min-height' => theme_mod( $this->id ),
            ]
        ]);

        // Tablet header image height
        $styles->add([
            'screen' => 'tablet-and-up',
            'selector' => $selector,
            'styles' => [
                'min-height' => theme_mod( "{$this->id}--tablet" ),
            ]
        ]);

        // Desktop header image height
        $styles->add([
            'screen' => 'desktop',
            'selector' => $selector,
            'styles' => [
                'min-height' => theme_mod( "{$this->id}--desktop" ),
            ]
        ]);
    }
}
