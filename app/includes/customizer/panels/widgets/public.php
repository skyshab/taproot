<?php
/**
 * Generate styles from the customizer controls in the widgets panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

$registered_sidebars = $GLOBALS['wp_registered_sidebars'];

if( isset( $_REQUEST['taproot-export-css'] ) )
{
    $sidebars = $registered_sidebars;
}
else
{
    $sidebars = array();
    $the_sidebar = taproot_get_sidebar();
    if( isset( $registered_sidebars[ $the_sidebar ] ) )
    {
        $current = $registered_sidebars[ $the_sidebar ];
    }
    else
    {
        return;
    }

    $sidebars[$the_sidebar] = $current;
}


if( !isset( $sidebars['sidebar-1'] ) ) $sidebars['sidebar-1'] = array();

foreach ( $sidebars as $sidebar => $args )
{
    $is_active_sidebar = ( isset( $registered_sidebars[$sidebar] ) && 'wp_inactive_widgets' !== $sidebar );

    if( !is_taproot_pro() && 'sidebar-1' !== $sidebar || ! $is_active_sidebar ) continue;

    $display_id = ( 'sidebar-1' === $sidebar ) ? '.sidebar' : sprintf( '.sidebar.sidebar--%s', $sidebar );

    $main_id = ( 'sidebar-1' === $sidebar ) ? '.main' : sprintf( '.main.main--has-sidebar--%s', $sidebar );

    $sidebar_width_setting = get_theme_mod( sprintf( 'taproot_%s_width', $sidebar ) );

    if( $sidebar_width_setting && '' !== $sidebar_width_setting )
    {
        $sidebar_width = intval( $sidebar_width_setting );
        $main_width = ( 100 - $sidebar_width );

        // sidebar width
        $styles->set_style( array(
            'screen' => 'laptop-and-up',
            'selector' => $display_id,
            'styles' => array(
                'width: %s%;' => get_theme_mod( sprintf( 'taproot_%s_width', $sidebar ) ),
            ),
        ));

        // main width
        $styles->set_style( array(
            'screen' => 'laptop-and-up',
            'selector' => $main_id,
            'styles' => array(
                'width: %s%;' => $main_width,
            ),
        ));        
    }


    // sidebar gutter

    $styles->set_style( array(
        'screen' => 'laptop-and-up',
        'selector' => '.main--has-sidebar--right, .sidebar--left',
        'styles' => array(
            'padding-right: %s%;' => get_theme_mod( sprintf( 'taproot_%s_gutter_width', $sidebar ) ),
        ),
    ));

    $styles->set_style( array(
        'screen' => 'laptop-and-up',
        'selector' => '.main--has-sidebar--left, .sidebar--right',
        'styles' => array(
            'padding-left: %s%;' => get_theme_mod( sprintf( 'taproot_%s_gutter_width', $sidebar ) ),
        ),
    ));



    // sidebar background
    $sidebar_bkg = get_theme_mod( sprintf( 'taproot_%s_bkg', $sidebar ) );

    $styles->set_style( array(
        'selector' => sprintf( '%s.layout-boxed', $display_id ),
        'styles' => array(
            'background-color: %s;' => $sidebar_bkg ,
        ),
    ));
    $styles->set_style( array(
        'screen' => 'tablet-and-under',
        'selector' => sprintf( '%s.layout-full', $display_id ),
        'styles' => array(
            'background-color: %s;' => $sidebar_bkg ,
        ),
    ));
    $styles->set_style( array(
        'screen' => 'laptop-and-up',
        'selector' => sprintf( '.layout-full%s:before', $display_id ),
        'styles' => array(
            'background-color: %s;' => $sidebar_bkg ,
        ),
    ));


    // Text color
    $styles->set_style( array(
        'selector' => $display_id,
        'styles' => array(
            'color: %s;' => get_theme_mod( sprintf( 'taproot_%s_text', $sidebar ) ),
        ),
    ));

    // Headings color
    $styles->set_style( array(
        'selector' => str_replace( '%s', $display_id, '%s h1, %s h2, %s h3, %s h4, %s h5, %s h6' ),
        'styles' => array(
            'color: %s;' => get_theme_mod( sprintf( 'taproot_%s_heading', $sidebar ) ),
        ),
    ));



    // link colors
    $styles->set_style( array(
        'selector' => str_replace('%s', $display_id, '%s a, %s a:visited'),
        'styles' => array(
            'color: %s;' => get_theme_mod( sprintf( 'taproot_%s_action', $sidebar ) ),
        ),
    ));
    $styles->set_style( array(
        'selector' => sprintf('%s a:hover', $display_id ),
        'styles' => array(
            'color: %s;' => get_theme_mod( sprintf( 'taproot_%s_action_hover', $sidebar ) ),
        ),
    ));
    $styles->set_style( array(
        'selector' => sprintf('%s a:active', $display_id ),
        'styles' => array(
            'color: %s;' => get_theme_mod( sprintf( 'taproot_%s_action_active', $sidebar ) ),
        ),
    ));

    // Button Colors
    $styles->set_style( array(
        'selector' => sprintf('%s .button', $display_id),
        'styles' => array(
            'background: %s; color: white!important;' => get_theme_mod( sprintf( 'taproot_%s_action', $sidebar ) ),
        ),
    ));
    $styles->set_style( array(
        'selector' => sprintf('%s .button:hover', $display_id),
        'styles' => array(
            'background: %s; color: white!important;' => get_theme_mod( sprintf( 'taproot_%s_action_hover', $sidebar ) ),
        ),
    ));


    // Accent Colors

    $styles->set_style( array(
        'selector' => str_replace('%s', $display_id, '%s .taproot-search__button' ),
        'styles' => array(
            'color: %s;' => get_theme_mod( sprintf( 'taproot_%s_accent_color', $sidebar ) ),
        ),
    ));

    $styles->set_style( array(
        'selector' => str_replace('%s', $display_id, '%s .taproot-search__button .icon' ),
        'styles' => array(
            'color: %s;' => get_theme_mod( sprintf( 'taproot_%s_accent_text_color', $sidebar ) ),
        ),
    ));    

    $styles->set_style( array(
        'selector' => str_replace('%s', $display_id, '%s .calendar_wrap caption, %s .widget_archive select, %s .widget_categories select' ),
        'styles' => array(
            'background-color: %s;' => get_theme_mod( sprintf( 'taproot_%s_accent_color', $sidebar ) ),
            'color: %s;' => get_theme_mod( sprintf( 'taproot_%s_accent_text_color', $sidebar ) ),
        ),
    ));

    $styles->set_style( array(
        'selector' => str_replace('%s', $display_id, '%s .taproot-search__field, %s .calendar_wrap thead, %s .calendar_wrap tfoot td' ),
        'styles' => array(
            'border-color: %s;' => get_theme_mod( sprintf( 'taproot_%s_separator_color', $sidebar ) ),
        ),
    ));    

}
