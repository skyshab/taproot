<?php
/**
 * Line Height.
 *
 * This class handles the body line height.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Typography\Customize\Body;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Tools\CSS_Units;
use Taproot\Tools\Mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Line_Height extends Range {

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
    public $default = [
        'mobile'    => '1.5',
        'tablet'    => '1.6',
        'desktop'   => '1.6'
    ];

    /**
     * Range atts
     *
     * @since 2.0.0
     * @var array
     */
    public $atts = [
        'unitless' => [
            'min'   => 0.5,
            'max'   => 3,
            'step'  => 0.01,
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
            'name'      => $this->id,
            'value'     => Mod::get( $this->id ),
            'screen'    => 'default'
        ]);

        // Text Spacing
        $styles->customProperty([
            'name'      => 'text-spacing',
            'value'     => CSS_Units::convert_unit( Mod::get( $this->id ), 'em' ),
            'screen'    => 'default'
        ]);

        // Tablet
        $styles->customProperty([
            'name'      => $this->id,
            'value'     => Mod::get( "{$this->id}--tablet" ),
            'screen'    => 'tablet'
        ]);

        // Text Spacing: Tablet
        $styles->customProperty([
            'name'      => 'text-spacing',
            'value'     => CSS_Units::convert_unit( Mod::get( "{$this->id}--tablet" ), 'em' ),
            'screen'    => 'tablet-and-up'
        ]);

        // Block Spacing: Tablet
        $styles->customProperty([
            'name'      => 'block-spacing',
            'value'     => CSS_Units::convert_unit( Mod::get( "{$this->id}--tablet" ), 'rem' ),
            'screen'    => 'tablet-and-up'
        ]);

        // Desktop
        $styles->customProperty([
            'name'      => $this->id,
            'value'     => Mod::get( "{$this->id}--desktop" ),
            'screen'    => 'desktop'
        ]);

        // Text Spacing: Desktop
        $styles->customProperty([
            'name'      => 'text-spacing',
            'value'     => CSS_Units::convert_unit( Mod::get( "{$this->id}--desktop" ), 'em' ),
            'screen'    => 'desktop'
        ]);

        // Block Spacing: Desktop
        $styles->customProperty([
            'name'      => 'block-spacing',
            'value'     => CSS_Units::convert_unit( Mod::get( "{$this->id}--desktop" ), 'rem' ),
            'screen'    => 'desktop'
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
                    name: 'text-spacing',
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
                        name: 'text-spacing',
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
                        name: 'text-spacing',
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

    /**
     * Editor Styles
     *
     * @since  2.0.0
     * @access public
     * @param array $styles
     * @return array
     */
    public function editorStyles( $styles ) {

        // mobile
        $styles->customProperty([
            'name' => $this->id,
            'value' => Mod::get( $this->id ),
        ]);

        // tablet
        $styles->customProperty([
            'name' => "{$this->id}--tablet",
            'value' => Mod::get("{$this->id}--tablet"),
            'screen' => 'editor-tablet'
        ]);

        // desktop
        $styles->customProperty([
            'name' => "{$this->id}--desktop",
            'value' => Mod::get("{$this->id}--desktop"),
            'screen' => 'editor-desktop'
        ]);


        // Text Spacing: Mobile
        $styles->customProperty([
            'name'      => 'text-spacing',
            'value'     => CSS_Units::convert_unit( Mod::get( $this->id ), 'em' ),
        ]);

        // Block Spacing: Mobile
        $styles->customProperty([
            'name'      => 'block-spacing',
            'value'     => CSS_Units::convert_unit( Mod::get( $this->id ), 'rem' ),
        ]);


        // Text Spacing: Tablet
        $styles->customProperty([
            'name'      => 'text-spacing--tablet',
            'value'     => CSS_Units::convert_unit( Mod::get( "{$this->id}--tablet" ), 'em' ),
            'screen'    => 'editor-tablet'
        ]);

        // Block Spacing: Tablet
        $styles->customProperty([
            'name'      => 'block-spacing--tablet',
            'value'     => CSS_Units::convert_unit( Mod::get( "{$this->id}--tablet" ), 'rem' ),
            'screen'    => 'editor-tablet'
        ]);

        // Text Spacing: Desktop
        $styles->customProperty([
            'name'      => 'text-spacing--desktop',
            'value'     => CSS_Units::convert_unit( Mod::get( "{$this->id}--desktop" ), 'em' ),
            'screen'    => 'editor-desktop'
        ]);

        // Block Spacing: Desktop
        $styles->customProperty([
            'name'      => 'block-spacing--desktop',
            'value'     => CSS_Units::convert_unit( Mod::get( "{$this->id}--desktop" ), 'rem' ),
            'screen'    => 'editor-desktop'
        ]);

        return $styles;
    }
}
