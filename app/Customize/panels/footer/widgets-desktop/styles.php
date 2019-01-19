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


$footer_layout = get_theme_mod( 'footer--widgets-desktop--layout' );

switch( $footer_layout ) {

    case 'quarters':
        $footer_widget_styles = 'repeat(4, 1fr)';
        break;

    case 'thirds':
        $footer_widget_styles = 'repeat(3, 1fr)';
        break;

    case 'halves':      
        $footer_widget_styles = 'repeat(2, 1fr)';
        break;

    case 'full':       
        $footer_widget_styles = '100%';
        break;

    case 'one-third-two-thirds':       
        $footer_widget_styles = '1fr 2fr';
        break;

    case 'two-thirds-one-third':
        $footer_widget_styles = '2fr 1fr';
        break;

    case 'quarter-quarter-half':
        $footer_widget_styles = '1fr 1fr 2fr';
        break;

    case 'half-quarter-quarter':
        $footer_widget_styles = '2fr 1fr 1fr';
        break;   

    default:
        $footer_widget_styles = false;
}


// Var: Widgets Layout
$styles->var([
    'name' => 'footer--widgets--layout',
    'value' => $footer_widget_styles,
    'screen' => 'desktop',
]);


// Var: Title Font Size
$styles->var([
    'name' => 'footer--widgets--title--font-size',
    'value' => get_theme_mod( 'footer--widgets-desktop--title--font-size' ),
    'screen' => 'desktop',
]);


// Var: Title Line Height
$styles->var([
    'name' => 'footer--widgets--title--line-height',
    'value' => get_theme_mod( 'footer--widgets-desktop--title--line-height' ),
    'screen' => 'desktop',
]);


// Var: Text Font Size
$styles->var([
    'name' => 'footer--widgets--color',
    'value' => get_theme_mod( 'footer--widgets-desktop--color' ),
    'screen' => 'desktop',
]);


// Var: Text Line Height
$styles->var([
    'name' => 'footer--widgets--line-height',
    'value' => get_theme_mod( 'footer--widgets-desktop--line-height' ),
    'screen' => 'desktop',
]);


// Var: Widgets Spacing
$styles->var([
    'name' => 'footer--widgets--gutter',
    'value' => get_theme_mod( 'footer--widgets-desktop--gutter' ),
    'screen' => 'desktop',
]);
