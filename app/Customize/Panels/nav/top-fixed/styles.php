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
use function Rootstrap\get_theme_mod;


if( has_nav_menu( 'top' ) ) {

    // Show when fixed?
    $show_when_fixed = get_theme_mod( 'nav--top-fixed--fixed' );

    if( !$show_when_fixed ) {
        $styles->add([
            'selector' => '.app-header--fixed .menu--top',
            'styles' => ['display' => 'none'],
            'screen' => 'desktop',
        ]);
    }
    else {

        // Background Color
        $styles->add([
            'selector' => '.app-header--fixed .menu--top',
            'styles' => array(
                'background-color' => get_theme_mod( 'nav--top-fixed--background-color' ),
            ),
            'screen' => 'desktop',
        ]);


        // Desktop Link Styles
        $styles->add([
            'selector' => '.app-header--fixed .menu--top__link',
            'styles' => array(
                'font-size' => get_theme_mod( 'nav--top-fixed--font-size' ),
                'line-height' => get_theme_mod( 'nav--top-fixed--line-height' ),
                'padding-left' => get_theme_mod( 'nav--top-fixed--padding' ),
                'padding-right' => get_theme_mod( 'nav--top-fixed--padding' ),
                'font-family' => get_font_family( get_theme_mod( 'nav--top-fixed--font-family' ) ),
            ),
            'screen' => 'desktop',
        ]);


        // Font Styles
        $styles->add([
            'selector' => '.app-header--fixed .menu--top__link',
            'styles' => get_font_styles( 'nav--top-fixed--font-styles' ),
            'screen' => 'desktop',
        ]);


        // Link Color Hover
        $styles->add([
            'selector' => '.app-header--fixed .menu--top__link:link, .app-header--fixed .menu--top__link:visited',
            'styles' => array(
                'color' => get_theme_mod( 'nav--top-fixed--link-color' ),
            ),
            'screen' => 'desktop',
        ]);


        // Link Color Hover
        $styles->add([
            'selector' => '.app-header--fixed .menu--top__link:hover',
            'styles' => array(
                'color' => get_theme_mod( 'nav--top-fixed--link-color--hover' ),
            ),
            'screen' => 'desktop',
        ]);


        // Align
        $styles->add([
            'selector' => '.app-header--fixed .menu--top__items',
            'styles' => array(
                'justify-content' => get_theme_mod( 'nav--top-fixed--align' ),
                'flex-direction' => 'row',
            ),
            'screen' => 'desktop',
        ]);


        $styles->add([
            'selector' => '.app-header--fixed .menu--top__container ',
            'styles' => [
                'width' => '100%'
            ],
            'screen' => 'desktop',
        ]);
    }

}