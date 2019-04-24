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
if( theme_mod( 'branding--tagline-fixed--hide' ) ) {
    $styles->add([
        'screen' => 'desktop',
        'selector' => '.app-header--fixed .app-header__description',
        'styles' => [ 'display' => 'none' ],
    ]);

    // if we do hide the tagline, adjust title to use space accordingly.
    // only ouput if we're not hiding the title too
    if( !theme_mod( 'branding--title-fixed--hide' ) ) {
        $styles->add([
            'screen' => 'desktop',
            'selector' => '.app-header--fixed .app-header__title',
            'styles' => [
                'grid-row-end' => 'span 2',
                'align-self' => 'center',
            ],
        ]);
    }
}
else {
    $styles->add([
        'screen' => 'desktop',
        'selector' => '.app-header--fixed .app-header__description',
        'styles' => [
            'font-size'    => theme_mod( 'branding--tagline-fixed--font-size' ),
            'line-height'  => theme_mod( 'branding--tagline-fixed--line-height' ),
            'margin-top'   => theme_mod( 'branding--tagline-fixed--gutter' ),
        ],
    ]);
}
