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


// Var: Body Text Color
$styles->add_var([
    'name' => 'colors--theme--text',
    'value' => theme_mod( 'colors--theme--text', true ),
]);


// Var: Accent Color
$styles->add_var([
    'name' => 'colors--theme--accent',
    'value' => theme_mod( 'colors--theme--accent', true ),
]);


// Var: Accent Contrast Color
$styles->add_var([
    'name' => 'colors--theme--accent-contrast',
    'value' => theme_mod( 'colors--theme--accent-contrast', true ),
]);


// Var: Meta Light
$styles->add_var([
    'name' => 'colors--theme--meta-light',
    'value' => theme_mod( 'colors--theme--meta-light', true ),
]);


// Var: Meta Medium
$styles->add_var([
    'name' => 'colors--theme--meta-medium',
    'value' => theme_mod( 'colors--theme--meta-medium', true ),
]);


// Var: Meta Dark
$styles->add_var([
    'name' => 'colors--theme--meta-dark',
    'value' => theme_mod( 'colors--theme--meta-dark', true ),
]);
