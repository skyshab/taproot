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


// mobile

    // Header Image heights
    $styles->add([
        'selector' => '.app-header--has-custom-header:not(.app-header--fixed)',
        'styles' => array(
            'min-height' => theme_mod( 'header--hero--height', true ),
        ),
    ]);


// tablet

    // Header Image heights
    $styles->add([
        'selector' => '.app-header--has-custom-header:not(.app-header--fixed)',
        'styles' => array(
            'min-height' => theme_mod( 'header--hero--height--tablet', true ),
        ),
        'screen' => 'tablet-and-up'
    ]);



// desktop

    // Header Image heights
    $styles->add([
        'selector' => '.app-header--has-custom-header:not(.app-header--fixed)',
        'styles' => array(
            'min-height' => theme_mod( 'header--hero--height--desktop', true ),
        ),
        'screen' => 'desktop'
    ]);

    // if boxed layout and using 100vh for the max-height, account for boxed layout padding
    if( is_boxed_layout() ) {
        $styles->add([
            'screen' => 'desktop',
            'selector' => '.app-header--has-custom-header.boxed-layout:not(.app-header--fixed)',
            'styles' => [
                'max-height' => sprintf( "calc(100vh - %s)", theme_mod( 'layout--boxed--outer-padding', true ) ),
            ],
        ]);
    }


// Colors

    // Custom Property: Default Hero Header Color
    $styles->custom_property([
        'name' => 'header--hero--default-color',
        'value' => theme_mod( 'header--hero--default-color' ),
    ]);

    // Custom Property: Default Hero Header Link Hover Color
    $styles->custom_property([
        'name' => 'header--hero--link-color--hover',
        'value' => theme_mod( 'header--hero--default-color--hover' ),
    ]);
