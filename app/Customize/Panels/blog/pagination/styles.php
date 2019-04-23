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


// Blog Pagination Size
$styles->add([
    'selector' => '.pagination__item',
    'styles' => [ 'font-size' => get_theme_mod( 'blog--pagination--font-size' ) ],
]);


// Blog Pagination Spacing
$styles->add([
    'selector' => '.pagination__item',
    'styles' => [
        'margin-left' => get_theme_mod( 'blog--pagination--spacing' ),
        'margin-right' => get_theme_mod( 'blog--pagination--spacing' )
    ],
]);


// Pagination Link Color
$styles->add([
    'selector' => '.pagination__item--prev .pagination__anchor, .pagination__item--next .pagination__anchor',
    'styles' => [ 'color' => get_theme_mod( 'blog--pagination--link--color' ) ],
]);


// Pagination Numbers Background
$styles->add([
    'selector' => '.pagination__item--number .pagination__anchor, .pagination__item--dots .pagination__anchor',
    'styles' => [ 'background-color' => get_theme_mod( 'blog--pagination--color' ) ],
]);


// Pagination Numbers Color
$styles->add([
    'selector' => '.pagination__item--number .pagination__anchor, .pagination__item--dots .pagination__anchor',
    'styles' => [ 'color' => get_theme_mod( 'blog--pagination--color' ) ],
]);