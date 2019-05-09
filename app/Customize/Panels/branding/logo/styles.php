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
    'value' => theme_mod( 'branding--logo--width' ),
    'screen' => 'default'
]);

// Var: Logo Gutter
$styles->add_var([
    'name' => 'branding--logo--gutter',
    'value' => theme_mod( 'branding--logo--gutter' ),
    'screen' => 'default'
]);


// Var: Logo Width Tablet
$styles->add_var([
    'name' => 'branding--logo--width',
    'value' => theme_mod( 'branding--logo--width--tablet' ),
    'screen' => 'tablet-and-up'
]);

// Var: Logo Gutter Tablet
$styles->add_var([
    'name' => 'branding--logo--gutter',
    'value' => theme_mod( 'branding--logo--gutter--tablet' ),
    'screen' => 'tablet-and-up'
]);


// Var: Logo Width Desktop
$styles->add_var([
    'name' => 'branding--logo--width',
    'value' => theme_mod( 'branding--logo--width--desktop' ),
    'screen' => 'desktop'
]);

// Var: Logo Gutter Desktop
$styles->add_var([
    'name' => 'branding--logo--gutter',
    'value' => theme_mod( 'branding--logo--gutter--desktop' ),
    'screen' => 'desktop'
]);
