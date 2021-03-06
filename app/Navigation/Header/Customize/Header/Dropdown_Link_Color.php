<?php
/**
 * Link Color.
 *
 * This class handles the customizer control for the component link color.
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
class Dropdown_Link_Color extends Color {

    /**
     * Control id
     *
     * @since 2.0.0
     * @var string
     */
    public $name = 'dropdown--link-color';

    /**
     * Control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Dropdown Link Color';

    /**
     * Default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = '#ffffff';

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->customProperty([
            'name'      => 'navigation--header--color',
            'selector' => '.menu__sub-menu .menu--header__link, .menu__sub-menu .menu--header__link:visited',
            'value'     => Mod::get( $this->id ),
            'screen'    => app('navigation/header/functions')->get_desktop_screen(),
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
                    selector: '.menu__sub-menu .menu--header__link, .menu__sub-menu .menu--header__link:visited',
                    name: 'navigation--header--color',
                    value: to,
                    screen: getDesktopScreen( wp.customize.instance('navigation--header-mobile--breakpoint').get() ),
                });
            });
        });
JS;
        return $script;
    }
}
