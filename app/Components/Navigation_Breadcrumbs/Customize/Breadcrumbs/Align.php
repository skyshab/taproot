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

namespace Taproot\Components\Navigation_Breadcrumbs\Customize\Breadcrumbs;

use Taproot\Customize\Controls\Select\Select;
use function Taproot\Tools\theme_mod;

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
    public $label = 'Breadcrumbs Align';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = 'flex-start';

    /**
     * Get Choices
     *
     * @since 2.0.0
     * @var string
     */
    public function get_choices() {
        return [
            'flex-start'    => esc_html__( 'Left', 'taproot' ),
            'center'        => esc_html__( 'Center', 'taproot' ),
            'flex-end'      => esc_html__( 'Right', 'taproot' ),
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
            'selector' => '.breadcrumbs__trail',
            'styles' => [
                'justify-content' => theme_mod( $this->id ),
            ],
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
                    selector: ".breadcrumbs__trail",
                    styles: {
                        'justify-content': to
                    },
                });
            });
        });
JS;
    }
}
