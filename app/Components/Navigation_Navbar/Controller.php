<?php
/**
 * Controller class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\Navigation_Navbar;

use Hybrid\Contracts\Bootable;
use Taproot\Tools\Mod;
use Taproot\Components\Navigation\Functions as Nav;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Controller implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_action( 'init', [ $this, 'register_nav_menu' ], 5 );
        add_filter( 'hybrid/attr/menu/class', [ $this, 'nav_classes' ], 100, 2 );
    }

    /**
     * Register menu.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    function register_nav_menu() {

        register_nav_menus([
            'navbar' => esc_html_x( 'Navbar', 'nav menu location', 'taproot' )
        ]);
    }

    /**
     *  Add classes to nav areas
     *
     * @since 2.0.0
     * @return void
     */
    public function nav_classes( $classes, $context) {

        if( 'navbar' === $context ) {
            $classes = $this->get_classes( $classes );
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
    public function get_classes( $classes ) {

        if( Mod::get( 'navigation--navbar--hide' ) ) {
            $classes[] = 'hidden-when-not-mobile';
        }

        if( Mod::get( 'navigation--navbar-mobile--hide' ) ) {
            $classes[] = 'hidden-when-mobile';
        }

        if( Mod::get( 'navigation--navbar-fixed--hide' ) ) {
            $classes[] = 'hidden-when-not-fixed';
        }

        // add class for navbar type
        $classes[] = sprintf( 'mobile-type-%s', Mod::get( 'navigation--navbar-mobile--type' ) );

        // add class for header nav breakpoint
        $classes[] = sprintf( 'mobile-at-%s', Mod::get( 'navigation--navbar-mobile--breakpoint' ) );

        // add class for toggle side
        $classes[] = sprintf( 'menu--%s', Mod::get( 'navigation--navbar-mobile--toggle-side' ) );

        return $classes;
    }

}
