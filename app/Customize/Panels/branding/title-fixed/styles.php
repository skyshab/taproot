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


// Hide when fixed?
if( theme_mod( 'branding--title-fixed--hide' ) ) {
    $styles->add([
        'selector' => '.app-header--fixed .app-header__title',
        'styles' => ['display' => 'none'],
        'screen' => 'desktop',
    ]);
}
else {
    $styles->add([
        'selector' => '.app-header--fixed .app-header__title',
        'styles' => [
            'font-size' => theme_mod( 'branding--title-fixed--font-size' ),
            'line-height' => theme_mod( 'branding--title-fixed--line-height' ),
        ],
        'screen' => 'desktop'
    ]);
}