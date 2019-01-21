<?php
/**
 * Styles for our section.
 *
 * This file creates the front end styles for our customizer controls. 
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Taproot\Customize\get_font_family;
use function Taproot\Customize\get_font_styles;
use function Taproot\Customize\get_desktop_screen;
use function Rootstrap\get_theme_mod;


if( has_nav_menu( 'navbar' ) ) {

    $navbar_desktop_screen = get_desktop_screen( get_theme_mod( 'nav--navbar-mobile--breakpoint', null, true ) );


    // Show when fixed?
    $show_when_fixed = get_theme_mod( 'nav--navbar-fixed--fixed' );

    if( !$show_when_fixed ) {
        $styles->add([
            'selector' => '.app-header--fixed .menu--navbar',
            'styles' => ['display' => 'none'],
            'screen' => 'desktop',
        ]);
    }
    else {

        // Background Color
        $styles->add([
            'selector' => '.app-header--fixed .menu--navbar',
            'styles' => array(
                'background-color' => get_theme_mod( 'nav--navbar-fixed--background-color' ),
            ),
            'screen' => 'desktop',
        ]);


        // Desktop Link Styles
        $styles->add([
            'selector' => '.app-header--fixed .menu--navbar__link',
            'styles' => array(
                'font-size' => get_theme_mod( 'nav--navbar-fixed--font-size' ),
                'line-height' => get_theme_mod( 'nav--navbar-fixed--height' ),
                'padding-left' => get_theme_mod( 'nav--navbar-fixed--padding' ),
                'padding-right' => get_theme_mod( 'nav--navbar-fixed--padding' ),
            ),
            'screen' => 'desktop',
        ]);


        // Font Styles
        $styles->add([
            'selector' => '.app-header--fixed .menu--navbar__link',
            'styles' => get_font_styles( 'nav--navbar-fixed--font-styles' ),
            'screen' => 'desktop',
        ]);


        // Link Font Family
        $styles->add([
            'selector' => '.app-header--fixed .menu--navbar__link',
            'styles' => array(
                'font-family' => get_font_family( get_theme_mod( 'nav--navbar-fixed--font-family' ) ),
            ),
            'screen' => 'desktop', 
        ]);


        // Link Color
        $styles->add([
            'selector' => '.app-header--fixed .menu--navbar__link:link, .app-header--fixed .menu--navbar__link:visited',
            'styles' => array(
                'color' => get_theme_mod( 'nav--navbar-fixed--link-color' ),
            ),
            'screen' => 'desktop', 
        ]);


        // Link Color Hover
        $styles->add([
            'selector' => '.app-header--fixed .menu--navbar__link:hover',
            'styles' => array(
                'color' => get_theme_mod( 'nav--navbar-fixed--link-color--hover' ),
            ),
            'screen' => 'desktop',
        ]);


        // Align
        $styles->add([
            'selector' => '.app-header--fixed .menu--navbar__items',
            'styles' => array(
                'justify-content' => get_theme_mod( 'nav--navbar-fixed--align' ),
                'flex-direction' => 'row',
            ),
            'screen' => 'desktop',
        ]);


        // Submenu Styles
        $styles->add([
            'selector' => '.app-header--fixed .menu--navbar__item.has-children  .menu__sub-menu',
            'styles' => array(
                'background-color' => get_theme_mod( 'nav--navbar-fixed--dropdown--background-color' ),
                'border-color' => get_theme_mod( 'nav--navbar-fixed--dropdown--background-color' )
            ),
            'screen' => 'desktop',
        ]);


        // Dropdown Link Styles
        $styles->add([
            'selector' => '.app-header--fixed .menu__sub-menu .menu--navbar__link:link, .app-header--fixed .menu__sub-menu .menu--navbar__link:visited ',
            'styles' => array(
                'color' => get_theme_mod( 'nav--navbar-fixed--dropdown--link--color' ),
            ),
            'screen' => 'desktop',
        ]);


        // Dropdown Link Hover Styles
        $styles->add([
            'selector' => '.app-header--fixed .menu__sub-menu .menu--navbar__link:hover ',
            'styles' => array(
                'color' => get_theme_mod( 'nav--navbar-fixed--dropdown--link--color--hover' ),
            ),
            'screen' => 'desktop',
        ]);

    } // end if show when fixed

}    