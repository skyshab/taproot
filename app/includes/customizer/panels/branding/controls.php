<?php
/**
 * Add customizer controls to the branding panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Panel: Branding
$wp_customize->add_panel( 'branding', array(
    'type' => 'responsive',
    'priority' => 30,
    'title' => 'Branding',
    'description' => esc_html__('Choose which branding elements you would like to display in the header, and configure their settings for various screen sizes. If you resize the browser window while this panel is open, the section that corresponds to the screen size in the preview will automatically open.', 'taproot'),
));


// Rootstrap Tabs: Branding Elements
$rootstrap->customizer_tabs( $wp_customize, 'branding_elements[logo]', array(
    'priority' => 10,
    'panel' => 'branding',
    'title' => esc_html__( 'Branding Elements', 'taproot' ),
    'tabs' => array(
        'branding_elements[logo]' => 'Logo',
        'branding_elements[title]' => 'Title',
        'branding_elements[tagline]' => 'Tagline',
    ),
));


// Setting: Custom Logo
$wp_customize->add_setting( 'custom_logo', array(
    'type' => 'option',
    'sanitize_callback' => 'esc_url_raw',
    'transport' => 'postMessage',
));

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_logo', array(
    'label' => esc_html__( 'Custom Logo', 'taproot' ),
    'section' => 'branding_elements[logo]',
)));



// Setting: Site Title
$wp_customize->add_setting( 'blogname', array(
    'type' => 'option',
    'default' => get_option( 'blogname' ),
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
));

$wp_customize->add_control( 'blogname', array(
    'label' => esc_html__( 'Site Title', 'taproot' ),
    'section' => 'branding_elements[title]',
));


// Setting: Display Site Title in Header
taproot_setting( $wp_customize, 'taproot_display_title', array(
    'setting' => array(
        'sanitize_callback' => 'taproot_sanitize_checkbox',
    ),
    'control' => array(
        'type' => 'checkbox',
        'section' => 'branding_elements[title]',
        'label' => esc_html__( 'Display Site Title in Header', 'taproot' ),
    ),
));


// Setting: Title Font 
taproot_setting( $wp_customize, 'taproot_site_title_font', array(
    'setting' => array(),
    'control' => array(
        'type' => 'select',
        'section' => 'branding_elements[title]',
        'label' => esc_html__( 'Font Family', 'taproot' ),
        'choices' => taproot_get_font_choices(),
    ),
));


// Color Setting: Title Font Color
taproot_customizer_color( $wp_customize, 'taproot_title_font_color', array(
    'label'   => esc_html__( 'Title Color', 'taproot' ),
    'section' => 'branding_elements[title]',  
)); 


// Color Setting: Title Font Color: Fixed
taproot_customizer_color( $wp_customize, 'taproot_title_font_color_fixed', array(
    'label'   => esc_html__( 'Title Color: Fixed', 'taproot' ),
    'section' => 'branding_elements[title]',  
)); 


// Setting: Site Title Font Style
taproot_setting( $wp_customize, 'taproot_site_title_font_style', array(
    'setting' => array(),
    'control' => array(
        'type'  => 'font_styles',
        'section' => 'branding_elements[title]',
        'label' => esc_html__( 'Title Font Style', 'taproot' ),
    ),
));


// Setting: Site Description
$wp_customize->add_setting( 'blogdescription', array(
    'type' => 'option',
    'sanitize_callback' => 'sanitize_text_field',
    'transport' => 'postMessage',
));

$wp_customize->add_control( 'blogdescription', array(
    'label' => esc_html__( 'Tagline', 'taproot' ),
    'section' => 'branding_elements[tagline]',
));


// Setting: Show Tagline
taproot_setting( $wp_customize, 'taproot_display_tagline', array(
    'setting' => array(
        'sanitize_callback' => 'taproot_sanitize_checkbox',
    ),
    'control' => array(
        'type' => 'checkbox',
        'section' => 'branding_elements[tagline]',
        'label' => esc_html__( 'Display Tagline in Header', 'taproot' ),
    ),
));


// Setting: Tagline Font
taproot_setting( $wp_customize, 'taproot_site_tagline_font', array(
    'setting' => array(),
    'control' => array(
        'type' => 'select',
        'section' => 'branding_elements[tagline]',
        'label' => esc_html__( 'Font Family', 'taproot' ),
        'choices' => taproot_get_font_choices(),
    ),
));


// Color Setting: Tagline Font Color
taproot_customizer_color( $wp_customize, 'taproot_tagline_font_color', array(
    'label' => esc_html__( 'Tagline Color', 'taproot' ),
    'section' => 'branding_elements[tagline]',  
)); 


// Color Setting: Tagline Font Color: Fixed
taproot_customizer_color( $wp_customize, 'taproot_tagline_font_color_fixed', array(
    'label' => esc_html__( 'Tagline Color: Fixed', 'taproot' ),
    'section' => 'branding_elements[tagline]',  
)); 


// Setting: Tagline Font Style
taproot_setting( $wp_customize, 'taproot_tagline_font_style', array(
    'setting' => array(),
    'control' => array(
        'type' => 'font_styles',
        'section' => 'branding_elements[tagline]',
        'label'	=> esc_html__( 'Tagline Font Style', 'taproot' ),
    ),
));


// selective refresh for logo title and tagline
if( isset( $wp_customize->selective_refresh ) ) {

    $wp_customize->selective_refresh->add_partial( 'taproot_custom_logo', array(
        'selector' => '#logo',
        'container_inclusive' => true,
        'render_callback' => 'taproot_customize_partial_logo',
    ) );

    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title',
        'container_inclusive' => false,
        'render_callback' => 'taproot_customize_partial_blogname',
    ) );

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description',
        'container_inclusive' => false,
        'render_callback' => 'taproot_customize_partial_blogdescription',
    ) );
}

$devices = $rootstrap->get_devices();
$section_priority = 20;

foreach ( $devices as $device => $args )
{
    $device_id = str_replace( '-', '_', $device );
    $uc_device = ucwords( str_replace( '-', ' ', $device ));
    $section_id = sprintf( 'branding_%s', $device_id );

    // Section
    $wp_customize->add_section( $section_id, array(
        'title' => $uc_device, 'taproot',
        'priority' => $section_priority,
        'panel' => 'branding',
        'type' => sprintf( 'responsive-%s', $device ),
    ));

    // get previous and next devices
    $previous_device = $rootstrap->get_previous_device( $device );
    $previous_device = ( $previous_device ) ? 'branding_' . str_replace( '-', '_', $previous_device ) : 'na';
    $next_device = $rootstrap->get_next_device( $device );
    $next_device = ( $next_device ) ? 'branding_' . str_replace( '-', '_', $next_device ) : 'na';

    // Setting: Taproot Branding Screen Nav
    $wp_customize->add_setting( sprintf( 'screen_nav_%s', $device_id ), array(
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( new Taproot_Screen_Nav ( $wp_customize, sprintf( 'screen_nav_%s', $device_id ), array(
        'section' => $section_id,
        'previous' => $previous_device,
        'next' => $next_device,
        'priority' => -20,
    )));

    // mobile through tablet only
    if( 'laptop' !== $device && 'desktop' !== $device )
    {
        // Setting: Branding Layout Mobile
        taproot_setting( $wp_customize, sprintf( 'taproot_branding_layout_%s', $device_id ), array(
            'setting' => array(),
            'control' => array(
                'type' => 'select',
                'section' => $section_id,
                'label' => esc_html__( 'Branding Layout', 'taproot' ),
                'choices' => array(
                    'stacked' => esc_html__( 'Stacked', 'taproot' ),
                    'spread' => esc_html__( 'Spread', 'taproot' ),
                ),
            ),
        ));

    } // end mobile - tablet only

    /**
     * laptop or desktop only
    **/

    else
    {
        // fixed ids
        $fixed_section_id = sprintf( '%s[tab-2]',  $section_id);

        // Rootstrap Tabs: Fixed Header Branding
        $rootstrap->customizer_tabs( $wp_customize, $section_id, array(
            'priority' => 10,
            'panel' => 'branding',
            'active_callback' => '',
            'tabs' => array(
                $section_id => 'Default',
                $fixed_section_id => 'Fixed',
            ),
            'type' => sprintf( 'responsive-%s', $device ),
        ));


        // Setting: Taproot Branding Screen Nav
        $wp_customize->add_setting( sprintf( 'screen_nav_%s_fixed', $device_id  ), array(
            'sanitize_callback' => 'sanitize_text_field',            
        ));

        $wp_customize->add_control( new Taproot_Screen_Nav ( $wp_customize, sprintf( 'screen_nav_%s_fixed', $device_id  ), array(
            'section' => $fixed_section_id,
            'previous' => $previous_device,
            'next' => $next_device,
            'priority' => -20,
        )));


        /**
         * Branding Fixed Header Controls
        **/

    	// Setting: Gutter Spacing
        taproot_setting( $wp_customize, sprintf( 'taproot_gutter_spacing_%s_fixed', $device_id ), array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
                'type' => 'range',
                'section' => $fixed_section_id,                
        		'label' => esc_html__( 'Gutter Spacing', 'taproot' ),
        		'input_attrs' => array(
        			'min' => 0,
        			'max' => 6.4,
        			'step' => 0.2
        		),
            ),
        ));        


        // Group Title: Logo Styles
        $wp_customize->add_setting( sprintf( 'option_group_logo_%s_fixed', $device_id ), array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        ));
        
        $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, sprintf( 'option_group_logo_%s_fixed', $device_id ), array(
    		'label' => esc_html__( 'Logo Styles', 'taproot' ),
            'section' => $fixed_section_id,
            'type' => 'taproot-option-group',
    		'active_callback' => 'taproot_has_logo',
    	)));


        // Setting: Hide Logo in Fixed Header 
        taproot_setting( $wp_customize, sprintf( 'taproot_hide_logo_%s_fixed', $device_id ), array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_checkbox',
            ),
            'control' => array(
                'type' => 'checkbox',
                'section' => $fixed_section_id,
                'label' => esc_html__( 'Hide Logo', 'taproot' ),
                'active_callback' => 'taproot_has_logo',
            ),
        ));


    	// Setting: Logo Height
        taproot_setting( $wp_customize, sprintf( 'taproot_logo_height_%s_fixed', $device_id ), array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
                'type' => 'range',
                'section' => $fixed_section_id,
                'label' => esc_html__( 'Logo Height', 'taproot' ),
                'active_callback' => sprintf( 'taproot_show_logo_%s', $device_id ),
                'input_attrs' => array(
                    'min' => 24,
                    'max' => 300,
                    'step' => 1
                ),
            ),
        ));        


        // Setting: Logo Gutter
        taproot_setting( $wp_customize, sprintf( 'taproot_logo_gutter_%s_fixed', $device_id ), array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
                'type' => 'range',
                'section' => $fixed_section_id,
                'label' => esc_html__( 'Logo Gutter Spacing', 'taproot' ),
                'active_callback' => sprintf( 'taproot_show_logo_%s', $device_id ),
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 6.4,
                    'step' => 0.2
                ),
            ),
        ));


        // Group Title: Title Styles
        $wp_customize->add_setting( sprintf( 'option_group_title_%s_fixed', $device_id ), array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        )); 

        $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, sprintf( 'option_group_title_%s_fixed', $device_id ), array(
    		'label' => esc_html__( 'Title Styles', 'taproot' ),
            'section' => $fixed_section_id,
            'type' => 'taproot-option-group',
    		'active_callback' => 'taproot_has_title',
    	)));


    	// Setting: Hide Title in Fixed Header
        taproot_setting( $wp_customize, sprintf( 'taproot_hide_site_title_%s_fixed', $device_id ), array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_checkbox',
            ),
            'control' => array(
                'type' => 'checkbox',
                'section' => $fixed_section_id,
                'label' => esc_html__( 'Hide Site Title', 'taproot' ),
                'active_callback' => 'taproot_has_title',
            ),
        ));


    	// Setting: Title Font Size
        taproot_setting( $wp_customize, sprintf( 'taproot_title_font_size_%s_fixed', $device_id ), array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
                'type' => 'range',
                'section' => $fixed_section_id,
                'label' => esc_html__( 'Title Font Size', 'taproot' ),
                'active_callback' => sprintf( 'taproot_show_title_%s', $device_id ),
                'input_attrs' => array(
                    'min' => 12,
                    'max' => 72,
                    'step' => 1
                ),
            ),
        ));


    	// Setting: Title Letter Spacing
        taproot_setting( $wp_customize, sprintf( 'taproot_title_spacing_%s_fixed', $device_id ), array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
                'type' => 'range',
                'section' => $fixed_section_id,
                'label' => esc_html__( 'Title Letter Spacing', 'taproot' ),
                'active_callback' => sprintf( 'taproot_show_title_%s', $device_id ),
                'input_attrs' => array(
                    'min' => -1,
                    'max' => 8,
                    'step' => 1
                ),
            ),
        ));


    	// Setting: Title Line Height
        taproot_setting( $wp_customize, sprintf( 'taproot_title_line_height_%s_fixed', $device_id ), array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
                'type' => 'range',
                'section' => $fixed_section_id,
                'label' => esc_html__( 'Title Line Height', 'taproot' ),
                'active_callback' => sprintf( 'taproot_show_title_%s', $device_id ),
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 2,
                    'step' => 0.1
                ),
            ),
        ));


        // Group Title: Tagline Styles
        $wp_customize->add_setting( sprintf( 'option_group_tagline_%s_fixed', $device_id ), array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        )); 

        $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, sprintf( 'option_group_tagline_%s_fixed', $device_id ), array(
    		'label' => esc_html__( 'Tagline Styles', 'taproot' ),
            'section' => $fixed_section_id,
            'type' => 'taproot-option-group',
    		'active_callback' => 'taproot_has_tagline',
    	)));


    	// Setting: Hide Tagline in Fixed Header
        taproot_setting( $wp_customize, sprintf( 'taproot_hide_site_tagline_%s_fixed', $device_id ), array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_checkbox',
            ),
            'control' => array(
        		'type' => 'checkbox',
                'section' => $fixed_section_id,
                'label' => esc_html__( 'Hide Site Tagline', 'taproot' ),
        		'active_callback' => 'taproot_has_tagline',
            ),
        ));


    	// Setting: Tagline Font Size
        taproot_setting( $wp_customize, sprintf( 'taproot_tagline_font_size_%s_fixed', $device_id ), array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
        		'type' => 'range',
                'section' => $fixed_section_id,
                'label' => esc_html__( 'Tagline Font Size', 'taproot' ),
                'active_callback' => sprintf( 'taproot_show_tagline_%s', $device_id ),
        		'input_attrs' => array(
        			'min' => 12,
        			'max' => 72,
        			'step' => 1
        		),
            ),
        ));


    	// Setting: Tagline Letter Spacing
        taproot_setting( $wp_customize, sprintf( 'taproot_tagline_spacing_%s_fixed', $device_id ), array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
        		'type' => 'range',
                'section' => $fixed_section_id,
                'label' => esc_html__( 'Tagline Letter Spacing', 'taproot' ),
                'active_callback' => sprintf( 'taproot_show_tagline_%s', $device_id ),
        		'input_attrs' => array(
        			'min' => -1,
        			'max' => 8,
        			'step' => 1
        		),
            ),
        ));


    	// Setting: Tagline Line Height
        taproot_setting( $wp_customize, sprintf( 'taproot_tagline_line_height_%s_fixed', $device_id ), array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
        		'type' => 'range',
                'section' => $fixed_section_id,
                'label' => esc_html__( 'Tagline Line Height', 'taproot' ),
                'active_callback' => sprintf( 'taproot_show_tagline_%s', $device_id ),
        		'input_attrs' => array(
        			'min' => 0,
        			'max' => 2,
        			'step' => 0.1
        		),
            ),
        ));


    	// Setting: Tagline Top Margin
        taproot_setting( $wp_customize, sprintf( 'taproot_tagline_top_margin_%s_fixed', $device_id ), array(
            'setting' => array(
                'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            ),
            'control' => array(
        		'type' => 'range',
                'section' => $fixed_section_id,
                'label' => esc_html__( 'Tagline Top Margin', 'taproot' ),
                'active_callback' => sprintf( 'taproot_show_tagline_%s', $device_id ),
        		'input_attrs' => array(
        			'min' => 0,
        			'max' => 2,
        			'step' => 0.2
        		),
            ),
        ));

    } // end laptop or desktop only


    /**
     * all devices
    **/


    // Setting: Gutter Spacing
    taproot_setting( $wp_customize, sprintf( 'taproot_gutter_spacing_%s', $device_id ), array(
        'setting' => array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        ),
        'control' => array(
            'type' => 'range',
            'section' => $section_id,
            'label' => esc_html__( 'Gutter Spacing', 'taproot' ),
            'input_attrs' => array(
                'min' => 0,
                'max' => 6.4,
                'step' => 0.2
            ),
        ),
    ));


    // Group Title: Logo Styles
    $wp_customize->add_setting( sprintf( 'option_group_logo_%s', $device_id ), array(    
        'sanitize_callback' => 'taproot_sanitize_range_slider_value',
    )); 

    $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, sprintf( 'option_group_logo_%s', $device_id ), array(
		'label' => esc_html__( 'Logo Styles', 'taproot' ),
        'section' => $section_id,
        'type' => 'taproot-option-group',
		'active_callback' => '',
	)));


    // Setting: Logo Height
    taproot_setting( $wp_customize, sprintf( 'taproot_logo_height_%s', $device_id ), array(
        'setting' => array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        ),
        'control' => array(
            'type' => 'range',
            'section' => $section_id,
            'label' => esc_html__( 'Logo Height', 'taproot' ),
            'active_callback' => '',
            'input_attrs' => array(
                'min' => 24,
                'max' => 300,
                'step' => 1
            ),
        ),
    ));

    // Setting: Logo Gutter
    taproot_setting( $wp_customize, sprintf( 'taproot_logo_gutter_%s', $device_id ), array(
        'setting' => array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        ),
        'control' => array(
            'type' => 'range',
            'section' => $section_id,
            'label' => esc_html__( 'Logo Gutter Spacing', 'taproot' ),
            'input_attrs' => array(
                'min' => 0,
                'max' => 6.4,
                'step' => 0.2
            ),
        ),
    ));    


    // Group Title: Title Styles
    $wp_customize->add_setting( sprintf( 'option_group_title_%s', $device_id ), array(
        'sanitize_callback' => 'taproot_sanitize_range_slider_value',
    ));  

    $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, sprintf( 'option_group_title_%s', $device_id ), array(
		'label' => esc_html__( 'Title Styles', 'taproot' ),
        'section' => $section_id,
        'type' => 'taproot-option-group',
		'active_callback' => 'taproot_has_title',
	)));


    // Setting: Title Font Size
    taproot_setting( $wp_customize, sprintf( 'taproot_title_font_size_%s', $device_id ), array(
        'setting' => array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        ),
        'control' => array(
            'type' => 'range',
            'section' => $section_id,
            'label' => esc_html__( 'Title Font Size', 'taproot' ),
            'active_callback' => 'taproot_has_title',
            'input_attrs' => array(
                'min' => 12,
                'max' => 72,
                'step' => 1,
            ),
        ),
    ));


    // Setting: Title Letter Spacing
    taproot_setting( $wp_customize, sprintf( 'taproot_title_spacing_%s', $device_id ), array(
        'setting' => array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        ),
        'control' => array(
            'type'  => 'range',
            'section' => $section_id,
            'label' => esc_html__( 'Title Letter Spacing', 'taproot' ),
            'active_callback' => 'taproot_has_title',
            'input_attrs' => array(
                'min' => -1,
                'max' => 8,
                'step' => 1
            ),
        ),
    ));


    // Setting: Title Line Height
    taproot_setting( $wp_customize, sprintf( 'taproot_title_line_height_%s', $device_id ), array(
        'setting' => array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        ),
        'control' => array(
            'type' => 'range',
            'section' => $section_id,
            'label' => esc_html__( 'Title Line Height', 'taproot' ),
            'active_callback' => 'taproot_has_title',
            'input_attrs' => array(
                'min' => 0,
                'max' => 2,
                'step' => 0.1
            ),
        ),
    ));


    // Group Title: Tagline Styles
    $wp_customize->add_setting( sprintf( 'option_group_tagline_%s', $device_id ), array(    
        'sanitize_callback' => 'taproot_sanitize_range_slider_value',
    ));   

    $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, sprintf( 'option_group_tagline_%s', $device_id ), array(
		'label' => esc_html__( 'Tagline Styles', 'taproot' ),
        'section' => $section_id,
        'type' => 'taproot-option-group',
		'active_callback' => 'taproot_has_tagline',
	)));


    // Setting: Tagline Font Size
    taproot_setting( $wp_customize, sprintf( 'taproot_tagline_font_size_%s', $device_id ), array(
        'setting' => array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        ),
        'control' => array(
            'type' => 'range',
            'section' => $section_id,
            'label' => esc_html__( 'Tagline Font Size', 'taproot' ),
            'active_callback' => 'taproot_has_tagline',
            'input_attrs' => array(
                'min' => 12,
                'max' => 72,
                'step' => 1
            ),
        ),
    ));    


    // Setting: Tagline Letter Spacing
    taproot_setting( $wp_customize, sprintf( 'taproot_tagline_spacing_%s', $device_id ), array(
        'setting' => array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        ),
        'control' => array(
            'type' => 'range',
            'section' => $section_id,
            'active_callback' => 'taproot_has_tagline',
            'label' => esc_html__( 'Tagline Letter Spacing', 'taproot' ),
            'input_attrs' => array(
                'min' => -1,
                'max' => 8,
                'step' => 1
            ),
        ),
    ));


    // Setting: Tagline Line Height
    taproot_setting( $wp_customize, sprintf( 'taproot_tagline_line_height_%s', $device_id ), array(
        'setting' => array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        ),
        'control' => array(
            'type' => 'range',
            'section' => $section_id,
            'label' => esc_html__( 'Tagline Line Height', 'taproot' ),
            'active_callback' => 'taproot_has_tagline',
            'input_attrs' => array(
                'min' => 0,
                'max' => 2,
                'step' => 0.1
            ),
        ),
    ));


    // Setting: Tagline Top Margin
    taproot_setting( $wp_customize, sprintf( 'taproot_tagline_top_margin_%s', $device_id ), array(
        'setting' => array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
        ),
        'control' => array(
            'type' => 'range',
            'section' => $section_id,
            'label' => esc_html__( 'Tagline Top Margin', 'taproot' ),
            'active_callback' => 'taproot_has_tagline',
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 2,
                'step' => 0.2
            ),
        ),
    ));    

    $section_priority += 10;

} // end foreach device
