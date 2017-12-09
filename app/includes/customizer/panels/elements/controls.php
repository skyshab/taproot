<?php
/**
 * Add customizer controls to the elements panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Panel: Elements
$wp_customize->add_panel( 'taproot_elements', array(
    'priority' => 50,
    'title'	=> esc_html__( 'Elements', 'taproot' ),
));

    // Rootstrap Tabs: Buttons
    $rootstrap->customizer_tabs( $wp_customize, 'taproot_buttons', array(
        'priority' => 10,
        'panel' => 'taproot_elements',
        'title' => esc_html__( 'Buttons', 'taproot' ),
        'tabs' => array(
            'taproot_buttons' => 'Default',
            'taproot_buttons[secondary]' => 'Secondary',
        ),
    ));

        // Color Setting: Button Background Color
        taproot_customizer_color( $wp_customize, 'taproot_button_background_color', array(
            'label'   => esc_html__( 'Button Color', 'taproot' ),
            'section' => 'taproot_buttons',  
        ));        


        // Color Setting: Button Border Color
        taproot_customizer_color( $wp_customize, 'taproot_button_border_color', array(
            'label'   => esc_html__( 'Button Border Color', 'taproot' ),
            'section' => 'taproot_buttons',  
        ));  


        // Color Setting: Button Text Color
        taproot_customizer_color( $wp_customize, 'taproot_button_text_color', array(
            'label'   => esc_html__( 'Button Text Color', 'taproot' ),
            'section' => 'taproot_buttons',  
        ));  


        // Color Setting: Button Background Color Hover
        taproot_customizer_color( $wp_customize, 'taproot_button_background_color_hover', array(
            'label'   => esc_html__( 'Button Background Color: Hover', 'taproot' ),
            'section' => 'taproot_buttons',  
        )); 


        // Color Setting: Button Border Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_button_border_color_hover', array(
            'label'   => esc_html__( 'Button Border Color: Hover', 'taproot' ),
            'section' => 'taproot_buttons',  
        )); 


        // Color Setting: Button Text Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_button_text_color_hover', array(
            'label'   => esc_html__( 'Button Text Color: Hover', 'taproot' ),
            'section' => 'taproot_buttons',  
        )); 


        // Setting: Border Width
        $wp_customize->add_setting( 'taproot_button_border_width', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_button_border_width', array(
            'type' => 'range',
            'section' => 'taproot_buttons',
            'label' => esc_html__( 'Button Border Width', 'taproot' ),
            'input_attrs' => array(
                'min' => 0,
                'max' => 10,
                'step' => 1
            ),
        )));


        // Setting: Border Radius
        $wp_customize->add_setting( 'taproot_button_border_radius', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_button_border_radius', array(
            'type' => 'range',
            'section' => 'taproot_buttons',
            'label' => esc_html__( 'Button Border Radius', 'taproot' ),
            'input_attrs' => array(
                'min' => 0,
                'max' => 1.25,
                'step' => 0.01
            ),
        )));


        // Setting: Button Font Family       
        $wp_customize->add_setting( 'taproot_button_font', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_button_font', array(
            'type' => 'select',
            'section' => 'taproot_buttons',
            'label' => esc_html__( 'Button Font', 'taproot' ),
            'choices' => taproot_get_font_choices(),
        ));


        // Setting: Button Font Style
        $wp_customize->add_setting( 'taproot_button_font_style', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Font_Styles( $wp_customize, 'taproot_button_font_style', array(
            'type'  => 'font_styles',
            'section' => 'taproot_buttons',
            'label' => esc_html__( 'Button Font Style', 'taproot' ),
        )));

    /*
    ** Secondary Button Styles
    */

        // Color Setting: Secondary Button Background Color
        taproot_customizer_color( $wp_customize, 'taproot_secondary_button_background_color', array(
            'label'   => esc_html__( 'Button Color', 'taproot' ),
            'section' => 'taproot_buttons[secondary]',  
        )); 


        // Color Setting: Secondary Button Border Color
        taproot_customizer_color( $wp_customize, 'taproot_secondary_button_border_color', array(
            'label'   => esc_html__( 'Button Border Color', 'taproot' ),
            'section' => 'taproot_buttons[secondary]',  
        )); 


        // Color Setting: Secondary Button Text Color
        taproot_customizer_color( $wp_customize, 'taproot_secondary_button_text_color', array(
            'label'   => esc_html__( 'Button Text Color', 'taproot' ),
            'section' => 'taproot_buttons[secondary]',  
        )); 


        // Color Setting: Secondary Button Background Color Hover
        taproot_customizer_color( $wp_customize, 'taproot_secondary_button_background_color_hover', array(
            'label'   => esc_html__( 'Button Background Color: Hover', 'taproot' ),
            'section' => 'taproot_buttons[secondary]',  
        )); 


        // Color Setting: Secondary Button Border Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_secondary_button_border_color_hover', array(
            'label'   => esc_html__( 'Button Border Color: Hover', 'taproot' ),
            'section' => 'taproot_buttons[secondary]',  
        )); 


        // Color Setting: Secondary Button Text Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_secondary_button_text_color_hover', array(
            'label'   => esc_html__( 'Button Text Color: Hover', 'taproot' ),
            'section' => 'taproot_buttons[secondary]',  
        )); 


        // Setting: Border Width
        $wp_customize->add_setting( 'taproot_secondary_button_border_width', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_secondary_button_border_width', array(
            'type' => 'range',
            'section' => 'taproot_buttons[secondary]',
            'label' => esc_html__( 'Button Border Width', 'taproot' ),
            'input_attrs' => array(
                'min' => 0,
                'max' => 10,
                'step' => 1
            ),
        )));


        // Setting: Border Radius
        $wp_customize->add_setting( 'taproot_secondary_button_border_radius', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_secondary_button_border_radius', array(
            'type' => 'range',
            'section' => 'taproot_buttons[secondary]',
            'label' => esc_html__( 'Button Border Radius', 'taproot' ),
            'input_attrs' => array(
                'min' => 0,
                'max' => 1.25,
                'step' => 0.01
            ),
        )));


        // Setting: Button Font Family       
        $wp_customize->add_setting( 'taproot_secondary_button_font', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_secondary_button_font', array(
            'type' => 'select',
            'section' => 'taproot_buttons[secondary]',
            'label' => esc_html__( 'Button Font', 'taproot' ),
            'choices' => taproot_get_font_choices(),
        ));


        // Setting: Button Font Style
        $wp_customize->add_setting( 'taproot_secondary_button_font_style', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Font_Styles( $wp_customize, 'taproot_secondary_button_font_style', array(
            'type'  => 'font_styles',
            'section' => 'taproot_buttons[secondary]',
            'label' => esc_html__( 'Button Font Style', 'taproot' ),
        )));      


    // Section: Links
    $wp_customize->add_section( 'taproot_links', array(
        'title' => esc_html__( 'Links', 'taproot' ),
        'panel' => 'taproot_elements'
    ));

        // Color Setting: Link Color
        taproot_customizer_color( $wp_customize, 'taproot_link_color', array(
            'label'   => esc_html__( 'Link Color', 'taproot' ),
            'section' => 'taproot_links',  
        ));


        // Color Setting: Link Color Hover
        taproot_customizer_color( $wp_customize, 'taproot_link_color_hover', array(
            'label'   => esc_html__( 'Link Color: Hover', 'taproot' ),
            'section' => 'taproot_links',  
        ));


        // Color Setting: Link Color Active
        taproot_customizer_color( $wp_customize, 'taproot_link_color_active', array(
            'label'   => esc_html__( 'Link Color: Active', 'taproot' ),
            'section' => 'taproot_links',  
        ));        


    // Section: Accent Color
    $wp_customize->add_section( 'taproot_accents', array(
        'title' => esc_html__( 'Accents', 'taproot' ),
        'panel' => 'taproot_elements'
    ));

        // Color Setting: Accent Color
        taproot_customizer_color( $wp_customize, 'taproot_accent_color', array(
            'label'   => esc_html__( 'Accent Color', 'taproot' ),
            'section' => 'taproot_accents',  
        ));  


        // Color Setting: Accent Text Color
        taproot_customizer_color( $wp_customize, 'taproot_accent_text_color', array(
            'label'   => esc_html__( 'Accent Text Color', 'taproot' ),
            'section' => 'taproot_accents',  
        )); 

        // Color Setting: Separator Color
        taproot_customizer_color( $wp_customize, 'taproot_separator_color', array(
            'label'   => esc_html__( 'Separator Color', 'taproot' ),
            'section' => 'taproot_accents',  
        )); 

        // Color Setting: Accent Background Color
        taproot_customizer_color( $wp_customize, 'taproot_accent_background_color', array(
            'label'   => esc_html__( 'Background Color', 'taproot' ),
            'section' => 'taproot_accents',  
        )); 


    // Section: Breadcrumbs
    $wp_customize->add_section( 'taproot_breadcrumbs', array(
        'title' => esc_html__( 'Breadcrumbs', 'taproot' ),
        'panel' => 'taproot_elements'
    ));

        // Setting: Breadcrumbs Location
        $wp_customize->add_setting( 'taproot_breadcrumbs_location', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_breadcrumbs_location', array(
            'type' => 'select',
            'section' => 'taproot_breadcrumbs',
            'label' => esc_html__( 'Breadcrumbs Location', 'taproot' ),
            'choices' => array(
                'content' => esc_html__( 'Inside Content', 'taproot' ),                
                'top-bar' => esc_html__( 'Inside Top Bar', 'taproot' ),
                'hero' => esc_html__( 'Hero Overlay', 'taproot' ),                
                'hide' => esc_html__( "Don't Show", 'taproot' ),
            ),
        ));


        // Setting: Breadcrumbs Alignment
        $wp_customize->add_setting( 'taproot_breadcrumbs_align', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_breadcrumbs_align', array(
            'type' => 'select',
            'section' => 'taproot_breadcrumbs',
            'label' => esc_html__( 'Breadcrumbs Align', 'taproot' ),
            'choices' => array(
                'left' => esc_html__( 'Left', 'taproot' ),
                'center' => esc_html__( 'Center', 'taproot' ),
                'right' => esc_html__( 'Right', 'taproot' ),
            ),
        ));


        // Setting: Breadcrumbs Font Size
        $wp_customize->add_setting( 'taproot_breadcrumbs_size', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_breadcrumbs_size', array(
            'type' => 'range',
            'section' => 'taproot_breadcrumbs',
            'label' => esc_html__( 'Breadcrumbs Font Size', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 2,
                'step' => 0.1
            ),
        )));        


        // Color Setting: Breadcrumbs Color
        taproot_customizer_color( $wp_customize, 'taproot_post_navigation_breadcrumb_color', array(
            'label'   => esc_html__( 'Breadcrumbs Color', 'taproot' ),
            'section' => 'taproot_breadcrumbs',  
        ));

        // Color Setting: Breadcrumbs Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_post_navigation_breadcrumb_color_hover', array(
            'label'   => esc_html__( 'Breadcrumbs Color: Hover', 'taproot' ),
            'section' => 'taproot_breadcrumbs',  
        ));


    // Section: Comments
    $wp_customize->add_section( 'taproot_comments', array(
        'title' => esc_html__( 'Comments', 'taproot' ),
        'panel' => 'taproot_elements'
    ));

        // Color Setting: Comments Text Color
        taproot_customizer_color( $wp_customize, 'taproot_comments_text_color', array(
            'label'   => esc_html__( 'Comments Text Color', 'taproot' ),
            'section' => 'taproot_comments',  
        ));

        // Color Setting: Comments Link Color
        taproot_customizer_color( $wp_customize, 'taproot_comments_link_color', array(
            'label'   => esc_html__( 'Comments Link Color', 'taproot' ),
            'section' => 'taproot_comments',  
        ));        

        // Color Setting: Comments Link Color:hover
        taproot_customizer_color( $wp_customize, 'taproot_comments_link_color_hover', array(
            'label'   => esc_html__( 'Comments Link Color: Hover', 'taproot' ),
            'section' => 'taproot_comments',  
        ));    

        // Color Setting: Comments Border Color
        taproot_customizer_color( $wp_customize, 'taproot_comments_border_color', array(
            'label'   => esc_html__( 'Comments Border Color', 'taproot' ),
            'section' => 'taproot_comments',  
        ));  

        // Color Setting: Comments Form Background Color
        taproot_customizer_color( $wp_customize, 'taproot_comments_form_background_color', array(
            'label'   => esc_html__( 'Form Background Color', 'taproot' ),
            'section' => 'taproot_comments',  
        ));          
