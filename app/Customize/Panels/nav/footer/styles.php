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


if( has_nav_menu( 'footer' ) ) {

    // Background Color
    $styles->add([
        'selector' => '.menu--footer',
        'styles' => [
            'background-color' => theme_mod( 'nav--footer--background-color' ),
        ],
    ]);


    // Font Styles
    $styles->add([
        'selector' => '.menu--footer__link',
        'styles' => get_font_styles( 'nav--footer--font-styles' ),
    ]);


    // Menu Link Styles
    $styles->add([
        'selector' => '.menu--footer__link',
        'styles' => [
            'font-family' => get_font_family( theme_mod( 'nav--footer--font-family' ) ),
            'color' => theme_mod( 'nav--footer--link-color' ),
        ],
    ]);


    // Link Color: Hover
    $styles->add([
        'selector' => '.menu--footer__link:hover',
        'styles' => [
            'color' => theme_mod( 'nav--footer--link-color--hover' ),
        ],
    ]);


    // Nav Position in footer
    if( 'after' === theme_mod( 'nav--footer--position' ) ) {
        $styles->add([
            'selector' => '.menu--footer',
            'styles' => [
                'order' => '3'
            ],
        ]);
    }


    // Desktop Only Styles
    $footer_nav_desktop_screen = get_desktop_screen( theme_mod( 'nav--footer-mobile--breakpoint', true ) );


    // Desktop Link Styles
    $styles->add([
        'selector' => '.menu--footer__link',
        'styles' => [
            'padding-left' => theme_mod( 'nav--footer--padding' ),
            'padding-right' => theme_mod( 'nav--footer--padding' ),
        ],
        'screen' => $footer_nav_desktop_screen,
    ]);


    // Var: font size
    $styles->custom_property([
        'name' => 'nav--footer--font-size',
        'value' => theme_mod( 'nav--footer--font-size', true ),
        'screen' => $footer_nav_desktop_screen,
    ]);


    // Var: line height
    $styles->custom_property([
        'name' => 'nav--footer--line-height',
        'value' => theme_mod( 'nav--footer--line-height', true ),
        'screen' => $footer_nav_desktop_screen,
    ]);


    // Align
    $styles->add([
        'selector' => '.menu--footer__items',
        'styles' => [
            'justify-content' => theme_mod( 'nav--footer--align' ),
            'flex-direction' => 'row',
        ],
        'screen' => $footer_nav_desktop_screen,
    ]);


    // Hide when not mobile
    if( theme_mod( 'nav--footer--hide' ) ) {
        $styles->add([
            'selector' => '.menu--footer',
            'styles' => ['display' => 'none'],
            'screen' => $footer_nav_desktop_screen,
        ]);
    }

}
