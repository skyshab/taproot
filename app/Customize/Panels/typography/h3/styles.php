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
use function Taproot\Customize\theme_mod;


// Var: Heading color
$styles->add([
    'selector' => 'h3',
    'styles' => [ 'color' => theme_mod( 'typography--h3--color' ) ],
]);


// Font Family
$styles->add([
    'selector' => 'h3',
    'styles' => [
        'font-family' => get_font_family( theme_mod( 'typography--h3--font-family' ) )
    ]
]);


// Font Styles
$styles->add([
    'selector' => 'h3',
    'styles' => get_font_styles( 'typography--h3--font-styles' )
]);
