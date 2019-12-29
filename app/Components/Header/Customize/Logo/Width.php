<?php
/**
 * Logo width.
 *
 * This class handles the customizer control for the logo width.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Logo;

use Taproot\Customize\Controls\Range\Range;
use function Taproot\Tools\theme_mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Width extends Range {

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'width';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Logo Width';

    /**
     * Default value
     *
     * @since 2.0.0
     * @var array
     */
    public $default = [
        'mobile'    => '60px',
        'tablet'    => '60px',
        'desktop'   => '75px'
    ];

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
        'px' => [
            'max' => 500,
            'default' => 60
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

        // Custom Property: Logo Width
        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( $this->id ),
        ]);

        // Custom Property: Logo Width Tablet
        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( "{$this->id}--tablet" ),
            'screen' => 'tablet-and-up'
        ]);

        // Custom Property: Logo Width Desktop
        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( "{$this->id}--desktop" ),
            'screen' => 'desktop'
        ]);
    }
}
