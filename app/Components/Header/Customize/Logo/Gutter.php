<?php
/**
 * Fixed Header Logo Gutter.
 *
 * This class handles the customizer control for the fixed header logo gutter.
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
class Gutter extends Range {

    /**
     * Custom control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'gutter';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Gutter Width';

    /**
     * Default value
     *
     * @since 2.0.0
     * @var array
     */
    public $default = '16px';

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
            'max' => 50,
            'default' => 16
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

        // Custom Property: Logo Gutter Width
        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( $this->id ),
        ]);

        // Custom Property: Logo Gutter Width Tablet
        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( "{$this->id}--tablet" ),
            'screen' => 'tablet-and-up'
        ]);

        // Custom Property: Logo Gutter Width Desktop
        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( "{$this->id}--desktop" ),
            'screen' => 'desktop'
        ]);
    }
}
