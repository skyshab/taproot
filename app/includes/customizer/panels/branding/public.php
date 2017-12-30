<?php
/**
 * Generate styles from the customizer controls in the branding panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Site title styles
$styles->set_style( array(
    'selector' => '.site-title',
    'styles' => array(
         'color: %s;' => get_theme_mod( 'taproot_title_font_color' ),
         'font-family: "%s";' => taproot_get_font_family( get_theme_mod( 'taproot_site_title_font' ) ),
         taproot_get_font_styles( get_theme_mod( 'taproot_site_title_font_style' ) ) => 'echo',
     ),
));

// site description styles
$styles->set_style( array(
    'selector' => '.site-description',
    'styles' => array(
         'color: %s;' => get_theme_mod( 'taproot_tagline_font_color' ),
         'font-family: "%s";' => taproot_get_font_family( get_theme_mod( 'taproot_site_tagline_font' ) ),
         taproot_get_font_styles( get_theme_mod( 'taproot_tagline_font_style' ) ) => 'echo',
     ),
));

// Gutter Spacing: Container

$styles->set_style( array(
    'screen' => 'mobile',
    'selector' => '.header-nav__menu > .menu-item > a, .branding, .search-container',
    'styles' => array(
         'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_gutter_spacing_mobile' ),
     ),
));

$styles->set_style( array(
    'screen' => 'mobile-landscape-and-up',
    'selector' => '.header-nav__menu > .menu-item > a, .branding, .search-container',
    'styles' => array(
         'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_gutter_spacing_mobile_landscape' ),
     ),
));

$styles->set_style( array(
    'screen' => 'tablet-and-up',
    'selector' => '.header-nav__menu > .menu-item > a, .branding, .search-container',
    'styles' => array(
         'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_gutter_spacing_tablet', get_theme_mod( 'taproot_gutter_spacing_mobile_landscape' ) ),
     ),
));

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.header-nav__menu > .menu-item > a, .branding, .search-container',
    'styles' => array(
         'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_gutter_spacing_laptop', get_theme_mod( 'taproot_gutter_spacing_tablet' ) ),
     ),
));

$styles->set_style( array(
    'screen' => 'desktop',
    'selector' => '.header-nav__menu > .menu-item > a, .branding, .search-container',
    'styles' => array(
         'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_gutter_spacing_desktop', get_theme_mod( 'taproot_gutter_spacing_laptop' ) ),
     ),
));


// logo height
$styles->set_style( array(
    'screen' => 'mobile',
    'selector' => '.logo, .logo-wrapper svg',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_logo_height_mobile' ),
     ),
));

$styles->set_style( array(
    'screen' => 'mobile-landscape-and-up',
    'selector' => '.logo, .logo-wrapper svg',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_logo_height_mobile_landscape', get_theme_mod( 'taproot_logo_height_mobile', 42 ) ),
     ),
));

$styles->set_style( array(
    'screen' => 'tablet-and-up',
    'selector' => '.logo, .logo-wrapper svg',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_logo_height_tablet' ),
     ),
));

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.logo, .logo-wrapper svg',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_logo_height_laptop' ),
     ),
));

$styles->set_style( array(
    'screen' => 'desktop',
    'selector' => '.logo, .logo-wrapper svg',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_logo_height_desktop' ),
     ),
));


// logo gutter

if( 'stacked' == get_theme_mod( 'taproot_branding_layout_mobile' ) || is_customize_preview() )
{
    $styles->set_style( array(
        'screen' => 'mobile',
        'selector' => '.m-stacked .has-titles .logo-wrapper',
        'styles' => array(
             'margin-bottom: %sem;' => get_theme_mod( 'taproot_logo_gutter_mobile', get_theme_mod( 'taproot_gutter_spacing_mobile' ) ),
         ),
    ));
}
if( 'spread' == get_theme_mod( 'taproot_branding_layout_mobile' ) || is_customize_preview() )
{
    $styles->set_style( array(
        'screen' => 'mobile',
        'selector' => '.m-spread .logo-wrapper',
        'styles' => array(
             'margin-right: %sem;' => get_theme_mod( 'taproot_logo_gutter_mobile', get_theme_mod( 'taproot_gutter_spacing_mobile' ) ),
         ),
    ));
}

if( 'stacked' == get_theme_mod( 'taproot_branding_layout_mobile_landscape' ) || is_customize_preview() )
{
    $styles->set_style( array(
        'screen' => 'mobile-landscape',
        'selector' => '.ml-stacked .has-titles .logo-wrapper',
        'styles' => array(
             'margin-bottom: %sem;' => get_theme_mod( 'taproot_logo_gutter_mobile_landscape', get_theme_mod( 'taproot_gutter_spacing_mobile_landscape' ) ),
         ),
    ));
}
if( 'spread' == get_theme_mod( 'taproot_branding_layout_mobile_landscape' ) || is_customize_preview() )
{
    $styles->set_style( array(
        'screen' => 'mobile-landscape-and-up',
        'selector' => '.ml-spread .logo-wrapper',
        'styles' => array(
             'margin-right: %sem;' => get_theme_mod( 'taproot_logo_gutter_mobile_landscape', get_theme_mod( 'taproot_gutter_spacing_mobile_landscape' ) ),
         ),
    ));
}

if( 'stacked' == get_theme_mod( 'taproot_branding_layout_tablet' ) || is_customize_preview() )
{
    $styles->set_style( array(
        'screen' => 'tablet',
        'selector' => '.t-stacked .has-titles .logo-wrapper',
        'styles' => array(
             'margin-bottom: %sem;' => get_theme_mod( 'taproot_logo_gutter_tablet', get_theme_mod( 'taproot_gutter_spacing_tablet' ) ),
         ),
    ));
}
if( 'spread' == get_theme_mod( 'taproot_branding_layout_tablet' ) || is_customize_preview() )
{
    $styles->set_style( array(
        'screen' => 'tablet-and-up',
        'selector' => '.t-spread .logo-wrapper',
        'styles' => array(
             'margin-right: %sem;' => get_theme_mod( 'taproot_logo_gutter_tablet', get_theme_mod( 'taproot_gutter_spacing_tablet' ) ),
         ),
    ));
}

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.header-content .logo-wrapper, .header-content .title-wrapper',
    'styles' => array(
         'margin-right: %sem;' => get_theme_mod( 'taproot_logo_gutter_laptop', get_theme_mod( 'taproot_gutter_spacing_laptop' ) ),
     ),
));

$styles->set_style( array(
    'screen' => 'desktop',
    'selector' => '.header-content .logo-wrapper, .header-content .title-wrapper',
    'styles' => array(
         'margin-right: %sem;' => get_theme_mod( 'taproot_logo_gutter_desktop', get_theme_mod( 'taproot_gutter_spacing_desktop' ) ),
     ),
));


// title font size

$styles->set_style( array(
    'screen' => 'mobile',
    'selector' => '.site-title',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_title_font_size_mobile' ),
     ),
));

$styles->set_style( array(
    'screen' => 'mobile-landscape-and-up',
    'selector' => '.site-title',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_title_font_size_mobile_landscape' ),
     ),
));

$styles->set_style( array(
    'screen' => 'tablet-and-up',
    'selector' => '.site-title',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_title_font_size_tablet' ),
     ),
));

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.site-title',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_title_font_size_laptop' ),
     ),
));

$styles->set_style( array(
    'screen' => 'desktop',
    'selector' => '.site-title',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_title_font_size_desktop' ),
     ),
));

// title line height

$styles->set_style( array(
    'screen' => 'mobile',
    'selector' => '.site-title',
    'styles' => array(
         'line-height: %s;' => get_theme_mod( 'taproot_title_line_height_mobile' ),
     ),
));

$styles->set_style( array(
    'screen' => 'mobile-landscape-and-up',
    'selector' => '.site-title',
    'styles' => array(
         'line-height: %s;' => get_theme_mod( 'taproot_title_line_height_mobile_landscape' ),
     ),
));

$styles->set_style( array(
    'screen' => 'tablet-and-up',
    'selector' => '.site-title',
    'styles' => array(
         'line-height: %s;' => get_theme_mod( 'taproot_title_line_height_tablet' ),
     ),
));

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.site-title',
    'styles' => array(
         'line-height: %s;' => get_theme_mod( 'taproot_title_line_height_laptop' ),
     ),
));

$styles->set_style( array(
    'screen' => 'desktop',
    'selector' => '.site-title',
    'styles' => array(
         'line-height: %s;' => get_theme_mod( 'taproot_title_line_height_desktop' ),
     ),
));

// title letter spacing

$styles->set_style( array(
    'screen' => 'mobile',
    'selector' => '.site-title',
    'styles' => array(
         'letter-spacing: %spx;' => get_theme_mod( 'taproot_title_spacing_mobile' ),
     ),
));

$styles->set_style( array(
    'screen' => 'mobile-landscape-and-up',
    'selector' => '.site-title',
    'styles' => array(
         'letter-spacing: %spx;' => get_theme_mod( 'taproot_title_spacing_mobile_landscape' ),
     ),
));

$styles->set_style( array(
    'screen' => 'tablet-and-up',
    'selector' => '.site-title',
    'styles' => array(
         'letter-spacing: %spx;' => get_theme_mod( 'taproot_title_spacing_tablet' ),
     ),
));

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.site-title',
    'styles' => array(
         'letter-spacing: %spx;' => get_theme_mod( 'taproot_title_spacing_laptop' ),
     ),
));

$styles->set_style( array(
    'screen' => 'desktop',
    'selector' => '.site-title',
    'styles' => array(
         'letter-spacing: %spx;' => get_theme_mod( 'taproot_title_spacing_desktop' ),
     ),
));

// tagline font size

$styles->set_style( array(
    'screen' => 'mobile',
    'selector' => '.site-description',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_tagline_font_size_mobile' ),
     ),
));

$styles->set_style( array(
    'screen' => 'mobile-landscape-and-up',
    'selector' => '.site-description',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_tagline_font_size_mobile_landscape' ),
     ),
));

$styles->set_style( array(
    'screen' => 'tablet-and-up',
    'selector' => '.site-description',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_tagline_font_size_tablet' ),
     ),
));

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.site-description',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_tagline_font_size_laptop' ),
     ),
));

$styles->set_style( array(
    'screen' => 'desktop',
    'selector' => '.site-description',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_tagline_font_size_desktop' ),
     ),
));

// tagline line height

$styles->set_style( array(
    'screen' => 'mobile',
    'selector' => '.site-description',
    'styles' => array(
         'line-height: %s;' => get_theme_mod( 'taproot_tagline_line_height_mobile' ),
     ),
));

$styles->set_style( array(
    'screen' => 'mobile-landscape-and-up',
    'selector' => '.site-description',
    'styles' => array(
         'line-height: %s;' => get_theme_mod( 'taproot_tagline_line_height_mobile_landscape' ),
     ),
));

$styles->set_style( array(
    'screen' => 'tablet-and-up',
    'selector' => '.site-description',
    'styles' => array(
         'line-height: %s;' => get_theme_mod( 'taproot_tagline_line_height_tablet' ),
     ),
));

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.site-description',
    'styles' => array(
         'line-height: %s;' => get_theme_mod( 'taproot_tagline_line_height_laptop' ),
     ),
));

$styles->set_style( array(
    'screen' => 'desktop',
    'selector' => '.site-description',
    'styles' => array(
         'line-height: %s;' => get_theme_mod( 'taproot_tagline_line_height_desktop' ),
     ),
));

// tagline letter spacing

$styles->set_style( array(
    'screen' => 'mobile',
    'selector' => '.site-description',
    'styles' => array(
         'letter-spacing: %spx;' => get_theme_mod( 'taproot_tagline_spacing_mobile' ),
     ),
));

$styles->set_style( array(
    'screen' => 'mobile-landscape-and-up',
    'selector' => '.site-description',
    'styles' => array(
         'letter-spacing: %spx;' => get_theme_mod( 'taproot_tagline_spacing_mobile_landscape' ),
     ),
));

$styles->set_style( array(
    'screen' => 'tablet-and-up',
    'selector' => '.site-description',
    'styles' => array(
         'letter-spacing: %spx;' => get_theme_mod( 'taproot_tagline_spacing_tablet' ),
     ),
));

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.site-description',
    'styles' => array(
         'letter-spacing: %spx;' => get_theme_mod( 'taproot_tagline_spacing_laptop' ),
     ),
));

$styles->set_style( array(
    'screen' => 'desktop',
    'selector' => '.site-description',
    'styles' => array(
         'letter-spacing: %spx;' => get_theme_mod( 'taproot_tagline_spacing_desktop' ),
     ),
));

// tagline top margin

$styles->set_style( array(
    'screen' => 'mobile',
    'selector' => '.site-description',
    'styles' => array(
         'margin-top: %sem;' => get_theme_mod( 'taproot_tagline_top_margin_mobile' ),
     ),
));

$styles->set_style( array(
    'screen' => 'mobile-landscape-and-up',
    'selector' => '.site-description',
    'styles' => array(
         'margin-top: %sem;' => get_theme_mod( 'taproot_tagline_top_margin_mobile_landscape' ),
     ),
));

$styles->set_style( array(
    'screen' => 'tablet-and-up',
    'selector' => '.site-description',
    'styles' => array(
         'margin-top: %sem;' => get_theme_mod( 'taproot_tagline_top_margin_tablet' ),
     ),
));

$styles->set_style( array(
    'screen' => 'laptop-and-up',
    'selector' => '.site-description',
    'styles' => array(
         'margin-top: %sem;' => get_theme_mod( 'taproot_tagline_top_margin_laptop' ),
     ),
));

$styles->set_style( array(
    'screen' => 'desktop',
    'selector' => '.site-description',
    'styles' => array(
         'margin-top: %sem;' => get_theme_mod( 'taproot_tagline_top_margin_desktop' ),
     ),
));

// Fixed Header Branding Styles

if( get_theme_mod( 'taproot_fixed_header' ) )
{
    $styles->set_style( array(
        'screen' => 'laptop',
        'selector' => '.fixed .header-nav__menu > .menu-item > a, .fixed .branding, .fixed .search-container',
        'styles' => array(
             'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_gutter_spacing_laptop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'desktop',
        'selector' => '.fixed .header-nav__menu > .menu-item > a, .fixed .branding, .fixed .search-container',
        'styles' => array(
             'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_gutter_spacing_desktop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'laptop',
        'selector' => '.main-header.fixed .logo-wrapper',
        'styles' => array(
             'margin-right: %sem;' => get_theme_mod( 'taproot_logo_gutter_laptop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'desktop',
        'selector' => '.main-header.fixed .logo-wrapper',
        'styles' => array(
             'margin-right: %sem;' => get_theme_mod( 'taproot_logo_gutter_desktop_fixed' ),
         ),
    ));


    // logo height laptop
    $styles->set_style( array(
        'screen' => 'laptop',
        'selector' => '.main-header.fixed .logo, header.fixed .logo-wrapper svg',
        'styles' => array(
             'font-size: %spx;' => get_theme_mod( 'taproot_logo_height_laptop_fixed' ),
         ),
    ));

    // logo height desktop
    $styles->set_style( array(
        'screen' => 'desktop',
        'selector' => '.main-header.fixed .logo, header.fixed .logo-wrapper svg',
        'styles' => array(
             'font-size: %spx;' => get_theme_mod( 'taproot_logo_height_desktop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'laptop',
        'selector' => '.main-header.fixed .site-title',
        'styles' => array(
             'font-size: %spx;' => get_theme_mod( 'taproot_title_font_size_laptop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'desktop',
        'selector' => '.main-header.fixed .site-title',
        'styles' => array(
             'font-size: %spx;' => get_theme_mod( 'taproot_title_font_size_desktop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'laptop',
        'selector' => '.main-header.fixed .site-title',
        'styles' => array(
             'line-height: %s;' => get_theme_mod( 'taproot_title_line_height_laptop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'desktop',
        'selector' => '.main-header.fixed .site-title',
        'styles' => array(
             'line-height: %s;' => get_theme_mod( 'taproot_title_line_height_desktop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'laptop',
        'selector' => '.main-header.fixed .site-title',
        'styles' => array(
             'letter-spacing: %spx;' => get_theme_mod( 'taproot_title_spacing_laptop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'desktop',
        'selector' => '.main-header.fixed .site-title',
        'styles' => array(
             'letter-spacing: %spx;' => get_theme_mod( 'taproot_title_spacing_desktop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'laptop',
        'selector' => '.main-header.fixed .site-description',
        'styles' => array(
             'font-size: %spx;' => get_theme_mod( 'taproot_tagline_font_size_laptop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'desktop',
        'selector' => '.main-header.fixed .site-description',
        'styles' => array(
             'font-size: %spx;' => get_theme_mod( 'taproot_tagline_font_size_desktop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'laptop',
        'selector' => '.main-header.fixed .site-description',
        'styles' => array(
             'line-height: %s;' => get_theme_mod( 'taproot_tagline_line_height_laptop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'desktop',
        'selector' => '.main-header.fixed .site-description',
        'styles' => array(
             'line-height: %s;' => get_theme_mod( 'taproot_tagline_line_height_desktop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'laptop',
        'selector' => '.main-header.fixed .site-description',
        'styles' => array(
             'letter-spacing: %spx;' => get_theme_mod( 'taproot_tagline_spacing_laptop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'desktop',
        'selector' => '.main-header.fixed .site-description',
        'styles' => array(
             'letter-spacing: %spx;' => get_theme_mod( 'taproot_tagline_spacing_desktop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'laptop',
        'selector' => '.main-header.fixed .site-description',
        'styles' => array(
             'margin-top: %sem;' => get_theme_mod( 'taproot_tagline_top_margin_laptop_fixed' ),
         ),
    ));

    $styles->set_style( array(
        'screen' => 'desktop',
        'selector' => '.main-header.fixed .site-description',
        'styles' => array(
             'margin-top: %sem;' => get_theme_mod( 'taproot_tagline_top_margin_desktop_fixed' ),
         ),
    ));

    // fixed header title color
    $styles->set_style( array(
        'screen' => 'laptop-and-up',
        'selector' => '.main-header.fixed .site-title',
        'styles' => array(
             'color: %s;' => get_theme_mod( 'taproot_title_font_color_fixed' ),
         ),
    ));

    // fixed header tagline color
    $styles->set_style( array(
        'screen' => 'laptop-and-up',
        'selector' => '.main-header.fixed .site-description',
        'styles' => array(
             'color: %s;' => get_theme_mod( 'taproot_tagline_font_color_fixed' ),
         ),
    ));

    // hide logo
    if( get_theme_mod( 'taproot_hide_logo_laptop_fixed' ) )
    {
        $styles->set_style( array(
            'screen' => 'laptop',
            'selector' => '.main-header.fixed .logo-wrapper',
            'styles' => array(
                 'display: none;' => 'echo',
             ),
        ));
    }

    if( get_theme_mod( 'taproot_hide_logo_desktop_fixed' ) )
    {
        $styles->set_style( array(
            'screen' => 'desktop',
            'selector' => '.main-header.fixed .logo-wrapper',
            'styles' => array(
                 'display: none;' => 'echo',
             ),
        ));
    }

    // hide title
    if( get_theme_mod( 'taproot_hide_site_title_laptop_fixed' ) )
    {
        $styles->set_style( array(
            'screen' => 'laptop',
            'selector' => '.main-header.fixed .site-title',
            'styles' => array(
                 'display: none;' => 'echo',
             ),
        ));
    }

    if( get_theme_mod( 'taproot_hide_site_title_desktop_fixed' ) )
    {
        $styles->set_style( array(
            'screen' => 'desktop',
            'selector' => '.main-header.fixed .site-title',
            'styles' => array(
                 'display: none;' => 'echo',
             ),
        ));
    }

    // hide tagline
    if( get_theme_mod( 'taproot_hide_site_tagline_laptop_fixed' ) )
    {
        $styles->set_style( array(
            'screen' => 'laptop',
            'selector' => '.main-header.fixed .site-description',
            'styles' => array(
                 'display: none;' => 'echo',
             ),
        ));
    }

    if( get_theme_mod( 'taproot_hide_site_tagline_desktop_fixed' ) )
    {
        $styles->set_style( array(
            'screen' => 'desktop',
            'selector' => '.main-header.fixed .site-description',
            'styles' => array(
                 'display: none;' => 'echo',
             ),
        ));
    }

} // end Fixed Header Styles
