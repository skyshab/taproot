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

namespace Taproot\Components\Sidebar\Customize\Sidebar;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Tools\Mod;
use function Taproot\Tools\theme_mod;
use function Hybrid\app;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Line_Height extends Range {

    /**
     * Custom control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'sidebar--line-height';

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
    public $default = [
        'mobile' => '1.5',
        'tablet' => '1.6',
        'desktop' => '1.5'
    ];

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

        // Mobile
        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( $this->id ),
            'screen' => 'default'
        ]);

        // Block Spacing
        $styles->customProperty([
            'name' => 'sidebar--block-spacing',
            'value' => app('typography')->maybe_convert_to_em( theme_mod( $this->id ) ),
            'screen' => 'default'
        ]);

        // Tablet
        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( "{$this->id}--tablet" ),
            'screen' => 'tablet'
        ]);

        // Block Spacing: Tablet
        $styles->customProperty([
            'name' => 'sidebar--block-spacing',
            'value' => app('typography')->maybe_convert_to_em( theme_mod( "{$this->id}--tablet" ) ),
            'screen' => 'tablet-and-up'
        ]);

        // Desktop
        $styles->customProperty([
            'name' => $this->id,
            'value' => theme_mod( "{$this->id}--desktop" ),
            'screen' => 'desktop'
        ]);

        // Block Spacing: Desktop
        $styles->customProperty([
            'name' => 'sidebar--block-spacing',
            'value' => app('typography')->maybe_convert_to_em( theme_mod( "{$this->id}--desktop" ) ),
            'screen' => 'desktop'
        ]);
    }

    /**
     * Preview Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function previewStyles() {

        // Default/mobile
        $script = <<< JS
        wp.customize( "{$this->id}", function( value ) {
            value.bind( function( to ) {
                rootstrap.customProperty({
                    name: "{$this->id}",
                    value: to
                });
                rootstrap.customProperty({
                    name: 'sidebar--block-spacing',
                    value: maybeConvertToEm( to )
                });
            });
        });
JS;

        // Tablet
        if( isset( $this->devices ) && in_array( 'tablet', $this->devices ) ) {

            $script .= <<< JS
            wp.customize( "{$this->id}--tablet", function( value ) {
                value.bind( function( to ) {
                    rootstrap.customProperty({
                        name: "{$this->id}",
                        value: to,
                        screen: 'tablet'
                    });
                    rootstrap.customProperty({
                        name: 'sidebar--block-spacing',
                        screen: 'tablet-and-up',
                        value: maybeConvertToEm( to )
                    });
                });
            });
JS;
        }

        // Desktop
        if( isset( $this->devices ) && in_array( 'desktop', $this->devices ) ) {

            $script .= <<< JS
            wp.customize( "{$this->id}--desktop", function( value ) {
                value.bind( function( to ) {
                    rootstrap.customProperty({
                        name: "{$this->id}",
                        value: to,
                        screen: 'desktop'
                    });
                    rootstrap.customProperty({
                        name: 'sidebar--block-spacing',
                        screen: 'desktop',
                        value: maybeConvertToEm( to )
                    });
                });
            });
JS;
        }

        // Return custom property scripts
        return $script;
    }
}
