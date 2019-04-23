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


use function Rootstrap\get_theme_mod;


# =======================================================
# Theme Colors
# =======================================================


// Var: Body Text Color
$styles->add_var([
    'name' => 'colors--theme--text',
    'value' => get_theme_mod( 'colors--theme--text' ),
]);


// Var: Accent Color
$styles->add_var([
    'name' => 'colors--theme--accent',
    'value' => get_theme_mod( 'colors--theme--accent' ),
]);


// Var: Accent Contrast Color
$styles->add_var([
    'name' => 'colors--theme--accent-contrast',
    'value' => get_theme_mod( 'colors--theme--accent-contrast' ),
]);


// Var: Meta Light
$styles->add_var([
    'name' => 'colors--theme--meta-light',
    'value' => get_theme_mod( 'colors--theme--meta-light' ),
]);


// Var: Meta Medium
$styles->add_var([
    'name' => 'colors--theme--meta-medium',
    'value' => get_theme_mod( 'colors--theme--meta-medium' ),
]);


// Var: Meta Dark
$styles->add_var([
    'name' => 'colors--theme--meta-dark',
    'value' => get_theme_mod( 'colors--theme--meta-dark' ),
]);
