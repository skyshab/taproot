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


use function Taproot\Customize\get_font_family;
use function Taproot\Customize\get_font_styles;
use function Taproot\Customize\theme_mod;


// Tagline Styles
$styles->add([
    'selector' => '.app-header__description',
    'styles' => [
        'color' => theme_mod( 'branding--tagline--color' ),
        'font-family' => get_font_family( theme_mod( 'branding--tagline--font-family' ) ),
    ]
]);


// Font Styles
$styles->add([
    'selector' => '.app-header__description',
    'styles' => get_font_styles( 'branding--tagline--font-styles' )
]);


// Center title when tagline is hidden
$show_tagline = theme_mod( 'branding--tagline--display-tagline', true );
if( !$show_tagline ) {
    $styles->add([
        'selector' => '.app-header__title',
        'styles' => [
            'grid-row-end' => 'span 2',
            'align-self' => 'center',
        ],
    ]);
}
