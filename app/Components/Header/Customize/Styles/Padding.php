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

namespace Taproot\Components\Header\Customize\Styles;

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
     * Custom control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'header--padding';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Header Padding';

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
    public function styles( $styles ) {

        // Custom Property: Padding
        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( $this->id ),
        ]);

        // Custom Property: Padding Tablet
        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( "{$this->id}--tablet" ),
            'screen' => 'tablet-and-up'
        ]);

        // Custom Property: Padding Desktop
        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( "{$this->id}--desktop" ),
            'screen' => 'desktop'
        ]);
    }
}
