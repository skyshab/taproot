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
    'selector' => '.entry__title--single',
    'styles' => [
        'color' => theme_mod( 'posts--title--color' ),
    ]
]);

// Font Style
$styles->add([
    'selector' => '.entry__title--single',
    'styles' => get_font_styles( 'posts--title--font-styles' )
]);


// Var: Title Font Size
$styles->custom_property([
    'name' => 'posts--title--font-size',
    'value' => theme_mod( 'posts--title--font-size' ),
    'screen' => 'default'
]);

// Var: Title Line Height
$styles->custom_property([
    'name' => 'posts--title--line-height',
    'value' => theme_mod( 'posts--title--line-height' ),
    'screen' => 'default'
]);


// Var: Title Font Size Tablet
$styles->custom_property([
    'name' => 'posts--title--font-size',
    'value' => theme_mod( 'posts--title--font-size--tablet' ),
    'screen' => 'tablet-and-up'
]);

// Var: Title Line Height Tablet
$styles->custom_property([
    'name' => 'posts--title--line-height',
    'value' => theme_mod( 'posts--title--line-height--tablet' ),
    'screen' => 'tablet-and-up'
]);


// Var: Title Font Size Desktop
$styles->custom_property([
    'name' => 'posts--title--font-size',
    'value' => theme_mod( 'posts--title--font-size--desktop' ),
    'screen' => 'desktop'
]);

// Var: Title Line Height Desktop
$styles->custom_property([
    'name' => 'posts--title--line-height',
    'value' => theme_mod( 'posts--title--line-height--desktop' ),
    'screen' => 'desktop'
]);
