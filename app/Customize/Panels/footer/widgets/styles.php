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


$styles->add([
    'selector' => '.app-footer__widget',
    'styles' => [
        'color' => get_theme_mod( 'footer--widgets--default-color' )
    ],
]);


$styles->add([
    'selector' => '.app-footer__widget h1, .app-footer__widget h2, .app-footer__widget h3, .app-footer__widget h4, .app-footer__widget h5, .app-footer__widget h6',
    'styles' => [
        'color' => get_theme_mod( 'footer--widgets--headings-color' )
    ],
]);


$styles->add([
    'selector' => '.app-footer__widget a, .app-footer__widget a:visited',
    'styles' => [
        'color' => get_theme_mod( 'footer--widgets--link-color' )
    ],
]);


$styles->add([
    'selector' => '.app-footer__widget a:hover',
    'styles' => [
        'color' => get_theme_mod( 'footer--widgets--link-color--hover' )
    ],
]);
