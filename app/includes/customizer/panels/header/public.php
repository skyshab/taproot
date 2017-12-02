<?php
/**
 * Generate styles from the customizer controls in the header panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Background Color
$styles->set_style( array(
    'selector' => '.main-header',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_header_background_color' ),
    ),
));

// if no header background color, add a shadow
if( !get_theme_mod( 'taproot_header_background_color' ) || get_theme_mod( 'taproot_header_background_color' ) === '#ffffff' || get_theme_mod( 'taproot_header_background_color' ) === 'rgb(255,255,255)' )
{
    $styles->set_style( array(
        'selector' => '.main-header',
        'styles' => array(
            'box-shadow: %s;' => '0 1px 2px -2px rgba(0, 0, 0, 0.8)',
        ),
    ));
}

// Default Color
$styles->set_style( array(
    'selector' => '.header-content .container',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_header_default_color' ),
    ),
));

// Default Color Hover
$styles->set_style( array(
    'selector' => '.header-content .search-toggle:hover, .header-content .label-toggle:hover',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_header_default_color_hover' ),
    ),
));

// Header nav desktop bp
$header_nav_desktop_screen = taproot_get_screen_from_bp( get_theme_mod( 'taproot_header_nav_mobile_breakpoint', 'bp-t' ), false );

// Default Color Hover
$styles->set_style( array(
    'screen' => $header_nav_desktop_screen,
    'selector' => '.header-nav__menu > .menu-item:hover > a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_header_default_color_hover' ),
    ),
));


// Background Image
if( get_theme_mod( 'taproot_header_background_image', false ) || is_customize_preview() )
{
    $styles->set_style( array(
        'selector' => '.main-header',
        'styles' => array(
            'background-image: url(%s);' => get_theme_mod( 'taproot_header_background_image' ),
            'background-repeat: %s;' => get_theme_mod( 'taproot_header_background_repeat' ),
            'background-size: %s;' => get_theme_mod( 'taproot_header_background_size' ),
            'background-position: top %s;' => get_theme_mod( 'taproot_header_background_position' ),
        ),
    ));
}

// Search Styles

// Search Color
$styles->set_style( array(
    'selector' => '.main-header.static .search-container, .main-header.static .search-toggle',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_header_search_color' ),
    ),
));

// Search Icon Size
$styles->set_style( array(
    'selector' => '.main-header .search-toggle, .search-container .taproot-search__field',
    'styles' => array(
        'font-size: %spx;' => get_theme_mod( 'taproot_header_search_size' ),
    ),
));


// Fixed Styles
if( get_theme_mod( 'taproot_main_header_display_when_fixed' ) )
{
    $styles->set_style( array(
        'selector' => '.main-header.fixed',
        'styles' => array(
            'background-color: %s;' => get_theme_mod( 'taproot_header_background_color_fixed' ),
        ),
    ));

    // Fixed Header Default Color
    $styles->set_style( array(
        'selector' => '.main-header.fixed .header-content .container',
        'styles' => array(
            'color: %s;' => get_theme_mod( 'taproot_fixed_header_default_color' ),
        ),
    ));

    // Fixed Header Default Color Hover
    $styles->set_style( array(
        'screen' => $header_nav_desktop_screen,
        'selector' => '.main-header.fixed .menu > .menu-item:hover > a, .main-header.fixed .search-toggle:hover, .main-header.fixed .label-toggle:hover',
        'styles' => array(
            'color: %s;' => get_theme_mod( 'taproot_fixed_header_default_color_hover' ),
        ),
    ));


    if( !get_theme_mod( 'taproot_enable_header_search' ) )
    {
        $styles->set_style( array(
            'selector' => '.main-header.static .search-container, .main-header.static .search-toggle',
            'styles' => array(
                'display: none;' => 'echo',
            ),
        ));
    }


    if( !get_theme_mod( 'taproot_enable_fixed_header_search' ) )
    {
        $styles->set_style( array(
            'selector' => '.main-header.fixed .search-container, .main-header.fixed .search-toggle',
            'styles' => array(
                'display: none;' => 'echo',
            ),
        ));
    }    

    // Fixed Header Search Color
    $styles->set_style( array(
        'selector' => '.main-header.fixed .search-container, .main-header.fixed .search-toggle',
        'styles' => array(
            'color: %s;' => get_theme_mod( 'taproot_search_color_fixed' ),
        ),
    ));

    // Fixed Search Icon Size
    $styles->set_style( array(
        'selector' => '.main-header.fixed .search-toggle, .main-header.fixed .taproot-search__field',
        'styles' => array(
            'font-size: %spx;' => get_theme_mod( 'taproot_search_size_fixed' ),
        ),
    ));
}
else
{
    $styles->set_style( array(
        'selector' => '.main-header.fixed .header-content',
        'styles' => array(
            'display: none;' => 'echo',
        ),
    ));
}
