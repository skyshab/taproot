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
use function Taproot\Customize\theme_mod;


# =======================================================
# Buttons
# =======================================================


// Button Styles
$styles->add([
    'selector' => '.editor-styles-wrapper .wp-block-button .wp-block-button__link, .editor-styles-wrapper .taproot-button',
    'styles' => [
        'color'             =>  theme_mod( 'elements--buttons--color', theme_mod( 'colors--theme--accent-contrast', true ) ),
        'background-color'  =>  theme_mod( 'elements--buttons--background-color', theme_mod( 'colors--theme--accent', true ) ),
        'border-color'      =>  theme_mod( 'elements--buttons--border-color' ),
        'border-width'      =>  theme_mod( 'elements--buttons--border-width' ),
        'border-radius'     =>  ( theme_mod( 'elements--buttons--is-rounded' ) ) ? '100px' : '0px',
        'font-family'       =>  get_font_family( theme_mod( 'elements--buttons--font-family' ) ),
        'font-size'         =>  theme_mod( 'elements--buttons--font-size', true ),
        'padding-left'      =>  theme_mod( 'elements--buttons--padding', true ),
        'padding-right'     =>  theme_mod( 'elements--buttons--padding', true ),
        'padding-top'       => '0px',
        'padding-bottom'    => '0px',
    ]
]);


// Button Line Height
$styles->add([
    'selector' => '.editor-styles-wrapper .wp-block-button .wp-block-button__link, .editor-styles-wrapper .wp-block-button .mce-content-body, .editor-styles-wrapper .taproot-button',
    'styles' => [
        'line-height' => theme_mod( 'elements--buttons--height', true )
    ]
]);


// Button Font Styles
$styles->add([
    'selector' => '.editor-styles-wrapper .wp-block-button .wp-block-button__link, .editor-styles-wrapper .taproot-button',
    'styles' => get_font_styles( 'elements--buttons--font-styles' )
]);


// Button Hover Styles

$styles->add([
    'selector' => '.wp-block-button__link:not(.has-background-color):hover',
    'styles' => [
        'background-color' =>  theme_mod( 'elements--buttons-hover--background-color' ),
    ]
]);

$styles->add([
    'selector' => '.wp-block-button__link:not(.has-text-color):hover',
    'styles' => [
        'color' =>  theme_mod( 'elements--buttons-hover--color' ),
    ]
]);

