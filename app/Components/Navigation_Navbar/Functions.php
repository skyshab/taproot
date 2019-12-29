<?php
/**
 * Component functions.
 *
 * This class contains helper functions for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Navigation_Navbar;

use Taproot\Tools\Mod;

use Taproot\Components\Navigation\Functions as Nav;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Get mobile screen
     *
     * @since 2.0.0
     *
     * @param string $screen
     * @return string
     */
    public static function get_mobile_screen() {
        return Nav::get_mobile_screen( Mod::get( 'navigation--navbar-mobile--breakpoint' ) );
    }

    /**
     * Get desktop screen
     *
     * @since 2.0.0
     * @return string
     */
    public static function get_desktop_screen() {
        return Nav::get_desktop_screen( Mod::get( 'navigation--navbar-mobile--breakpoint' ) );
    }
}
