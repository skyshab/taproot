<?php
/**
 * Template Classes class.
 *
 * This file contains the logic that determines output of template classes.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template\Nav;

use Hybrid\Contracts\Bootable;
use function Taproot\Template\Icons\location as icon_location;
use function Taproot\Template\Icons\get as icon;
use function Taproot\Customize\theme_mod;


/**
 * Handles front end logic
 *
 * @since  1.0.0
 * @access public
 */
class Nav implements Bootable {


	/**
	 * Adds actions on the appropriate customize action hooks.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function boot() {
        add_action( 'init', [ $this, 'register_nav_menus' ], 5 );
        add_filter( 'hybrid/attr/menu/class', [ $this, 'nav_classes' ], 100, 2 );
        add_filter( 'nav_menu_css_class', [ $this, 'menu_item_classes' ], 10, 3 );
        add_filter( 'nav_menu_item_args', [ $this, 'menu_item_dropdowns' ], 10, 2 );
        add_filter( 'taproot/template/menu-toggle', [ $this, 'menu_toggle' ], 10, 2 );
        add_filter( 'nav_menu_link_attributes', [ $this, 'nav_menu_link_attributes' ], 10, 3 );
        add_filter( 'nav_menu_submenu_css_class', [ $this, 'nav_menu_submenu_css_class' ], 10, 2 );
        add_filter( 'hybrid/pagination/posts/args', [ $this, 'pagination' ] );
        add_filter( 'hybrid/pagination/post/args', [ $this, 'pagination' ] );
        add_filter( 'hybrid/pagination/comments/args', [ $this, 'pagination' ] );
    }


    /**
     * Register menus.
     *
     * @link   https://developer.wordpress.org/reference/functions/register_nav_menus/
     * @since  1.0.0
     * @access public
     * @return void
     */
    function register_nav_menus() {

        register_nav_menus( [
            'header' => esc_html_x( 'Header', 'nav menu location', 'taproot' )
        ]);

        register_nav_menus( [
            'navbar' => esc_html_x( 'Navbar', 'nav menu location', 'taproot' )
        ]);

        register_nav_menus( [
            'top' => esc_html_x( 'Top Nav', 'nav menu location', 'taproot' )
        ]);

        register_nav_menus( [
            'footer' => esc_html_x( 'Footer Nav', 'nav menu location', 'taproot' )
        ]);
    }


    /**
     *  Add classes to nav areas
     *
     * @since 1.0.0
     * @return void
     */
    public function nav_classes( $classes, $context) {

        if( 'top' === $context ) {
            $classes = $this->nav_top_classes( $classes );
        }
        elseif( 'header' === $context ) {
            $classes = $this->nav_header_classes( $classes );
        }
        elseif( 'navbar' === $context ) {
            $classes = $this->nav_navbar_classes( $classes );
        }
        elseif( 'footer' === $context ) {
            $classes = $this->nav_footer_classes( $classes );
        }

        return $classes;
    }


    /**
     * Get Header Nav Classes
     *
     * @since 1.0.0
     *
     * @param array $classes
     * @return array - Returns array of classes for the header nav.
     */
    public function nav_header_classes( $classes ) {

        if( theme_mod( 'nav--header--hide' ) ) {
            $classes[] = 'hidden-when-not-mobile';
        }

        if( theme_mod( 'nav--header-mobile--hide' ) ) {
            $classes[] = 'hidden-when-mobile';
        }

        if( theme_mod( 'nav--header-fixed--hide-when-not-fixed' ) ) {
            $classes[] = 'hidden-when-not-fixed';
        }

        // add classes for navbar type
        $mobile_type = theme_mod( 'nav--header-mobile--type', true );

        $classes[] = sprintf( 'mobile-type-%s', $mobile_type );

        // add class for toggle side
        $classes[] = 'menu--right';

        // add class for header nav breakpoint
        $classes[] = sprintf( 'mobile-at-%s', theme_mod( 'nav--header-mobile--breakpoint', true ) );

        return $classes;
    }


    /**
     * Get Navbar Classes
     *
     * @since 1.0.0
     *
     * @param array $classes
     * @return array - Returns array of classes for the navbar.
     */
    public function nav_navbar_classes( $classes ) {

        // add class to hide when not mobile
        if( theme_mod( 'nav--navbar--hide' ) ) {
            $classes[] = 'hidden-when-not-mobile';
        }

        // add class to hide when mobile
        if( theme_mod( 'nav--navbar-mobile--hide' ) ) {
            $classes[] = 'hidden-when-mobile';
        }

        if( theme_mod( 'nav--navbar-fixed--hide-when-not-fixed' ) ) {
            $classes[] = 'hidden-when-not-fixed';
        }

        // add classes for navbar type
        $mobile_type = theme_mod( 'nav--navbar-mobile--type', true );
        $classes[] = sprintf( 'mobile-type-%s', $mobile_type );

        // add class for toggle side
        $toggle_side = theme_mod('nav--navbar-mobile--side', 'right');
        if( 'right' === $toggle_side ) {
            $classes[] = 'menu--right';
        }
        elseif( 'left' === $toggle_side ) {
            $classes[] = 'menu--left';
        }

        // add class for navbar breakpoint
        $classes[] = sprintf( 'mobile-at-%s', theme_mod( 'nav--navbar-mobile--breakpoint', true ) );

        return $classes;
    }


