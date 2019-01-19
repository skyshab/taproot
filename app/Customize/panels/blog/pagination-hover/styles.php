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


// Var: Blog Pagination Color
$styles->var([
    'name' => 'blog--pagination-hover--link--color',
    'value' => get_theme_mod( 'blog--pagination-hover--link--color' ),
]);


// Color Setting: Pagination Numbers Background
$styles->var([
    'name' => 'blog--pagination-hover--background-color',
    'value' => get_theme_mod( 'blog--pagination-hover--background-color' ),
]);


// Color Setting: Pagination Numbers Color
$styles->var([
    'name' => 'blog--pagination-hover--color',
    'value' => get_theme_mod( 'blog--pagination-hover--color' ),
]);
