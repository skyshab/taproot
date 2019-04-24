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


// Hide Tagline
if( theme_mod( 'branding--tagline-desktop--hide-tagline' ) ) {
    $styles->add([
        'screen' => 'desktop',
        'selector' => '.app-header__tagline',
        'styles' => [ 'display' => 'none' ],
    ]);

   // if we do hide the tagline, adjust title to use space accordingly.
    // only ouput if we're not hiding the title too
    if( !theme_mod( 'branding--title-desktop--hide-title' ) ) {
        $styles->add([
            'screen' => 'desktop',
            'selector' => '.app-header__title',
            'styles' => [
                'grid-row-end' => 'span 2',
                'align-self' => 'center',
            ],
        ]);
    }
}
else {

    // Var: Tagline Font Size
    $styles->add_var([
        'name' => 'branding--tagline--font-size',
        'value' => theme_mod( 'branding--tagline-desktop--font-size' ),
        'screen' => 'desktop'
    ]);

    // Var: Tagline Line Height
    $styles->add_var([
        'name' => 'branding--tagline--line-height',
        'value' => theme_mod( 'branding--tagline-desktop--line-height' ),
        'screen' => 'desktop'
    ]);

    // Var: Tagline Gutter
    $styles->add_var([
        'name' => 'branding--tagline--gutter',
        'value' => theme_mod( 'branding--tagline-desktop--gutter' ),
        'screen' => 'desktop'
    ]);
}
