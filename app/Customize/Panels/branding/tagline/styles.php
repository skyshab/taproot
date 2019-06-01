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


// Tagline Styles
$styles->add([
    'selector' => '.app-header__description',
    'styles' => [
        'color' => theme_mod( 'branding--tagline--color' ),
        'font-family' => get_font_family( theme_mod( 'branding--tagline--font-family' ) ),
    ]
]);


// Font Styles
$styles->add([
    'selector' => '.app-header__description',
    'styles' => get_font_styles( 'branding--tagline--font-styles' )
]);


// Center title when tagline is hidden
$show_tagline = theme_mod( 'branding--tagline--display-tagline', true );
if( !$show_tagline ) {
    $styles->add([
        'selector' => '.app-header__title',
        'styles' => [
            'grid-row-end' => 'span 2',
            'align-self' => 'center',
        ],
    ]);
}


// Hide Tagline
if( theme_mod( 'branding--tagline--hide-tagline' ) ) {
    $styles->add([
        'screen' => 'mobile',
        'selector' => '.app-header__tagline',
        'styles' => [ 'display' => 'none' ],
    ]);

    // if we do hide the tagline, adjust title to use space accordingly.
    // only ouput if we're not hiding the title too
    if( !theme_mod( 'branding--title--hide-title' ) ) {
        $styles->add([
            'screen' => 'mobile',
            'selector' => '.app-header__title',
            'styles' => [
                'grid-row-end' => 'span 2',
                'align-self' => 'center',
            ],
        ]);
    }
}
else {

    // Var: Tagline Font Size
    $styles->custom_property([
        'name' => 'branding--tagline--font-size',
        'value' => theme_mod( 'branding--tagline--font-size' ),
        'screen' => 'default'
    ]);

    // Var: Tagline Line Height
    $styles->custom_property([
        'name' => 'branding--tagline--line-height',
        'value' => theme_mod( 'branding--tagline--line-height' ),
        'screen' => 'default'
    ]);

    // Var: Tagline Gutter
    $styles->custom_property([
        'name' => 'branding--tagline--gutter',
        'value' => theme_mod( 'branding--tagline--gutter' ),
        'screen' => 'default'
    ]);
}


// Tablet Styles

// Hide Tagline
if( theme_mod( 'branding--tagline--hide-tagline--tablet' ) ) {
    $styles->add([
        'screen' => 'tablet',
        'selector' => '.app-header__tagline',
        'styles' => [ 'display' => 'none' ],
    ]);

    // if we do hide the tagline, adjust title to use space accordingly.
    // only ouput if we're not hiding the title too
    if( !theme_mod( 'branding--title--hide-title--tablet' ) ) {
        $styles->add([
            'screen' => 'tablet',
            'selector' => '.app-header__title',
            'styles' => [
                'grid-row-end' => 'span 2',
                'align-self' => 'center',
            ],
        ]);
    }
}
else {

    // Var: Tagline Font Size
    $styles->custom_property([
        'name' => 'branding--tagline--font-size',
        'value' => theme_mod( 'branding--tagline--font-size--tablet' ),
        'screen' => 'tablet-and-up'
    ]);

    // Var: Tagline Line Height
    $styles->custom_property([
        'name' => 'branding--tagline--line-height',
        'value' => theme_mod( 'branding--tagline--line-height--tablet' ),
        'screen' => 'tablet-and-up'
    ]);

    // Var: Tagline Gutter
    $styles->custom_property([
        'name' => 'branding--tagline--gutter',
        'value' => theme_mod( 'branding--tagline--gutter--tablet' ),
        'screen' => 'tablet-and-up'
    ]);
}


// Desktop Styles

// Hide Tagline
if( theme_mod( 'branding--tagline--hide-tagline--desktop' ) ) {
    $styles->add([
        'screen' => 'desktop',
        'selector' => '.app-header__tagline',
        'styles' => [ 'display' => 'none' ],
    ]);

   // if we do hide the tagline, adjust title to use space accordingly.
    // only ouput if we're not hiding the title too
    if( !theme_mod( 'branding--title--hide-title--desktop' ) ) {
        $styles->add([
            'screen' => 'desktop',
            'selector' => '.app-header__title',
            'styles' => [
                'grid-row-end' => 'span 2',
                'align-self' => 'center',
            ],
        ]);
    }
}
else {

    // Var: Tagline Font Size
    $styles->custom_property([
        'name' => 'branding--tagline--font-size',
        'value' => theme_mod( 'branding--tagline--font-size--desktop' ),
        'screen' => 'desktop'
    ]);

    // Var: Tagline Line Height
    $styles->custom_property([
        'name' => 'branding--tagline--line-height',
        'value' => theme_mod( 'branding--tagline--line-height--desktop' ),
        'screen' => 'desktop'
    ]);

    // Var: Tagline Gutter
    $styles->custom_property([
        'name' => 'branding--tagline--gutter',
        'value' => theme_mod( 'branding--tagline--gutter--desktop' ),
        'screen' => 'desktop'
    ]);
}
