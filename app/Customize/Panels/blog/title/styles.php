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
    'selector' => '.archive-header__title',
    'styles' => [ 'color' => theme_mod( 'blog--title--color' ) ]
]);

// Font Style
$styles->add([
    'selector' => '.archive-header__title',
    'styles' => get_font_styles( 'blog--title--font-styles' )
]);


// Var: Blog Title Font Size
$styles->custom_property([
    'name' => 'blog--title--font-size',
    'value' => theme_mod( 'blog--title--font-size' ),
    'screen' => 'default'
]);

// Var: Blog Title Line Height
$styles->custom_property([
    'name' => 'blog--title--line-height',
    'value' => theme_mod( 'blog--title--line-height' ),
    'screen' => 'default'
]);


// Var: Blog Title Font Size Tablet
$styles->custom_property([
    'name' =>'blog--title--font-size',
    'value' => theme_mod( 'blog--title--font-size--tablet' ),
    'screen' => 'tablet-and-up'
]);

// Var: Blog Title Line Height Tablet
$styles->custom_property([
    'name' =>'blog--title--line-height',
    'value' => theme_mod( 'blog--title--line-height--tablet' ),
    'screen' => 'tablet-and-up'
]);


// Var: Blog Title Font Size Desktop
$styles->custom_property([
    'name' => 'blog--title--font-size',
    'value' => theme_mod( 'blog--title--font-size--desktop' ),
    'screen' => 'desktop'
]);

// Var: Blog Title Line Height Desktop
$styles->custom_property([
    'name' => 'blog--title--line-height',
    'value' => theme_mod( 'blog--title--line-height--desktop' ),
    'screen' => 'desktop'
]);
