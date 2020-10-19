<?php
/**
 * Align class.
 *
 * This class handles the customizer control for the component alignment.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Navigation\Footer\Customize\Footer_Mobile;

use Taproot\Customize\Controls\Select\Select;
use Taproot\Tools\Mod;
use function Hybrid\app;

/**
 * Class for checkbox control
 *
 * @since  2.0.0
 * @access public
 */
class Align extends Select {

    /**
     * Control ID
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'align';

    /**
     * Label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Nav Align';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'center';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {
        return [
            'flex-start'    => esc_html__( 'Left', 'taproot' ),
            'flex-end'      => esc_html__( 'Right', 'taproot' ),
            'center'        => esc_html__( 'Center', 'taproot' ),
            'space-between' => esc_html__( 'Fill', 'taproot' ),
        ];
    }

    /**
     * Styles
     *
     * @since 2.0.0
     * @var string
     */
    public function styles( $styles ) {

        $styles->add([
            'selector' => '.menu--footer__link',
            'styles' => [
                'text-align' => Mod::get( $this->id ),
            ],
            'screen' => app('navigation/footer/functions')->get_mobile_screen()
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

        return <<< JS
        wp.customize( "{$this->id}", function( value ) {
            value.bind( function( to ) {
                rootstrap.style({
                    id: "{$this->id}",
                    selector: '.menu--footer__link',
                    screen: getMobileScreen( wp.customize.instance('navigation--footer-mobile--breakpoint').get() ),
                    styles: {
                        'text-align': to,
                    },
                });
            });
        });
JS;
    }
}
