<?php
/**
 * Component functions.
 *
 * This class contains helper functions for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Navigation\Header;

use Taproot\Tools\Mod;
use function Hybrid\app;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Get mobile breakpoint
     *
     * @since 2.0.0
     * @return string
     */
    public static function get_breakpoint() {
        return Mod::get( 'navigation--header-mobile--breakpoint' );
    }

    /**
     * Get mobile screen
     *
     * @since 2.0.0
     *
     * @param string $screen
     * @return string
     */
    public static function get_mobile_screen() {
        return app('navigation/functions')->get_mobile_screen( static::get_breakpoint() );
    }

    /**
     * Get desktop screen
     *
     * @since 2.0.0
     * @return string
     */
    public static function get_desktop_screen() {
        return app('navigation/functions')->get_desktop_screen( static::get_breakpoint() );
    }

    /**
     * Hide the header?
     *
     * @since 2.0.0
     * @return bool
     */
    public static function hide_the_nav() {
        return Mod::get( 'navigation--header--hide' );
    }

    /**
     * Hide the header when mobile?
     *
     * @since 2.0.0
     * @return bool
     */
    public static function hide_the_mobile_nav() {
        return Mod::get( 'navigation--header-mobile--hide' );
    }

    /**
     * Hide the header when fixed?
     *
     * @since 2.0.0
     * @return bool
     */
    public static function hide_the_fixed_nav() {
        return Mod::get( 'navigation--header-fixed--hide' );
    }

    /**
     * Get the mobile header type
     *
     * @since 2.0.0
     * @return string
     */
    public static function get_the_mobile_nav_type() {
        return Mod::get( 'navigation--header-mobile--type' );
    }
}
