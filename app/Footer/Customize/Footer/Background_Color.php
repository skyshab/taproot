<?php
/**
 * Footer Background Color.
 *
 * This class handles the customizer control for the footer background color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Footer\Customize\Footer;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Customize\Traits\CustomPropertyPreview;
use Taproot\Tools\Mod;
use function Taproot\Tools\theme_mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Background_Color extends Color {

    use CustomPropertyPreview;

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
    public function styles( $styles ) {

        $styles->customProperty([
            'name'  => $this->id,
            'value' => theme_mod( $this->id ),
        ]);

        // If footer background is white, add a shadow
        $footer_bkg = Mod::get( $this->id );
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
