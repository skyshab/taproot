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


$footer_layout = theme_mod( 'footer--widgets-tablet--layout' );

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
$styles->add_var([
    'name' => 'footer--widgets--layout',
    'value' => $footer_widget_styles,
    'screen' => 'tablet-and-up',
]);

// Var: Title Font Size
$styles->add_var([
    'name' => 'footer--widgets--title--font-size',
    'value' => theme_mod( 'footer--widgets-tablet--title--font-size' ),
    'screen' => 'tablet-and-up',
]);


// Var: Title Line Height
$styles->add_var([
    'name' => 'footer--widgets--title--line-height',
    'value' => theme_mod( 'footer--widgets-tablet--title--line-height' ),
    'screen' => 'tablet-and-up',
]);


// Var: Text Font Size
$styles->add_var([
    'name' => 'footer--widgets--color',
    'value' => theme_mod( 'footer--widgets-tablet--color' ),
    'screen' => 'tablet-and-up',
]);


// Var: Text Line Height
$styles->add_var([
    'name' => 'footer--widgets--line-height',
    'value' => theme_mod( 'footer--widgets-tablet--line-height' ),
    'screen' => 'tablet-and-up',
]);


// Var: Widgets Spacing
$styles->add_var([
    'name' => 'footer--widgets--gutter',
    'value' => theme_mod( 'footer--widgets-tablet--gutter' ),
    'screen' => 'tablet-and-up',
]);
