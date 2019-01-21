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


use function Taproot\Customize\get_mobile_screen;
use function Rootstrap\get_theme_mod;


if( has_nav_menu( 'top' ) ) {

    $mobile_screen = get_mobile_screen( get_theme_mod( 'nav--top-mobile--breakpoint', null, true ) );


    // Hide when mobile
    if( get_theme_mod( 'nav--top-mobile--hide' ) ) {
        $styles->add([
            'selector' => '.menu--top',
            'styles' => ['display' => 'none'],
            'screen' => $mobile_screen,
        ]);
    }


    // Font Styles
    $styles->add([
        'selector' => '.menu--top__link',
        'styles' => array(
            'text-align' => get_theme_mod( 'nav--top-mobile--align' ),
        ),
        'screen' => $mobile_screen,
    ]);


    // Var: font size
    $styles->add_var([
        'name' => 'nav--top--font-size',
        'value' => get_theme_mod( 'nav--top-mobile--font-size', null, true ),
        'screen' => $mobile_screen,
    ]);


    // Var: line height
    $styles->add_var([
        'name' => 'nav--top--line-height',
        'value' => get_theme_mod( 'nav--top-mobile--line-height', null, true ),
        'screen' => $mobile_screen,
    ]);

}