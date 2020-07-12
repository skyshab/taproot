<?php
/**
 * Hooks class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\Navigation_Header;

use Hybrid\Contracts\Bootable;
use function Hybrid\app;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Hooks implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_action( 'init',                     [ $this, 'register_nav_menu' ], 5 );
        add_filter( 'hybrid/attr/menu/class',   [ $this, 'nav_classes' ], 100, 2 );
    }

    /**
     * Register menu.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function register_nav_menu() {

        register_nav_menus([
            'header' => esc_html_x( 'Header', 'nav menu location', 'taproot' )
        ]);
    }

    /**
     *  Add classes to nav areas
     *
     * @since 2.0.0
     * @return void
     */
    public function nav_classes( $classes, $context) {

        if( 'header' === $context ) {
            $classes = static::get_classes( $classes );
        }

        return $classes;
    }

    /**
     * Get Header Nav Classes
     *
     * @since 2.0.0
     *
     * @param array $classes
     * @return array - Returns array of classes for the header nav.
     */
    public static function get_classes( $classes ) {

        if( app('nav/header/functions')->hide_the_nav() ) {
            $classes[] = 'hidden-when-not-mobile';
        }

        if( app('nav/header/functions')->hide_the_mobile_nav() ) {
            $classes[] = 'hidden-when-mobile';
        }

        if( app('nav/header/functions')->hide_the_fixed_nav() ) {
            $classes[] = 'hidden-when-not-fixed';
        }

        // add classes for navbar type
        $classes[] = sprintf( 'mobile-type-%s', app('nav/header/functions')->get_the_mobile_nav_type() );

        // add class for toggle side
        $classes[] = 'menu--right';

        // add class for header nav breakpoint
        $classes[] = sprintf( 'mobile-at-%s', app('nav/header/functions')->get_breakpoint() );

        return $classes;
    }
}
