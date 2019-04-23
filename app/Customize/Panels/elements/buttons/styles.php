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
use function Rootstrap\get_theme_mod;


// Button Styles
$styles->add([
    'selector' => '.taproot-button, .comment-respond__submit',
    'styles' => [
        'border-color'      =>  get_theme_mod( 'elements--buttons--border-color' ),
        'border-width'      =>  get_theme_mod( 'elements--buttons--border-width' ),
        'border-radius'     =>  get_theme_mod( 'elements--buttons--border-radius' ),
        'font-family'       =>  get_font_family( get_theme_mod( 'elements--buttons--font-family' ) ),
        'font-size'         =>  get_theme_mod( 'elements--buttons--font-size' ),
        'line-height'       =>  get_theme_mod( 'elements--buttons--height' ),
        'padding-left'      =>  get_theme_mod( 'elements--buttons--padding' ),
        'padding-right'     =>  get_theme_mod( 'elements--buttons--padding' ),
    ]
]);

// Button Background
$styles->add([
    'selector' => '.taproot-button, .comment-respond__submit',
    'styles' => [
        'background-color' => get_theme_mod( 'elements--buttons--background-color' ),
    ]
]);


// Text Color
$styles->add([
    'selector' => '.taproot-button:link, .taproot-button:visited, .comment-respond__submit',
    'styles' => [
        'color' =>  get_theme_mod( 'elements--buttons--color' ),
    ]
]);

// Font Styles
$styles->add([
    'selector' => '.taproot-button, .comment-respond__submit',
    'styles' => get_font_styles( 'elements--buttons--font-styles' )
]);
