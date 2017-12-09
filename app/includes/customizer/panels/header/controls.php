<?php
/**
 * Add customizer controls to the header panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Panel: Header
$wp_customize->add_panel( 'taproot_header', array(
    'priority' => 20,
    'title' => esc_html__( 'Header', 'taproot' ),
));

    // Tabs: Header Styles
    $rootstrap->customizer_tabs( $wp_customize, 'taproot_header_styles', array(
        'title' => esc_html__( 'Header Styles', 'taproot' ),
        'priority' => 10,
        'panel' => 'taproot_header',
        'tabs' => array(
            'taproot_header_styles' => 'Default',
            'taproot_header_styles[fixed]' => 'Fixed',
        ),
    ));

        /*
        **  Tab: taproot_header_styles
        */

        // Setting: Fullwidth Header       
        $wp_customize->add_setting( 'taproot_main_header_fullwidth', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_main_header_fullwidth', array(
            'type' => 'checkbox',
            'section' => 'taproot_header_styles',
            'label' => esc_html__( 'Enable Fullwidth Header', 'taproot' ),
        ));


        // Color Setting: Header Background Color
        taproot_customizer_color( $wp_customize, 'taproot_header_background_color', array(
            'label'   => esc_html__( 'Header Background Color', 'taproot' ),
            'section' => 'taproot_header_styles',  
        ));         


        // Color Setting: Header Default Color
        taproot_customizer_color( $wp_customize, 'taproot_header_default_color', array(
            'label'   => esc_html__( 'Header Default Color', 'taproot' ),
            'section' => 'taproot_header_styles',  
        )); 


        // Color Setting: Header Default Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_header_default_color_hover', array(
            'label'   => esc_html__( 'Header Default Color: Hover', 'taproot' ),
            'section' => 'taproot_header_styles',  
        )); 


        // Setting: Header Background Image
        $wp_customize->add_setting( 'taproot_header_background_image', array(
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'taproot_header_background_image', array(
            'type' => 'image',
            'section' => 'taproot_header_styles',
            'label' => esc_html__( 'Background Image', 'taproot' ),
        )));


        // Setting: Header Background Image Repeat
        $wp_customize->add_setting( 'taproot_header_background_repeat', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_header_background_repeat', array(
            'type' => 'radio',
            'section' => 'taproot_header_styles',
            'label' => esc_html__( 'Background Repeat', 'taproot' ),
            'choices' => array(
                'no-repeat' => esc_html__( 'No Repeat', 'taproot' ),
                'repeat' => esc_html__( 'Tile', 'taproot' ),
                'repeat-x' => esc_html__( 'Tile Horizontally', 'taproot' ),
                'repeat-y' => esc_html__( 'Tile Vertically', 'taproot' ),
            ),        
        ));


        // Setting: Header Background Image Size
        $wp_customize->add_setting( 'taproot_header_background_size', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_header_background_size', array(
            'label' => esc_html__( 'Background Size', 'taproot' ),
            'section' => 'taproot_header_styles',
            'type' => 'radio',
            'choices' => array(
                'initial' => esc_html__( 'Initial', 'taproot' ),
                'cover' => esc_html__( 'Cover', 'taproot' ),
                'contain' => esc_html__( 'Contain', 'taproot' ),
            ),        
        ));


        // Setting: Header Background Image Position
        $wp_customize->add_setting( 'taproot_header_background_position', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_header_background_position', array(
            'type' => 'radio',
            'section' => 'taproot_header_styles',
            'label' => esc_html__( 'Background Position', 'taproot' ),
            'choices' => array(
                'center' => esc_html__( 'Center', 'taproot' ),
                'left' => esc_html__( 'Left', 'taproot' ),
                'right' => esc_html__( 'Right', 'taproot' ),
            ),        
        ));


        /*
        **  Tab: taproot_header_styles[fixed]
        */


        // Setting: Enable Fixed Header
        $wp_customize->add_setting( 'taproot_main_header_display_when_fixed', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_main_header_display_when_fixed', array(
            'type' => 'checkbox',
            'section' => 'taproot_header_styles[fixed]',
            'label' => esc_html__( 'Enable Fixed Header', 'taproot' ),       
        ));


        // Setting: Fixed Header Type
        $wp_customize->add_setting( 'taproot_fixed_header_type', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( 'taproot_fixed_header_type', array(
            'type' => 'select',
            'section' => 'taproot_header_styles[fixed]',
            'label' => esc_html__( 'Fixed Header Type', 'taproot' ),
            'choices' => array(
                'fade' => esc_html__( 'Fade In', 'taproot' ),
                'slide' => esc_html__( 'Slide In', 'taproot' ),
                'sticky' => esc_html__( 'Sticky', 'taproot' ),
            ),       
        ));

        // Color Setting: Fixed Header Background Color
        taproot_customizer_color( $wp_customize, 'taproot_header_background_color_fixed', array(
            'label'   => esc_html__( 'Header Background Color', 'taproot' ),
            'section' => 'taproot_header_styles[fixed]',  
        )); 


        // Color Setting: Fixed Header Default Color
        taproot_customizer_color( $wp_customize, 'taproot_fixed_header_default_color', array(
            'label'   => esc_html__( 'Fixed Header Default Color', 'taproot' ),
            'section' => 'taproot_header_styles[fixed]',  
        )); 


        // Color Setting: Fixed Header Default Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_fixed_header_default_color_hover', array(
            'label'   => esc_html__( 'Fixed Header Default Color: Hover', 'taproot' ),
            'section' => 'taproot_header_styles[fixed]',  
        )); 


        // Setting: Fixed Header Background Image       
        $wp_customize->add_setting( 'taproot_fixed_header_background_image', array(
            'sanitize_callback' => 'esc_url_raw',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize,'taproot_fixed_header_background_image', array(
            'type' => 'image',
            'section' => 'taproot_header_styles[fixed]',
            'label' => esc_html__( 'Background Image', 'taproot' ),
        )));


        // Setting: Fixed Header Background Image Repeat
        $wp_customize->add_setting( 'taproot_fixed_header_background_repeat', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_fixed_header_background_repeat', array(
            'type' => 'radio',
            'section' => 'taproot_header_styles[fixed]',
            'label' => esc_html__( 'Background Repeat', 'taproot' ),
            'choices' => array(
                'no-repeat' => esc_html__( 'No Repeat', 'taproot' ),
                'repeat' => esc_html__( 'Tile', 'taproot' ),
                'repeat-x' => esc_html__( 'Tile Horizontally', 'taproot' ),
                'repeat-y' => esc_html__( 'Tile Vertically', 'taproot' ),
            ),        
        ));


        // Setting: Fixed Header Background Image Size
        $wp_customize->add_setting( 'taproot_fixed_header_background_size', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_fixed_header_background_size', array(
            'type' => 'radio',
            'section' => 'taproot_header_styles[fixed]',
            'label' => esc_html__( 'Background Size', 'taproot' ),
            'choices' => array(
                'initial' => esc_html__( 'Initial', 'taproot' ),
                'cover' => esc_html__( 'Cover', 'taproot' ),
                'contain' => esc_html__( 'Contain', 'taproot' ),
            ),       
        ));


        // Setting: Fixed Header Background Image Position
        $wp_customize->add_setting( 'taproot_fixed_header_background_position', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_fixed_header_background_position', array(
            'type' => 'radio',
            'section' => 'taproot_header_styles[fixed]',
            'label' => esc_html__( 'Background Position', 'taproot' ),
            'choices' => array(
                'center' => esc_html__( 'Center', 'taproot' ),
                'left' => esc_html__( 'Left', 'taproot' ),
                'right' => esc_html__( 'Right', 'taproot' ),
            ),        
        ));


    /*
    **  Tabs: Search
    */


    $rootstrap->customizer_tabs( $wp_customize, 'taproot_search_styles', array(
        'title'    => esc_html__( 'Search Styles', 'taproot' ),
        'priority' => 20,
        'panel' => 'taproot_header',
        'tabs' => array(
            'taproot_search_styles' => 'Default',
            'taproot_search_styles[fixed]' => 'Fixed',
        ),
    ));

            // Setting: Show Header Search
            $wp_customize->add_setting( 'taproot_enable_header_search', array(
                'sanitize_callback' => 'taproot_sanitize_checkbox',
                'transport' => 'postMessage',
            ));

            $wp_customize->add_control( 'taproot_enable_header_search', array(
                'type' => 'checkbox',
                'section' => 'taproot_search_styles',
                'label' => esc_html__( 'Enable Header Search', 'taproot' ),       
            ));


            // Color Setting: Header Search Color
            taproot_customizer_color( $wp_customize, 'taproot_header_search_color', array(
                'label'   => esc_html__( 'Search Color', 'taproot' ),
                'section' => 'taproot_search_styles',  
            ));


            // Setting: Header Search Size
            $wp_customize->add_setting( 'taproot_header_search_size', array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
                'transport' => 'postMessage',
            ));

            $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_header_search_size', array(
                'type'  => 'range',
                'section' => 'taproot_search_styles',
                'label' => esc_html__( 'Search Icon Size', 'taproot' ),
                'input_attrs' => array(
                    'min'  => 8,
                    'max'  => 64,
                    'step' => 1
                ),       
            )));


            /*
            **  Fixed Header Search Settings
            */


            // Setting: Show Fixed Header Search
            $wp_customize->add_setting( 'taproot_enable_fixed_header_search', array(
                'sanitize_callback' => 'taproot_sanitize_checkbox',
                'transport' => 'postMessage',
            ));

            $wp_customize->add_control( 'taproot_enable_fixed_header_search', array(
                'type' => 'checkbox',
                'section' => 'taproot_search_styles[fixed]',
                'label' => esc_html__( 'Show Search When Fixed', 'taproot' ),
            ));


            // Color Setting: Fixed Header Search Color
            taproot_customizer_color( $wp_customize, 'taproot_search_color_fixed', array(
                'label'   => esc_html__( 'Search Color', 'taproot' ),
                'section' => 'taproot_search_styles[fixed]',  
            ));


            // Setting: Fixed Header Search Size    
            $wp_customize->add_setting( 'taproot_search_size_fixed', array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
                'transport' => 'postMessage',
            ));

            $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_search_size_fixed', array(
                'type' => 'range',
                'section' => 'taproot_search_styles[fixed]',
                'label' => esc_html__( 'Search Icon Size', 'taproot' ),
                'input_attrs' => array(
                    'min'  => 8,
                    'max'  => 64,
                    'step' => 1
                ),      
            )));                   
