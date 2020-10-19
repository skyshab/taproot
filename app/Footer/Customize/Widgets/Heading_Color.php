<?php
/**
 * Footer Widgets Heading Color.
 *
 * This class handles the customizer control for the footer widgets heading color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Footer\Customize\Widgets;

use Taproot\Customize\Controls\Color\Color;
use function Taproot\Tools\theme_mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Heading_Color extends Color {

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'heading-color';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Heading Color';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->add([
            'selector' => '.app-footer__widget h1, .app-footer__widget h2, .app-footer__widget h3, .app-footer__widget h4, .app-footer__widget h5, .app-footer__widget h6',
            'styles' => [
                'color' => theme_mod( $this->id )
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
                    selector: '.app-footer__widget h1, .app-footer__widget h2, .app-footer__widget h3, .app-footer__widget h4, .app-footer__widget h5, .app-footer__widget h6',
                    styles: {
                        color: to
                    },
                });
            });
        });
JS;
    }
}
