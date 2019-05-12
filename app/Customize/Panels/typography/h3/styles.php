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


// Var: Heading color
$styles->add([
    'selector' => 'h3',
    'styles' => [ 'color' => theme_mod( 'typography--h3--color' ) ],
]);

// Font Family
$styles->add([
    'selector' => 'h3',
    'styles' => [
        'font-family' => get_font_family( theme_mod( 'typography--h3--font-family' ) )
    ]
]);

// Font Styles
$styles->add([
    'selector' => 'h3',
    'styles' => get_font_styles( 'typography--h3--font-styles' )
]);


// Var: Heading Font Size
$styles->add_var([
    'name' => 'typography--h3--font-size',
    'value' => theme_mod( 'typography--h3--font-size' ),
    'screen' => 'default',
]);

// Var: Heading Line Height
$styles->add_var([
    'name' => 'typography--h3--line-height',
    'value' => theme_mod( 'typography--h3--line-height' ),
    'screen' => 'default',
]);


// Var: Heading Font Size Tablet
$styles->add_var([
    'name' => 'typography--h3--font-size',
    'value' => theme_mod( 'typography--h3--font-size--tablet' ),
    'screen' => 'tablet-and-up',
]);

// Var: Heading Line Height Tablet
$styles->add_var([
    'name' => 'typography--h3--line-height',
    'value' => theme_mod( 'typography--h3--line-height--tablet' ),
    'screen' => 'tablet-and-up',
]);


// Var: Heading Font Size Desktop
$styles->add_var([
    'name' => 'typography--h3--font-size',
    'value' => theme_mod( 'typography--h3--font-size--desktop' ),
    'screen' => 'desktop',
]);

// Var: Heading Line Height Desktop
$styles->add_var([
    'name' => 'typography--h3--line-height',
    'value' => theme_mod( 'typography--h3--line-height--desktop' ),
    'screen' => 'desktop',
]);
