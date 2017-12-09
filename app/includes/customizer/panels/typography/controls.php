<?php
/**
 * Add customizer controls to the typography panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Panel: Typography
$wp_customize->add_panel( 'typography', array(
    'type' => 'responsive',
    'priority' => 50,
    'title' => esc_html__( 'Typography', 'taproot' ),
));

    // Rootstrap Tabs: Typographic Elements
    $rootstrap->customizer_tabs( $wp_customize, 'typographic_elements[body]', array(
        'priority' => 10,
        'panel' => 'typography',
        'title' => esc_html__( 'Typographic Elements', 'taproot' ),
        'tabs' => array(
            'typographic_elements[body]' => 'Body',
            'typographic_elements[heading]' => 'Headings',
            'typographic_elements[title]' => 'Post Title',
        ),
    ));

        // Setting:  Body Font
        $wp_customize->add_setting( 'taproot_body_font', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_body_font', array(
            'type' => 'select',
            'section' => 'typographic_elements[body]',
            'label' => esc_html__( 'Body Text Font', 'taproot' ),
            'choices' => taproot_get_font_choices(),       
        ));


        // Color Setting: Text Color
        taproot_customizer_color( $wp_customize, 'taproot_text_color', array(
            'label'   => esc_html__( 'Text Color', 'taproot' ),
            'section' => 'typographic_elements[body]',  
        ));


        // Setting: Line Height
        $wp_customize->add_setting( 'taproot_line_height', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_line_height', array(
            'type' => 'range',
            'section' => 'typographic_elements[body]',
            'label' => esc_html__( 'Line Height', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0.8,
                'max'  => 2.2,
                'step' => 0.1
            ),    
        ))); 


        // Setting: Heading Font
        $wp_customize->add_setting( 'taproot_heading_font', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_heading_font', array(
            'type' => 'select',
            'section' => 'typographic_elements[heading]',
            'label' => esc_html__( 'Heading Font', 'taproot' ),
            'choices' => taproot_get_font_choices(),     
        ));


        // Color Setting: Heading Color
        taproot_customizer_color( $wp_customize, 'taproot_heading_color', array(
            'label'   => esc_html__( 'Heading Color', 'taproot' ),
            'section' => 'typographic_elements[heading]',  
        ));


        // Setting: Headings Line Height
        $wp_customize->add_setting( 'taproot_heading_line_height', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_heading_line_height', array(
            'type' => 'range',
            'section' => 'typographic_elements[heading]',
            'label' => esc_html__( 'Heading Line Height', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0.8,
                'max'  => 2.2,
                'step' => 0.1
            ),     
        ))); 


        // Setting: Headings Font Style
        $wp_customize->add_setting( 'taproot_heading_font_style', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Font_Styles( $wp_customize, 'taproot_heading_font_style', array(
            'type' => 'font_styles',
            'section' => 'typographic_elements[heading]',
            'label' => esc_html__( 'Heading Font Style', 'taproot' ),      
        )));


        // Setting: Post Title Font
        $wp_customize->add_setting( 'taproot_post_title_font', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_post_title_font', array(
            'type' => 'select',
            'section' => 'typographic_elements[title]',
            'label' => esc_html__( 'Post Title Font', 'taproot' ),
            'choices' => taproot_get_font_choices(),       
        ));


        // Color Setting: Post Title Color
        taproot_customizer_color( $wp_customize, 'taproot_post_title_color', array(
            'label'   => esc_html__( 'Post Title Color', 'taproot' ),
            'section' => 'typographic_elements[title]',  
        ));


        // Setting: Post Title Line Height
        $wp_customize->add_setting( 'taproot_title_line_height', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_title_line_height', array(
            'label'       => esc_html__( 'Title Line Height', 'taproot' ),
            'section'     => 'typographic_elements[title]',
            'type'        => 'range',
            'input_attrs' => array(
                'min'  => 0.8,
                'max'  => 2.2,
                'step' => 0.1
            ),      
        )));


        // Setting: Post Title Font Style
        $wp_customize->add_setting( 'taproot_title_font_style', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Font_Styles( $wp_customize, 'taproot_title_font_style', array(
            'type' => 'font_styles',
            'section' => 'typographic_elements[title]',
            'label' => esc_html__( 'Title Font Style', 'taproot' ),     
        )));


        $devices = $rootstrap->get_devices();
        $section_priority = 20;

        foreach ( $devices as $device => $args )
        {
            $device_id = str_replace( '-', '_', $device );
            $uc_device = ucwords( str_replace( '-', ' ', $device ));
            $section_id = sprintf( 'typography_%s', $device_id );

            // Section
            $wp_customize->add_section( $section_id, array(
                'title' => $uc_device,
                'panel' => 'typography',
                'type' => sprintf( 'responsive-%s', $device ),
            ));

            // get previous and next devices
            $previous_device = $rootstrap->get_previous_device( $device );
            $previous_device = ( $previous_device ) ? 'typography_' . str_replace( '-', '_', $previous_device ) : 'na';
            $next_device = $rootstrap->get_next_device( $device );
            $next_device = ( $next_device ) ? 'typography_' . str_replace( '-', '_', $next_device ) : 'na';

            // Setting: Taproot Typography Screen Nav
            $wp_customize->add_setting( sprintf( 'typography_screen_nav_%s', $device_id ), array(
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control( new Taproot_Screen_Nav ( $wp_customize, sprintf( 'typography_screen_nav_%s', $device_id ), array(
                'section' => $section_id,
                'previous' => $previous_device,
                'next' => $next_device,
                'priority' => -20,
            )));


            /*
            ** laptop or desktop only
            */


            if( 'laptop' == $device || 'desktop' == $device )
            {
                // sidebar layout ids
                $sidebar_layout_section_id = sprintf( '%s[sidebar-layout]', $section_id );


                // Rootstrap Tabs: Typography Sidebar Layout
                $rootstrap->customizer_tabs( $wp_customize, $section_id, array(
                    'priority' => 10,
                    'panel' => 'typography',
                    'active_callback' => '',
                    'tabs' => array(
                        $section_id => esc_html__( 'Fullwidth', 'taproot' ),
                        $sidebar_layout_section_id => esc_html__( 'Two Column', 'taproot' ),
                    ),
                    'type' => sprintf( 'responsive-%s', $device ),
                ));


                // Setting: Taproot Branding Screen Nav
                $wp_customize->add_setting( sprintf( 'screen_nav_typography_sidebar_layout_%s', $device_id ), array(
                    'sanitize_callback' => 'sanitize_text_field',
                ));    
                            
                $wp_customize->add_control( new Taproot_Screen_Nav ( $wp_customize, sprintf( 'screen_nav_typography_sidebar_layout_%s', $device_id  ), array(
                    'section' => $sidebar_layout_section_id,
                    'previous' => $previous_device,
                    'next' => $next_device,
                    'priority' => -20,
                )));


                // Group Title: Body Text
                $wp_customize->add_setting( sprintf( 'option_group_body_text_sidebar_layout_%s', $device_id ), array(
                    'sanitize_callback' => 'sanitize_text_field',
                ));    
                    
                $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, sprintf( 'option_group_body_text_sidebar_layout_%s', $device_id ), array(
                    'label'	=> esc_html__( 'Body Text', 'taproot' ),
                    'section' => $sidebar_layout_section_id ,
                    'type' => 'taproot-option-group',
                )));


                // Setting: Font Size
                $wp_customize->add_setting( sprintf( 'taproot_sidebar_layout_font_size_%s', $device_id ), array(
                    'sanitize_callback' => 'taproot_sanitize_range_slider_value',
                    'transport' => 'postMessage',
                ));

                $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, sprintf( 'taproot_sidebar_layout_font_size_%s', $device_id ), array(
                    'type' => 'range',
                    'section' => $sidebar_layout_section_id ,
                    'label' => esc_html__( 'Font Size', 'taproot' ),
                    'input_attrs' => array(
                        'min'  => 12,
                        'max'  => 36,
                        'step' => 1
                    ),      
                )));                


                // Group Title: Headings
                $wp_customize->add_setting( sprintf( 'option_group_headings_sidebar_layout_%s', $device_id ), array(
                    'sanitize_callback' => 'sanitize_text_field',
                ));    
                    
                $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, sprintf( 'option_group_headings_sidebar_layout_%s', $device_id ), array(
                    'label' => esc_html__( 'Headings', 'taproot' ),
                    'section' => $sidebar_layout_section_id ,
                    'type' => 'taproot-option-group',
                )));


                // Setting: Headings Font Size 
                $wp_customize->add_setting( sprintf( 'taproot_sidebar_layout_heading_font_size_%s', $device_id ), array(
                    'sanitize_callback' => 'taproot_sanitize_range_slider_value',
                    'transport' => 'postMessage',
                ));

                $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, sprintf( 'taproot_sidebar_layout_heading_font_size_%s', $device_id ), array(
                    'type' => 'range',
                    'section' => $sidebar_layout_section_id,
                    'label' => esc_html__( 'Heading Size', 'taproot' ),
                    'input_attrs' => array(
                        'min'  => 1,
                        'max'  => 5,
                        'step' => 0.1
                    ),      
                )));


                // Group Title: Post Title
                $wp_customize->add_setting( sprintf( 'option_group_post_title_sidebar_layout_%s', $device_id ), array(
                    'sanitize_callback' => 'sanitize_text_field',
                ));    
                    
                $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, sprintf( 'option_group_post_title_sidebar_layout_%s', $device_id ), array(
                    'label' => esc_html__( 'Post Title', 'taproot' ),
                    'section' => $sidebar_layout_section_id,
                    'type' => 'taproot-option-group',
                )));


                // Setting: Title Font Size
                $wp_customize->add_setting( sprintf( 'taproot_sidebar_layout_post_title_font_size_%s', $device_id ), array(
                    'sanitize_callback' => 'taproot_sanitize_range_slider_value',
                    'transport' => 'postMessage',
                ));

                $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, sprintf( 'taproot_sidebar_layout_post_title_font_size_%s', $device_id ), array(
                    'type' => 'range',
                    'section' => $sidebar_layout_section_id,
                    'label' => esc_html__( 'Title Font Size', 'taproot' ),
                    'input_attrs' => array(
                        'min'  => 1,
                        'max'  => 5,
                        'step' => 0.1
                    ),       
                )));


                // Group Title: Sidebar
                $wp_customize->add_setting( sprintf( 'option_group_sidebar_%s', $device_id ), array(
                    'sanitize_callback' => 'sanitize_text_field',
                ));    
                    
                $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, sprintf( 'option_group_sidebar_%s', $device_id ), array(
                    'label' => esc_html__( 'Sidebar', 'taproot' ),
                    'section' => $sidebar_layout_section_id ,
                    'type' => 'taproot-option-group',
                )));


                // Setting: Sidebar Font Size
                $wp_customize->add_setting( sprintf( 'taproot_sidebar_layout_sidebar_font_size_%s', $device_id ), array(
                    'sanitize_callback' => 'taproot_sanitize_range_slider_value',
                    'transport' => 'postMessage',
                ));

                $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, sprintf( 'taproot_sidebar_layout_sidebar_font_size_%s', $device_id ), array(
                    'type' => 'range',
                    'section' => $sidebar_layout_section_id,
                    'label' => esc_html__( 'Sidebar Font Size', 'taproot' ),
                    'input_attrs' => array(
                        'min'  => 0.5,
                        'max'  => 1.5,
                        'step' => 0.1
                    ),      
                )));

            } // end laptop or desktop only


            /*
            ** all devices
            */


            // Group Title: Body Text
            $wp_customize->add_setting( sprintf( 'option_group_body_text_%s', $device_id ), array(
                'sanitize_callback' => 'sanitize_text_field',
            ));    
                    
            $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, sprintf( 'option_group_body_text_%s', $device_id ), array(
                'label' => esc_html__( 'Body Text', 'taproot' ),
                'section' => $section_id,
                'type' => 'taproot-option-group',
            )));


            // Setting: Font Size
            $wp_customize->add_setting( sprintf( 'taproot_font_size_%s', $device_id ), array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
                'transport' => 'postMessage',
            ));

            $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, sprintf( 'taproot_font_size_%s', $device_id ), array(
                'type' => 'range',
                'section' => $section_id,
                'label' => esc_html__( 'Font Size', 'taproot' ),
                'input_attrs' => array(
                    'min'  => 12,
                    'max'  => 36,
                    'step' => 1
                ),     
            )));


            // Group Title: Headings
            $wp_customize->add_setting( sprintf( 'option_group_headings_%s', $device_id ), array(
                'sanitize_callback' => 'sanitize_text_field',
            ));    
                    
            $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, sprintf( 'option_group_headings_%s', $device_id ), array(
                'label' => esc_html__( 'Headings', 'taproot' ),
                'section' => $section_id,
                'type' => 'taproot-option-group',
            )));


            // Setting: Heading Font Size
            $wp_customize->add_setting( sprintf( 'taproot_heading_font_size_%s', $device_id ), array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
                'transport' => 'postMessage',
            ));

            $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, sprintf( 'taproot_heading_font_size_%s', $device_id ), array(
                'type' => 'range',
                'section' => $section_id,
                'label' => esc_html__( 'Heading Size', 'taproot' ),
                'input_attrs' => array(
                    'min'  => 1,
                    'max'  => 5,
                    'step' => 0.1
                ),       
            )));


            // Group Title: Post Title
            $wp_customize->add_setting( sprintf( 'option_group_post_title_%s', $device_id ), array(
                'sanitize_callback' => 'sanitize_text_field',
            ));    
                    
            $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, sprintf( 'option_group_post_title_%s', $device_id ), array(
                'label' => esc_html__( 'Post Title', 'taproot' ),
                'section' => $section_id,
                'type' => 'taproot-option-group',
            )));


            // Setting: Title Font Size
            $wp_customize->add_setting( sprintf( 'taproot_post_title_font_size_%s', $device_id ), array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
                'transport' => 'postMessage',
            ));

            $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, sprintf( 'taproot_post_title_font_size_%s', $device_id ), array(
                'type' => 'range',
                'section' => $section_id,
                'label' => esc_html__( 'Title Font Size', 'taproot' ),
                'input_attrs' => array(
                    'min'  => 1,
                    'max'  => 5,
                    'step' => 0.1
                ),     
            )));

            $section_priority += 10;

        } // end foreach device
