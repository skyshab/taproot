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


use function Taproot\Customize\theme_mod;
use function Taproot\Customize\maybe_convert_to_em;


// Var: Body Font Size
$styles->add_var([
    'name' => 'typography--body--font-size',
    'value' => theme_mod( 'typography--body-mobile--font-size' ),
    'screen' => 'default',
]);


// Var: Body Line Height
$styles->add_var([
    'name' => 'typography--body--line-height',
    'value' => theme_mod( 'typography--body-mobile--line-height' ),
    'screen' => 'default',
]);


// Var: Body Block Spacing
$styles->add_var([
    'name' => 'typography--body--block-spacing',
    'value' =>  maybe_convert_to_em( theme_mod( 'typography--body-mobile--line-height' ) ),
    'screen' => 'default',
]);
