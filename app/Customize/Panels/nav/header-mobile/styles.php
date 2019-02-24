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

use function Taproot\Customize\get_screen_from_bp;
use function Taproot\Customize\get_mobile_screen;
use function Taproot\Customize\get_font_family;
use function Taproot\Customize\get_font_styles;
use function Rootstrap\get_theme_mod;


if( has_nav_menu( 'header' ) ) {

    $mobile_screen = get_mobile_screen( get_theme_mod( 'nav--header-mobile--breakpoint', null, true ) );


    // Hide when mobile
    $hide_when_mobile = get_theme_mod( 'nav--header-mobile--hide' );

    if( $hide_when_mobile ) {
        $styles->add([
            'selector' => '.menu--header',
            'styles' => ['display' => 'none'],
            'screen' => $mobile_screen,
        ]);
    }


    // Menu Height
    $styles->add([
        'selector' => '.menu--header',
        'styles' => [
            'height' => get_theme_mod( 'nav--header-mobile--menu-height' ),
        ],
        'screen' => $mobile_screen,
    ]);


    // Icon Styles
    $styles->add([
        'selector' => '.menu--header .menu--toggle',
        'styles' => [
            'fill' => get_theme_mod( 'nav--header-mobile--icon-color' ),
            'color' => get_theme_mod( 'nav--header-mobile--icon-color' ),
            'font-size' => get_theme_mod( 'nav--header-mobile--icon-size' ),
        ],
        'screen' => $mobile_screen,
    ]);


    // Link Background Color
    $styles->add([
        'selector' => '.menu--header__items',
        'styles' => [
            'background-color' => get_theme_mod( 'nav--header-mobile--background-color', null, true ),
        ],
        'screen' => $mobile_screen,
    ]);


    // Link Separator Color
    $styles->add([
        'selector' => '.menu--header__item',
        'styles' => [
            'border-color' => get_theme_mod( 'nav--header-mobile--separator-color', null, true ),
        ],
        'screen' => $mobile_screen,
    ]);


    // Link Styles
    $styles->add([
        'selector' => '.menu--header__link',
        'styles' => [
            'border-color' => get_theme_mod( 'nav--header-mobile--separator-color' ),
            'padding-left' => get_theme_mod( 'nav--header-mobile--padding', null, true ),
            'padding-right' => get_theme_mod( 'nav--header-mobile--padding', null, true ),
        ],
        'screen' => $mobile_screen,
    ]);


    // Font Styles
    $styles->add([
        'selector' => '.menu--header__link',
        'styles' => get_font_styles( 'nav--header-mobile--font-styles' ),
        'screen' => $mobile_screen,
    ]);


    // Link Color
    $styles->add([
        'selector' => '.menu--header__link:link, .menu--header__link:visited',
        'styles' => [
            'color' => get_theme_mod( 'nav--header-mobile--link-color' ),
        ],
        'screen' => $mobile_screen,
    ]);


    // Link Color: Hover
    $styles->add([
        'selector' => '.menu--header__link:hover',
        'styles' => [
            'color' => get_theme_mod( 'nav--header-mobile--link-color--hover' ),
        ],
        'screen' => $mobile_screen,
    ]);


    // Var: font size
    $styles->add_var([
        'name' => 'nav--header--font-size',
        'value' => get_theme_mod( 'nav--header-mobile--font-size' ),
        'screen' => $mobile_screen,
    ]);


    // Var: line height
    $styles->add_var([
        'name' => 'nav--header--line-height',
        'value' => get_theme_mod( 'nav--header-mobile--line-height' ),
        'screen' => $mobile_screen,
    ]);

}