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


// Var: Link color
$styles->add_var([
    'name' => 'typography--links--color',
    'value' => get_theme_mod( 'typography--links--color' ),
]);


// Var: Link color visited
$styles->add_var([
    'name' => 'typography--links--color--visited',
    'value' => get_theme_mod( 'typography--links--color--visited' ),
]);


// Var: Link color hover
$styles->add_var([
    'name' => 'typography--links--color--hover',
    'value' => get_theme_mod( 'typography--links--color--hover' ),
]);


// Var: Link color hover
$styles->add_var([
    'name' => 'typography--links--color--active',
    'value' => get_theme_mod( 'typography--links--color--active' ),
]);


// Link Underline
$link_underline = get_theme_mod( 'typography--links--underline' );

if( 'underline' === $link_underline ) {
    $styles->add([
        'selector' => 'a:link',
        'styles' => [
            'text-decoration' => 'underline'
        ]
    ]);
}
elseif( 'hover' === $link_underline ) {
    $styles->add([
        'selector' => 'a:link',
        'styles' => [
            'text-decoration' => 'none'
        ]
    ]);
    $styles->add([
        'selector' => 'a:hover, a:active',
        'styles' => [
            'text-decoration' => 'underline'
        ]
    ]);
}
elseif( 'none' === $link_underline ) {
    $styles->add([
        'selector' => 'a:link, a:hover, a:active',
        'styles' => [
            'text-decoration' => 'none'
        ]
    ]);
}
