<?php
/**
 * Add customizer controls to the widgets panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// get sidebars
$sidebars_widgets = array_merge(
    array( 'wp_inactive_widgets' => array() ),
    array_fill_keys( array_keys( $GLOBALS['wp_registered_sidebars'] ), array() ),
    wp_get_sidebars_widgets()
);

// footer widgets have their own style controls
$sidebar_blacklist = array(
    'footer-1',
    'footer-2',
    'footer-3',
    'footer-4',
);

foreach ( $sidebars_widgets as $sidebar_id => $sidebar_widget_ids )
{
    // theme only
    if( !is_taproot_pro() && 'sidebar-1' !== $sidebar_id ) $sidebar_blacklist[] = $sidebar_id;

    $is_registered_sidebar = isset( $GLOBALS['wp_registered_sidebars'][$sidebar_id] );
    $is_inactive_widgets   = ( 'wp_inactive_widgets' === $sidebar_id );
    $is_active_sidebar     = ( $is_registered_sidebar && ! $is_inactive_widgets );

    // add settings to each sidebar
    if( $is_active_sidebar )
    {
        $section_id = sprintf( 'sidebar-widgets-%s', $sidebar_id );
        $styles_section_id = sprintf( '%s[tab-2]', $section_id );

        // if this is a footer widget, print widgets title and skip to next sidebar
        if( in_array( $sidebar_id, $sidebar_blacklist ) && $wp_customize->get_section( $section_id ) )
        {
            $wp_customize->get_section( $section_id )->description = "<label class='customize-control-title'>Widgets</label>";
            continue;
        }

        // sidebar setting ids
        $aside_width_id = sprintf( 'taproot_%s_width', $sidebar_id );
        $aside_gutter_width_id = sprintf( 'taproot_%s_gutter_width', $sidebar_id );        
        $aside_bkg_setting_id = sprintf( 'taproot_%s_bkg', $sidebar_id );
        $aside_text_color_setting_id = sprintf( 'taproot_%s_text', $sidebar_id );
        $aside_heading_color_setting_id = sprintf( 'taproot_%s_heading', $sidebar_id );
        $aside_action_color_setting_id = sprintf( 'taproot_%s_action', $sidebar_id );
        $aside_action_color_hover_setting_id = sprintf( 'taproot_%s_action_hover', $sidebar_id );
        $aside_accent_color_setting_id = sprintf( 'taproot_%s_accent_color', $sidebar_id );
        $aside_accent_text_color_setting_id = sprintf( 'taproot_%s_accent_text_color', $sidebar_id );
        $aside_separator_color_setting_id = sprintf( 'taproot_%s_separator_color', $sidebar_id );


        // Rootstrap Tabs: Widget Styles
        $rootstrap->customizer_tabs( $wp_customize, $section_id, array(
            'priority' => 10,
            'panel' => 'widgets',
            'tabs' => array(
                $section_id => 'Widgets',
                $styles_section_id => 'Styles',
            ),
        ));


        // Setting: Sidebar Width
        $wp_customize->add_setting( $aside_width_id , array(
            'default' => get_theme_mod( 'taproot_sidebar-1_width', 30 ),
            'transport' => 'postMessage',
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        ));

        $wp_customize->add_control( new Taproot_Range_Option ( $wp_customize, $aside_width_id , array(
            'label' => esc_html__( 'Custom Sidebar Width', 'taproot' ),
            'section' => $styles_section_id,
            'type' => 'range',
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 50,
                'step' => 1
            ),
        )));


        // Setting: Sidebar Gutter
        taproot_setting( $wp_customize, $aside_gutter_width_id, array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
                'default' => 0,
            ),
            'control' => array(
                'type' => 'range',
                'section' => $styles_section_id,
                'label' => esc_html__( 'Sidebar Gutter', 'taproot' ),
                'input_attrs' => array(
                    'min'  => 0,
                    'max'  => 20,
                    'step' => 1
                ),
            ),
        ));




        // Color Setting: Aside Background Color
        taproot_customizer_color( $wp_customize, $aside_bkg_setting_id, array(
            'label' => esc_html__( 'Background Color', 'taproot' ),
            'section' => $styles_section_id,  
            'priority' => 40,
        ));


        // Color Setting: Aside Text Color
        taproot_customizer_color( $wp_customize, $aside_text_color_setting_id, array(
            'label' => esc_html__( 'Text Color', 'taproot' ),
            'section' => $styles_section_id,  
            'priority' => 50,
        ));        


        // Color Setting: Aside Heading Color
        taproot_customizer_color( $wp_customize, $aside_heading_color_setting_id, array(
            'label' => esc_html__( 'Heading Color', 'taproot' ),
            'section' => $styles_section_id,  
            'priority' => 60,
        ));  


        // Color Setting: Aside Link Color
        taproot_customizer_color( $wp_customize, $aside_action_color_setting_id, array(
            'label' => esc_html__( 'Link Color', 'taproot' ),
            'section' => $styles_section_id,  
            'priority' => 70,
        )); 


        // Color Setting: Aside Link Color Hover
        taproot_customizer_color( $wp_customize, $aside_action_color_hover_setting_id, array(
            'label' => esc_html__( 'Link Color Hover', 'taproot' ),
            'section' => $styles_section_id,  
            'priority' => 80,
        )); 


        // Color Setting: Aside Accent Color
        taproot_customizer_color( $wp_customize, $aside_accent_color_setting_id, array(
            'label' => esc_html__( 'Accent Color', 'taproot' ),
            'section' => $styles_section_id,  
            'priority' => 90,
        ));  


        // Color Setting: Aside Accent Text Color
        taproot_customizer_color( $wp_customize, $aside_accent_text_color_setting_id, array(
            'label' => esc_html__( 'Accent Text Color', 'taproot' ),
            'section' => $styles_section_id,  
            'priority' => 100,
        )); 

        // Color Setting: Aside Accent Separator Color
        taproot_customizer_color( $wp_customize, $aside_separator_color_setting_id, array(
            'label' => esc_html__( 'Separator Color', 'taproot' ),
            'section' => $styles_section_id,  
            'priority' => 110,
        ));         

    } // end if

} // end foreach sidebar
