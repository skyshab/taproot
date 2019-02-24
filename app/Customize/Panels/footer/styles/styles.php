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


use function Taproot\Customize\is_boxed_layout;
use function Rootstrap\get_theme_mod;


// Background Color
$styles->add([
    'selector' => '.app-footer',
    'styles' => [
        'background-color' => get_theme_mod( 'footer--styles--background-color' ),
    ],
]);


// if no footer background color, add a shadow
$footer_bkg = get_theme_mod( 'footer--styles--background-color', null, true );

if(  '#ffffff' === $footer_bkg || 'rgb(255,255,255)' === $footer_bkg ) {
    $styles->add([
        'selector' => '.app-footer',
        'styles' => [
            'border-top' => '1px solid rgba(0, 0, 0, 0.1)',
        ],
    ]);
}


// Default Color
$styles->add([
    'selector' => '.app-footer, .app-footer a',
    'styles' => [
        'color' => get_theme_mod( 'footer--styles--default-color' ),
    ],
]);


// Default Color Hover
$styles->add([
    'selector' => '.app-footer a:hover',
    'styles' => [
        'color' => get_theme_mod( 'footer--styles--default-color--hover' ),
    ],
]);


// if boxed layout and fixed footer
if( is_boxed_layout() && get_theme_mod( 'footer--styles--fixed' ) ) {
    $styles->add([
        'selector' => '.app-footer--fixed',
        'styles' => [
            'width' => sprintf( 'calc( 100vw - (2 * %s) )', get_theme_mod( 'layout--site--boxed-layout--padding', null, true ) ),
            'max-width' => get_theme_mod( 'layout--site--max-content-width' ),
            'margin-bottom' => get_theme_mod( 'layout--site--boxed-layout--padding', null, true )
        ],
        'screen' => 'desktop'
    ]);
}
