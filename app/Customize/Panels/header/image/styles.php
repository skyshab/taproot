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


use function Taproot\Customize\theme_mod;
use function Taproot\Customize\is_boxed_layout;


// Header Image heights
$styles->add([
    'selector' => '.app-header--has-custom-header:not(.app-header--fixed)',
    'styles' => array(
        'height' => theme_mod( 'header--image--height', true ),
        'max-height' => theme_mod( 'header--image--max-height', true ),
        'min-height' => theme_mod( 'header--image--min-height', true ),
    ),
]);

// if boxed layout and using 100vh for the max-height, account for boxed layout padding
if( '100vh' === theme_mod( 'header--image--max-height', true ) && is_boxed_layout() ) {
    $styles->add([
        'screen' => 'tablet-and-up',
        'selector' => '.app-header--has-custom-header.boxed-layout:not(.app-header--fixed)',
        'styles' => [
            'max-height' => sprintf( "calc(100vh - %s)", theme_mod( 'layout--boxed--outer-padding', true ) ),
        ],
    ]);
}
