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
use function Taproot\Customize\maybe_convert_to_em;


// Var: Sidebar Font Size
$styles->add_var([
    'name' => 'typography--sidebar--font-size',
    'value' => get_theme_mod( 'typography--sidebar-tablet--font-size' ),
    'screen' => 'desktop',
]);


// Var: Sidebar Line Height
$styles->add_var([
    'name' => 'typography--sidebar--line-height',
    'value' => get_theme_mod( 'typography--sidebar-tablet--line-height' ),
    'screen' => 'desktop',
]);


// Var: Sidebar Block Spacing
$styles->add_var([
    'name' => 'typography--sidebar--block-spacing',
    'value' =>  maybe_convert_to_em( get_theme_mod( 'typography--sidebar-tablet--line-height' ) ),
    'screen' => 'tablet-and-up',
]);
