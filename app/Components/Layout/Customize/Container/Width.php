<?php
/**
 * Branding logo width.
 *
 * This class handles the customizer control for the branding logo width.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Layout\Customize\Container;

use Taproot\Customize\Controls\Range\Range;
use Taproot\Components\Layout\Functions;
use Taproot\Tools\Mod;

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
    public $label = 'Container Width';

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

        $full_layout_width = Functions::get_full_layout_width();

        if( $full_layout_width ) {

            $styles->addScreen( 'layout-is-fullwidth', [
                'min' => $full_layout_width . 'px',
            ]);

            $styles->customProperty([
                'screen' => 'layout-is-fullwidth',
                'name' => 'layout-padding',
                'value' => Functions::get_full_layout_padding()
            ]);

            if( Functions::is_boxed_layout() ) {

                $max_width_int = (int) filter_var( Mod::get('layout--container--max-width'), FILTER_SANITIZE_NUMBER_INT );
                $width = (float) filter_var( Functions::get_layout_width('desktop'), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
                $alignwide_width = $max_width_int * $width . 'px';

                $styles->add([
                    'screen' => 'layout-is-fullwidth',
                    'selector' => '.app-main--full.boxed-layout .alignwide',
                    'styles' => [
                        'width' => $alignwide_width,
                        'margin-left' => sprintf('calc( (%s - 100%%) / -2 )', $alignwide_width)
                    ],
                ]);

            } else {

                $styles->add([
                    'screen' => 'layout-is-fullwidth',
                    'selector' => '.app-main--full .alignwide',
                    'styles' => [
                        'margin-left' => sprintf('calc( (%s - 100%%) / -2 )', Mod::get('layout--container--max-width') ),
                    ],
                ]);
            }
        }

        // mobile
        $styles->customProperty([
            'name' => 'container-width',
            'value' => Mod::get($this->id)
        ]);

        $styles->customProperty([
            'name' => 'layout-padding',
            'value' => Functions::get_padding_from_width( Mod::get($this->id), 'vw' )
        ]);

        // tablet
        $styles->customProperty([
            'screen' => 'tablet-and-up',
            'name' => 'container-width',
            'value' => Mod::get("{$this->id}--tablet")
        ]);

        $styles->customProperty([
            'screen' => 'tablet-and-up',
            'name' => 'layout-padding',
            'value' => Functions::get_padding_from_width( Mod::get("{$this->id}--tablet"), 'vw' )
        ]);

        // desktop
        $site_width_unit = ( Functions::is_boxed_layout() ) ? '%' : 'vw';
        $site_width_desktop = Functions::get_layout_width('desktop', $site_width_unit);

        $styles->customProperty([
            'screen' => 'desktop',
            'name' => 'container-width',
            'value' => $site_width_desktop
        ]);

        $styles->customProperty([
            'screen' => 'desktop',
            'name' => 'layout-padding',
            'value' => Functions::get_padding_from_width($site_width_desktop, 'vw')
        ]);

        $styles->customProperty([
            'screen' => 'desktop',
            'name' => 'container-width-as-decimal',
            'value' => Functions::get_layout_width('desktop')
        ]);

        $styles->customProperty([
            'screen' => 'desktop',
            'name' => 'container-width-as-vw',
            'value' => Functions::get_layout_width('desktop', 'vw')
        ]);

        $styles->customProperty([
            'screen' => 'desktop',
            'name' => 'container-width-as-percentage',
            'value' => Functions::get_layout_width('desktop', '%')
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

        // Mobile
        $script = <<< JS
        wp.customize( "{$this->id}", function( value ) {
            value.bind( function( to ) {
                rootstrap.customProperty({
                    name: 'container-width',
                    value: to
                });
                rootstrap.customProperty({
                    name: 'layout-padding',
                    value: getPaddingFromWidth(to, 'vw')
                });
            });
        });
JS;

        // Tablet
        $script .= <<< JS
        wp.customize( 'layout--container--width--tablet', function( value ) {
            value.bind( function( to ) {
                rootstrap.customProperty({
                    screen: 'tablet-and-up',
                    name: 'container-width',
                    value: to
                });
                rootstrap.customProperty({
                    screen: 'tablet-and-up',
                    name: 'layout-padding',
                    value: getPaddingFromWidth(to, 'vw')
                });
            });
        });
JS;

        // Desktop
        $script .= <<< JS
        wp.customize( 'layout--container--width--desktop', function( value ) {
            value.bind( function( to ) {
                rootstrap.customProperty({
                    screen: 'desktop',
                    name: 'container-width',
                    value: to.replace('vw', '%')
                });
                rootstrap.customProperty({
                    screen: 'desktop',
                    name: 'layout-padding',
                    value: getPaddingFromWidth(to, 'vw')
                });
            });
        });
JS;

        return $script;
    }
}
