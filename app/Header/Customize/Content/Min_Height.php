<?php
/**
 * Header content height.
 *
 * This class handles the customizer control for the header content height.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Header\Customize\Content;

use Taproot\Customize\Controls\Range\Range;
use function Taproot\Tools\theme_mod;

/**
 * Class for range control
 *
 * @since  2.0.0
 * @access public
 */
class Min_Height extends Range {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'min-height';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Minimum Height';

    /**
     * Default values
     *
     * @since 2.0.0
     * @var array
     */
    public $default = [
        'mobile'    => '175px',
        'tablet'    => '250px',
        'desktop'   => '300px'
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
            'default' => 50
        ],
        'vh' => [
            'min' => 0,
            'max' => 100,
            'default' => 50
        ],
        'px' => [
            'min' => 0,
            'max' => 1200,
            'default' => 250
        ],
    ];

    /**
     * Component CSS selector
     *
     * @since 2.0.0
     * @var string
     */
    private $selector = '.app-header:not(.app-header--fixed) .app-header__content';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        // Mobile header image height
        $styles->add([
            'selector' => $this->selector,
            'styles' => [
                'min-height' => theme_mod( $this->id ),
            ]
        ]);

        // Tablet header image height
        $styles->add([
            'screen' => 'tablet-and-up',
            'selector' => $this->selector,
            'styles' => [
                'min-height' => theme_mod( "{$this->id}--tablet" ),
            ]
        ]);

        // Desktop header image height
        $styles->add([
            'screen' => 'desktop',
            'selector' => $this->selector,
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
                    selector: "{$this->selector}",
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
                        selector: "{$this->selector}",
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
                        selector: "{$this->selector}",
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
