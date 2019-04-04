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


use function Taproot\Customize\get_font_family;
use function Taproot\Customize\get_font_styles;
use function Rootstrap\get_theme_mod;


// Title Styles
$styles->add([
    'selector' => '.app-header__title',
    'styles' => [
        'color' => get_theme_mod( 'branding--title--color' ),
        'font-family' => get_font_family( get_theme_mod( 'branding--title--font-family' ) ),
    ]
]);

// Font Styles
$styles->add([
    'selector' => '.app-header__title',
    'styles' => get_font_styles( 'branding--title--font-styles' )
]);
