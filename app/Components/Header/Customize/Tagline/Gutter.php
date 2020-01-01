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

namespace Taproot\Components\Header\Customize\Tagline;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Tools\Mod;
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
    public $label = 'Gutter';

    /**
     * Devices
     *
     * @since 2.0.0
     * @var array
     */
    public $devices = ['mobile', 'tablet', 'desktop'];

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = [
        'mobile'    => '0px',
        'tablet'    => '0px',
        'desktop'   => '2px'
    ];

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'px' => [
            'max' => 100,
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

        // Mobile: If tagline is not hidden
        if( ! Mod::get( "header--tagline--hide" ) ) {

            $styles->customProperty([
                'name' => $this->id,
                'value' => theme_mod( $this->id ),
                'screen' => 'default'
            ]);
        }

        // Tablet: If tagline is not hidden
        if( ! Mod::get( "header--tagline--hide--tablet" ) ) {

            $styles->customProperty([
                'name' => $this->id,
                'value' => theme_mod( "{$this->id}--tablet" ),
                'screen' => 'tablet'
            ]);
        }

        // Desktop: If tagline is not hidden
        if( ! Mod::get( "header--tagline--hide--desktop" ) ) {

            $styles->customProperty([
                'name' => $this->id,
                'value' => theme_mod( "{$this->id}--desktop" ),
                'screen' => 'desktop'
            ]);
        }
    }
}
