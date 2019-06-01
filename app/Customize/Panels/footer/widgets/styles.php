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
use function Taproot\Customize\get_footer_widget_layout_style;


$styles->add([
    'selector' => '.app-footer__widget',
    'styles' => [
        'color' => theme_mod( 'footer--widgets--default-color' )
    ],
]);

$styles->add([
    'selector' => '.app-footer__widget h1, .app-footer__widget h2, .app-footer__widget h3, .app-footer__widget h4, .app-footer__widget h5, .app-footer__widget h6',
    'styles' => [
        'color' => theme_mod( 'footer--widgets--headings-color' )
    ],
]);

$styles->add([
    'selector' => '.app-footer__widget a, .app-footer__widget a:visited',
    'styles' => [
        'color' => theme_mod( 'footer--widgets--link-color' )
    ],
]);

$styles->add([
    'selector' => '.app-footer__widget a:hover',
    'styles' => [
        'color' => theme_mod( 'footer--widgets--link-color--hover' )
    ],
]);


// Mobile Styles

// Var: Widgets Layout
$styles->custom_property([
    'name' => 'footer--widgets--layout',
    'value' => get_footer_widget_layout_style( theme_mod( 'footer--widgets--layout', true ) ),
    'screen' => 'default',
]);

// Var: Title Font Size
$styles->custom_property([
    'name' => 'footer--widgets--title--font-size',
    'value' => theme_mod( 'footer--widgets--title--font-size' ),
    'screen' => 'default',
]);

// Var: Title Line Height
$styles->custom_property([
    'name' => 'footer--widgets--title--line-height',
    'value' => theme_mod( 'footer--widgets--title--line-height' ),
    'screen' => 'default',
]);

// Var: Text Font Size
$styles->custom_property([
    'name' => 'footer--widgets--color',
    'value' => theme_mod( 'footer--widgets--color' ),
    'screen' => 'default',
]);

// Var: Text Line Height
$styles->custom_property([
    'name' => 'footer--widgets--line-height',
    'value' => theme_mod( 'footer--widgets--line-height' ),
    'screen' => 'default',
]);

// Var: Widgets Spacing
$styles->custom_property([
    'name' => 'footer--widgets--gutter',
    'value' => theme_mod( 'footer--widgets--gutter' ),
    'screen' => 'default',
]);


// Tablet Styles

// Var: Widgets Layout
$styles->custom_property([
    'name' => 'footer--widgets--layout',
    'value' => get_footer_widget_layout_style( theme_mod( 'footer--widgets--layout--tablet', true ) ),
    'screen' => 'tablet-and-up',
]);

// Var: Title Font Size
$styles->custom_property([
    'name' => 'footer--widgets--title--font-size',
    'value' => theme_mod( 'footer--widgets--title--font-size' ),
    'screen' => 'tablet-and-up',
]);

// Var: Title Line Height
$styles->custom_property([
    'name' => 'footer--widgets--title--line-height',
    'value' => theme_mod( 'footer--widgets--title--line-height--tablet' ),
    'screen' => 'tablet-and-up',
]);

// Var: Text Font Size
$styles->custom_property([
    'name' => 'footer--widgets--color',
    'value' => theme_mod( 'footer--widgets--color--tablet' ),
    'screen' => 'tablet-and-up',
]);

// Var: Text Line Height
$styles->custom_property([
    'name' => 'footer--widgets--line-height',
    'value' => theme_mod( 'footer--widgets--line-height--tablet' ),
    'screen' => 'tablet-and-up',
]);

// Var: Widgets Spacing
$styles->custom_property([
    'name' => 'footer--widgets--gutter',
    'value' => theme_mod( 'footer--widgets--gutter--tablet' ),
    'screen' => 'tablet-and-up',
]);


// Desktop Styles

// Var: Widgets Layout
$styles->custom_property([
    'name' => 'footer--widgets--layout',
    'value' => get_footer_widget_layout_style( theme_mod( 'footer--widgets--layout--desktop', true ) ),
    'screen' => 'desktop',
]);

// Var: Title Font Size
$styles->custom_property([
    'name' => 'footer--widgets--title--font-size',
    'value' => theme_mod( 'footer--widgets--title--font-size--desktop' ),
    'screen' => 'desktop',
]);

// Var: Title Line Height
$styles->custom_property([
    'name' => 'footer--widgets--title--line-height',
    'value' => theme_mod( 'footer--widgets--title--line-height--desktop' ),
    'screen' => 'desktop',
]);

// Var: Text Font Size
$styles->custom_property([
    'name' => 'footer--widgets--color',
    'value' => theme_mod( 'footer--widgets--color--desktop' ),
    'screen' => 'desktop',
]);

// Var: Text Line Height
$styles->custom_property([
    'name' => 'footer--widgets--line-height',
    'value' => theme_mod( 'footer--widgets--line-height--desktop' ),
    'screen' => 'desktop',
]);

// Var: Widgets Spacing
$styles->custom_property([
    'name' => 'footer--widgets--gutter',
    'value' => theme_mod( 'footer--widgets--gutter--desktop' ),
    'screen' => 'desktop',
]);
