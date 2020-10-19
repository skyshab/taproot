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

namespace Taproot\Navigation\Header\Customize\Header_Fixed;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Tools\Mod;

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
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles( $styles ) {

        $styles->customProperty([
            'name'      => 'navigation--header--color',
            'selector' => '.app-header--fixed .menu__sub-menu .menu--header__link, .app-header--fixed .menu__sub-menu .menu--header__link:visited',
            'value'     => Mod::get( $this->id ),
            'screen'    => 'desktop',
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
                    selector: '.app-header--fixed .menu__sub-menu .menu--header__link, .app-header--fixed .menu__sub-menu .menu--header__link:visited',
                    name: 'navigation--header--color',
                    value: to,
                    screen: 'desktop',
                });
            });
        });
JS;
        return $script;
    }
}
