<?php
/**
 * Line Height
 *
 * This class handles the component line height.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Header\Customize\Title;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Customize\Traits\CustomPropertyPreview;
use Taproot\Tools\Mod;
use function Taproot\Tools\theme_mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Line_Height extends Range {

    use CustomPropertyPreview;

    /**
     * Custom control ID
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
    public $default = '1';

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'unitless' => [
            'min' => 0.5,
            'max' => 3,
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
    public function styles( $styles ) {

        // Mobile: If title is not hidden
        if( ! Mod::get( "header--title--hide" ) ) {

            $styles->customProperty([
                'name' => $this->id,
                'value' => theme_mod( $this->id ),
                'screen' => 'default'
            ]);
        }

        // Tablet: If title is not hidden
        if( ! Mod::get( "header--title--hide--tablet" ) ) {

            $styles->customProperty([
                'name' => $this->id,
                'value' => theme_mod( "{$this->id}--tablet" ),
                'screen' => 'tablet'
            ]);
        }

        // Desktop: If title is not hidden
        if( ! Mod::get( "header--title--hide--desktop" ) ) {

            $styles->customProperty([
                'name' => $this->id,
                'value' => theme_mod( "{$this->id}--desktop" ),
                'screen' => 'desktop'
            ]);
        }
    }
}
