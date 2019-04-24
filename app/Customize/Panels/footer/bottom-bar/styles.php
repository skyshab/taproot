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


// Background Color
$styles->add([
    'selector' => '.bottom-bar',
    'styles' => array(
        'background-color' => theme_mod( 'footer--bottom-bar--background-color' )
    ),
]);


// Default Color
$styles->add([
    'selector' => '.app-footer, .app-footer a',
    'styles' => array(
        'color' => theme_mod( 'footer--bottom-bar--default-color' ),
    ),
]);


// Default Color Hover
$styles->add([
    'selector' => '.app-footer a:hover',
    'styles' => array(
        'color' => theme_mod( 'footer--bottom-bar--default-color--hover' ),
    ),
]);

