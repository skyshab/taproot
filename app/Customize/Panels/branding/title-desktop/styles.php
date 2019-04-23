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


// Hide Title
if( get_theme_mod( 'branding--title-desktop--hide-title' ) ) {
    $styles->add([
        'screen' => 'desktop',
        'selector' => '.app-header__title',
        'styles' => [ 'display' => 'none' ],
    ]);
}
else {

    // Var: Title Font Size
    $styles->add_var([
        'name' => 'branding--title--font-size',
        'value' => get_theme_mod( 'branding--title-desktop--font-size' ),
        'screen' => 'desktop'
    ]);


    // Var: Title Line Height
    $styles->add_var([
        'name' => 'branding--title--line-height',
        'value' => get_theme_mod( 'branding--title-desktop--line-height' ),
        'screen' => 'desktop'
    ]);
}