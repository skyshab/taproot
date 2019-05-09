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
use function Taproot\Customize\maybe_convert_to_em;


// Var: Sidebar Font Size
$styles->add_var([
    'name' => 'typography--sidebar--font-size',
    'value' => theme_mod( 'typography--sidebar-mobile--font-size' ),
    'screen' => 'default',
]);


// Var: Sidebar Line Height
$styles->add_var([
    'name' => 'typography--sidebar--line-height',
    'value' => theme_mod( 'typography--sidebar-mobile--line-height' ),
    'screen' => 'default',
]);


// Var: Sidebar Block Spacing
$styles->add_var([
    'name' => 'typography--sidebar--block-spacing',
    'value' =>  maybe_convert_to_em( theme_mod( 'typography--sidebar-mobile--line-height' ) ),
    'screen' => 'default',
]);


// Var: Sidebar Font Size Tablet
$styles->add_var([
    'name' => 'typography--sidebar--font-size',
    'value' => theme_mod( 'typography--sidebar--font-size--tablet' ),
    'screen' => 'desktop',
]);


// Var: Sidebar Line Height Tablet
$styles->add_var([
    'name' => 'typography--sidebar--line-height',
    'value' => theme_mod( 'typography--sidebar--line-height--tablet' ),
    'screen' => 'desktop',
]);


// Var: Sidebar Block Spacing Tablet
$styles->add_var([
    'name' => 'typography--sidebar--block-spacing',
    'value' =>  maybe_convert_to_em( theme_mod( 'typography--sidebar--line-height--tablet' ) ),
    'screen' => 'tablet-and-up',
]);


// Var: Sidebar Font Size Desktop
$styles->add_var([
    'name' => 'typography--sidebar--font-size',
    'value' => theme_mod( 'typography--sidebar--font-size--desktop' ),
    'screen' => 'desktop',
]);


// Var: Sidebar Line Height Desktop
$styles->add_var([
    'name' => 'typography--sidebar--line-height',
    'value' => theme_mod( 'typography--sidebar--line-height--desktop' ),
    'screen' => 'desktop',
]);


// Var: Sidebar Block Spacing Desktop
$styles->add_var([
    'name' => 'typography--sidebar--block-spacing',
    'value' =>  maybe_convert_to_em( theme_mod( 'typography--sidebar--line-height--desktop' ) ),
    'screen' => 'desktop',
]);
