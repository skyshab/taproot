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


use function Rootstrap\get_theme_mod;


// Var: Blog Title Font Size
$styles->add_var([
    'name' =>'blog--title--font-size',
    'value' => get_theme_mod( 'blog--title-tablet--font-size' ),
    'screen' => 'tablet-and-up'
]);


// Var: Blog Title Line Height
$styles->add_var([
    'name' =>'blog--title--line-height',
    'value' => get_theme_mod( 'blog--title-tablet--line-height' ),
    'screen' => 'tablet-and-up'
]);
