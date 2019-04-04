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


// Var: Heading Font Size
$styles->add_var([
    'name' => 'typography--h3--font-size',
    'value' => get_theme_mod( 'typography--h3-desktop--font-size' ),
    'screen' => 'desktop',
]);


// Var: Heading Line Height
$styles->add_var([
    'name' => 'typography--h3--line-height',
    'value' => get_theme_mod( 'typography--h3-desktop--line-height' ),
    'screen' => 'desktop',
]);
