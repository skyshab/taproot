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

    // Hide when not mobile
    if( get_theme_mod( 'nav--navbar--hide' ) ) {
        $styles->add([
            'selector' => '.menu--navbar',
            'styles' => ['display' => 'none'],
            'screen' => $navbar_desktop_screen,
        ]);
    }


    // Background Color
    $styles->add([
        'selector' => '.menu--navbar',
        'styles' => [
            'background-color' => get_theme_mod( 'nav--navbar--background-color', null, true ),
        ],
    ]);


    // Font Styles
    $styles->add([
        'selector' => '.menu--navbar__link',
        'styles' => get_font_styles( 'nav--navbar--font-styles' ),
        'screen' => $navbar_desktop_screen,
    ]);


    // Font Family
    $styles->add([
        'selector' => '.menu--navbar__link',
        'styles' => [
            'font-family' => get_font_family( get_theme_mod( 'nav--navbar--font-family' ) ),
        ],
    ]);


    // Desktop Link Styles
    $styles->add([
        'selector' => '.menu--navbar__link',
        'styles' => [
            'padding-left' => get_theme_mod( 'nav--navbar--padding', null, true ),
            'padding-right' => get_theme_mod( 'nav--navbar--padding', null, true ),
        ],
        'screen' => $navbar_desktop_screen,
    ]);


    // Link Color
    $styles->add([
        'selector' => '.menu--navbar__link:link, .menu--navbar__link:visited',
        'styles' => [
            'color' => get_theme_mod( 'nav--navbar--link-color', null, true ),
        ],
        'screen' => $navbar_desktop_screen,
    ]);

    // Link Color: hover
    $styles->add([
        'selector' => '.menu--navbar__link:hover',
        'styles' => [
            'color' => get_theme_mod( 'nav--navbar--link-color--hover' ),
        ],
        'screen' => $navbar_desktop_screen,
    ]);


    // Var: font size
    $styles->var([
        'name' => 'nav--navbar--font-size',
        'value' => get_theme_mod( 'nav--navbar--font-size', null, true ),
        'screen' => $navbar_desktop_screen,
    ]);


    // Var: Navbar height
    $styles->var([
        'name' => 'nav--navbar--line-height',
        'value' => get_theme_mod( 'nav--navbar--height', null, true ),
        'screen' => $navbar_desktop_screen,
    ]);


    // Align
    $styles->add([
        'selector' => '.menu--navbar__items',
        'styles' => [
            'justify-content' => get_theme_mod( 'nav--navbar--align' ),
            'flex-direction' => 'row',
        ],
        'screen' => $navbar_desktop_screen,
    ]);


    // Submenu Styles
    $styles->add([
        'selector' => '.menu--navbar__item.has-children  .menu__sub-menu',
        'styles' => [
            'background-color' => get_theme_mod( 'nav--navbar--dropdown--background-color' ),
            'border-color' => get_theme_mod( 'nav--navbar--dropdown--background-color' )
        ],
        'screen' => $navbar_desktop_screen,
    ]);


    // Dropdown Link Styles
    $styles->add([
        'selector' => '.menu__sub-menu .menu--navbar__link:link, .menu__sub-menu .menu--navbar__link:visited',
        'styles' => [
            'color' => get_theme_mod( 'nav--navbar--dropdown--link--color' ),
        ],
        'screen' => $navbar_desktop_screen,
    ]);


    // Dropdown Link Hover Styles
    $styles->add([
        'selector' => '.menu__sub-menu .menu--navbar__link:hover ',
        'styles' => [
            'color' => get_theme_mod( 'nav--navbar--dropdown--link--color--hover' ),
        ],
        'screen' => $navbar_desktop_screen,
    ]);

}