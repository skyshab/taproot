<?php
/**
 * Add customizer controls to the navigation panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Panel: Navigation
 $wp_customize->add_panel( 'navigation', array(
    'priority' => 40,
    'title' => esc_html__( 'Navigation', 'taproot' ),
    'description' =>  esc_html__( 'Control settings and styles for theme navigation areas.', 'taproot' ),
));

    // Tabs: Top Nav
    $rootstrap->customizer_tabs( $wp_customize, 'taproot_nav_topnav', array(
        'title' => esc_html__( 'Top Nav', 'taproot' ),
        'priority' => 10,
        'panel' => 'navigation',
        'tabs' => array(
            'taproot_nav_topnav' => 'Default',
            'taproot_nav_topnav[mobile]' => 'Mobile',
            'taproot_nav_topnav[fixed]' => 'Fixed',
        ),
    ));

        /*
        **  Tab: taproot_nav_topnav
        */


        // Color Setting: Background Color
        taproot_customizer_color( $wp_customize, 'taproot_topnav_background', array(
            'label'   => esc_html__( 'Background Color', 'taproot' ),
            'section' => 'taproot_nav_topnav',  
        ));


        // Color Setting: Topnav Text Color
        taproot_customizer_color( $wp_customize, 'taproot_topnav_default_color', array(
            'label'   => esc_html__( 'Text Color', 'taproot' ),
            'section' => 'taproot_nav_topnav',  
        ));


        // Color Setting: Topnav Text Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_topnav_default_color_hover', array(
            'label'   => esc_html__( 'Link Hover Color', 'taproot' ),
            'section' => 'taproot_nav_topnav',  
        ));


        // Setting: Topnav Font
        $wp_customize->add_setting( 'taproot_topnav_font', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_topnav_font', array(
            'type' => 'select',
            'section' => 'taproot_nav_topnav',
            'label' => esc_html__( 'Font Family', 'taproot' ),
            'choices' => taproot_get_font_choices(),        
        ));


        // Setting: Top Nav Font Style
        $wp_customize->add_setting( 'taproot_topnav_font_style', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Font_Styles( $wp_customize, 'taproot_topnav_font_style', array(
            'type' => 'font_styles',
            'section' => 'taproot_nav_topnav',
            'label' => esc_html__( 'Top Nav Font Style', 'taproot' ),        
        )));


        // Setting: Topnav Font Size
        $wp_customize->add_setting( 'taproot_topnav_font_size', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_topnav_font_size', array(
            'type' => 'range',
            'section' => 'taproot_nav_topnav',
            'label' => esc_html__( 'Text Font Size', 'taproot' ),
            'input_attrs' => array(
                'min'  => 12,
                'max'  => 32,
                'step' => 1
            ),      
        )));


        // Setting: Topnav Height       
        $wp_customize->add_setting( 'taproot_topnav_height', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_topnav_height', array(
            'type' => 'range',
            'section' => 'taproot_nav_topnav',
            'label' => esc_html__( 'Menu Height', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0.2,
                'max'  => 3.2,
                'step' => 0.1
            ),      
        )));


        // Setting: Topnav Menu Item Spacing
        $wp_customize->add_setting( 'taproot_topnav_item_spacing', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_topnav_item_spacing', array(
            'type' => 'range',
            'section' => 'taproot_nav_topnav',
            'label' => esc_html__( 'Menu Item Spacing', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 3.2,
                'step' => 0.1
            ),     
        )));


        // Setting: Topnav Info - Phone
        $wp_customize->add_setting( 'taproot_topnav_info_phone', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'	=> 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_topnav_info_phone', array(
            'label' => esc_html__( 'Phone Number', 'taproot' ),
            'section' => 'taproot_nav_topnav',
            'type' => 'text'
        ));


        // Setting: Topnav Info - Email
        $wp_customize->add_setting( 'taproot_topnav_info_email', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport'	=> 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_topnav_info_email', array(
            'label' => esc_html__( 'Email Address', 'taproot' ),
            'section' => 'taproot_nav_topnav',
            'type' => 'text'
        ));


        // selective refresh for logo title and tagline
        if( isset( $wp_customize->selective_refresh ) )
        {
            $wp_customize->selective_refresh->add_partial( 'taproot_topnav_info_phone', array(
                'selector' => '.info-phone',
                'container_inclusive' => true,
                'render_callback' => 'taproot_customize_partial_phone_info',
            ) );

            $wp_customize->selective_refresh->add_partial( 'taproot_topnav_info_email', array(
                'selector' => '.info-email',
                'container_inclusive' => true,
                'render_callback' => 'taproot_customize_partial_email_info',
            ));
        }


        // Setting: Hide Topnav when desktop
        $wp_customize->add_setting( 'taproot_topnav_hide_when_not_mobile', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_topnav_hide_when_not_mobile', array(
            'type' => 'checkbox',
            'section' => 'taproot_nav_topnav',
            'label' => esc_html__( 'Hide Nav When Not Mobile', 'taproot' ),
        ));


        /*
        ** Tab: taproot_nav_topnav[mobile]
        */


        // Setting: Top Nav Mobile Breakpoint       
        $wp_customize->add_setting( 'taproot_topnav_mobile_breakpoint', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( 'taproot_topnav_mobile_breakpoint', array(
            'type' => 'select',
            'section' => 'taproot_nav_topnav[mobile]',
            'label' => esc_html__( 'Mobile Menu Breakpoint', 'taproot' ),
            'choices' => array(
                'bp-none' => esc_html__( 'Never Mobile', 'taproot' ),
                'bp-m' => esc_html__( 'Mobile Only', 'taproot' ),
                'bp-ml' => esc_html__( 'Mobile Landscape and under', 'taproot' ),
                'bp-t' => esc_html__( 'Tablet and under', 'taproot' ),
                'bp-l' => esc_html__( 'Laptop and under', 'taproot' ),
                'bp-always' => esc_html__( 'Always Mobile', 'taproot' ),
            ),       
        ));


        // Setting: Hide Topnav when mobile
        $wp_customize->add_setting( 'taproot_topnav_hide_when_mobile', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_topnav_hide_when_mobile', array(
            'type' => 'checkbox',
            'section' => 'taproot_nav_topnav[mobile]',
            'label' => esc_html__( 'Hide Nav When Mobile', 'taproot' ),       
        ));


        // Setting: Hide Topnave When Mobile Bar Is Active
        $wp_customize->add_setting( 'taproot_topnav_hide_when_mobile_bar', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_topnav_hide_when_mobile_bar', array(
            'type' => 'checkbox',
            'section' => 'taproot_nav_topnav[mobile]',
            'label' => esc_html__( 'Hide When Mobile Bar Is Active', 'taproot' ),
        ));


        /*
        **  Tab: taproot_nav_topnav[fixed]
        */


        // Setting: Show Topnav in Fixed Header
        $wp_customize->add_setting( 'taproot_topnav_display_when_fixed', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_topnav_display_when_fixed', array(
            'type' => 'checkbox',
            'section' => 'taproot_nav_topnav[fixed]',
            'label' => esc_html__( 'Display When Fixed Header', 'taproot' ),
        ));


        // Color Setting: Background Color
        taproot_customizer_color( $wp_customize, 'taproot_fixed_topnav_background', array(
            'label'   => esc_html__( 'Background Color', 'taproot' ),
            'section' => 'taproot_nav_topnav[fixed]',  
        ));


        // Color Setting: Topnav Text Color
        taproot_customizer_color( $wp_customize, 'taproot_fixed_topnav_default_color', array(
            'label'   => esc_html__( 'Text Color', 'taproot' ),
            'section' => 'taproot_nav_topnav[fixed]',  
        ));


        // Color Setting: Topnav Text Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_fixed_topnav_default_color_hover', array(
            'label'   => esc_html__( 'Link Hover Color', 'taproot' ),
            'section' => 'taproot_nav_topnav[fixed]',  
        ));


    // Tabs: Header Nav
    $rootstrap->customizer_tabs( $wp_customize, 'taproot_nav_header', array(
        'title' => esc_html__( 'Header Nav', 'taproot' ),
        'priority' => 10,
        'panel' => 'navigation',
        'tabs' => array(
            'taproot_nav_header' => 'Default',
            'taproot_nav_header[mobile]' => 'Mobile',
            'taproot_nav_header[fixed]' => 'Fixed',
        ),
    ));

        // Color Setting: Menu Item Color
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_menu_item_color', array(
            'label'   => esc_html__( 'Menu Item Color', 'taproot' ),
            'section' => 'taproot_nav_header',  
        ));


        // Color Setting: Menu Item Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_menu_item_color_hover', array(
            'label'   => esc_html__( 'Menu Item Hover Color', 'taproot' ),
            'section' => 'taproot_nav_header',  
        ));


        // Color Setting: Dropdown Menu Background Color
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_submenu_bkg_color', array(
            'label'   => esc_html__( 'Dropdown Menu Background Color', 'taproot' ),
            'section' => 'taproot_nav_header',  
        ));


        // Color Setting: Dropdown Menu Item Color
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_submenu_item_color', array(
            'label'   => esc_html__( 'Dropdown Menu Item Color', 'taproot' ),
            'section' => 'taproot_nav_header',  
        ));


        // Color Setting: Dropdown Menu Item Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_submenu_item_color_hover', array(
            'label'   => esc_html__( 'Dropdown Menu Item Color: Hover', 'taproot' ),
            'section' => 'taproot_nav_header',  
        ));


        // Setting: Enable Header Nav Pointers
        $wp_customize->add_setting( 'taproot_header_nav_enable_dropdown_pointers', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_header_nav_enable_dropdown_pointers', array(
            'type' => 'checkbox',
            'section' => 'taproot_nav_header',
            'label' => esc_html__( 'Enable Dropdown Pointers', 'taproot' ),
        ));


        // Setting: Header Nav Font
        $wp_customize->add_setting( 'taproot_header_nav_font', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_header_nav_font', array(
            'type' => 'select',
            'section' => 'taproot_nav_header',
            'label' => esc_html__( 'Font Family', 'taproot' ),
            'choices' => taproot_get_font_choices(),        
        ));


        // Setting: Header Nav Font Style
        $wp_customize->add_setting( 'taproot_header_nav_font_style', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Font_Styles( $wp_customize, 'taproot_header_nav_font_style', array(
            'type' => 'font_styles',
            'section' => 'taproot_nav_header',
            'label' => esc_html__( 'Header Nav Font Style', 'taproot' ),        
        )));


        // Setting: Header Nav Font Size
        $wp_customize->add_setting( 'taproot_header_nav_font_size', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_header_nav_font_size', array(
            'type' => 'range',
            'section' => 'taproot_nav_header',
            'label' => esc_html__( 'Menu Item Font Size', 'taproot' ),
            'input_attrs' => array(
                'min'  => 12,
                'max'  => 32,
                'step' => 1
            ),      
        )));


        // Setting: Header Nav Height
        $wp_customize->add_setting( 'taproot_header_nav_height', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_header_nav_height', array(
            'type' => 'range',
            'section' => 'taproot_nav_header',
            'label' => esc_html__( 'Menu Item Height', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0.2,
                'max'  => 3.2,
                'step' => 0.1
            ),     
        )));


        // Setting: Header Nav Menu Item Spacing
        $wp_customize->add_setting( 'taproot_header_nav_item_spacing', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_header_nav_item_spacing', array(
            'type' => 'range',
            'section' => 'taproot_nav_header',
            'label' => esc_html__( 'Menu Item Spacing', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 3.2,
                'step' => 0.1
            ),      
        )));


        // Setting: Header Nav Item Alignment
        $wp_customize->add_setting( 'taproot_header_nav_align', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_header_nav_align', array(
            'type' => 'select',
            'section' => 'taproot_nav_header',
            'label' => esc_html__( 'Menu Item Alignment', 'taproot' ),
            'choices' => array(
                'left' => esc_html__( 'Left', 'taproot' ),
                'right' => esc_html__( 'Right', 'taproot' ),
                'center' => esc_html__( 'Center', 'taproot' ),
                'fill' => esc_html__( 'Fill', 'taproot' ),
            ),        
        ));


        // Setting: Hide Header Nav when desktop
        $wp_customize->add_setting( 'taproot_header_nav_hide_when_not_mobile', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_header_nav_hide_when_not_mobile', array(
            'type' => 'checkbox',
            'section' => 'taproot_nav_header',
            'label' => esc_html__( 'Hide Nav When Not Mobile', 'taproot' ),
        ));


        /*
        **  Tab: taproot_nav_header[mobile]
        */


        // Setting: Header Nav Mobile Breakpoint       
        $wp_customize->add_setting( 'taproot_header_nav_mobile_breakpoint', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_header_nav_mobile_breakpoint', array(
            'type' => 'select',
            'section' => 'taproot_nav_header[mobile]',
            'label' => esc_html__( 'Mobile Menu Breakpoint', 'taproot' ),
            'choices' => array(
                'bp-none' => esc_html__( 'Never Mobile', 'taproot' ),
                'bp-m' => esc_html__( 'Mobile Only', 'taproot' ),
                'bp-ml' => esc_html__( 'Mobile Landscape and under', 'taproot' ),
                'bp-t' => esc_html__( 'Tablet and under', 'taproot' ),
                'bp-l' => esc_html__( 'Laptop and under', 'taproot' ),
                'bp-always' => esc_html__( 'Always Mobile', 'taproot' ),
            ),       
        ));


        // Setting: Hide Header Nav when mobile
        $wp_customize->add_setting( 'taproot_header_nav_hide_when_mobile', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_header_nav_hide_when_mobile', array(
            'type' => 'checkbox',
            'section' => 'taproot_nav_header[mobile]',
            'label' => esc_html__( 'Hide Nav When Mobile', 'taproot' ),
        ));


        // Setting: Hide Header Nav when mobile bar
        $wp_customize->add_setting( 'taproot_header_nav_hide_when_mobile_bar', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_header_nav_hide_when_mobile_bar', array(
            'type' => 'checkbox',
            'label' => esc_html__( 'Hide When Mobile Bar Is Active', 'taproot' ),
            'section' => 'taproot_nav_header[mobile]',
        ));


        // Setting: Header Nav Type
        $wp_customize->add_setting( 'taproot_header_nav_type', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_header_nav_type', array(
            'type' => 'select',
            'section' => 'taproot_nav_header[mobile]',
            'label' => esc_html__( 'Mobile Menu Type', 'taproot' ),
            'choices' => array(
                'dropdown-slide' => esc_html__( 'Dropdown - Slide', 'taproot' ),
                'dropdown-fade' => esc_html__( 'Dropdown - Fade', 'taproot' ),
                'slide' => esc_html__( 'Slide In', 'taproot' ),
                'fullscreen' => esc_html__( 'Fullscreen', 'taproot' ),
            ),       
        ));


        // Group Title: Mobile Menu Icon Styles
        taproot_customizer_section_title( $wp_customize, array(
            'id' => 'option_group_header_nav_mobile_menu_icon_mobile',
            'label' => esc_html__( 'Menu Icon Styles', 'taproot' ),
            'section' => 'taproot_nav_header[mobile]'
        ));


        // Setting: Header Nav Mobile Icon Size
        $wp_customize->add_setting( 'taproot_header_nav_mobile_icon_size', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_header_nav_mobile_icon_size', array(
            'type' => 'range',
            'section' => 'taproot_nav_header[mobile]',
            'label' => esc_html__( 'Menu Icon Font Size', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0.6,
                'max'  => 3,
                'step' => 0.1
            ),      
        )));


        // Color Setting: Menu Icon Color
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_mobile_icon_color', array(
            'label'   => esc_html__( 'Menu Icon Color', 'taproot' ),
            'section' => 'taproot_nav_header[mobile]',  
        ));


        // Group Title: Mobile Menu Item Styles
        taproot_customizer_section_title( $wp_customize, array(
            'id' => 'option_group_header_nav_mobile_menu_items_mobile',
            'label' => esc_html__( 'Menu Item Styles', 'taproot' ),
            'section' => 'taproot_nav_header[mobile]'
        ));


        // Color Setting: Header Nav Background Color
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_mobile_background', array(
            'label'   => esc_html__( 'Mobile Menu Background Color', 'taproot' ),
            'section' => 'taproot_nav_header[mobile]',  
        ));


        // Color Setting: Header Nav Mobile Menu Separator Color
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_mobile_separator_color', array(
            'label'   => esc_html__( 'Mobile Menu Separator Color', 'taproot' ),
            'section' => 'taproot_nav_header[mobile]',  
        ));


        // Color Setting: Menu Item Color
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_mobile_item_color', array(
            'label'   => esc_html__( 'Menu Item Color', 'taproot' ),
            'section' => 'taproot_nav_header[mobile]',  
        ));


        // Setting: Header Nav Mobile Menu Item Height 
        $wp_customize->add_setting( 'taproot_header_nav_mobile_dropdown_item_height', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_header_nav_mobile_dropdown_item_height', array(
            'type' => 'range',
            'section' => 'taproot_nav_header[mobile]',
            'label' => esc_html__( 'Mobile Menu Item Height', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 2,
                'step' => 0.1
            ),      
        )));


        // Setting: Header Nav Mobile Menu Item Gutter
        $wp_customize->add_setting( 'taproot_header_nav_mobile_dropdown_item_padding', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_header_nav_mobile_dropdown_item_padding', array(
            'type' => 'range',
            'section' => 'taproot_nav_header[mobile]',
            'label' => esc_html__( 'Mobile Menu Item Padding', 'taproot' ),
            'input_attrs' => array(
                'min' => 0,
                'max' => 5,
                'step' => 0.1
            ),       
        )));


        // Group Title: Mobile Menu Item Styles:hover
        taproot_customizer_section_title( $wp_customize, array(
            'id' => 'option_group_header_nav_mobile_menu_items_mobile_hover',
            'label' => esc_html__( 'Menu Item Hover Styles', 'taproot' ),
            'section' => 'taproot_nav_header[mobile]'
        ));


        // Color Setting: Header Nav Mobile Menu Background Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_mobile_bkg_color_hover', array(
            'label'   => esc_html__( 'Mobile Menu Background: Hover', 'taproot' ),
            'section' => 'taproot_nav_header[mobile]',  
        ));


        // Color Setting: Header Nav Mobile Menu Font Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_mobile_item_color_hover', array(
            'label'   => esc_html__( 'Mobile Menu Text Color: Hover', 'taproot' ),
            'section' => 'taproot_nav_header[mobile]',  
        ));


        // Color Setting: Mobile Menubar Background
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_mobile_menubar_background', array(
            'label'   => esc_html__( 'Mobile Menu Bar Background Color', 'taproot' ),
            'section' => 'taproot_nav_header[mobile]',  
        ));


        /*
        **  Tab: taproot_nav_header[fixed]
        */


        // Setting: Show Navbar in Fixed Header
        $wp_customize->add_setting( 'taproot_header_nav_display_when_fixed', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_header_nav_display_when_fixed', array(
            'label' => esc_html__( 'Display When Fixed Header', 'taproot' ),
            'section' => 'taproot_nav_header[fixed]',
            'type' => 'checkbox',
        ));


        // Color Setting: Menu Item Color
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_menu_item_color_fixed', array(
            'label'   => esc_html__( 'Menu Item Color', 'taproot' ),
            'section' => 'taproot_nav_header[fixed]',  
        ));


        // Color Setting: Menu Item Hover Color
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_menu_item_color_hover_fixed', array(
            'label'   => esc_html__( 'Menu Item Hover Color', 'taproot' ),
            'section' => 'taproot_nav_header[fixed]',  
        ));


        // Setting: Header Nav Font Size
        $wp_customize->add_setting( 'taproot_header_nav_font_size_fixed', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_header_nav_font_size_fixed', array(
            'type' => 'range',
            'section' => 'taproot_nav_header[fixed]',
            'label' => esc_html__( 'Menu Item Font Size', 'taproot' ),
            'input_attrs' => array(
                'min'  => 12,
                'max'  => 32,
                'step' => 1
            ),      
        ))); 


        // Setting: Header Nav Height
        $wp_customize->add_setting( 'taproot_header_nav_height_fixed', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_header_nav_height_fixed', array(
            'type' => 'range',
            'section' => 'taproot_nav_header[fixed]',
            'label' => esc_html__( 'Menu Item Height', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0.2,
                'max'  => 3.2,
                'step' => 0.1
            ),     
        ))); 


        // Setting: Header Nav Menu Item Spacing
        $wp_customize->add_setting( 'taproot_header_nav_item_spacing_fixed', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_header_nav_item_spacing_fixed', array(
            'type' => 'range',
            'section' => 'taproot_nav_header[fixed]',
            'label' => esc_html__( 'Menu Item Spacing', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 3.2,
                'step' => 0.1
            ),     
        ))); 


        // Color Setting: Dropdown Menu Background Color
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_fixed_submenu_bkg_color', array(
            'label'   => esc_html__( 'Dropdown Menu Background Color', 'taproot' ),
            'section' => 'taproot_nav_header[fixed]',  
        ));


        // Color Setting: Dropdown Menu Item Color
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_fixed_submenu_item_color', array(
            'label'   => esc_html__( 'Dropdown Menu Item Color', 'taproot' ),
            'section' => 'taproot_nav_header[fixed]',  
        ));


        // Color Setting: Dropdown Menu Item Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_header_nav_fixed_submenu_item_color_hover', array(
            'label'   => esc_html__( 'Dropdown Menu Item Color: Hover', 'taproot' ),
            'section' => 'taproot_nav_header[fixed]',  
        ));


        // Setting: Header Nav Item Alignment
        $wp_customize->add_setting( 'taproot_header_nav_align_fixed', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_header_nav_align_fixed', array(
            'type' => 'select',
            'section' => 'taproot_nav_header[fixed]',
            'label' => esc_html__( 'Menu Item Alignment', 'taproot' ),
            'choices' => array(
                'left' => esc_html__( 'Left', 'taproot' ),
                'right' => esc_html__( 'Right', 'taproot' ),
                'center' => esc_html__( 'Center', 'taproot' ),
                'fill' => esc_html__( 'Fill', 'taproot' ),
            ),       
        ));


    // Tabs: Navbar
    $rootstrap->customizer_tabs( $wp_customize, 'taproot_nav_navbar', array(
        'title' => esc_html__( 'Navbar', 'taproot' ),
        'priority' => 10,
        'panel' => 'navigation',
        'tabs' => array(
            'taproot_nav_navbar' => 'Default',
            'taproot_nav_navbar[mobile]' => 'Mobile',
            'taproot_nav_navbar[fixed]' => 'Fixed',
        ),
    ));

        /*
        **  Tab: taproot_nav_navbar
        */


        // Color Setting: Background Color
        taproot_customizer_color( $wp_customize, 'taproot_navbar_background', array(
            'label'   => esc_html__( 'Background Color', 'taproot' ),
            'section' => 'taproot_nav_navbar',  
        ));


        // Color Setting: Menu Item Color
        taproot_customizer_color( $wp_customize, 'taproot_navbar_menu_item_color', array(
            'label'   => esc_html__( 'Menu Item Color', 'taproot' ),
            'section' => 'taproot_nav_navbar',  
        ));


        // Color Setting: Menu Item Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_navbar_menu_item_color_hover', array(
            'label'   => esc_html__( 'Menu Item Hover Color', 'taproot' ),
            'section' => 'taproot_nav_navbar',  
        ));        


        // Setting: Navbar Font
        $wp_customize->add_setting( 'taproot_navbar_font', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_navbar_font', array(
            'label' => esc_html__( 'Font Family', 'taproot' ),
            'section' => 'taproot_nav_navbar',
            'active_callback' => '',
            'type' => 'select',
            'choices' => taproot_get_font_choices(),       
        ));


        // Setting: Navbar Font Style
        $wp_customize->add_setting( 'taproot_navbar_font_style', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Font_Styles( $wp_customize, 'taproot_navbar_font_style', array(
            'type' => 'font_styles',
            'section' => 'taproot_nav_navbar',
            'label' => esc_html__( 'Navbar Font Style', 'taproot' ),       
        )));


        // Setting: Navbar Font Size
        $wp_customize->add_setting( 'taproot_navbar_font_size', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_navbar_font_size', array(
            'type' => 'range',
            'section' => 'taproot_nav_navbar',
            'label' => esc_html__( 'Navbar Font Size', 'taproot' ),
            'input_attrs' => array(
                'min'  => 12,
                'max'  => 32,
                'step' => 1
            ),       
        )));


        // Color Setting: Dropdown Menu Background Color
        taproot_customizer_color( $wp_customize, 'taproot_navbar_submenu_bkg_color', array(
            'label'   => esc_html__( 'Dropdown Menu Background Color', 'taproot' ),
            'section' => 'taproot_nav_navbar',  
        ));


        // Color Setting: Dropdown Menu Item Color
        taproot_customizer_color( $wp_customize, 'taproot_navbar_submenu_item_color', array(
            'label'   => esc_html__( 'Dropdown Menu Item Color', 'taproot' ),
            'section' => 'taproot_nav_navbar',  
        ));


        // Color Setting: Dropdown Menu Item Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_navbar_submenu_item_color_hover', array(
            'label'   => esc_html__( 'Dropdown Menu Item Color: Hover', 'taproot' ),
            'section' => 'taproot_nav_navbar',  
        ));


        // Setting: Enable Navbar Pointers
        $wp_customize->add_setting( 'taproot_navbar_enable_dropdown_pointers', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_navbar_enable_dropdown_pointers', array(
            'type' => 'checkbox',
            'section' => 'taproot_nav_navbar',
            'label' => esc_html__( 'Enable Dropdown Pointers', 'taproot' ),
        ));


        // Setting: Navbar Height
        $wp_customize->add_setting( 'taproot_navbar_height', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_navbar_height', array(
            'type' => 'range',
            'section' => 'taproot_nav_navbar',
            'label' => esc_html__( 'Menu Height', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0.2,
                'max'  => 3.2,
                'step' => 0.1
            ),     
        )));  

        // Setting: Navbar Menu Item Spacing
        $wp_customize->add_setting( 'taproot_navbar_item_spacing', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_navbar_item_spacing', array(
            'type' => 'range',
            'section' => 'taproot_nav_navbar',
            'label' => esc_html__( 'Menu Item Spacing', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 3.2,
                'step' => 0.1
            ),     
        )));  


        // Setting: Navbar Item Alignment
        $wp_customize->add_setting( 'taproot_navbar_align', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_navbar_align', array(
            'type' => 'select',
            'section' => 'taproot_nav_navbar',
            'label' => esc_html__( 'Menu Item Alignment', 'taproot' ),
            'choices' => array(
                'left' => esc_html__( 'Left', 'taproot' ),
                'right' => esc_html__( 'Right', 'taproot' ),
                'center' => esc_html__( 'Center', 'taproot' ),
                'fill' => esc_html__( 'Fill', 'taproot' ),
            ),      
        ));


        // Setting: Hide Navbar when desktop
        $wp_customize->add_setting( 'taproot_navbar_hide_when_not_mobile', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_navbar_hide_when_not_mobile', array(
            'type' => 'checkbox',
            'section' => 'taproot_nav_navbar',
            'label' => esc_html__( 'Hide Nav When Not Mobile', 'taproot' ),
        ));


        /*
        **  Tab: taproot_nav_navbar[mobile]
        */


        // Setting: Navbar Mobile Breakpoint
        $wp_customize->add_setting( 'taproot_navbar_mobile_breakpoint', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_navbar_mobile_breakpoint', array(
            'type' => 'select',
            'section' => 'taproot_nav_navbar[mobile]',
            'label' => esc_html__( 'Mobile Menu Breakpoint', 'taproot' ),
            'choices' => array(
                'bp-none' => esc_html__( 'Never Mobile', 'taproot' ),
                'bp-m' => esc_html__( 'Mobile Only', 'taproot' ),
                'bp-ml' => esc_html__( 'Mobile Landscape and under', 'taproot' ),
                'bp-t' => esc_html__( 'Tablet and under', 'taproot' ),
                'bp-l' => esc_html__( 'Laptop and under', 'taproot' ),
                'bp-always' => esc_html__( 'Always Mobile', 'taproot' ),
            ),       
        ));


        // Setting: Hide Navbar when mobile
        $wp_customize->add_setting( 'taproot_navbar_hide_when_mobile', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_navbar_hide_when_mobile', array(
            'type' => 'checkbox',
            'section' => 'taproot_nav_navbar[mobile]',
            'label' => esc_html__( 'Hide Nav When Mobile', 'taproot' ),
        ));


        // Setting: Hide Navbar when mobile bar 
        $wp_customize->add_setting( 'taproot_navbar_hide_when_mobile_bar', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_navbar_hide_when_mobile_bar', array(
            'type' => 'checkbox',
            'section' => 'taproot_nav_navbar[mobile]',
            'label' => esc_html__( 'Hide When Mobile Bar Is Active', 'taproot' ),
        ));


        // Setting: Navbar Nav Type
        $wp_customize->add_setting( 'taproot_navbar_nav_type', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( 'taproot_navbar_nav_type', array(
            'type' => 'select',
            'section' => 'taproot_nav_navbar[mobile]',
            'label' => esc_html__( 'Mobile Menu Type', 'taproot' ),
            'choices' => array(
                'dropdown-slide' => esc_html__( 'Dropdown - Slide', 'taproot' ),
                'dropdown-fade' => esc_html__( 'Dropdown - Fade', 'taproot' ),
                'slide' => esc_html__( 'Slide In', 'taproot' ),
                'fullscreen' => esc_html__( 'Fullscreen', 'taproot' ),
            ),       
        ));


        // Setting: Mobile Navbar Height
        $wp_customize->add_setting( 'taproot_navbar_height_mobile', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_navbar_height_mobile', array(
            'type' => 'range',
            'section' => 'taproot_nav_navbar[mobile]',
            'label' => esc_html__( 'Mobile Navbar Height', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0.2,
                'max'  => 2,
                'step' => 0.1
            ),      
        )));


        // Group Title: Mobile Menu Icon Styles
        taproot_customizer_section_title( $wp_customize, array(
            'id' => 'option_group_navbar_mobile_menu_icon_mobile',
            'label' => esc_html__( 'Menu Icon Styles', 'taproot' ),
            'section' => 'taproot_nav_navbar[mobile]'
        ));


        // Color Setting: Mobile Icon Color
        taproot_customizer_color( $wp_customize, 'taproot_navbar_mobile_icon_color', array(
            'label'   => esc_html__( 'Mobile Icon Color', 'taproot' ),
            'section' => 'taproot_nav_navbar[mobile]',  
        ));


        // Setting: Mobile Icon Size
        $wp_customize->add_setting( 'taproot_navbar_mobile_icon_size', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_navbar_mobile_icon_size', array(
            'type' => 'range',
            'section' => 'taproot_nav_navbar[mobile]',
            'label' => esc_html__( 'Mobile Icon Size', 'taproot' ),
            'input_attrs' => array(
                'min'  => 1,
                'max'  => 2,
                'step' => 0.1
            ),       
        )));


        // Group Title: Mobile Menu Item Styles
        taproot_customizer_section_title( $wp_customize, array(
            'id' => 'option_group_navbar_mobile_menu_items_mobile',
            'label' => esc_html__( 'Menu Item Styles', 'taproot' ),
            'section' => 'taproot_nav_navbar[mobile]'
        ));


        // Color Setting: Navbar Mobile Dropdown Background Color
        taproot_customizer_color( $wp_customize, 'taproot_navbar_mobile_dropdown_bkg', array(
            'label'   => esc_html__( 'Mobile Menu Background', 'taproot' ),
            'section' => 'taproot_nav_navbar[mobile]',  
        ));


        // Color Setting: Navbar Mobile Menu Separator Color
        taproot_customizer_color( $wp_customize, 'taproot_navbar_mobile_separator_color', array(
            'label'   => esc_html__( 'Mobile Menu Separator Color', 'taproot' ),
            'section' => 'taproot_nav_navbar[mobile]',  
        ));


        // Color Setting: Navbar Mobile Menu Text Color
        taproot_customizer_color( $wp_customize, 'taproot_navbar_mobile_item_color', array(
            'label'   => esc_html__( 'Mobile Menu Text Color', 'taproot' ),
            'section' => 'taproot_nav_navbar[mobile]',  
        ));


        // Setting: Navbar Mobile Menu Item Height
        $wp_customize->add_setting( 'taproot_navbar_mobile_dropdown_item_height', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_navbar_mobile_dropdown_item_height', array(
            'type' => 'range',
            'section' => 'taproot_nav_navbar[mobile]',
            'label' => esc_html__( 'Mobile Menu Item Height', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 2,
                'step' => 0.1
            ),     
        )));


        // Setting: Navbar Mobile Menu Item Gutter
        $wp_customize->add_setting( 'taproot_navbar_mobile_dropdown_item_padding', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_navbar_mobile_dropdown_item_padding', array(
            'type' => 'range',
            'section' => 'taproot_nav_navbar[mobile]',
            'label' => esc_html__( 'Mobile Menu Item Padding', 'taproot' ),
            'input_attrs' => array(
                'min' => 0,
                'max' => 5,
                'step' => 0.1
            ),    
        )));


        // Group Title: Mobile Menu Item Styles:hover
        taproot_customizer_section_title( $wp_customize, array(
            'id' => 'option_group_navbar_mobile_menu_items_mobile_hover',
            'label' => esc_html__( 'Menu Item Hover Styles', 'taproot' ),
            'section' => 'taproot_nav_navbar[mobile]'
        ));


        // Color Setting: Navbar Mobile Menu Background Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_navbar_mobile_bkg_color_hover', array(
            'label'   => esc_html__( 'Mobile Menu Background: Hover', 'taproot' ),
            'section' => 'taproot_nav_navbar[mobile]',  
        ));


        // Color Setting: Navbar Mobile Menu Font Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_navbar_mobile_item_color_hover', array(
            'label'   => esc_html__( 'Mobile Menu Text Color: Hover', 'taproot' ),
            'section' => 'taproot_nav_navbar[mobile]',  
        ));


        /*
         *  Tab: taproot_nav_navbar[fixed]
         */


        // Setting: Show Navbar in Fixed Header
        $wp_customize->add_setting( 'taproot_navbar_display_when_fixed', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_navbar_display_when_fixed', array(
            'type' => 'checkbox',
            'section' => 'taproot_nav_navbar[fixed]',
            'label' => esc_html__( 'Display When Fixed Header', 'taproot' ),
        ));


        // Color Setting: Fixed Navbar Background Color
        taproot_customizer_color( $wp_customize, 'taproot_fixed_navbar_background_color', array(
            'label'   => esc_html__( 'Fixed Navbar Background Color', 'taproot' ),
            'section' => 'taproot_nav_navbar[fixed]',  
        ));


        // Color Setting: Fixed Navbar Item Color
        taproot_customizer_color( $wp_customize, 'taproot_fixed_navbar_item_color', array(
            'label'   => esc_html__( 'Fixed Navbar Item Color', 'taproot' ),
            'section' => 'taproot_nav_navbar[fixed]',  
        ));


        // Color Setting: Fixed Navbar Item Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_fixed_navbar_item_color_hover', array(
            'label'   => esc_html__( 'Fixed Navbar Item Color: Hover', 'taproot' ),
            'section' => 'taproot_nav_navbar[fixed]',  
        ));  
        

        // Color Setting: Dropdown Menu Background Color
        taproot_customizer_color( $wp_customize, 'taproot_navbar_fixed_submenu_bkg_color', array(
            'label'   => esc_html__( 'Dropdown Menu Background Color', 'taproot' ),
            'section' => 'taproot_nav_navbar[fixed]',  
        ));


        // Color Setting: Dropdown Menu Item Color
        taproot_customizer_color( $wp_customize, 'taproot_navbar_fixed_submenu_item_color', array(
            'label'   => esc_html__( 'Dropdown Menu Item Color', 'taproot' ),
            'section' => 'taproot_nav_navbar[fixed]',  
        ));


        // Color Setting: Dropdown Menu Item Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_navbar_fixed_submenu_item_color_hover', array(
            'label'   => esc_html__( 'Dropdown Menu Item Color: Hover', 'taproot' ),
            'section' => 'taproot_nav_navbar[fixed]',  
        ));  



    /*
    **  Section Tabs: Footer Nav
    */


    $rootstrap->customizer_tabs( $wp_customize, 'taproot_footer_nav', array(
        'title'    => esc_html__( 'Footer Nav', 'taproot' ),
        'priority' => 100,
        'panel' => 'navigation',
        'tabs' => array(
            'taproot_footer_nav' => 'Default',
            'taproot_footer_nav[mobile]' => 'Mobile',
        ),
    ));

        /*
        **  Tab: taproot_footer_nav
        */


        // Color Setting: Background Color
        taproot_customizer_color( $wp_customize, 'taproot_footer_nav_background', array(
            'label'   => esc_html__( 'Background Color', 'taproot' ),
            'section' => 'taproot_footer_nav',  
        )); 


        // Color Setting: Menu Item Color
        taproot_customizer_color( $wp_customize, 'taproot_footer_nav_menu_item_color', array(
            'label'   => esc_html__( 'Menu Item Color', 'taproot' ),
            'section' => 'taproot_footer_nav',  
        )); 


        // Color Setting: Menu Item Hover Color
        taproot_customizer_color( $wp_customize, 'taproot_footer_nav_menu_item_hover_color', array(
            'label'   => esc_html__( 'Menu Item Hover Color', 'taproot' ),
            'section' => 'taproot_footer_nav',  
        )); 


        // Setting: Footer Nav Font        
        $wp_customize->add_setting( 'taproot_footer_nav_font', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_footer_nav_font', array(
            'type' => 'select',
            'section' => 'taproot_footer_nav',
            'label' => esc_html__( 'Font Family', 'taproot' ),
            'choices' => taproot_get_font_choices(),       
        ));


        // Setting: Footer Nav Font Style
        $wp_customize->add_setting( 'taproot_footer_nav_font_style', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Font_Styles( $wp_customize, 'taproot_footer_nav_font_style', array(
            'type' => 'font_styles',
            'section' => 'taproot_footer_nav',
            'label' => esc_html__( 'Footer Nav Font Style', 'taproot' ),      
        )));


        // Setting: Navbar Font Size
        $wp_customize->add_setting( 'taproot_footer_nav_font_size', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_footer_nav_font_size', array(
            'type' => 'range',
            'section' => 'taproot_footer_nav',
            'label' => esc_html__( 'Navbar Font Size', 'taproot' ),
            'input_attrs' => array(
                'min'  => 12,
                'max'  => 32,
                'step' => 1
            ),      
        )));


        // Setting: Navbar Menu Item Spacing
        $wp_customize->add_setting( 'taproot_footer_nav_item_spacing', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_footer_nav_item_spacing', array(
            'type' => 'range',
            'section' => 'taproot_footer_nav',
            'label' => esc_html__( 'Menu Item Spacing', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 3.2,
                'step' => 0.1
            ),     
        )));


        // Setting: Navbar Height
        $wp_customize->add_setting( 'taproot_footer_nav_height', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_footer_nav_height', array(
            'type' => 'range',
            'section' => 'taproot_footer_nav',
            'label' => esc_html__( 'Menu Height', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0.2,
                'max'  => 3.2,
                'step' => 0.1
            ),     
        )));


        // Setting: Navbar Item Alignment
        $wp_customize->add_setting( 'taproot_footer_nav_align', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_footer_nav_align', array(
            'type' => 'select',
            'section' => 'taproot_footer_nav',
            'label' => esc_html__( 'Menu Item Alignment', 'taproot' ),
            'choices' => array(
                'left' => esc_html__( 'Left', 'taproot' ),
                'right' => esc_html__( 'Right', 'taproot' ),
                'center' => esc_html__( 'Center', 'taproot' ),
                'fill' => esc_html__( 'Fill', 'taproot' ),
            ),       
        ));


        // Setting: Navbar Position
        $wp_customize->add_setting( 'taproot_footer_nav_position', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_footer_nav_position', array(
            'type' => 'select',
            'section' => 'taproot_footer_nav',
            'label' => esc_html__( 'Footer Nav Position', 'taproot' ),
            'choices' => array(
                'before' => esc_html__( 'Before Widget Area', 'taproot' ),
                'after' => esc_html__( 'After Widget Area', 'taproot' ),
                'bottom-bar' => esc_html__( 'Inside Bottom Bar', 'taproot' ),
            ),       
        ));


        /*
        **  Tab: taproot_footer_nav[mobile]
        */


        // Setting: Footer Nav Mobile Breakpoint 
        $wp_customize->add_setting( 'taproot_footer_nav_mobile_breakpoint', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( 'taproot_footer_nav_mobile_breakpoint', array(
            'type' => 'select',
            'section' => 'taproot_footer_nav[mobile]',
            'label' => esc_html__( 'Mobile Menu Breakpoint', 'taproot' ),
            'choices' => array(
                'bp-none' => esc_html__( 'Never Mobile', 'taproot' ),
                'bp-m' => esc_html__( 'Mobile Only', 'taproot' ),
                'bp-ml' => esc_html__( 'Mobile Landscape and under', 'taproot' ),
                'bp-t' => esc_html__( 'Tablet and under', 'taproot' ),
                'bp-l' => esc_html__( 'Laptop and under', 'taproot' ),
                'bp-always' => esc_html__( 'Always Mobile', 'taproot' ),
            ),       
        ));            