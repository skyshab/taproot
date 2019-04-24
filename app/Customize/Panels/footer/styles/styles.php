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


use function Taproot\Customize\is_boxed_layout;
use function Taproot\Customize\theme_mod;


// Background Color
$styles->add([
    'selector' => '.app-footer',
    'styles' => [
        'background-color' => theme_mod( 'footer--styles--background-color' ),
    ],
]);


// if no footer background color, add a shadow
$footer_bkg = theme_mod( 'footer--styles--background-color', true );

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
        'color' => theme_mod( 'footer--styles--default-color' ),
    ],
]);


// Default Color Hover
$styles->add([
    'selector' => '.app-footer a:hover',
    'styles' => [
        'color' => theme_mod( 'footer--styles--default-color--hover' ),
    ],
]);


// if boxed layout and fixed footer
if( is_boxed_layout() && theme_mod( 'footer--styles--fixed' ) ) {
    $styles->add([
        'selector' => '.app-footer--fixed',
        'styles' => [
            'margin-bottom' => theme_mod( 'layout--boxed--outer-padding', true )
        ],
        'screen' => 'desktop'
    ]);
}
