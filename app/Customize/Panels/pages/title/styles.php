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


use function Taproot\Customize\get_font_styles;
use function Taproot\Customize\theme_mod;


// Blog Title Color
$styles->add([
    'selector' => '.entry__title--page',
    'styles' => [ 'color' => theme_mod( 'pages--title--color' ) ]
]);

// Font Style
$styles->add([
    'selector' => '.entry__title--page',
    'styles' => get_font_styles( 'pages--title--font-styles' )
]);


// Var: Title Font Size
$styles->add_var([
    'name' => 'pages--title--font-size',
    'value' => theme_mod( 'pages--title--font-size' ),
    'screen' => 'default'
]);

// Var: Title Line Height
$styles->add_var([
    'name' => 'pages--title--line-height',
    'value' => theme_mod( 'pages--title--line-height' ),
    'screen' => 'default'
]);


// Var: Title Font Size Tablet
$styles->add_var([
    'name' => 'pages--title--font-size',
    'value' => theme_mod( 'pages--title--font-size--tablet' ),
    'screen' => 'tablet-and-up'
]);

// Var: Title Line Height Tablet
$styles->add_var([
    'name' => 'pages--title--line-height',
    'value' => theme_mod( 'pages--title--line-height--tablet' ),
    'screen' => 'tablet-and-up'
]);


// Var: Title Font Size Desktop
$styles->add_var([
    'name' => 'pages--title--font-size',
    'value' => theme_mod( 'pages--title--font-size--desktop' ),
    'screen' => 'desktop'
]);

// Var: Title Line Height Desktop
$styles->add_var([
    'name' => 'pages--title--line-height',
    'value' => theme_mod( 'pages--title--line-height--desktop' ),
    'screen' => 'desktop'
]);
