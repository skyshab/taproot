<?php
/**
 * Background Color.
 *
 * This class handles the customizer control for the background color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Navigation\Header\Customize\Header;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Tools\Mod;
use function Hybrid\app;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Dropdown_Background_Color extends Color {

    /**
     * Custom control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'dropdown--background-color';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Dropdown Background Color';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = '#424242';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->add([
            'selector' => '.menu--header__item.has-children  .menu__sub-menu',
            'styles' => [
                'background-color'  => Mod::get( $this->id ),
                'border-color'      => Mod::get( $this->id )
                 // border color is needed for the pointers
            ],
            'screen' => app('navigation/header/functions')->get_desktop_screen(),
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
                    selector: '.menu--header__item.has-children  .menu__sub-menu',
                    screen: getDesktopScreen( wp.customize.instance('navigation--header-mobile--breakpoint').get() ),
                    styles: {
                        'background-color': to,
                        'border-color': to,
                    }
                });
            });
        });
JS;
    }
}
