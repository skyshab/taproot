<?php
/**
 * Header Default Hover Color.
 *
 * This class handles the customizer control for the header hover color.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Styles;

use Taproot\Customize\Controls\Color\Color;
use Taproot\Tools\Mod;
use function Taproot\Tools\theme_mod;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Default_Color_Hover extends Color {

    /**
     * Stores name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'header--default-color--hover';

    /**
     * Stores control label
     *
     * @since 2.0.0
     * @var string
     */
    public $label = 'Header Default Color: Hover';

    /**
     * Enable default
     *
     * @since 2.0.0
     * @var string
     */
    public $default = TRUE;

    /**
     * Styles
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function styles($styles) {
        // was link-color--hover
        $styles->customProperty([
            'name'  => $this->id,
            'value' => theme_mod( $this->id ),
        ]);
    }

    /**
     * Defaults
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function defaults($defaults) {

        $defaults->add( $this->id, function(){
            return Mod::get( 'header--default-color' );
        });
    }
}
