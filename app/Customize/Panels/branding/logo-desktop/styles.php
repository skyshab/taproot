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


// Var: Logo Width
$styles->add_var([
    'name' => 'branding--logo--width',
    'value' => theme_mod( 'branding--logo-desktop--width' ),
    'screen' => 'desktop'
]);


// Var: Logo Gutter
$styles->add_var([
    'name' => 'branding--logo--gutter',
    'value' => theme_mod( 'branding--logo-desktop--gutter' ),
    'screen' => 'desktop'
]);
