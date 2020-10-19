<?php
/**
 * Container width.
 *
 * This class handles the customizer control for the container width.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Layout\Customize\Container;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Tools\Mod;
use Taproot\Tools\CSS_Units;

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
    public $label = 'Width';

    /**
     * Default value
     *
     * @since 2.0.0
     * @var array
     */
    public $default = [
        'mobile'    => '86vw',
        'tablet'    => '90vw',
        'desktop'   => '90vw'
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
        'vw' => [
            'min'   => 60,
            'max'   => 100,
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

        // mobile
        $styles->customProperty([
            'name'  => 'container-width',
            'value' => Mod::get($this->id)
        ]);

        // tablet
        $styles->customProperty([
            'screen'    => 'tablet-and-up',
            'name'      => 'container-width',
            'value'     => Mod::get("{$this->id}--tablet")
        ]);

        // desktop
        $styles->customProperty([
            'screen'    => 'desktop',
            'name'      => 'container-width',
            'value'     => Mod::get("{$this->id}--desktop")
        ]);
    }

    /**
     * Editor Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function editorStyles( $styles ) {

        // Mobile
        $styles->customProperty([
            'name'  => 'container-width',
            'value' => CSS_Units::convert_unit( Mod::get( $this->id ), '%' ),
        ]);

        // Tablet
        if( isset( $this->devices ) && in_array( 'tablet', $this->devices ) ) {

            $styles->customProperty([
                'name'      => 'container-width--tablet',
                'value'     => CSS_Units::convert_unit( Mod::get( "{$this->id}--tablet" ), '%' ),
                'screen'    => 'editor-tablet'
            ]);
        }

        // Desktop
        if( isset( $this->devices ) && in_array( 'desktop', $this->devices ) ) {

            $styles->customProperty([
                'name'      => 'container-width--desktop',
                'value'     => CSS_Units::convert_unit( Mod::get( "{$this->id}--desktop" ), '%' ),
                'screen'    => 'editor-desktop'
            ]);
        }
    }

    /**
     * Preview Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function previewStyles() {

        // Mobile
        $script = <<< JS
        wp.customize( "{$this->id}", function( value ) {
            value.bind( function( to ) {
                rootstrap.customProperty({
                    name: 'container-width',
                    value: to
                });
            });
        });
JS;

        // Tablet
        $script .= <<< JS
        wp.customize( "{$this->id}--tablet", function( value ) {
            value.bind( function( to ) {
                rootstrap.customProperty({
                    screen: 'tablet-and-up',
                    name: 'container-width',
                    value: to
                });
            });
        });
JS;

        // Desktop
        $script .= <<< JS
        wp.customize( "{$this->id}--desktop", function( value ) {
            value.bind( function( to ) {
                rootstrap.customProperty({
                    screen: 'desktop',
                    name: 'container-width',
                    value: to
                });
            });
        });
JS;

        return $script;
    }
}
