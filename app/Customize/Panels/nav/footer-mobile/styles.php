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


use function Taproot\Customize\get_mobile_screen;
use function Taproot\Customize\theme_mod;

if( has_nav_menu( 'footer' ) ) {

    $mobile_screen = get_mobile_screen( theme_mod( 'nav--footer-mobile--breakpoint', true ) );

    // Hide when mobile
    $hide_when_mobile = theme_mod( 'nav--footer-mobile--hide' );

    if( $hide_when_mobile ) {
        $styles->add([
            'selector' => '.menu--footer',
            'styles' => ['display' => 'none'],
            'screen' => $mobile_screen,
        ]);
    }


    // mobile nav align
    $styles->add([
        'selector' => '.menu--footer__link',
        'styles' => [ 'text-align' => theme_mod( 'nav--footer-mobile--align' ) ],
        'screen' => $mobile_screen,
    ]);


    // Var: Font Size
    $styles->custom_property([
        'name' => 'nav--footer--font-size',
        'value' => theme_mod( 'nav--footer-mobile--font-size' ),
        'screen' => $mobile_screen,
    ]);


    // Var: Line Height
    $styles->custom_property([
        'name' => 'nav--footer--line-height',
        'value' => theme_mod( 'nav--footer-mobile--line-height' ),
        'screen' => $mobile_screen,
    ]);

}