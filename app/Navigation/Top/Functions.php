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

namespace Taproot\Navigation\Top;

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
        return Mod::get( 'navigation--top-mobile--breakpoint' );
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
     * Hide the top nav when not mobile?
     *
     * @since 2.0.0
     * @return bool
     */
    public static function hide_the_nav() {
        return Mod::get( 'navigation--top--hide' );
    }

    /**
     * Hide the top when mobile?
     *
     * @since 2.0.0
     * @return bool
     */
    public static function hide_the_mobile_nav() {
        return Mod::get( 'navigation--top-mobile--hide' );
    }

    /**
     * Hide the top when fixed?
     *
     * @since 2.0.0
     * @return bool
     */
    public static function hide_the_fixed_nav() {
        return Mod::get( 'navigation--top-fixed--hide' );
    }
}
