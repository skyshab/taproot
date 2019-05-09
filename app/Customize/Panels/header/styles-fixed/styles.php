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


// Fixed Header Styles
$styles->add([
    'selector' => '.app-header--fixed',
    'styles' => [
        'background-color' => theme_mod( 'header--styles-fixed--background-color' ),
    ],
    'screen' => 'desktop'
]);


// Default Color
$styles->add([
    'selector' => '.app-header--fixed',
    'styles' => [
        'color' => theme_mod( 'header--styles-fixed--default-color' ),
    ],
    'screen' => 'desktop'
]);


// Default Color Hover
$styles->add([
    'selector' => '.app-header--fixed .menu--toggle:hover',
    'styles' => [
        'color' => theme_mod( 'header--styles-fixed--default-color-hover' ),
    ],
    'screen' => 'desktop'
]);


// if boxed layout and fixed header
if( is_boxed_layout() && theme_mod( 'header--styles-fixed--fixed', true ) ) {
    $fixed_header_width = sprintf( 'calc( 100vw - (2 * %s) )', theme_mod( 'layout--site--boxed-layout--padding', true ) );
    $styles->add([
        'selector' => '.app-header--fixed, .app-header--sticky',
        'styles' => array(
            'width' => $fixed_header_width,
            'max-width' => theme_mod( 'layout--site--max-content-width' )
        ),
        'screen' => 'desktop'
    ]);
}


// Fixed Header Padding
$styles->add([
    'selector' => '.app-header--fixed .app-header__container',
    'styles' => [
        'padding-top'    => theme_mod( 'header--styles-fixed--padding' ),
        'padding-bottom' => theme_mod( 'header--styles-fixed--padding' ),
    ],
    'screen' => 'desktop'
]);
