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


// Fixed Header Styles
$styles->add([
    'selector' => '.app-header--fixed',
    'styles' => [
        'background-color' => get_theme_mod( 'header--styles-fixed--background-color' ),
    ],
    'screen' => 'desktop'
]);


// Default Color
$styles->add([
    'selector' => '.app-header--fixed',
    'styles' => [
        'color' => get_theme_mod( 'header--styles-fixed--default-color' ),
    ],
    'screen' => 'desktop'
]);


// Default Color Hover
$styles->add([
    'selector' => '.app-header--fixed .menu--toggle:hover',
    'styles' => [
        'color' => get_theme_mod( 'header--styles-fixed--default-color-hover' ),
    ],
    'screen' => 'desktop'
]);


// if boxed layout and fixed header
if( is_boxed_layout() && get_theme_mod( 'header--styles-fixed--fixed', null, true ) ) {
    $fixed_header_width = sprintf( 'calc( 100vw - (2 * %s) )', get_theme_mod( 'layout--site--boxed-layout--padding' ) );
    $styles->add([
        'selector' => '.app-header--fixed',
        'styles' => array(
            'width' => $fixed_header_width,
            'max-width' => get_theme_mod( 'layout--site--max-content-width' )
        ),
        'screen' => 'desktop'
    ]);
}
