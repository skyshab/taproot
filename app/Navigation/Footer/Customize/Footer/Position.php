<?php
/**
 * Fixed header type
 *
 * This class handles the customizer control for the fixed header type.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Navigation\Footer\Customize\Footer;

use Taproot\Customize\Controls\Select\Select;
use Taproot\Tools\Mod;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Position extends Select {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'position';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Nav Position';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'before';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {
        return [
            'before'    => esc_html__( 'Before Widget Area', 'taproot' ),
            'after'     => esc_html__( 'After Widget Area', 'taproot' ),
        ];
    }

    /**
     * Styles
     *
     * @since 2.0.0
     * @var string
     */
    public function styles( $styles ) {

        if( 'after' === Mod::get( $this->id ) ) {
            $styles->add([
                'selector' => '.menu--footer',
                'styles' => [
                    'order' => '3'
                ],
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

        return <<< JS
        wp.customize( "{$this->id}", function( value ) {
            value.bind( function( to ) {
                if( 'after' === to ) {
                    rootstrap.style({
                        id: "{$this->id}",
                        selector: '.menu--footer',
                        screen: getDesktopScreen( wp.customize.instance('navigation--footer-mobile--breakpoint').get() ),
                        styles: {
                            order: '3'
                        }
                    });
                }
            });
        });
JS;
    }
}
