<?php
/**
 * Generate styles from the customizer controls in the navigation panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Topnav Styles
$topnav_desktop_screen = taproot_get_screen_from_bp( get_theme_mod( 'taproot_topnav_mobile_breakpoint' ), false );
$topnav_mobile_screen = taproot_get_screen_from_bp( get_theme_mod( 'taproot_topnav_mobile_breakpoint' ) );

$styles->set_style( array(
    'selector' => '.taproot-nav.top-nav',
    'styles' => array(
        'background: %s;' => get_theme_mod( 'taproot_topnav_background' ),
        'font-family: "%s";' => taproot_get_font_family( get_theme_mod( 'taproot_topnav_font' ) ),
        'font-size: %spx;' => get_theme_mod( 'taproot_topnav_font_size' ),
    ),
));

// Setting: Top Nav Font Styles
$styles->set_style( array(
    'selector' => '.topnav__menu .menu-item > a',
    'styles' => array(
        taproot_get_font_styles( get_theme_mod( 'taproot_topnav_font_style' ) ) => 'echo',
    ),
));

$styles->set_style( array(
    'selector' => '.taproot-nav.top-nav, .additional-content',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_topnav_default_color' ),
    ),
));

$styles->set_style( array(
    'selector' => '.topnav__menu .menu-item:hover > a, .additional-content a:hover',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_topnav_default_color_hover' ),
    ),
));

$styles->set_style( array(
    'selector' => '.topnav__menu > .menu-item > a',
    'styles' => array(
        'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_topnav_height' ),
        'padding-left: %sem; padding-right: %sem;' => get_theme_mod( 'taproot_topnav_item_spacing' ),
    ),
    'screen' => $topnav_desktop_screen
));

$styles->set_style( array(
    'selector' => '.topnav__menu > .menu-item > a',
    'styles' => array(
        'padding: 0 0 %sem 0;' => '0.4',
    ),
    'screen' => $topnav_mobile_screen
));

// Top Nav fixed styles
if( !get_theme_mod( 'taproot_topnav_display_when_fixed' ) )
{
    $styles->set_style( array(
        'selector' => '.main-header.fixed #taproot-topnav',
        'styles' => array(
            'display: none;' => 'echo',
        ),
    ));
}


$styles->set_style( array(
    'selector' => '#header.fixed .taproot-nav.top-nav',
    'styles' => array(
        'background: %s;' => get_theme_mod( 'taproot_fixed_topnav_background' ),
    ),
));

$styles->set_style( array(
    'selector' => '#header.fixed .taproot-nav.top-nav, #header.fixed .additional-content',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_fixed_topnav_default_color' ),
    ),
));

$styles->set_style( array(
    'selector' => '#header.fixed .topnav__menu .menu-item:hover > a, #header.fixed .additional-content a:hover',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_fixed_topnav_default_color_hover' ),
    ),
));

// Header Nav Styles

// Setting: Navbar Font
$styles->set_style( array(
    'selector' => '.header-nav',
    'styles' => array(
        'font-family: "%s";' => taproot_get_font_family( get_theme_mod( 'taproot_header_nav_font' ) ),
        'font-size: %spx;' => get_theme_mod( 'taproot_header_nav_font_size' ),
    ),
));

// Setting: Header Nav Font Styles
$styles->set_style( array(
    'selector' => '.header-nav__menu .menu-item > a',
    'styles' => array(
        taproot_get_font_styles( get_theme_mod( 'taproot_header_nav_font_style' ) ) => 'echo',
    ),
));


// Header nav desktop styles
$header_nav_desktop_screen = taproot_get_screen_from_bp( get_theme_mod( 'taproot_header_nav_mobile_breakpoint' ), false );


$styles->set_style( array(
    'screen' => $header_nav_desktop_screen,
    'selector' => '.header-nav__menu > .menu-item > a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_header_nav_menu_item_color' ),
    ),
));

$styles->set_style( array(
    'screen' => $header_nav_desktop_screen,
    'selector' => '.header-nav__menu > .menu-item:hover > a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_header_nav_menu_item_color_hover' ),
    ),
));

// submenu dropdown background pointer color
$styles->set_style( array(
    'screen' => $header_nav_desktop_screen,
    'selector' => '.header-nav__menu .sub-menu',
    'styles' => array(
        'border-color: %s;' => get_theme_mod( 'taproot_header_nav_submenu_bkg_color' ),
        'background-color: %s;' => get_theme_mod( 'taproot_header_nav_submenu_bkg_color' ),
    ),
));

// submenu dropdown item color
$styles->set_style( array(
    'screen' => $header_nav_desktop_screen,
    'selector' => '.header-nav__menu .sub-menu .menu-item > a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_header_nav_submenu_item_color' ),
    ),
));

// submenu dropdown item color hover
$styles->set_style( array(
    'screen' => $header_nav_desktop_screen,
    'selector' => '.header-nav__menu .sub-menu .menu-item:hover > a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_header_nav_submenu_item_color_hover' ),
    ),
));


$styles->set_style( array(
    'screen' => $header_nav_desktop_screen,
    'selector' => '.header-nav__menu > .menu-item > a',
    'styles' => array(
        'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_header_nav_height' ),
        'padding-left: %sem; padding-right: %sem;' => get_theme_mod( 'taproot_header_nav_item_spacing' ),
    ),
));


// Header Nav Mobile Styles
$header_nav_mobile_screen = taproot_get_screen_from_bp( get_theme_mod( 'taproot_header_nav_mobile_breakpoint' ) );

// Header Mobile Menubar Icon Styles
$styles->set_style( array(
    'screen' => $header_nav_mobile_screen,
    'selector' => '.header-nav .label-toggle',
    'styles' => array(
        'font-size: %sem;' => get_theme_mod( 'taproot_header_nav_mobile_icon_size' ),
        'color: %s;' => get_theme_mod( 'taproot_header_nav_mobile_icon_color' ),
        'fill: %s;' => get_theme_mod( 'taproot_header_nav_mobile_icon_color' ),
    ),
));

$styles->set_style( array(
    'screen' => $header_nav_mobile_screen,
    'selector' => '.header-nav--fullscreen .menu-toggle.toggle ~ .label-toggle',
    'styles' => array(
        'fill: %s;' => get_theme_mod( 'taproot_header_nav_mobile_item_color' ),
    ),
));

// Header Mobile Menubar Background
$styles->set_style( array(
    'screen' => $header_nav_mobile_screen,
    'selector' => '.header-nav__menu',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_header_nav_mobile_background' ),
    ),
));

// Header Mobile Menu Item Color, Padding
$styles->set_style( array(
    'screen' => $header_nav_mobile_screen,
    'selector' => '.header-nav__menu .menu-item > a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_header_nav_mobile_item_color', '#424242' ),
        'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_header_nav_mobile_dropdown_item_height' ),
        'padding-left: %sem; padding-right: %sem;' => get_theme_mod( 'taproot_header_nav_mobile_dropdown_item_padding' ),
    ),
));

// Header Nav Mobile Menubar Separator Color
$styles->set_style( array(
    'screen' => $header_nav_mobile_screen,
    'selector' => '.header-nav__menu .menu-item',
    'styles' => array(
        'border-color: %s;' => get_theme_mod( 'taproot_header_nav_mobile_separator_color' ),
    ),
));


// Header Nav Mobile Menubar Background and Text Color: Hover
$styles->set_style( array(
    'screen' => $header_nav_mobile_screen,
    'selector' => '.header-nav__menu .menu-item > a:hover',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_header_nav_mobile_dropdown_bkg_hover' ),
        'color: %s;' => get_theme_mod( 'taproot_header_nav_mobile_dropdown_text_color_hover' ),
    ),
));

// Header Nav Mobile Menubar Background
$styles->set_style( array(
    'screen' => 'mobile',
    'selector' => '.m-stacked .header-nav',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_header_nav_mobile_menubar_background' ),
    ),
));

$styles->set_style( array(
    'screen' => 'mobile-landscape',
    'selector' => '.ml-stacked .header-nav',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_header_nav_mobile_menubar_background' ),
    ),
));

$styles->set_style( array(
    'screen' => 'tablet',
    'selector' => '.t-stacked .header-nav',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_header_nav_mobile_menubar_background' ),
    ),
));



// Header Nav fixed styles
if( !get_theme_mod( 'taproot_header_nav_display_when_fixed', true ) )
{
    $styles->set_style( array(
        'selector' => '.main-header.fixed #taproot-header-nav',
        'styles' => array(
            'display: none;' => 'echo',
        ),
    ));
}


if( get_theme_mod( 'taproot_header_nav_display_when_fixed', true ) )
{
    $styles->set_style( array(
        'selector' => '.main-header.fixed .header-nav__menu > .menu-item > a',
        'styles' => array(
            'color: %s;' => get_theme_mod( 'taproot_header_nav_menu_item_color_fixed' ),
            'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_header_nav_height_fixed' ),
            'padding-left: %sem; padding-right: %sem;' => get_theme_mod( 'taproot_header_nav_item_spacing_fixed' ),
        ),
        'screen' => $header_nav_desktop_screen
    ));

    $styles->set_style( array(
        'selector' => '.main-header.fixed .header-nav__menu > .menu-item:hover > a',
        'styles' => array(
            'color: %s;' => get_theme_mod( 'taproot_header_nav_menu_item_color_hover_fixed' ),
        ),
        'screen' => $header_nav_desktop_screen
    ));

    $styles->set_style( array(
        'selector' => '.main-header.fixed .header-nav',
        'styles' => array(
            'font-size: %spx;' => get_theme_mod( 'taproot_header_nav_font_size_fixed' ),
        ),
        'screen' => $header_nav_desktop_screen
    ));

    // submenu dropdown background pointer color
    $styles->set_style( array(
        'screen' => $header_nav_desktop_screen,
        'selector' => '.main-header.fixed .header-nav__menu .sub-menu',
        'styles' => array(
            'border-color: %s;' => get_theme_mod( 'taproot_header_nav_fixed_submenu_bkg_color' ),
            'background-color: %s;' => get_theme_mod( 'taproot_header_nav_fixed_submenu_bkg_color' ),
        ),
    ));

    // submenu dropdown item color
    $styles->set_style( array(
        'screen' => $header_nav_desktop_screen,
        'selector' => '.main-header.fixed .header-nav__menu .sub-menu .menu-item > a',
        'styles' => array(
            'color: %s;' => get_theme_mod( 'taproot_header_nav_fixed_submenu_item_color' ),
        ),
    ));

    // submenu dropdown item color hover
    $styles->set_style( array(
        'screen' => $header_nav_desktop_screen,
        'selector' => '.main-header.fixed .header-nav__menu .sub-menu .menu-item:hover > a',
        'styles' => array(
            'color: %s;' => get_theme_mod( 'taproot_header_nav_fixed_submenu_item_color_hover' ),
        ),
    ));

}


// Navbar Styles

// Navbar Desktop styles
$navbar_desktop_screen = taproot_get_screen_from_bp( get_theme_mod( 'taproot_navbar_mobile_breakpoint' ), false );


$styles->set_style( array(
    'selector' => '.taproot-nav.navbar',
    'styles' => array(
        'background: %s;' => get_theme_mod( 'taproot_navbar_background' ),
        'font-family: "%s";' => taproot_get_font_family( get_theme_mod( 'taproot_navbar_font' ) ),
        'font-size: %spx;' => get_theme_mod( 'taproot_navbar_font_size' ),
    ),
));

// Setting: Navbar Font Style
$styles->set_style( array(
    'selector' => '.navbar__menu .menu-item > a',
    'styles' => array(
        taproot_get_font_styles( get_theme_mod( 'taproot_navbar_font_style' ) ) => 'echo',
    ),
));

$styles->set_style( array(
    'screen' => $navbar_desktop_screen,
    'selector' => '.navbar__menu > .menu-item > a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_navbar_menu_item_color' ),
    ),
));

$styles->set_style( array(
    'screen' => $navbar_desktop_screen,
    'selector' => '.navbar__menu > .menu-item:hover > a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_navbar_menu_item_color_hover' ),
    ),
));


// submenu dropdown background and pointer color
$styles->set_style( array(
    'screen' => $navbar_desktop_screen,
    'selector' => '.navbar__menu .sub-menu',
    'styles' => array(
        'border-color: %s;' => get_theme_mod( 'taproot_navbar_submenu_bkg_color' ),
        'background-color: %s;' => get_theme_mod( 'taproot_navbar_submenu_bkg_color' ),
    ),
));

// submenu dropdown item color
$styles->set_style( array(
    'screen' => $navbar_desktop_screen,
    'selector' => '.navbar__menu .sub-menu .menu-item > a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_navbar_submenu_item_color' ),
    ),
));

// submenu dropdown item color hover
$styles->set_style( array(
    'screen' => $navbar_desktop_screen,
    'selector' => '.navbar__menu .sub-menu .menu-item:hover > a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_navbar_submenu_item_color_hover' ),
    ),
));


$styles->set_style( array(
    'screen' => $navbar_desktop_screen,
    'selector' => '.navbar__menu > .menu-item > a',
    'styles' => array(
        'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_navbar_height' ),
        'padding-left: %sem; padding-right: %sem;' => get_theme_mod( 'taproot_navbar_item_spacing' ),
    ),
));

// Navbar mobile styles
$navbar_mobile_screen = taproot_get_screen_from_bp( get_theme_mod( 'taproot_navbar_mobile_breakpoint' ) );

$styles->set_style( array(
    'screen' => $navbar_mobile_screen,
    'selector' => '.navbar .label-toggle',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_navbar_mobile_icon_color' ),
        'font-size: %sem;' => get_theme_mod( 'taproot_navbar_mobile_icon_size' ),
        'margin: %sem 0;' => get_theme_mod( 'taproot_navbar_height_mobile' ),
    ),
));

$styles->set_style( array(
    'screen' => $navbar_mobile_screen,
    'selector' => '.navbar--fullscreen .menu-toggle.toggle ~ .label-toggle',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_navbar_mobile_item_color' ),
    ),
));


// Navbar Mobile Menubar Background Color
$styles->set_style( array(
    'screen' => $navbar_mobile_screen,
    'selector' => '.navbar__menu',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_navbar_mobile_dropdown_bkg' ),
    ),
));

// Navbar Mobile Menubar Separator Color
$styles->set_style( array(
    'screen' => $navbar_mobile_screen,
    'selector' => '.navbar__menu .menu-item',
    'styles' => array(
        'border-color: %s;' => get_theme_mod( 'taproot_navbar_mobile_separator_color' ),
    ),
));

// Navbar Mobile Menubar Text Color, Padding
$styles->set_style( array(
    'screen' => $navbar_mobile_screen,
    'selector' => '.navbar__menu .menu-item > a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_navbar_mobile_dropdown_text_color', 'black' ),
        'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_navbar_mobile_dropdown_item_height' ),
        'padding-left: %sem; padding-right: %sem;' => get_theme_mod( 'taproot_navbar_mobile_dropdown_item_padding' ),
    ),
));

// Navbar Mobile Menubar Text Color: Hover
$styles->set_style( array(
    'screen' => $navbar_mobile_screen,
    'selector' => '.navbar__menu .menu-item > a:hover',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_navbar_mobile_dropdown_bkg_hover' ),
        'color: %s;' => get_theme_mod( 'taproot_navbar_mobile_dropdown_text_color_hover' ),
    ),
));

// Navbar fixed styles
if( !get_theme_mod( 'taproot_navbar_display_when_fixed' ) )
{
    $styles->set_style( array(
        'selector' => '.main-header.fixed #taproot-navbar',
        'styles' => array(
            'display: none;' => 'echo',
        ),
    ));
}

$styles->set_style( array(
    'selector' => '.main-header.fixed .taproot-nav.navbar',
    'styles' => array(
        'background: %s;' => get_theme_mod( 'taproot_fixed_navbar_background' ),
    ),
));

$styles->set_style( array(
    'screen' => $navbar_desktop_screen,
    'selector' => '.main-header.fixed .navbar__menu > .menu-item > a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_fixed_navbar_menu_item_color' ),
    ),
));

$styles->set_style( array(
    'screen' => $navbar_desktop_screen,
    'selector' => '.main-header.fixed .navbar__menu > .menu-item:hover > a',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_fixed_navbar_menu_item_color_hover' ),
    ),
));


// mobile bar styles


// mobile bar background
$styles->set_style( array(
    'selector' => '.mobile-bar',
    'styles' => array(
        'background-color: %s;' => get_theme_mod( 'taproot_mobile_bar_background_color' ),
    ),
));


// mobile bar icon styles

$styles->set_style( array(
    'selector' => '.mobile-bar .icon',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_mobile_bar_icon_color' ),
        'font-size: %spx;' => get_theme_mod( 'taproot_mobile_bar_icon_size' ),

    ),
));    



// mobile bar text styles

$styles->set_style( array(
    'selector' => '.mobile-bar .menu-item > a',
    'styles' => array(
        'font-size: %spx;' => get_theme_mod( 'taproot_mobile_bar_text_size' ),
    ),
));   


$styles->set_style( array(
    'selector' => '.mobile-bar .menu-item > a, .mobile-bar .search-toggle .icon, .mobile-bar .taproot-search__field',
    'styles' => array(
        'color: %s;' => get_theme_mod( 'taproot_mobile_bar_text_color' ),
    ),
));  


$styles->set_style( array(
    'selector' => '.mobile-bar .menu-item',
    'styles' => array(
        'border-right-color: %s;' => get_theme_mod( 'taproot_mobile_bar_separator_color' ),
    ),
));   

// margin on body to compensate for the height of the mobile bar

$mobile_bar_height = floor( 
    intval( get_theme_mod( 'taproot_mobile_bar_text_size', '14' ) ) + 
    intval( get_theme_mod( 'taproot_mobile_bar_icon_size', '24' ) ) +
    ( 0.2 * intval( get_theme_mod( 'taproot_mobile_bar_icon_size', '24' ) ) ) +
    22
);


$mobile_bar_breakpoint = get_theme_mod( 'taproot_mobile_bar_breakpoint' );
$print_mobile_bar_fixed_footer_styles = false;       



if( $mobile_bar_breakpoint === 'mobile' )
{
    $mobile_bar_screen = 'mobile';
    $mobile_bar_hide_screen = 'mobile-landscape-and-up';
}
elseif( $mobile_bar_breakpoint === 'tablet' )
{
    $mobile_bar_screen = 'tablet-and-under';
    $mobile_bar_hide_screen = 'laptop-and-up'; 
    $print_mobile_bar_fixed_footer_styles = true;       
}
else 
{
    $mobile_bar_screen = 'mobile-landscape-and-under';   
    $mobile_bar_hide_screen = 'tablet-and-up';
}


// hide mobile bar breakpoint

$styles->set_style( array(
    'screen' => $mobile_bar_hide_screen,
    'selector' => '.taproot-nav.mobile-bar',
    'styles' => array(
        'display: %s;' => 'none',
    ),
)); 


// adjust fixed footer styles to accomodate for mobile bar

if( $print_mobile_bar_fixed_footer_styles )
{
    $styles->set_style( array(
        'screen' => 'tablet',
        'selector' => '.footer--style-fixed',
        'styles' => array(
            'bottom: %spx;' => $mobile_bar_height,
        ),
    ));  
}


// when mobile bar is on the bottom

$styles->set_style( array(
    'screen' => $mobile_bar_screen,
    'selector' => '.taproot-mobile-bar--bottom',
    'styles' => array(
        'margin-bottom: %spx;' => $mobile_bar_height,
    ),
)); 


// when mobile bar is on the top

$styles->set_style( array(
    'screen' => $mobile_bar_screen,
    'selector' => '.taproot-mobile-bar--top',
    'styles' => array(
        'margin-top: %spx;' => $mobile_bar_height,
    ),
)); 


// Hide other navs that have the setting while mobile bar is visible

$styles->set_style( array(
    'screen' => $mobile_bar_screen,
    'selector' => '.taproot-nav-hidden-when-mobile-bar',
    'styles' => array(
        'display: %s;' => 'none',
    ),
));   

      
// footer nav

// Setting: Footer Nav Font, Background Color
$styles->set_style( array(
    'selector' => '.footer-nav',
    'styles' => array(
         'background: %s;' => get_theme_mod( 'taproot_footer_nav_background' ),
         'font-family: "%s";' => taproot_get_font_family( get_theme_mod( 'taproot_footer_nav_font' ) ),
     ),
));

// Setting: Footer Nav Font Styles
$styles->set_style( array(
    'selector' => '.taproot-nav.footer-nav .menu-item a',
    'styles' => array(
        taproot_get_font_styles( get_theme_mod( 'taproot_footer_nav_font_style' ) ) => 'echo',
    ),
));

$styles->set_style( array(
    'selector' => '.footer-nav .menu-item',
    'styles' => array(
         'font-size: %spx;' => get_theme_mod( 'taproot_footer_nav_font_size' ),
     ),
));

$styles->set_style( array(
    'selector' => '.footer-nav .menu-item a',
    'styles' => array(
         'color: %s;' => get_theme_mod( 'taproot_footer_nav_menu_item_color' ),
         'padding-top: %sem; padding-bottom: %sem;' => get_theme_mod( 'taproot_footer_nav_height' ),
         'padding-left: %sem; padding-right: %sem;' => get_theme_mod( 'taproot_footer_nav_item_spacing' ),
     ),
));

$styles->set_style( array(
    'selector' => '.footer-nav .menu-item a:hover',
    'styles' => array(
         'color: %s;' => get_theme_mod( 'taproot_footer_nav_menu_item_hover_color' ),
     ),
));

