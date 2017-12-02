<?php
/**
 * Generate styles from the customizer controls in the general panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

$styles->set_style( array(
    'screen' => 'default',
    'selector' => '.container',
    'styles' => array(
        'max-width: %spx;' => get_theme_mod( 'taproot_max_content_width' ),
    ),
));

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.taproot-boxed-layout .main-wrapper, .taproot-boxed-layout .main-header, .taproot-boxed-layout .main-footer',
    'styles' => array(
        'max-width: %spx;' => get_theme_mod( 'taproot_max_content_width' ),
    ),
));

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.taproot-boxed-layout',
    'styles' => array(
        'padding: %s%;' => get_theme_mod( 'taproot_boxed_layout_padding' ),
    ),
));

$fixed_item_width = 100 - ( get_theme_mod( 'taproot_boxed_layout_padding' ) * 2 );

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.taproot-boxed-layout .main-header.fixed',
    'styles' => array(
        'width: %s%;' => $fixed_item_width,
    ),
));

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.footer--style-fixed.layout-boxed',
    'styles' => array(
        'margin-bottom: %s%; left: %s%; right: %s%;' => get_theme_mod( 'taproot_boxed_layout_padding' ),
    ),
));

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.sidebar',
    'styles' => array(
        'width: %s%;' => get_theme_mod( 'taproot_sidebar_width' ),
    ),
));


// Background Color
$styles->set_style( array(
    'selector' => 'body',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_background_color' ),
    ),
));


// divi specific. move to divi folder at some point

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.et_divi_builder #et_builder_outer_content .et_pb_row',
    'styles' => array(
        'max-width: %spx;' => get_theme_mod( 'taproot_max_content_width' ),
    ),
));

