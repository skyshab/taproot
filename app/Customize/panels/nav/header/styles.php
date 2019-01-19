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


if( has_nav_menu( 'header' ) ) {

    $header_nav_desktop_screen = get_desktop_screen( get_theme_mod( 'nav--header-mobile--breakpoint', null, true ) );

    // Hide when not mobile
    $hide_when_not_mobile = get_theme_mod( 'nav--header--hide' );

    if( $hide_when_not_mobile ) {
        $styles->add([
            'selector' => '.menu--header',
            'styles' => ['display' => 'none'],
            'screen' => $header_nav_desktop_screen,
        ]);
    }


    // Desktop Link Styles
    $styles->add([
        'selector' => '.menu--header__link',
        'styles' => [
            'padding-left' => get_theme_mod( 'nav--header--padding', null, true ),
            'padding-right' => get_theme_mod( 'nav--header--padding', null, true ),
        ],
        'screen' => $header_nav_desktop_screen,
    ]);


    // Font Styles
    $styles->add([
        'selector' => '.menu--footer__link',
        'styles' => get_font_styles( 'nav--header--font-styles' ),
        'screen' => $header_nav_desktop_screen,
    ]);


    // Font Family
    $styles->add([
        'selector' => '.menu--header__link',
        'styles' => [
            'font-family' => get_font_family( get_theme_mod( 'nav--header--font-family' ) ),
        ],
    ]);


    // Link Color
    $styles->add([
        'selector' => '.menu--header__link:link, .menu--header__link:visited',
        'styles' => [
            'color' => get_theme_mod( 'nav--header--link-color' ),
        ],
        'screen' => $header_nav_desktop_screen,
    ]);


    // Link Color: Hover
    $styles->add([
        'selector' => '.menu--header__link:hover',
        'styles' => [
            'color' => get_theme_mod( 'nav--header--link-color--hover' ),
        ],
        'screen' => $header_nav_desktop_screen,
    ]);


    // Var: font size
    $styles->var([
        'name' => 'nav--header--font-size',
        'value' => get_theme_mod( 'nav--header--font-size', null, true ),
        'screen' => $header_nav_desktop_screen,
    ]);


    // Var: line height
    $styles->var([
        'name' => 'nav--header--line-height',
        'value' => get_theme_mod( 'nav--header--height', null, true ),
        'screen' => $header_nav_desktop_screen,
    ]);


    // Align
    $styles->add([
        'selector' => '.menu--header__items',
        'styles' => [
            'justify-content' => get_theme_mod( 'nav--header--align' ),
            'flex-direction' => 'row',
        ],
        'screen' => $header_nav_desktop_screen,
    ]);


    // Submenu Styles
    // border color is needed for the pointers
    $styles->add([
        'selector' => '.menu--header__item.has-children  .menu__sub-menu',
        'styles' => [
            'background-color' => get_theme_mod( 'nav--header--dropdown--background-color', null, true ),
            'border-color' => get_theme_mod( 'nav--header--dropdown--background-color', null, true )
        ],
        'screen' => $header_nav_desktop_screen,
    ]);


    // Dropdown Link Styles
    $styles->add([
        'selector' => '.menu__sub-menu .menu--header__link:link, .menu__sub-menu .menu--header__link:visited',
        'styles' => [
            'color' => get_theme_mod( 'nav--header--dropdown--link--color' ),
        ],
        'screen' => $header_nav_desktop_screen,
    ]);


    // Dropdown Link Hover Styles
    $styles->add([
        'selector' => '.menu__sub-menu .menu--header__link:hover',
        'styles' => [
            'color' => get_theme_mod( 'nav--header--dropdown--link--color--hover' ),
        ],
        'screen' => $header_nav_desktop_screen,
    ]);

}