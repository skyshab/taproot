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


use function Rootstrap\get_theme_mod;
use function Taproot\Customize\is_boxed_layout;


// Header Image heights
$styles->add([
    'selector' => '.custom-header .app-header:not(.app-header--fixed)',
    'styles' => array(
        'height' => get_theme_mod( 'header--image--height', null, true ),
        'max-height' => get_theme_mod( 'header--image--max-height', null, true ),
        'min-height' => get_theme_mod( 'header--image--min-height', null, true ),
    ),
]);

// if boxed layout and using 100vh for the max-height, account for boxed layout padding
if( '100vh' === get_theme_mod( 'header--image--max-height', null, true ) && is_boxed_layout() ) {
    $styles->add([
        'screen' => 'tablet-and-up',
        'selector' => '.custom-header .app-header.boxed-layout:not(.app-header--fixed)',
        'styles' => [
            'max-height' => sprintf( "calc(100vh - %s)", get_theme_mod( 'layout--site--boxed-layout--padding', null, true ) ),
        ],
    ]);
}
