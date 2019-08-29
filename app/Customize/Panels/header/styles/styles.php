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


$header_bkg = theme_mod( 'header--styles--background-color' );

// Background Color
$styles->add([
    'selector' => '.app-header',
    'styles' => array(
        'background-color' => $header_bkg,
    ),
]);


// if header background color is white, add a shadow
$styles->add([
    'selector' => '.app-header',
    'styles' => [
        'border-bottom' => '1px solid rgba(0, 0, 0, 0.1)',
    ],
    'callback' => ( '#ffffff' === $header_bkg || 'rgb(255,255,255)' === $header_bkg )
]);


// // Default Color
// $styles->add([
//     'selector' => '.app-header, .menu--header__link:link, .menu--header__link:visited',
//     'styles' => [
//         'color' => theme_mod( 'header--styles--default-color' ),
//     ],
// ]);

// // Default Color Hover
// $styles->add([
//     'selector' => '.app-header__container .label-toggle:hover, .menu--header__link:hover',
//     'styles' => [
//         'color' => theme_mod( 'header--styles--default-color--hover' ),
//     ],
// ]);


// Custom Property: Default Header Color
$styles->custom_property([
    'name' => 'header--default-color',
    'value' => theme_mod( 'header--styles--default-color' ),
]);

// Custom Property: Default Header Link Hover Color
$styles->custom_property([
    'name' => 'header--link-color--hover',
    'value' => theme_mod( 'header--styles--default-color--hover' ),
]);



// Var: Padding
$styles->custom_property([
    'name' => 'header--padding',
    'value' => theme_mod( 'header--styles--padding' ),
]);


// Var: Padding Tablet
$styles->custom_property([
    'name' => 'header--padding',
    'value' => theme_mod( 'header--styles--padding--tablet' ),
    'screen' => 'tablet-and-up'
]);


// Var: Padding Desktop
$styles->custom_property([
    'name' => 'header--padding',
    'value' => theme_mod( 'header--styles--padding--desktop' ),
    'screen' => 'desktop'
]);
