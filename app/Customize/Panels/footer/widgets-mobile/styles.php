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


$footer_layout = theme_mod( 'footer--widgets-mobile--layout' );

switch( $footer_layout ) {

    case 'halves':
        $footer_widget_styles = 'repeat(2, 1fr)';
        break;

    case 'full':
        $footer_widget_styles = '100%';
        break;

    default:
        $footer_widget_styles = false;
}

// Var: Widgets Layout
$styles->add_var([
    'name' => 'footer--widgets--layout',
    'value' => $footer_widget_styles,
    'screen' => 'default',
]);


// Var: Title Font Size
$styles->add_var([
    'name' => 'footer--widgets--title--font-size',
    'value' => theme_mod( 'footer--widgets-mobile--title--font-size' ),
    'screen' => 'default',
]);


// Var: Title Line Height
$styles->add_var([
    'name' => 'footer--widgets--title--line-height',
    'value' => theme_mod( 'footer--widgets-mobile--title--line-height' ),
    'screen' => 'default',
]);


// Var: Text Font Size
$styles->add_var([
    'name' => 'footer--widgets--color',
    'value' => theme_mod( 'footer--widgets-mobile--color' ),
    'screen' => 'default',
]);


// Var: Text Line Height
$styles->add_var([
    'name' => 'footer--widgets--line-height',
    'value' => theme_mod( 'footer--widgets-mobile--line-height' ),
    'screen' => 'default',
]);


// Var: Widgets Spacing
$styles->add_var([
    'name' => 'footer--widgets--gutter',
    'value' => theme_mod( 'footer--widgets-mobile--gutter' ),
    'screen' => 'default',
]);
