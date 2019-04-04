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


use function Taproot\Customize\is_boxed_layout;
use function Taproot\Customize\get_boxed_layout_bp;
use function Rootstrap\get_theme_mod;


$styles->add([
    'selector' => '.container',
    'styles' => [
        'max-width' => get_theme_mod( 'layout--site--max-width', null, true ),
    ],
    'callback' => !is_boxed_layout()
]);


$styles->add([
    'selector' => '.app, .boxed-layout.app-header--has-fixed, .boxed-layout.app-footer--has-fixed',
    'styles' => [
        'max-width' => get_theme_mod( 'layout--site--max-width', null, true ),
    ],
    'callback' => is_boxed_layout()
]);


$styles->add([
    'screen' => 'tablet-and-up',
    'selector' => 'body.boxed-layout',
    'styles' => [
        'padding' => get_theme_mod( 'layout--site--boxed-layout--padding' ),
    ],
    'callback' => is_boxed_layout()
]);


// if fullwidth layout, set container width
$styles->add([
    'screen' => 'desktop',
    'selector' => '.container',
    'styles' => [
        'width' => '90%',  
        'padding-left' => '0px',
        'padding-right' => '0px'      
    ],
    'callback' => !is_boxed_layout()
]);


// add a new screen for boxed layout
if( is_boxed_layout() ) {

    $max_site_width = get_theme_mod( 'layout--site--max-width', null, true );
    $boxed_layout_padding = get_theme_mod( 'layout--site--boxed-layout--padding', null, true );
    $desktop_font_size = get_theme_mod('typography--body-desktop--font-size', null, true );
    $boxed_layout_full_min_width = get_boxed_layout_bp( $max_site_width, $boxed_layout_padding, $desktop_font_size );

    if($boxed_layout_full_min_width) {

        $styles->add_screen( 'boxed-is-fullwidth', [
            'min' => $boxed_layout_full_min_width . 'px',
        ]);
        

        $styles->add([
            'screen' => 'tablet-and-up',
            'selector' => '.app-main--full .alignfull',
            'styles' => [
                'width' => "calc( 100vw - (2 * $boxed_layout_padding ) )",
                'max-width' => $max_site_width,
                'margin-left' => "calc( 50% - (50vw - $boxed_layout_padding ) )",      
            ],
        ]); 


        $styles->add([
            'screen' => 'boxed-is-fullwidth',
            'selector' => '.app-main--full .alignfull',
            'styles' => [
                'margin-left' => "calc( 50% - ($max_site_width / 2) )",      
            ],
        ]);    
        

        $styles->add([
            'screen' => 'boxed-is-fullwidth',
            'selector' => '.app-main--full.boxed-layout .alignwide',
            'styles' => [
                'margin-left' => "calc( ($max_site_width - var(--layout--content--max-width) ) / -2 )",
                'margin-right' => "calc( ($max_site_width - var(--layout--content--max-width) ) / -2 )",
            ],
        ]);
    }
}
