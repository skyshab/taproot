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


$header_bkg = get_theme_mod( 'header--styles--background-color' );

// Background Color
$styles->add([
    'selector' => '.app-header',
    'styles' => array(
        'background-color' => $header_bkg,
    ),
]);


// if header background color is white, add a shadow
$styles->add([
    'selector' => '.app-header',
    'styles' => [
        'border-bottom' => '1px solid rgba(0, 0, 0, 0.1)',
    ],
    'callback' => ( '#ffffff' === $header_bkg || 'rgb(255,255,255)' === $header_bkg )
]);


// Default Color
$styles->add([
    'selector' => '.app-header__container, .menu--header__link:link, .menu--header__link:visited',
    'styles' => [
        'color' => get_theme_mod( 'header--styles--default-color' ),
    ],
]);


// Default Color Hover
$styles->add([
    'selector' => '.app-header__container .label-toggle:hover, .menu--header__link:hover',
    'styles' => [
        'color' => get_theme_mod( 'header--styles--default-color--hover' ),
    ],
]);
