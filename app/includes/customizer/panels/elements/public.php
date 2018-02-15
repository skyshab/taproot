<?php
/**
 * Generate styles from the customizer controls in the elements panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Button Styles
$styles->set_style( array(
    'selector' => '.taproot-button',
    'styles' => array(
         'background: %s;' => get_theme_mod( 'taproot_button_background_color' ),
         'color: %s;' => get_theme_mod( 'taproot_button_text_color'),
         'border-color: %s;' => get_theme_mod( 'taproot_button_border_color'),
         'border-radius: %sem;' => get_theme_mod( 'taproot_button_border_radius'),
         'border-width: %spx;' => get_theme_mod( 'taproot_button_border_width'),
         'font-family: %s;' => taproot_get_font_family( get_theme_mod( 'taproot_button_font' ) ),
     ),
));


// Button Font Style
$styles->set_style( array(
    'selector' => '.taproot-button:not(.taproot-button--secondary)',
    'styles' => array(
         taproot_get_font_styles( get_theme_mod( 'taproot_button_font_style' ) ) => 'echo',
     ),
));


// Button Styles: Hover
$styles->set_style( array(
    'selector' => '.taproot-button:hover',
    'styles' => array(
         'background: %s;' => get_theme_mod( 'taproot_button_background_color_hover' ),
         'color: %s;' => get_theme_mod( 'taproot_button_text_color_hover'),
         'border-color: %s;' => get_theme_mod( 'taproot_button_border_color_hover'),
     ),
));


// Secondary Button Styles
$styles->set_style( array(
    'selector' => '.taproot-button.taproot-button--secondary',
    'styles' => array(
        'background: %s;' => get_theme_mod( 'taproot_secondary_button_background_color' ),
        'color: %s;' => get_theme_mod( 'taproot_secondary_button_text_color'),
        'border-color: %s;' => get_theme_mod( 'taproot_secondary_button_border_color'),
        'border-radius: %sem;' => get_theme_mod( 'taproot_secondary_button_border_radius'),
        'border-width: %spx;' => get_theme_mod( 'taproot_secondary_button_border_width'),
        taproot_get_font_styles( get_theme_mod( 'taproot_secondary_button_font_style' ) ) => 'echo',
        'font-family: %s;' => taproot_get_font_family( get_theme_mod( 'taproot_secondary_button_font' ) ),
     ),
));


// Secondary Button Styles: Hover
$styles->set_style( array(
    'selector' => '.taproot-button--secondary:hover',
    'styles' => array(
        'background: %s;' => get_theme_mod( 'taproot_secondary_button_background_color_hover' ),
        'color: %s;' => get_theme_mod( 'taproot_secondary_button_text_color_hover'),
        'border-color: %s;' => get_theme_mod( 'taproot_secondary_button_border_color_hover'),
     ),
));


// Link Styles

// Setting: Link Color
$styles->set_style( array(
    'selector' => 'a, a:visited',
    'styles' => array(
         // 'color: %s;' => get_theme_mod( 'taproot_link_color' ),
         'color: %s;' => get_theme_mod( 'taproot_link_color' ),         
     ),
));


// Setting: Link Color Hover
$styles->set_style( array(
    'selector' => 'a:hover',
    'styles' => array(
         'color: %s;' => get_theme_mod( 'taproot_link_color_hover' ),
     ),
));


// Setting: Link Color Active
$styles->set_style( array(
    'selector' => 'a:active',
    'styles' => array(
         'color: %s;' => get_theme_mod( 'taproot_link_color_active' ),
     ),
));


// Accent Colors

// Setting: Accent Color
$styles->set_style( array(
    'selector' => 'blockquote',
    'styles' => array(
        'border-color: %s;' => get_theme_mod( 'taproot_accent_color' ),
    ),
));


// Setting: Skip Link background and color
$styles->set_style( array(
    'selector' => '#skip-link a',
    'styles' => array(
        'background: %s;' => get_theme_mod( 'taproot_accent_color' ),
        'color: %s;' => get_theme_mod( 'taproot_accent_text_color' ),        
    ),
));


// Setting: :focus color
$styles->set_style( array(
    'selector' => ':focus',
    'styles' => array(
        'box-shadow: 0 0 3px 2px %s;' => get_theme_mod( 'taproot_accent_color' ),
    ),
));


// Modal Gallery Overlay Color
$styles->set_style( array(
    'selector' => '.gallery--modal .gallery__icon a:after, .lg-progress-bar .lg-progress',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_accent_color' ),
    ),
));


// Modal Gallery Icon Color
$styles->set_style( array(
    'selector' => '.modal-overlay-content',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_accent_text_color' ),
    ),
));

// Modal Gallery Slideshow progress color
$styles->set_style( array(
    'selector' => '.lg-outer .lg-progress-bar .lg-progress',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_accent_color' ),
    ),
));

// Setting: Accent Background Color
$styles->set_style( array(
    'selector' => '.flex-control-paging li a.flex-active, .flex-control-paging li a:hover',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_accent_color' ),
        'color: %s;' => get_theme_mod( 'taproot_accent_text_color' ),            
    ),
));


// separator
$styles->set_style( array(
    'selector' => 'hr',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_separator_color' ),
    ),
));


// separator borders
$styles->set_style( array(
    'selector' => '.post-box, .post-navigation, .post-comments .comment-body, .comment-respond, .comment-respond .form-control',
    'styles' => array(
        'border-color: %s;' => get_theme_mod( 'taproot_separator_color' ),
    ),
));


// accent background
$styles->set_style( array(
    'selector' => 'blockquote, .comment-respond, pre, code, kbd, var, ins, tt',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_accent_background_color' ),
    ),
));


// Breadcrumbs Font Size
$styles->set_style( array(
    'selector' => '.taproot-breadcrumbs',
    'styles' => array(
        'font-size: %sem;' => get_theme_mod( 'taproot_breadcrumbs_size' ),
    ),
));


// Post Navigation Breadcrumbs Color
$styles->set_style( array(
    'selector' => '.taproot-breadcrumbs, .taproot-breadcrumbs > a, .taproot-breadcrumbs > a:visited',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_post_nav_breadcrumbs_color' ),
    ),
));


// Post Navigation Breadcrumbs Color: Hover
$styles->set_style( array(
    'selector' => '.taproot-breadcrumbs > a:hover',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_post_nav_breadcrumbs_color_hover' ),
    ),
));


// Bottom Post Navigation Font Size
$styles->set_style( array(
    'selector' => '.post-navigation--bottom',
    'styles' => array(
        'font-size: %sem;' => get_theme_mod( 'taproot_bottom_post_navigation_link_size' ),
    ),
));


// Breadcrumbs Align
$styles->set_style( array(
    'selector' => '.taproot-breadcrumbs',
    'styles' => array(
        'text-align: %s;' => get_theme_mod( 'taproot_breadcrumbs_align' ),
    ),
));


// Comments

// Post Comments Text Color
$styles->set_style( array(
    'selector' => '.post-comments',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_comments_text_color' ),
    ),
));


// Post Comments Link Color
$styles->set_style( array(
    'selector' => '.post-comments a, .post-comments a:visited',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_comments_link_color' ),
    ),
));


$styles->set_style( array(
    'selector' => '.post-comments .taproot-button ',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_comments_link_color' ),
        'border-color: %s;' => get_theme_mod( 'taproot_comments_link_color' ),
    ),
));


// Color Setting: Comments Link Color:Hover
$styles->set_style( array(
    'selector' => '.post-comments a:hover',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_comments_link_color_hover' ),
    ),
));


$styles->set_style( array(
    'selector' => '.post-comments .taproot-button:hover',
    'styles' => array(
        'background-color: %s; color: #fff;' => get_theme_mod( 'taproot_comments_link_color_hover' ),
        'border-color: %s;' => get_theme_mod( 'taproot_comments_link_color_hover' ),        
    ),
));


// Color Setting: Comments Border Color
$styles->set_style( array(
    'selector' => '.post-comments .comment-body, .comment-respond, .comment-respond .form-control',
    'styles' => array(
        'border-color: %s;' => get_theme_mod( 'taproot_comments_border_color' ),
    ),
));


// Color Setting: Comments Form Background Color
$styles->set_style( array(
    'selector' => '.comment-respond',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_comments_form_background_color' ),
    ),
));
