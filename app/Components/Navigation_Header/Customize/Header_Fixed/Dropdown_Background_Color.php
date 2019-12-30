<?php
/**
 * Background Color.
 *
 * This class handles the customizer control for the background color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Header\Customize\Header_Fixed;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Tools\Mod;

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
    public $default = TRUE;

    /**
     * Get Defaults
     *
     * @since 2.0.0
     * @var string
     */
    public function defaults($defaults) {

        $defaults->add( $this->id, function() {
            return Mod::get( 'colors--accent' );
        });
    }

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {

        $styles->add([
            'selector' => '.app-header--fixed .menu--header__item.has-children .menu__sub-menu',
            'styles' => [
                'background-color'  => Mod::get( $this->id ),
                'border-color'      => Mod::get( $this->id )
            ],
            'screen' => 'desktop'
        ]);
    }
}