    /**
     * Get Topnav Classes
     *
     * @since 1.0.0
     *
     * @param array $classes
     * @return array - Returns array of classes for the top nav.
     */
    public function nav_top_classes( $classes ) {

        if( theme_mod( 'nav--top-mobile--hide' ) ) {
            $classes[] = 'hidden-when-mobile';
        }

        if( theme_mod( 'nav--top--hide' ) ) {
            $classes[] = 'hidden-when-not-mobile';
        }

        $classes[] = sprintf( 'mobile-at-%s', theme_mod( 'nav--top-mobile--breakpoint', true ) );

        return $classes;
    }


    /**
     * Get Footer Nav Classes
     *
     * @since 1.0.0
     *
     * @param array $classes
     * @return array - Returns array of classes for the top nav.
     */
    public function nav_footer_classes( $classes ) {

        // add class for footer nav breakpoint
        $classes[] = sprintf( 'mobile-at-%s', theme_mod( 'nav--footer-mobile--breakpoint', true ) );

        return $classes;
    }


    /**
     *  Add Mobile Menu Toggle
     *
     * @since 1.0.0
     * @param string $location
     * @param string $markup
     * @return string
     */
    public function menu_toggle( $location ) {

        if( 'header' === $location || 'navbar' === $location ) {
            $toggle = '<span class="menu--toggle">';
            $toggle .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="1.25em" height="1em"><g class="taproot-hamburger"><rect class="taproot-hamburger-top" width="100%" height="20%" y="0%" rx="1" ry="1"></rect><rect class="taproot-hamburger-middle" y="40%" width="100%" height="20%" rx="1" ry="1"></rect><rect class="taproot-hamburger-bottom" y="80%" width="100%" height="20%" rx="1" ry="1"></rect></g></svg>';
            $toggle .=  '</span>';

            return $toggle;
        }
        return '';
    }


    /**
     * Add additional nav classes to menu items
     *
     * @since  1.0.0
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
     * Add menu dropdown icons
     *
     * @since  1.0.0
     * @access public
     * @return void
     */
    function menu_item_dropdowns( $args, $item ) {

        // filter for adding icons to the nav menu items
        $args->link_before = apply_filters( 'taproot/nav/item/icon', false, $item->ID );

        // if menu item has children, add dropdown icon
        if( in_array( 'menu-item-has-children' ,  $item->classes ) && $args->depth !== 1 ) {
            $args->link_after = '<span class="dropdown-target">' . icon_location( 'menu-item-dropdown', [ 'icon' => 'angle-right', 'class' => 'rotate-90 dropdown-target--icon' ] ) . '</span>';
        }
        else {
            $args->link_after = '';
        }

        return $args;

    }


    /**
     * Set nav link classes
     *
     * @since 1.0.0
     */
    public function nav_menu_link_attributes( $atts, $item, $args ) {

        if( $args->theme_location ) {
            $atts['class'] .= ' menu--theme__link';
            $atts['class'] .= sprintf( ' menu--%s__link', $args->theme_location );
        }

        return $atts;
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


    /**
     * Add custom pagination attributes
     *
     * @since 1.0.0
     * @param string    $context
     * @param string    $args
     * @return string
     */
    public function pagination( $args ) {

		$custom = [
			// Base arguments imported from `paginate_links()`. It's
			// best not to change unless building something custom.
			// 'base'               => '',
			// 'format'             => '',
			// 'total'              => 0,
			// 'current'            => 0,
			// 'add_args'           => [],
			// 'add_fragment'       => '',

			// Customize the items that are shown.
			// 'show_all'           => false,
			// 'end_size'           => 1,
			// 'mid_size'           => 1,
			// 'prev_next'          => true,

			// Custom text, content, and HTML.
			'prev_text'          => esc_html__('&lt; prev', 'taproot'),
			'next_text'          => esc_html__('next &gt;', 'taproot'),
			// 'screen_reader_text' => '',
			// 'title_text'         => '',
			// 'before_page_number' => '',
			// 'after_page_number'  => '',

			// HTML tags.
			// 'container_tag'      => 'nav',
			// 'title_tag'          => 'h2',
			// 'list_tag'           => 'ul',
			// 'item_tag'           => 'li',

			// Attributes.
			// 'container_class'    => 'pagination pagination--%s',
			// 'title_class'        => 'pagination__title screen-reader-text',
			// 'list_class'         => 'pagination__items',
			// 'item_class'         => 'pagination__item pagination__item--%s',
			// 'anchor_class'       => 'pagination__anchor pagination__anchor--%s',
			// 'aria_current'       => 'page'
        ];

        if( theme_mod( 'blog--pagination--rounded', true ) )
            $custom['list_class'] = 'pagination__items pagination__items--rounded';

        return array_merge( $args, $custom );
    }

}
