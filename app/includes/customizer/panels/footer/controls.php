<?php
/**
 * Add customizer controls to the footer panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Panel: Layout
$wp_customize->add_panel( 'taproot_footer', array(
    'priority' => 60,
    'title' => esc_html__( 'Footer', 'taproot' ),
));

    // Section: General Settings
    $wp_customize->add_section( 'taproot_footer_styles', array(
        'title' => esc_html__( 'Footer Styles', 'taproot' ),
        'priority' => 10,
        'panel' => 'taproot_footer'
    ));

        // Setting: Footer layout
        taproot_setting( $wp_customize, 'taproot_footer_layout', array(
            'setting' => array(),
            'control' => array(
                'type' => 'select',
                'section' => 'taproot_footer_styles',
                'label' => esc_html__( 'Footer Layout', 'taproot' ),
                'choices' => array(
                    'quarters' => esc_html__( 'Quarters', 'taproot' ),
                    'thirds' => esc_html__( 'Thirds', 'taproot' ),
                    'halves' => esc_html__( 'Halves', 'taproot' ),
                    'full' => esc_html__( 'Full', 'taproot' ),
                    'one-third-two-thirds' => esc_html__( 'One Third / Two Thirds', 'taproot' ),
                    'two-thirds-one-third' => esc_html__( 'Two Thirds / One Third', 'taproot' ),
                    'quarter-quarter-half' => esc_html__( 'Quarter / Quarter / Half', 'taproot' ),
                    'half-quarter-quarter' => esc_html__( 'Half / Quarter / Quarter', 'taproot' ),
                ),
            ),
        ));        


        // Setting: Footer Style
        taproot_setting( $wp_customize, 'taproot_footer_style', array(
            'setting' => array(),
            'control' => array(
                'label' => esc_html__( 'Footer Style', 'taproot' ),
                'section' => 'taproot_footer_styles',
                'type' => 'select',
                'choices' => array(
                    'default' => esc_html__( 'Default', 'taproot' ),
                    'sticky' => esc_html__( 'Sticky', 'taproot' ),
                    'fixed' => esc_html__( 'Fixed', 'taproot' ),
                ),
            ),
        ));


        // Setting: Fullwidth Footer
        taproot_setting( $wp_customize, 'taproot_taproot_footer_fullwidth', array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_checkbox',
            ),
            'control' => array(
                'type' => 'checkbox',
                'section' => 'taproot_footer_styles',
                'label' => esc_html__( 'Enable Fullwidth Footer', 'taproot' ),
            ),
        ));


        // Setting: Footer Conainer Padding
        taproot_setting( $wp_customize, 'taproot_footer_container_padding', array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
                'type' => 'range',
                'section' => 'taproot_footer_styles',
                'label' => esc_html__( 'Footer Padding', 'taproot' ),
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 10,
                    'step' => 0.1
                ),
            ),
        ));


        // Setting: Footer Gutter Spacing
        taproot_setting( $wp_customize, 'taproot_footer_gutter_spacing', array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
                'type' => 'range',
                'section' => 'taproot_footer_styles',
                'label' => esc_html__( 'Widget Gutters', 'taproot' ),
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 8,
                    'step' => 0.1
                ),
            ),
        ));


        // Color Setting: Footer Background Color
        taproot_customizer_color( $wp_customize, 'taproot_footer_background_color', array(
            'label'   => esc_html__( 'Footer Background Color', 'taproot' ),
            'section' => 'taproot_footer_styles',  
        )); 


        // Color Setting: Footer Widget Heading Color
        taproot_customizer_color( $wp_customize, 'taproot_footer_widget_heading_color', array(
            'label'   => esc_html__( 'Heading Color', 'taproot' ),
            'section' => 'taproot_footer_styles',  
        )); 


        // Setting: Footer Widget Title Font Size
        taproot_setting( $wp_customize, 'taproot_footer_widget_title_font_size', array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
                'type' => 'range',
                'section' => 'taproot_footer_styles',
                'label' => esc_html__( 'Widget Title Font Size', 'taproot' ),
                'input_attrs' => array(
                    'min' => 0.8,
                    'max' => 3,
                    'step' => 0.1
                ),
            ),
        ));        


        // Color Setting: Footer Widget Text Color
        taproot_customizer_color( $wp_customize, 'taproot_footer_widget_text_color', array(
            'label'   => esc_html__( 'Text Color', 'taproot' ),
            'section' => 'taproot_footer_styles',  
        )); 


        // Setting: Footer Widget Text Font Size
        taproot_setting( $wp_customize, 'taproot_footer_widget_font_size', array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
                'type' => 'range',
                'section' => 'taproot_footer_styles',
                'label' => esc_html__( 'Widget Font Size', 'taproot' ),
                'input_attrs' => array(
                    'min'  => 12,
                    'max'  => 32,
                    'step' => 1
                ),
            ),
        ));


        // Color Setting: Footer Widget Link Color
        taproot_customizer_color( $wp_customize, 'taproot_footer_link_color', array(
            'label'   => esc_html__( 'Link Color', 'taproot' ),
            'section' => 'taproot_footer_styles',  
        )); 


        // Color Setting: Footer Widget Link Color
        taproot_customizer_color( $wp_customize, 'taproot_footer_link_color_hover', array(
            'label'   => esc_html__( 'Link Color Hover', 'taproot' ),
            'section' => 'taproot_footer_styles',  
        ));         


    // Section: Bottom Bar
    $wp_customize->add_section( 'taproot_bottom_bar', array(
        'title'    => esc_html__( 'Bottom Bar', 'taproot' ),
        'priority' => 10,
        'panel' => 'taproot_footer'
    ));

        // Color Setting: Bottom Bar Background Color
        taproot_customizer_color( $wp_customize, 'taproot_bottom_bar_background_color', array(
            'label'   => esc_html__( 'Bottom Bar Background Color', 'taproot' ),
            'section' => 'taproot_bottom_bar',  
        )); 


        // Color Setting: Bottom Bar Text Color
        taproot_customizer_color( $wp_customize, 'taproot_bottom_bar_text_color', array(
            'label'   => esc_html__( 'Text Color', 'taproot' ),
            'section' => 'taproot_bottom_bar',  
        )); 


        // Color Setting: Bottom Bar Text Color
        taproot_customizer_color( $wp_customize, 'taproot_bottom_bar_text_color_hover', array(
            'label'   => esc_html__( 'Text Color Hover', 'taproot' ),
            'section' => 'taproot_bottom_bar',  
        ));         


        // Setting: Bottom Bar Text Font Size
        taproot_setting( $wp_customize, 'taproot_bottom_bar_font_size', array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
                'type' => 'range',
                'section' => 'taproot_bottom_bar',
                'label' => esc_html__( 'Bottom Bar Font Size', 'taproot' ),
                'input_attrs' => array(
                    'min'  => 12,
                    'max'  => 32,
                    'step' => 1
                ),
            ),
        ));


        // Setting: Bottom Bar Height
        taproot_setting( $wp_customize, 'taproot_bottom_bar_height', array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
                'type' => 'range',
                'section' => 'taproot_bottom_bar',
                'label' => esc_html__( 'Bottom Bar Height', 'taproot' ),
                'input_attrs' => array(
                    'min'  => 0.2,
                    'max'  => 3.2,
                    'step' => 0.1
                ),
            ),
        ));


        // Setting: Bottom Bar Content
        $wp_customize->add_setting( 'taproot_bottom_bar_content', array(
            'type' => 'option',
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
            'default' => taproot_bottom_bar_default_content()
        ));

        $wp_customize->add_control( 'taproot_bottom_bar_content', array(
            'label' => esc_html__( 'Bottom Bar Content', 'taproot' ),
            'section' => 'taproot_bottom_bar',
            'type' => 'textarea',
        ));


        // selective refresh for bottom bar content
        if( isset( $wp_customize->selective_refresh ) )
        {
            $wp_customize->selective_refresh->add_partial( 'taproot_bottom_bar_content', array(
                'selector' => '.bottom-bar-container',
                'container_inclusive' => true,
                'render_callback' => 'taproot_customize_partial_bottom_bar_content',
            ));
        }
