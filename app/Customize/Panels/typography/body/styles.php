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
use function Taproot\Customize\theme_mod;
use function Taproot\Customize\maybe_convert_to_em;


// Custom Property: Body Text Color
$styles->custom_property([
    'name' => 'typography--body--text-color',
    'value' => theme_mod( 'typography--body--text-color', true ),
]);


$body_font = theme_mod( 'typography--body--font-family');

if( $body_font && "default" !== $body_font ) {

    // Custom Property: Body Font Family
    $styles->custom_property([
        'name' => 'typography--body--font-family',
        'value' => $body_font,
    ]);
}


// Mobile

// Var: Body Font Size
$styles->custom_property([
    'name' => 'typography--body--font-size',
    'value' => theme_mod( 'typography--body--font-size' ),
    'screen' => 'default',
]);


// Var: Body Line Height
$styles->custom_property([
    'name' => 'typography--body--line-height',
    'value' => theme_mod( 'typography--body--line-height' ),
    'screen' => 'default',
]);


// Var: Body Block Spacing
$styles->custom_property([
    'name' => 'typography--body--block-spacing',
    'value' =>  maybe_convert_to_em( theme_mod( 'typography--body--line-height' ) ),
    'screen' => 'default',
]);


// Tablet

// Var: Body Font Size
$styles->custom_property([
    'name' => 'typography--body--font-size',
    'value' => theme_mod( 'typography--body--font-size--tablet' ),
    'screen' => 'tablet-and-up',
]);


// Var: Body Line Height
$styles->custom_property([
    'name' => 'typography--body--line-height',
    'value' => theme_mod( 'typography--body--line-height--tablet' ),
    'screen' => 'tablet-and-up',
]);


// Var: Body Block Spacing
$styles->custom_property([
    'name' => 'typography--body--block-spacing',
    'value' =>  maybe_convert_to_em( theme_mod( 'typography--body--line-height--tablet' ) ),
    'screen' => 'tablet-and-up',
]);


// Desktop

// Var: Body Font Size
$styles->custom_property([
    'name' => 'typography--body--font-size',
    'value' => theme_mod( 'typography--body--font-size--desktop' ),
    'screen' => 'desktop',
]);


// Var: Body Line Height
$styles->custom_property([
    'name' => 'typography--body--line-height',
    'value' => theme_mod( 'typography--body--line-height--desktop' ),
    'screen' => 'desktop',
]);


// Var: Body Block Spacing
$styles->custom_property([
    'name' => 'typography--body--block-spacing',
    'value' =>  maybe_convert_to_em( theme_mod( 'typography--body--line-height--desktop' ) ),
    'screen' => 'desktop',
]);
