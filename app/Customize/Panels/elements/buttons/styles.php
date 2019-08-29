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
use function Taproot\Customize\theme_mod;



// Button Styles
$styles->add([
    'selector' => '.taproot-button, .wp-block-button__link, .comment-respond__submit',
    'styles' => [
        'border-color'      =>  theme_mod( 'elements--buttons--border-color' ),
        'border-width'      =>  theme_mod( 'elements--buttons--border-width' ),
        'border-radius'     =>  ( theme_mod( 'elements--buttons--is-rounded' ) ) ? '100px' : '0px',
        'font-family'       =>  get_font_family( theme_mod( 'elements--buttons--font-family' ) ),
        'font-size'         =>  theme_mod( 'elements--buttons--font-size' ),
        'line-height'       =>  theme_mod( 'elements--buttons--height' ),
        'padding-left'      =>  theme_mod( 'elements--buttons--padding' ),
        'padding-right'     =>  theme_mod( 'elements--buttons--padding' ),
    ]
]);


// Button Background
$styles->add([
    'selector' => '.taproot-button, .wp-block-button__link:not(.has-background), .comment-respond__submit',
    'styles' => [
        'background-color' => theme_mod( 'elements--buttons--background-color' ),
    ]
]);


// Text Color
$styles->add([
    'selector' => '.taproot-button:link, .wp-block-button__link:not(.has-text-color), .taproot-button:visited, .comment-respond__submit',
    'styles' => [
        'color' =>  theme_mod( 'elements--buttons--color' ),
    ]
]);

// Font Styles
$styles->add([
    'selector' => '.taproot-button, .wp-block-button__link, .comment-respond__submit',
    'styles' => get_font_styles( 'elements--buttons--font-styles' )
]);
