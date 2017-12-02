<?php
/**
 * Generate styles from the customizer controls in the posts panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Blog Page Title Color
$styles->set_style( array(
    'selector' => '.blog .post-title, .archive .post-title',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_blog_page_title_color' ),
    ),
));

// Pagination Size, Color
$styles->set_style( array(
    'selector' => '.taproot-pagenavi',
    'styles' => array(
        'font-size: %sem;' => get_theme_mod( 'taproot_blog_page_pagination_size' ),
        'color: %s;' => get_theme_mod( 'taproot_blog_page_pagination_color' ),
    ),
));

$styles->set_style( array(
    'selector' => '.taproot-pagenavi .page-numbers:hover, .taproot-pagenavi .page-numbers.current',
    'styles' => array(
        'background: %s;' => get_theme_mod( 'taproot_blog_page_pagination_color' ),
    ),
));

$styles->set_style( array(
    'selector' => '.taproot-pagenavi .page-numbers',
    'styles' => array(
        'border-radius: %s%;' => get_theme_mod( 'taproot_blog_page_pagination_radius' ),
    ),
));


// Post Box Styles

// Title Color
$styles->set_style( array(
    'selector' => '.post-box .entry-title',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_post_box_title_color' ),
    ),
));

// Title Color: Hover
$styles->set_style( array(
    'selector' => '.post-box .entry-title:hover',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_post_box_title_color_hover' ),
    ),
));

// Text Color
$styles->set_style( array(
    'selector' => '.post-box',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_post_box_text_color' ),
    ),
));

// Meta Size, Color
$styles->set_style( array(
    'selector' => '.post-box .taproot-meta',
    'styles' => array(
        'font-size: %sem;' => get_theme_mod( 'taproot_post_box_meta_size' ),
        'color: %s;' => get_theme_mod( 'taproot_post_box_meta_color' ),
    ),
));

// Meta Icon Color
$styles->set_style( array(
    'selector' => '.post-box .taproot-meta i',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_post_box_meta_icon_color' ),
    ),
));

// Link Color
$styles->set_style( array(
    'selector' => '.post-box .entry-footer a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_post_box_link_color' ),
    ),
));



// Top Post Navigation Styles

// Post Navigation Font Size
$styles->set_style( array(
    'selector' => '.post-navigation--top .post-navigation__link',
    'styles' => array(
        'font-size: %sem;' => get_theme_mod( 'taproot_top_post_navigation_link_size' ),
    ),
));

// Post Navigation Link Color
$styles->set_style( array(
    'selector' => '.post-navigation--top .post-navigation__link a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_top_post_navigation_link_color' ),
    ),
));

// Post Navigation Link Color: Hover
$styles->set_style( array(
    'selector' => '.post-navigation--top .post-navigation__link a:hover',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_top_post_navigation_link_color_hover' ),
    ),
));


// Bottom Post Navigation Styles

// Post Navigation Font Size
$styles->set_style( array(
    'selector' => '.post-navigation--bottom .post-navigation__link',
    'styles' => array(
        'font-size: %sem;' => get_theme_mod( 'taproot_bottom_post_navigation_link_size' ),
    ),
));

// Post Navigation Link Color
$styles->set_style( array(
    'selector' => '.post-navigation--bottom .post-navigation__link a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_bottom_post_navigation_link_color' ),
    ),
));

// Post Navigation Link Color: Hover
$styles->set_style( array(
    'selector' => '.post-navigation--bottom .post-navigation__link a:hover',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_bottom_post_navigation_link_color_hover' ),
    ),
));

