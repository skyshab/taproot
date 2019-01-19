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


// Var: Meta Color
$styles->var([
    'name' => 'posts--meta--color',
    'value' => get_theme_mod( 'posts--meta--color' ),
]);


// Var: Meta Icon Color
$styles->var([
    'name' => 'posts--meta--icon--color',
    'value' => get_theme_mod( 'posts--meta--icon--color' ),
]);


// Var: Meta Font Size
$styles->var([
    'name' => 'posts--meta--font-size',
    'value' => get_theme_mod( 'posts--meta--font-size' ),
]);
