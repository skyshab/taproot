<?php
/**
 * Generate styles from the customizer controls in the footer panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Background Color
$styles->set_style( array(
    'selector' => '.main-footer',
    'styles' => array(
         'background-color: %s;' => get_theme_mod( 'taproot_footer_background_color' ),
     ),
));


// gutter spacing
$gutter = get_theme_mod( 'taproot_footer_gutter_spacing' ) . 'em';
$halfGutter = ( $gutter / 2 ) . 'em';
$sidebar_styles = sprintf( 'padding-left: %s; margin: %s 0;', $gutter, $halfGutter );

$styles->set_style( array(
    'selector' => '.footer-widgets',
    'styles' => array(
         'margin-left: -%s;' => $gutter,
         'padding: %s% 0;' => get_theme_mod( 'taproot_footer_container_padding' ),
     ),
));

$styles->set_style( array(
    'selector' => '.footer-widgets .footer-sidebar',
    'styles' => array(
         $sidebar_styles => 'echo',
     ),
));

$styles->set_style( array(
    'selector' => '.footer-widgets .widget',
    'styles' => array(
         'margin-bottom: %s;' => $gutter,
         'color: %s;' => get_theme_mod( 'taproot_footer_widget_text_color' ),
         'font-size: %spx;' => get_theme_mod( 'taproot_footer_widget_font_size' ),
     ),
));

$styles->set_style( array(
    'selector' => '.footer-widgets h1, .footer-widgets h2, .footer-widgets h3, .footer-widgets h4, .footer-widgets h5, .footer-widgets h6',
    'styles' => array(
         'color: %s;' => get_theme_mod( 'taproot_footer_widget_heading_color' ),
     ),
));

$styles->set_style( array(
    'selector' => '.footer-widgets .widget-title',
    'styles' => array(
         'font-size: %sem;' => get_theme_mod( 'taproot_footer_widget_title_font_size' ),
     ),
));

$styles->set_style( array(
    'selector' => '.footer-widgets .widget a',
    'styles' => array(
         'color: %s;' => get_theme_mod( 'taproot_footer_widget_link_color' ),
     ),
));


// bottom bar
$styles->set_style( array(
    'selector' => '.bottom-bar',
    'styles' => array(
         'background: %s;' => get_theme_mod( 'taproot_bottom_bar_background_color' ),
     ),
));

$styles->set_style( array(
    'selector' => '.bottom-bar-content',
    'styles' => array(
         'color: %s;' => get_theme_mod( 'taproot_bottom_bar_text_color' ),
         'font-size: %spx;' => get_theme_mod( 'taproot_bottom_bar_font_size' ),
         'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_bottom_bar_height' ),
     ),
));

