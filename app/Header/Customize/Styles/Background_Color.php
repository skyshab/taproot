<?php
/**
 * Header Background Color.
 *
 * This class handles the customizer control for the header background color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Header\Customize\Styles;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Tools\Mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Background_Color extends Color {

    /**
     * Custom control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'header--background-color';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Background Color';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $header_bkg = Mod::get( $this->id );

        // Background Color
        $styles->customProperty([
            'name' => $this->id,
            'value' => $header_bkg,
        ]);

        // if header background color is white, add a shadow
        $styles->add([
            'selector' => '.app-header',
            'styles' => [
                'border-bottom' => '1px solid rgba(0, 0, 0, 0.1)',
            ],
            'callback' => ( '#ffffff' === $header_bkg || 'rgb(255,255,255)' === $header_bkg )
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
                rootstrap.customProperty({
                    name: "{$this->id}",
                    value: to
                });
            });
        });
JS;
    }
}
