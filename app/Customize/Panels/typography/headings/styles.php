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


$headings_selector = 'h1, h2, h3, h4, h5, h6';


// Var: Heading Color
$styles->add_var([
    'name' => 'typography--headings--text-color',
    'value' => theme_mod( 'typography--headings--text-color' ),
]);

// Var: Font Family
$styles->add_var([
    'name' => 'typography--headings--font-family',
    'value' => get_font_family( theme_mod( 'typography--headings--font-family' ) ),
]);

// Font Style
$styles->add([
    'selector' => $headings_selector,
    'styles' => get_font_styles( 'typography--headings--font-styles' )
]);
