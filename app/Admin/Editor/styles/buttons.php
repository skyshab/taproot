<?php
/**
 * Styles output on block editor admin pages.
 *
 * This file adds customizer setting styles to the block editor.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Taproot\Customize\get_font_family;
use function Taproot\Customize\get_font_styles;
use function Rootstrap\get_theme_mod;


# =======================================================
# Buttons
# =======================================================


// Button Styles
$styles->add([
    'selector' => '.editor-styles-wrapper .wp-block-button .wp-block-button__link, .editor-styles-wrapper .taproot-button',
    'styles' => [
        'color'             =>  get_theme_mod( 'elements--buttons--color', get_theme_mod( 'colors--theme--accent-contrast', true ) ),
        'background-color'  =>  get_theme_mod( 'elements--buttons--background-color', get_theme_mod( 'colors--theme--accent', true ) ),
        'border-color'      =>  get_theme_mod( 'elements--buttons--border-color' ),
        'border-width'      =>  get_theme_mod( 'elements--buttons--border-width' ),
        'border-radius'     =>  get_theme_mod( 'elements--buttons--border-radius' ),
        'font-family'       =>  get_font_family( get_theme_mod( 'elements--buttons--font-family' ) ),
        'font-size'         =>  get_theme_mod( 'elements--buttons--font-size', true ),
        'padding-left'      =>  get_theme_mod( 'elements--buttons--padding', true ),
        'padding-right'     =>  get_theme_mod( 'elements--buttons--padding', true ),
        'padding-top'       => '0px',
        'padding-bottom'    => '0px',
    ]
]);


// Button Line Height
$styles->add([
    'selector' => '.editor-styles-wrapper .wp-block-button .wp-block-button__link, .editor-styles-wrapper .wp-block-button .mce-content-body, .editor-styles-wrapper .taproot-button',
    'styles' => [
        'line-height' => get_theme_mod( 'elements--buttons--height', true )
    ]
]);


// Button Font Styles
$styles->add([
    'selector' => '.editor-styles-wrapper .wp-block-button .wp-block-button__link, .editor-styles-wrapper .taproot-button',
    'styles' => get_font_styles( 'elements--buttons--font-styles' )
]);


// Button Hover Styles
// removing this until we figure out how to add hover styles to the block editor buttons
// $styles->add([
//     'selector' => '.editor-styles-wrapper .wp-block-button .wp-block-button__link:hover, .editor-styles-wrapper .taproot-button:hover',
//     'styles' => [
//         'color'             =>  get_theme_mod( 'elements--buttons-hover--color' ),
//         'background-color'  =>  get_theme_mod( 'elements--buttons-hover--background-color' ),
//         'border-color'      =>  get_theme_mod( 'elements--buttons-hover--border-color' ),
//     ]
// ]);

