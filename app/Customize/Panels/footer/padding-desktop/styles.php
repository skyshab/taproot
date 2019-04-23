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


// Var: Padding
$styles->add_var([
    'name' => 'footer--padding',
    'value' => get_theme_mod( 'footer--padding-desktop--padding' ),
    'screen' => 'desktop'
]);
