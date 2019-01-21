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


use function Taproot\Customize\is_boxed_layout;
use function Rootstrap\get_theme_mod;


$styles->add([
    'selector' => '.container',
    'styles' => [
        'max-width' => get_theme_mod( 'layout--site--max-width' ),
    ],
    'callback' => !is_boxed_layout()
]);


$styles->add([
    'selector' => '.app',
    'styles' => [
        'max-width' => get_theme_mod( 'layout--site--max-width', null, true ),
    ],
    'callback' => is_boxed_layout()
]);


$styles->add([
    'screen' => 'tablet-and-up',
    'selector' => 'body',
    'styles' => [
        'padding' => get_theme_mod( 'layout--site--boxed-layout--padding', null, true ),
    ],
    'callback' => is_boxed_layout()
]);



// added this as a base style for all layout types. 
// if no issues with that, delete this

// if fullscreen layout, make background white
// $styles->add([
//     'screen' => 'tablet-and-up',
//     'selector' => '.app-content',
//     'styles' => [
//         'background-color' => 'white',
//     ],
//     'callback' => !is_boxed_layout()
// ]);




// if fullwidth layout, set container width
$styles->add([
    'screen' => 'desktop',
    'selector' => '.container',
    'styles' => [
        'width' => '90%',  
        'padding-left' => '0px',
        'padding-right' => '0px'      
    ],
    'callback' => !is_boxed_layout()
]);
