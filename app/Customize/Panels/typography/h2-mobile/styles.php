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


// Var: Heading Font Size
$styles->add_var([
    'name' => 'typography--h2--font-size',
    'value' => get_theme_mod( 'typography--h2-mobile--font-size' ),
    'screen' => 'default',
]);

// Var: Heading Line Height
$styles->add_var([
    'name' => 'typography--h2--line-height',
    'value' => get_theme_mod( 'typography--h2-mobile--line-height' ),
    'screen' => 'default',
]);
