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


// Var: Sidebar Background Color
$styles->custom_property([
    'name' => 'colors--sidebar--background-color',
    'value' => theme_mod( 'colors--sidebar--background-color' ),
]);

// Var: Sidebar Text Color
$styles->custom_property([
    'name' => 'colors--sidebar--text-color',
    'value' => theme_mod( 'colors--sidebar--text-color' ),
]);

// Var: Sidebar Accent Color
$styles->custom_property([
    'name' => 'colors--sidebar--accent-color',
    'value' => theme_mod( 'colors--sidebar--accent-color' ),
]);

// Var: Sidebar Accent Contrast Color
$styles->custom_property([
    'name' => 'colors--sidebar--accent-contrast',
    'value' => theme_mod( 'colors--sidebar--accent-contrast' ),
]);

// Var: Sidebar Link Color
$styles->custom_property([
    'name' => 'colors--sidebar--link-color',
    'value' => theme_mod( 'colors--sidebar--link-color' ),
]);

// Var: Sidebar Link Hover Color
$styles->custom_property([
    'name' => 'colors--sidebar--link-color--hover',
    'value' => theme_mod( 'colors--sidebar--link-color--hover' ),
]);
