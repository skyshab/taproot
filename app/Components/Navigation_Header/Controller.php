<?php
/**
 * Controller class.
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

        if( Mod::get( 'navigation--header--hide' ) ) {
            $classes[] = 'hidden-when-not-mobile';
        }

        if( Mod::get( 'navigation--header-mobile--hide' ) ) {
            $classes[] = 'hidden-when-mobile';
        }

        if( Mod::get( 'navigation--header-fixed--hide' ) ) {
            $classes[] = 'hidden-when-not-fixed';
        }

        // add classes for navbar type
        $mobile_type = Mod::get( 'navigation--header-mobile--type' );

        $classes[] = sprintf( 'mobile-type-%s', $mobile_type );

        // add class for toggle side
        $classes[] = 'menu--right';

        // add class for header nav breakpoint
        $classes[] = sprintf( 'mobile-at-%s', Mod::get( 'navigation--header-mobile--breakpoint' ) );

        return $classes;
    }
}
