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


use function Taproot\Customize\get_font_styles;
use function Taproot\Customize\theme_mod;


// Var: Title Font Size
$styles->add_var([
    'name' => 'pages--title--font-size',
    'value' => theme_mod( 'pages--title-mobile--font-size' ),
    'screen' => 'default'
]);


// Var: Title Line Height
$styles->add_var([
    'name' => 'pages--title--line-height',
    'value' => theme_mod( 'pages--title-mobile--line-height' ),
    'screen' => 'default'
]);
