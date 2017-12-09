<?php
/**
 * Add customizer controls to the general panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Panel: Layout
$wp_customize->add_panel( 'general_settings', array(
    'priority' => 10,
    'title' => esc_html__( 'General Settings', 'taproot' ),
));

    // Section: General Settings
    $wp_customize->add_section( 'taproot_layout', array(
        'title' => esc_html__( 'Layout', 'taproot' ),
        'panel' => 'general_settings'
    ));

        // Setting: Taproot Boxed Layout  
        $wp_customize->add_setting( 'taproot_boxed_layout', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_boxed_layout', array(
            'label' => esc_html__( 'Use a boxed layout', 'taproot' ),
            'section' => 'taproot_layout',
            'type' => 'checkbox',
        ));


        // Setting: Boxed Layout Padding 
        $wp_customize->add_setting( 'taproot_boxed_layout_padding', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_boxed_layout_padding', array(
            'type' => 'range',
            'section' => 'taproot_layout',
            'label' => esc_html__( 'Boxed Layout Padding', 'taproot' ),
            'input_attrs' => array(
                'min' => 0,
                'max' => 7,
                'step' => 0.1,
            ),
        )));


        // Setting: Max Content Width
        $wp_customize->add_setting( 'taproot_max_content_width', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_max_content_width', array(
            'type' => 'range',
            'section' => 'taproot_layout',
            'label' => esc_html__( 'Max Content Width', 'taproot' ),
            'input_attrs' => array(
                'min'  => 800,
                'max'  => 1440,
                'step' => 20,
            ),
        )));


    // Section: Background
    $wp_customize->add_section( 'taproot_background', array(
        'title' => esc_html__( 'Background', 'taproot' ),
        'panel' => 'general_settings'
    ));

        // Color Setting: Background Color
        taproot_customizer_color( $wp_customize, 'taproot_background_color', array(
            'label'   => esc_html__( 'Background Color', 'taproot' ),
            'section' => 'taproot_background',  
        ));        
 

    // Section: Fonts
    $wp_customize->add_section( 'taproot_fonts', array(
        'title' => esc_html__( 'Google Fonts', 'taproot' ),
        'panel' => 'general_settings',
        'description' => esc_html__('Visit <a href="https://fonts.google.com" target="_blank">Google Fonts</a> to create your font profile. Paste in the font list from the end of the embed URL, or add desired fonts using the following formula: Each font name should be separated by a "|" and use a "+" for spaces.', 'taproot'),
    ));

        // Setting: Google Fonts
        $wp_customize->add_setting( 'taproot_google_fonts', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_google_fonts', array(
            'type' => 'text',
            'section' => 'taproot_fonts',
            'label' => esc_html__( 'Google Fonts Code', 'taproot' ),
        ));        
