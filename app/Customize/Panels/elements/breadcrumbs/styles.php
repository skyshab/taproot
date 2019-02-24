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


// Breadcrumbs Styles
$styles->add([
    'selector' => '.breadcrumbs',
    'styles' => [
        'font-size' => get_theme_mod( 'elements--breadcrumbs--font-size' ),
    ],
]);


// Breadcrumbs Styles
$styles->add([
    'selector' => '.breadcrumbs__crumb',
    'styles' => [
        'color' => get_theme_mod( 'elements--breadcrumbs--color' ),
    ],
]);


// Post Navigation Breadcrumbs Color: Hover
$styles->add([
    'selector' => '.breadcrumbs__crumb a:hover',
    'styles' => [
        'color' => get_theme_mod( 'elements--breadcrumbs--color--hover' ),
    ],
]);


// Breadcrumbs Align
$styles->add([
    'selector' => '.breadcrumbs__trail',
    'styles' => [
        'justify-content' => get_theme_mod( 'elements--breadcrumbs--align' ),
    ],
]);
