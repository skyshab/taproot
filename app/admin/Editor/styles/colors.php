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


use function Taproot\Customize\theme_mod;


# =======================================================
# Theme Colors
# =======================================================


// Var: Body Text Color
$styles->custom_property([
    'name' => 'typography--body--text-color',
    'value' => theme_mod( 'typography--body--text-color' ),
]);


// Var: Accent Color
$styles->custom_property([
    'name' => 'colors--theme--accent',
    'value' => theme_mod( 'colors--theme--accent' ),
]);


// Var: Accent Contrast Color
$styles->custom_property([
    'name' => 'colors--theme--accent-contrast',
    'value' => theme_mod( 'colors--theme--accent-contrast' ),
]);


// Var: Meta Light
$styles->custom_property([
    'name' => 'colors--theme--meta-light',
    'value' => theme_mod( 'colors--theme--meta-light' ),
]);


// Var: Meta Medium
$styles->custom_property([
    'name' => 'colors--theme--meta-medium',
    'value' => theme_mod( 'colors--theme--meta-medium' ),
]);


// Var: Meta Dark
$styles->custom_property([
    'name' => 'colors--theme--meta-dark',
    'value' => theme_mod( 'colors--theme--meta-dark' ),
]);


// Color class: theme accent
$styles->add([
    'selector' => '.has-theme-accent-color',
    'styles' => [ 'color' => theme_mod( 'colors--theme--accent', true ) ],
]);

// Color class: theme accent contrast
$styles->add([
    'selector' => '.has-theme-accent-contrast-color',
    'styles' => [ 'color' => theme_mod( 'colors--theme--accent-contrast', true ) ],
]);

// Color class: theme meta light
$styles->add([
    'selector' => '.has-theme-meta-light-color',
    'styles' => [ 'color' => theme_mod( 'colors--theme--meta-light', true ) ],
]);

// Color class: theme meta medium
$styles->add([
    'selector' => '.has-theme-meta-medium-color',
    'styles' => [ 'color' => theme_mod( 'colors--theme--meta-medium', true ) ],
]);

// Color class: theme meta dark
$styles->add([
    'selector' => '.has-theme-meta-dark-color',
    'styles' => [ 'color' => theme_mod( 'colors--theme--meta-dark', true ) ],
]);