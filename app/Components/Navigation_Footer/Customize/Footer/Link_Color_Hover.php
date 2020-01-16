<?php
/**
 * Link Color Hover.
 *
 * This class handles the customizer control for the component link color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Footer\Customize\Footer;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Components\Navigation_Footer\Functions;
use function Taproot\Tools\theme_mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Link_Color_Hover extends Color {

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'link-color--hover';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Link Color: Hover';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->add([
            'selector' => '.menu--footer__link:hover',
            'styles' => [
                'color' => theme_mod( $this->id ),
            ],
            'screen' => Functions::get_desktop_screen(),
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
                    selector: '.menu--footer__link:hover',
                    screen: getDesktopScreen( wp.customize.instance('navigation--footer-mobile--breakpoint').get() ),
                    styles: {
                        color: to
                    }
                });
            });
        });
JS;
    }
}
