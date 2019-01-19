<?php
/**
 * Styles for our section.
 *
 * This file creates the front end styles for our customizer controls. 
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */


use function Rootstrap\get_theme_mod;


// Var: Body Text Color
$styles->var([
    'name' => 'colors--theme--text-color',
    'value' => get_theme_mod( 'colors--theme--text-color' ),
]);


// Var: Accent Color
$styles->var([
    'name' => 'colors--theme--accent',
    'value' => get_theme_mod( 'colors--theme--accent' ),
]);


// Var: Accent Contrast Color
$styles->var([
    'name' => 'colors--theme--accent-contrast',
    'value' => get_theme_mod( 'colors--theme--accent-contrast' ),
]);


// Var: Meta Light
$styles->var([
    'name' => 'colors--theme--meta-light',
    'value' => get_theme_mod( 'colors--theme--meta-light' ),
]);


// Var: Meta Medium
$styles->var([
    'name' => 'colors--theme--meta-medium',
    'value' => get_theme_mod( 'colors--theme--meta-medium' ),
]);


// Var: Meta Dark
$styles->var([
    'name' => 'colors--theme--meta-dark',
    'value' => get_theme_mod( 'colors--theme--meta-dark' ),
]);
