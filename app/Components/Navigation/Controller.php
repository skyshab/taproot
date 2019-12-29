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

namespace Taproot\Components\Navigation;

use Hybrid\Contracts\Bootable;
use function Hybrid\app;

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
        add_filter( 'nav_menu_item_args', [ $this, 'menu_item_dropdowns' ], 10, 2 );
        add_filter( 'nav_menu_link_attributes', [ $this, 'nav_menu_link_attributes' ], 10, 3 );
        add_filter( 'nav_menu_css_class', [ $this, 'menu_item_classes' ], 10, 3 );
        add_filter( 'nav_menu_submenu_css_class', [ $this, 'nav_menu_submenu_css_class' ], 10, 2 );
    }

    /**
     * Add menu dropdown icons
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    function menu_item_dropdowns( $args, $item ) {

        // filter for adding icons to the nav menu items
        $args->link_before = apply_filters( 'taproot/nav/item/icon', false, $item->ID );

        // if menu item has children, add dropdown icon
        if( in_array( 'menu-item-has-children', $item->classes ) && $args->depth !== 1 ) {

            $icon = app( 'icons' )->location( 'menu-item-dropdown', [
                'icon'  => 'angle-right',
                'class' => 'rotate-90 dropdown-target--icon'
            ]);

            $args->link_after = sprintf( '<span class="dropdown-target">%s</span>', $icon );
        }
        else {
            $args->link_after = '';
        }

        return $args;
    }

    /**
     * Set nav link classes
     *
     * @since 2.0.0
     */
    public function nav_menu_link_attributes( $atts, $item, $args ) {

        if( $args->theme_location ) {
            $atts['class'] .= ' menu--theme__link';
            $atts['class'] .= sprintf( ' menu--%s__link', $args->theme_location );
        }

        return $atts;
    }

    /**
     * Add additional nav classes to menu items
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    function menu_item_classes( $classes, $item, $args = [] ) {

        if( $args->theme_location ) {
            $classes[] = 'menu--theme__item';
            $classes[] = sprintf( 'menu--%s__item', $args->theme_location );
        }

        return $classes;
    }

    /**
     * Set submenu classes
     *
     * @since 1.1.1
     */
    public function nav_menu_submenu_css_class( $classes, $args ) {

        if( $args->theme_location ) {
            $classes[] = 'menu--theme__sub-menu';
        }

        return $classes;
    }
}
