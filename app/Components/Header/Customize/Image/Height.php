<?php
/**
 * Header Image height.
 *
 * This class handles the customizer control for the header image height.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Image;

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
    public $label = 'Header Image Height';

    /**
     * Default values
     *
     * @since 2.0.0
     * @var array
     */
    public $default = [
        'mobile'    => '275px',
        'tablet'    => '56vw',
        'desktop'   => '100vh'
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
    public function styles( $styles ) {

        $selector = '.app-header--has-header-image:not(.app-header--fixed)';

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
                rootstrap.style({
                    id: "{$this->id}",
                    selector: '.app-header--has-header-image:not(.app-header--fixed)',
                    styles: {
                        "min-height": to
                    }
                });
            });
        });
JS;

        // Tablet
        if( isset( $this->devices ) && in_array( 'tablet', $this->devices ) ) {

            $script .= <<< JS
            wp.customize( "{$this->id}--tablet", function( value ) {
                value.bind( function( to ) {
                    rootstrap.style({
                        id: "{$this->id}--tablet",
                        selector: '.app-header--has-header-image:not(.app-header--fixed)',
                        screen: 'tablet-and-up',
                        styles: {
                            "min-height": to
                        }
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
                    rootstrap.style({
                        id: "{$this->id}--desktop",
                        selector: '.app-header--has-header-image:not(.app-header--fixed)',
                        screen: 'desktop',
                        styles: {
                            "min-height": to
                        }
                    });
                });
            });
JS;
        }

        // Return style scripts
        return $script;
    }
}
