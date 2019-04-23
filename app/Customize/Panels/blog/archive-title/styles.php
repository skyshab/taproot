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
use function Rootstrap\get_theme_mod;


// Archive Entry Title Color
$styles->add([
    'selector' => '.entry__title--archive',
    'styles' => [ 'color' => get_theme_mod( 'blog--archive-title--color' ) ]
]);


// Archive Entry Title Color Hover
$styles->add([
    'selector' => '.entry__title--archive:hover',
    'styles' => [ 'color' => get_theme_mod( 'blog--archive-title--color--hover' ) ]
]);


// Var: Archive Entry Title Size
$styles->add([
    'selector' => '.entry__title--archive',
    'styles' => [ 'font-size' => get_theme_mod( 'blog--archive-title--font-size' ) ]
]);


// Font Style
$styles->add([
    'selector' => '.entry__title--archive',
    'styles' => get_font_styles( 'blog--archive-title--font-styles' )
]);
