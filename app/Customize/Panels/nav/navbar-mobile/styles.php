<?php
/**
 * Styles for our section.
 *
 * This file creates the front end styles for our customizer controls.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

use function Taproot\Customize\get_screen_from_bp;
use function Taproot\Customize\get_mobile_screen;
use function Taproot\Customize\get_font_family;
use function Taproot\Customize\get_font_styles;
use function Rootstrap\get_theme_mod;


if( has_nav_menu( 'navbar' ) ) {

    $mobile_screen = get_mobile_screen( get_theme_mod( 'nav--navbar-mobile--breakpoint', null, true ) );

    // Hide when mobile
    if( get_theme_mod( 'nav--navbar-mobile--hide' ) ) {
        $styles->add([
            'selector' => '.menu--navbar',
            'styles' => ['display' => 'none'],
            'screen' => $mobile_screen,
        ]);
    }


    // Navbar Styles
    $styles->add([
        'selector' => '.menu--navbar',
        'styles' => array(
            'background-color' => get_theme_mod( 'nav--navbar-mobile--background-color', null, true ),
        ),
        'screen' => $mobile_screen,
    ]);


    // Navbar height
    $styles->add([
        'selector' => '.menu--navbar__container',
        'styles' => array(
            'height' => get_theme_mod( 'nav--navbar-mobile--height' ),
        ),
        'screen' => $mobile_screen,
    ]);


    // Icon Styles
    $styles->add([
        'selector' => '.menu--navbar .menu--toggle',
        'styles' => [
            'fill' => get_theme_mod( 'nav--navbar-mobile--icon-color' ),
            'color' => get_theme_mod( 'nav--navbar-mobile--icon-color' ),
            'font-size' => get_theme_mod( 'nav--navbar-mobile--icon-size' ),
        ],
        'screen' => $mobile_screen,
    ]);


    // Menu Items Background Color
    $styles->add([
        'selector' => '.menu--navbar__items',
        'styles' => array(
            'background-color' => get_theme_mod( 'nav--navbar-mobile--menu-background-color', null, true ),
        ),
        'screen' => $mobile_screen,
    ]);


    // Separator Color
    $styles->add([
        'selector' => '.menu--navbar__item',
        'styles' => array(
            'border-color' => get_theme_mod( 'nav--navbar-mobile--separator-color', null, true ),
        ),
        'screen' => $mobile_screen,
    ]);


    // Link Styles
    $styles->add([
        'selector' => '.menu--navbar__link',
        'styles' => array(
            'padding-left' => get_theme_mod( 'nav--navbar-mobile--padding', null, true ),
            'padding-right' => get_theme_mod( 'nav--navbar-mobile--padding', null, true ),
        ),
        'screen' => $mobile_screen,
    ]);


    // Font Styles
    $styles->add([
        'selector' => '.menu--navbar__link',
        'styles' => get_font_styles( 'nav--navbar-mobile--font-styles' ),
        'screen' => $mobile_screen,
    ]);


    // Font Family
    $styles->add([
        'selector' => '.menu--navbar__link',
        'styles' => [
            'font-family' => get_font_family( get_theme_mod( 'nav--navbar-mobile--font-family' ) )
        ],
        'screen' => $mobile_screen,
    ]);


    // Link Color
    $styles->add([
        'selector' => '.menu--navbar__link:link, .menu--navbar__link:visited',
        'styles' => [
            'color' => get_theme_mod( 'nav--navbar-mobile--link-color' )
        ],
        'screen' => $mobile_screen,
    ]);


    // Link Color: Hover
    $styles->add([
        'selector' => '.menu--navbar__link:hover',
        'styles' => [
            'color' => get_theme_mod( 'nav--navbar-mobile--link-color--hover' )
        ],
        'screen' => $mobile_screen,
    ]);


    // Var: font size
    $styles->add_var([
        'name' => 'nav--navbar--font-size',
        'value' => get_theme_mod( 'nav--navbar-mobile--font-size' ),
        'screen' => $mobile_screen,
    ]);


    // Var: line height
    $styles->add_var([
        'name' => 'nav--navbar--line-height',
        'value' => get_theme_mod( 'nav--navbar-mobile--line-height' ),
        'screen' => $mobile_screen,
    ]);

}