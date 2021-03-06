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

namespace Taproot\Sidebar;

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
        add_filter( 'hybrid/view/sidebar/hierarchy',    [ $this, 'sidebar_display' ] );
        add_filter( 'hybrid/attr/sidebar/class',        [ $this, 'sidebar_classes' ] );
        add_action( 'widgets_init',                     [ $this, 'register_sidebar' ], 5 );
    }

    /**
     * Register sidebars.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function register_sidebar() {

        register_sidebar( [
            'id'   => 'primary',
            'name' => esc_html_x( 'Primary', 'sidebar', 'taproot' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget__title">',
            'after_title'   => '</h3>'
        ]);
    }

    /**
     *  Display Sidebar?
     *
     * @since 2.0.0
     * @return void
     */
    public function sidebar_display( $hierarchy ) {

        // if not a sidebar page, return empty array
        if( 'full' === app('layout/functions')->get_layout() )
            return [];

        // otherwise, carry on
        return $hierarchy;
    }

    /**
     *  Sidebar Classes
     *
     * @since 2.0.0
     * @return void
     */
    public function sidebar_classes( $classes ) {

        $layout = app('layout/functions')->get_layout();

        if( $layout !== 'full' ) {
            $classes[] = sprintf( 'sidebar--%s', $layout );
        }

        return $classes;
    }
}
