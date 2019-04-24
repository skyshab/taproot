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


use function Taproot\Customize\get_font_family;
use function Taproot\Customize\get_font_styles;
use function Taproot\Customize\get_desktop_screen;
use function Taproot\Customize\theme_mod;


if( has_nav_menu( 'top' ) ) {

    $top_nav_desktop_screen = get_desktop_screen( theme_mod( 'nav--top-mobile--breakpoint', true ) );


    // Hide when not mobile
    if( theme_mod( 'nav--top--hide' ) ) {
        $styles->add([
            'selector' => '.menu--top',
            'styles' => ['display' => 'none'],
            'screen' => $top_nav_desktop_screen,
        ]);
    }

    // Background Color
    $styles->add([
        'selector' => '.menu--top',
        'styles' => array(
            'background-color' => theme_mod( 'nav--top--background-color', true ),
        ),
    ]);


    // Font Styles
    $styles->add([
        'selector' => '.menu--top__link',
        'styles' => get_font_styles( 'nav--top--font-styles' ),
    ]);


    // Font Family
    $styles->add([
        'selector' => '.menu--top__link',
        'styles' => [
            'font-family' => get_font_family( theme_mod( 'nav--top--font-family' ) ),
        ],
    ]);


    // Link Color
    $styles->add([
        'selector' => '.menu--top__link:link, .menu--top__link:visited',
        'styles' => [
            'color' => theme_mod( 'nav--top--link-color', true ),
        ],
    ]);


    // Link Color: Hover
    $styles->add([
        'selector' => '.menu--top__link:hover',
        'styles' => [
            'color' => theme_mod( 'nav--top--link-color--hover' ),
        ],
    ]);


    // Desktop Link Padding
    $styles->add([
        'selector' => '.menu--top__link',
        'styles' => array(
            'padding-left' => theme_mod( 'nav--top--padding', true ),
            'padding-right' => theme_mod( 'nav--top--padding', true ),
        ),
        'screen' => $top_nav_desktop_screen,
    ]);


    // Var: font size
    $styles->add_var([
        'name' => 'nav--top--font-size',
        'value' => theme_mod( 'nav--top--font-size', true ),
        'screen' => $top_nav_desktop_screen,
    ]);


    // Var: line height
    $styles->add_var([
        'name' => 'nav--top--line-height',
        'value' => theme_mod( 'nav--top--line-height', true ),
        'screen' => $top_nav_desktop_screen,
    ]);


    // Align
    $styles->add([
        'selector' => '.menu--top__items',
        'styles' => array(
            'justify-content' => theme_mod( 'nav--top--align' ),
            'flex-direction' => 'row',
        ),
        'screen' => $top_nav_desktop_screen,
    ]);

}