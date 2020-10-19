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

namespace Taproot\Navigation\Footer\Customize\Footer;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Tools\Mod;
use function Hybrid\app;

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

        $styles->customProperty([
            'name'      => 'navigation--footer--color',
            'value'     => Mod::get( $this->id ),
            'screen'    => app('navigation/navbar/functions')->get_desktop_screen(),
            'selector'  => '.menu--footer__link:hover',
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

        $script = <<< JS
        wp.customize( "{$this->id}", function( value ) {
            value.bind( function( to ) {
                rootstrap.customProperty({
                    id: "{$this->id}",
                    name: 'navigation--footer--color',
                    value: to,
                    screen: getDesktopScreen( wp.customize.instance('navigation--footer-mobile--breakpoint').get() ),
                    selector: '.menu--footer__link:hover',
                });
            });
        });
JS;
        return $script;
    }
}
