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
use function Taproot\Customize\theme_mod;


// Title Styles
$styles->add([
    'selector' => '.app-header__title',
    'styles' => [
        'color' => theme_mod( 'branding--title--color' ),
        'font-family' => get_font_family( theme_mod( 'branding--title--font-family' ) ),
    ]
]);

// Font Styles
$styles->add([
    'selector' => '.app-header__title',
    'styles' => get_font_styles( 'branding--title--font-styles' )
]);




// Hide Title
if( theme_mod( 'branding--title--hide' ) ) {
    $styles->add([
        'screen' => 'mobile',
        'selector' => '.app-header__title',
        'styles' => [ 'display' => 'none' ],
    ]);
}
else {

    // Var: Title Font Size
    $styles->add_var([
        'name' => 'branding--title--font-size',
        'value' => theme_mod( 'branding--title--font-size' ),
        'screen' => 'default'
    ]);


    // Var: Title Line Height
    $styles->add_var([
        'name' => 'branding--title--line-height',
        'value' => theme_mod( 'branding--title--line-height' ),
        'screen' => 'default'
    ]);
}


// Tablet styles


// Hide Title
if( theme_mod( 'branding--title--hide--tablet' ) ) {
    $styles->add([
        'screen' => 'tablet',
        'selector' => '.app-header__title',
        'styles' => [ 'display' => 'none' ],
    ]);
}
else {

    // Var: Title Font Size
    $styles->add_var([
        'name' => 'branding--title--font-size',
        'value' => theme_mod( 'branding--title--font-size--tablet' ),
        'screen' => 'tablet-and-up'
    ]);


    // Var: Title Line Height
    $styles->add_var([
        'name' => 'branding--title--line-height',
        'value' => theme_mod( 'branding--title--line-height--tablet' ),
        'screen' => 'tablet-and-up'
    ]);
}


// Desktop Styles


// Hide Title
if( theme_mod( 'branding--title--hide--desktop' ) ) {
    $styles->add([
        'screen' => 'desktop',
        'selector' => '.app-header__title',
        'styles' => [ 'display' => 'none' ],
    ]);
}
else {

    // Var: Title Font Size
    $styles->add_var([
        'name' => 'branding--title--font-size',
        'value' => theme_mod( 'branding--title--font-size--desktop' ),
        'screen' => 'desktop'
    ]);


    // Var: Title Line Height
    $styles->add_var([
        'name' => 'branding--title--line-height',
        'value' => theme_mod( 'branding--title--line-height--desktop' ),
        'screen' => 'desktop'
    ]);
}