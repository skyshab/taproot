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


use function Taproot\Customize\get_font_family;
use function Taproot\Customize\get_font_styles;
use function Rootstrap\get_theme_mod;


// Var: Heading color
$styles->add([
    'selector' => 'h1',
    'styles' => [ 'color' => get_theme_mod( 'typography--h1--color' ) ],
]);


// Font Family
$styles->add([
    'selector' => 'h1',
    'styles' => [
        'font-family' => get_font_family( get_theme_mod( 'typography--h1--font-family' ) )
    ]
]);


// Font Styles
$styles->add([
    'selector' => 'h1',
    'styles' => get_font_styles( 'typography--h1--font-styles' )
]);
