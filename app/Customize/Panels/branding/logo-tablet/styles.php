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


// Var: Logo Width
$styles->add_var([
    'name' => 'branding--logo--width',
    'value' => get_theme_mod( 'branding--logo-tablet--width' ),
    'screen' => 'tablet-and-up'
]);


// Var: Logo Gutter
$styles->add_var([
    'name' => 'branding--logo--gutter',
    'value' => get_theme_mod( 'branding--logo-tablet--gutter' ),
    'screen' => 'tablet-and-up'
]);
