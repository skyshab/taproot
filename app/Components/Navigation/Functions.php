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

namespace Taproot\Components\Navigation;

/**
 * Template tags class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Get a screen from breakpoint data
     *
     * @since 2.0.0
     *
     * @param string $bp
     * @param bool $mobile
     * @return string
     */
    public static function get_screen_from_bp( $bp = 'bp-t', $mobile = true ) {

        $mobile_screens_array = [
            'bp-none' => false,
            'bp-m' => 'mobile',
            'bp-t' => 'tablet-and-under',
            'bp-always' => 'default'
        ];

        $screens_array = [
            'bp-none' => 'default',
            'bp-m' => 'tablet-and-up',
            'bp-t' => 'desktop',
            'bp-always' => false
        ];

        $screens = ( $mobile ) ? $mobile_screens_array : $screens_array;

        return ( isset($screens[$bp]) && $screens[$bp] ) ? $screens[$bp] : false;
    }

    /**
     * Get mobile screen from setting
     *
     * @since 2.0.0
     *
     * @param string $screen
     * @return string
     */
    public static function get_mobile_screen( $screen = 'default' ) {
        return ( 'never' === $screen ) ? false : $screen;
    }

    /**
     * Get mobile screen from setting
     *
     * @since 2.0.0
     *
     * @param string $screen
     * @return string
     */
    public static function get_desktop_screen( $screen = 'default' ) {

        $screens_array = [
            'never' => 'default',
            'mobile' => 'tablet-and-up',
            'tablet-and-under' => 'desktop',
            'always' => false,
        ];

        return ( isset( $screens_array[$screen] ) ) ? $screens_array[$screen] : false;
    }
}
