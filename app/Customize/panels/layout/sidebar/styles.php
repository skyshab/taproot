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


// Var: Sidebar Background Color
$styles->var([
    'name' => 'layout--sidebar--background-color',
    'value' => get_theme_mod( 'layout--sidebar--background-color' ),
]);


// Var: Sidebar Width
$styles->var([
    'name' => 'layout--sidebar--width',
    'value' => get_theme_mod( 'layout--sidebar--width' ),
    'screen' => 'desktop'
]);

// Var: Sidebar Max Content Width
$styles->var([
    'name' => 'layout--sidebar--content--max-width',
    'value' => get_theme_mod( 'layout--sidebar--content--max-width' ),
]);
