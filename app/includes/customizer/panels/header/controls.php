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
        taproot_setting( $wp_customize, 'taproot_main_header_fullwidth', array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_checkbox',
            ),
            'control' => array(
                'type' => 'checkbox',
                'section' => 'taproot_header_styles',
                'label' => esc_html__( 'Enable Fullwidth Header', 'taproot' ),
            ),
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
        taproot_setting( $wp_customize, 'taproot_header_background_image', array(
            'setting' => array(),
            'control' => array(
                'type' => 'image',
                'section' => 'taproot_header_styles',
                'label' => esc_html__( 'Background Image', 'taproot' ),
            ),
        ));


        // Setting: Header Background Image Repeat
        taproot_setting( $wp_customize, 'taproot_header_background_repeat', array(
            'setting' => array(),
            'control' => array(
                'type' => 'radio',
                'section' => 'taproot_header_styles',
                'label' => esc_html__( 'Background Repeat', 'taproot' ),
                'choices' => array(
                    'no-repeat' => esc_html__( 'No Repeat', 'taproot' ),
                    'repeat' => esc_html__( 'Tile', 'taproot' ),
                    'repeat-x' => esc_html__( 'Tile Horizontally', 'taproot' ),
                    'repeat-y' => esc_html__( 'Tile Vertically', 'taproot' ),
                ),
            ),
        ));


        // Setting: Header Background Image Size
        taproot_setting( $wp_customize, 'taproot_header_background_size', array(
            'setting' => array(),
            'control' => array(
                'label'	=> esc_html__( 'Background Size', 'taproot' ),
                'section' => 'taproot_header_styles',
                'type' => 'radio',
                'choices' => array(
                    'initial' => esc_html__( 'Initial', 'taproot' ),
                    'cover' => esc_html__( 'Cover', 'taproot' ),
                    'contain' => esc_html__( 'Contain', 'taproot' ),
                ),
            ),
        ));


        // Setting: Header Background Image Position
        taproot_setting( $wp_customize, 'taproot_header_background_position', array(
            'setting' => array(),
            'control' => array(
                'type' => 'radio',
                'section' => 'taproot_header_styles',
                'label' => esc_html__( 'Background Position', 'taproot' ),
                'choices' => array(
                    'center' => esc_html__( 'Center', 'taproot' ),
                    'left' => esc_html__( 'Left', 'taproot' ),
                    'right' => esc_html__( 'Right', 'taproot' ),
                ),
            ),
        ));


        /*
        **  Tab: taproot_header_styles[fixed]
        */


        // Setting: Enable Fixed Header
        taproot_setting( $wp_customize, 'taproot_main_header_display_when_fixed', array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_checkbox',
            ),
            'control' => array(
                'type' => 'checkbox',
                'section' => 'taproot_header_styles[fixed]',
                'label' => esc_html__( 'Enable Fixed Header', 'taproot' ),
            ),
        ));


        // Setting: Fixed Header Type
        taproot_setting( $wp_customize, 'taproot_fixed_header_type', array(
            'setting' => array(
                'transport' => 'refresh'
            ),
            'control' => array(
                'type' => 'select',
                'section' => 'taproot_header_styles[fixed]',
                'label' => esc_html__( 'Fixed Header Type', 'taproot' ),
                'choices' => array(
                    'fade' => esc_html__( 'Fade In', 'taproot' ),
                    'slide' => esc_html__( 'Slide In', 'taproot' ),
                    'sticky' => esc_html__( 'Sticky', 'taproot' ),
                ),
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
        taproot_setting( $wp_customize, 'taproot_fixed_header_background_image', array(
            'setting' => array(
                'sanitize_callback' => 'esc_url_raw',
            ),
            'control' => array(
                'type' => 'image',
                'section' => 'taproot_header_styles[fixed]',
                'label' => esc_html__( 'Background Image', 'taproot' ),
            ),
        ));        


        // Setting: Fixed Header Background Image Repeat
        taproot_setting( $wp_customize, 'taproot_fixed_header_background_repeat', array(
            'setting' => array(),
            'control' => array(
                'type' => 'radio',
                'section' => 'taproot_header_styles[fixed]',
                'label' => esc_html__( 'Background Repeat', 'taproot' ),
                'choices' => array(
                    'no-repeat' => esc_html__( 'No Repeat', 'taproot' ),
                    'repeat' => esc_html__( 'Tile', 'taproot' ),
                    'repeat-x' => esc_html__( 'Tile Horizontally', 'taproot' ),
                    'repeat-y' => esc_html__( 'Tile Vertically', 'taproot' ),
                ),
            ),
        ));


        // Setting: Fixed Header Background Image Size
        taproot_setting( $wp_customize, 'taproot_fixed_header_background_size', array(
            'setting' => array(),
            'control' => array(
                'type' => 'radio',
                'section' => 'taproot_header_styles[fixed]',
                'label' => esc_html__( 'Background Size', 'taproot' ),
                'choices' => array(
                    'initial' => esc_html__( 'Initial', 'taproot' ),
                    'cover' => esc_html__( 'Cover', 'taproot' ),
                    'contain' => esc_html__( 'Contain', 'taproot' ),
                ),
            ),
        ));


        // Setting: Fixed Header Background Image Position
        taproot_setting( $wp_customize, 'taproot_fixed_header_background_position', array(
            'setting' => array(),
            'control' => array(
                'type' => 'radio',
                'section' => 'taproot_header_styles[fixed]',
                'label' => esc_html__( 'Background Position', 'taproot' ),
                'choices' => array(
                    'center' => esc_html__( 'Center', 'taproot' ),
                    'left' => esc_html__( 'Left', 'taproot' ),
                    'right' => esc_html__( 'Right', 'taproot' ),
                ),
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
            taproot_setting( $wp_customize, 'taproot_enable_header_search', array(
                'setting' => array(
                    'sanitize_callback' => 'taproot_sanitize_checkbox',
                ),
                'control' => array(
                    'type' => 'checkbox',
                    'section' => 'taproot_search_styles',
                    'label' => esc_html__( 'Enable Header Search', 'taproot' ),
                ),
            ));


            // Color Setting: Header Search Color
            taproot_customizer_color( $wp_customize, 'taproot_header_search_color', array(
                'label'   => esc_html__( 'Search Color', 'taproot' ),
                'section' => 'taproot_search_styles',  
            ));


            // Setting: Header Search Size
            taproot_setting( $wp_customize, 'taproot_header_search_size', array(
                'setting' => array(
                    'sanitize_callback' => 'taproot_sanitize_range_slider_value',
                ),
                'control' => array(
                    'type'  => 'range',
                    'section' => 'taproot_search_styles',
                    'label' => esc_html__( 'Search Icon Size', 'taproot' ),
                    'input_attrs' => array(
                        'min'  => 8,
                        'max'  => 64,
                        'step' => 1
                    ),
                ),
            ));


            /*
            **  Fixed Header Search Settings
            */


            // Setting: Show Fixed Header Search
            taproot_setting( $wp_customize, 'taproot_enable_fixed_header_search', array(
                'setting' => array(
                    'sanitize_callback' => 'taproot_sanitize_checkbox',
                ),
                'control' => array(
                    'type' => 'checkbox',
                    'section' => 'taproot_search_styles[fixed]',
                    'label' => esc_html__( 'Show Search When Fixed', 'taproot' ),
                ),
            ));


            // Color Setting: Fixed Header Search Color
            taproot_customizer_color( $wp_customize, 'taproot_search_color_fixed', array(
                'label'   => esc_html__( 'Search Color', 'taproot' ),
                'section' => 'taproot_search_styles[fixed]',  
            ));


            // Setting: Fixed Header Search Size
            taproot_setting( $wp_customize, 'taproot_search_size_fixed', array(
                'setting' => array(
                    'sanitize_callback' => 'taproot_sanitize_range_slider_value',
                ),
                'control' => array(
                    'type' => 'range',
                    'section' => 'taproot_search_styles[fixed]',
                    'label' => esc_html__( 'Search Icon Size', 'taproot' ),
                    'input_attrs' => array(
                        'min'  => 8,
                        'max'  => 64,
                        'step' => 1
                    ),
                ),
            ));            
