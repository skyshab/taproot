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


// Var: Meta Color
$styles->add_var([
    'name' => 'posts--meta--color',
    'value' => theme_mod( 'posts--meta--color' ),
]);


// Var: Meta Icon Color
$styles->add_var([
    'name' => 'posts--meta--icon--color',
    'value' => theme_mod( 'posts--meta--icon--color' ),
]);


// Var: Meta Font Size
$styles->add_var([
    'name' => 'posts--meta--font-size',
    'value' => theme_mod( 'posts--meta--font-size' ),
]);
