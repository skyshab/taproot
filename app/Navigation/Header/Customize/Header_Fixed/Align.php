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

namespace Taproot\Navigation\Header\Customize\Header_Fixed;

use Taproot\Customize\Controls\Select\Select;
use Taproot\Tools\Mod;

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
    public $default = 'flex-end';

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
            'selector' => '.app-header--fixed .menu--header__items',
            'styles' => [
                'justify-content' => Mod::get( $this->id ),
                'flex-direction' => 'row',
            ],
            'screen' => 'desktop',
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
                    selector: '.app-header--fixed .menu--header__items',
                    screen: 'desktop',
                    styles: {
                        'justify-content': to,
                        'flex-direction': 'row'
                    },
                });
            });
        });
JS;
    }
}
