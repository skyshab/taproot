<?php
/**
 * Footer Background Color.
 *
 * This class handles the customizer control for the footer background color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Footer\Customize\Footer;

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
    public $id = 'footer--background-color';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Background Color';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = '#232323';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        $footer_bkg = Mod::get( $this->id );

        // Background Color
        $styles->add([
            'selector' => '.app-footer',
            'styles' => [
                'background-color' => $footer_bkg,
            ],
        ]);

        // If footer background is white, add a shadow
        if(  '#ffffff' === $footer_bkg || 'rgb(255,255,255)' === $footer_bkg ) {
            $styles->add([
                'selector' => '.app-footer',
                'styles' => [
                    'border-top' => '1px solid rgba(0, 0, 0, 0.1)',
                ],
            ]);
        }
    }
}
