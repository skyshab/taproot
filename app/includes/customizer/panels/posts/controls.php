<?php
/**
 * Add customizer controls to the posts panel.
 *
 * @package taproot/customizer
 * @since 0.8.0
 */

// Panel: Posts
$wp_customize->add_panel( 'taproot_posts', array(
    'priority' => 100,
    'title' => esc_html__( 'Posts', 'taproot' ),
));

    // Section: Blog Page Settings
    $wp_customize->add_section( 'taproot_blog_settings' , array(
        'panel' => 'taproot_posts',
        'title' => esc_html__( 'Blog Page', 'taproot' ),
        'priority' => 100,
    ));

        // Setting: Blog Page Layout
        $wp_customize->add_setting( 'taproot_blog_layout', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_blog_layout', array(
            'type' => 'select',
            'section' => 'taproot_blog_settings',
            'label' => esc_html__( 'Blog Page Layout', 'taproot' ),
            'choices' => array(
                'right' => esc_html__( 'Right Sidebar', 'taproot' ),
                'left' => esc_html__( 'Left Sidebar', 'taproot' ),
                'full' => esc_html__( 'Full Width', 'taproot' ),
            ),      
        ));


        // Setting: Blog Page Sidebar
        global $wp_registered_sidebars;
        $sidebars = $wp_registered_sidebars;
        $taproot_sidebars = array();
        $taproot_sidebars[0] = esc_html__( "Select a Sidebar", 'taproot' );

        foreach($sidebars as $sidebar) 
        {
            if( strpos($sidebar['name'],'Footer Widgets') !== false ) continue;
            $taproot_sidebars[ $sidebar['id'] ] = $sidebar['name'];
        }

        $wp_customize->add_setting( 'taproot_blog_page_sidebar', array(
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control( 'taproot_blog_page_sidebar', array(
            'label' => esc_html__( 'Blog Page Sidebar', 'taproot' ),
            'section' => 'taproot_blog_settings',
            'active_callback' => '',
            'type' => 'select',
            'choices' => $taproot_sidebars,
        ));


        // Setting: Use Meta Icons      
        $wp_customize->add_setting( 'taproot_post_show_all', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_post_show_all', array(
            'type' => 'checkbox',
            'section' => 'taproot_blog_settings',
            'label' => esc_html__( 'Show Entire Post in Blog', 'taproot' ),
        ));


        // Setting: Blog Page Title       
        $wp_customize->add_setting( 'taproot_blog_title', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_blog_title', array(
            'type' => 'text',
            'section' => 'taproot_blog_settings',
            'label' => esc_html__( 'Blog Page Title', 'taproot' ),        
        ));


        // Color Setting: Blog Title Color
        taproot_customizer_color( $wp_customize, 'taproot_blog_page_title_color', array(
            'label'   => esc_html__( 'Title Color', 'taproot' ),
            'section' => 'taproot_blog_settings',  
        ));


        // Setting: Pagination Size
        $wp_customize->add_setting( 'taproot_blog_page_pagination_size', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_blog_page_pagination_size', array(
            'label'       => esc_html__( 'Pagination Size', 'taproot' ),
            'section'     => 'taproot_blog_settings',
            'active_callback' => '',
            'type'        => 'range',
            'input_attrs' => array(
                'min'  => 0.6,
                'max'  => 1.6,
                'step' => 0.01
            ),     
        )));


        // Setting: Pagination radius
        $wp_customize->add_setting( 'taproot_blog_page_pagination_radius', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_blog_page_pagination_radius', array(
            'type' => 'range',
            'section' => 'taproot_blog_settings',
            'label' => esc_html__( 'Pagination Border Radius', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 50,
                'step' => 1
            ),      
        )));


        // Color Setting: Pagination Color
        taproot_customizer_color( $wp_customize, 'taproot_blog_page_pagination_color', array(
            'label'   => esc_html__( 'Pagination Color', 'taproot' ),
            'section' => 'taproot_blog_settings',  
        ));


    // Section: Post Box Settings
    $wp_customize->add_section( 'taproot_post_box' , array(
        'panel' => 'taproot_posts',
        'title'    => esc_html__( 'Post Box Styles', 'taproot' ),
        'priority' => 100,
    ));

        // Default Thumbnail Size
        $wp_customize->add_setting( 'taproot_post_box_featured_image_size', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_post_box_featured_image_size', array(
            'type' => 'select',
            'section' => 'taproot_post_box',
            'label' => esc_html__( 'Default Thumbnail Size', 'taproot' ),
            'choices' => array(
                'taproot-tiny' => esc_html__( 'Tiny', 'taproot' ), 
                'thumbnail' => esc_html__( 'Thumbnail', 'taproot' ),
                'taproot-small' => esc_html__( 'Small', 'taproot' ),
                'medium' => esc_html__( 'Medium', 'taproot' ),
                'large' => esc_html__( 'Large', 'taproot' ),
                'full' => esc_html__( 'Full', 'taproot' ),
                'hide' => esc_html__( 'Hide', 'taproot' ),
            ),      
        ));


        // Color Setting: Title Color
        taproot_customizer_color( $wp_customize, 'taproot_post_box_title_color', array(
            'label'   => esc_html__( 'Title Color', 'taproot' ),
            'section' => 'taproot_post_box',  
        ));


        // Color Setting: Title Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_post_box_title_color_hover', array(
            'label'   => esc_html__( 'Title Color: Hover', 'taproot' ),
            'section' => 'taproot_post_box',  
        ));


        // Color Setting: Post Box Text Color
        taproot_customizer_color( $wp_customize, 'taproot_post_box_text_color', array(
            'label'   => esc_html__( 'Text Color', 'taproot' ),
            'section' => 'taproot_post_box',  
        ));


        // Setting: Use Meta Icons 
        $wp_customize->add_setting( 'taproot_post_box_meta_icons', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_post_box_meta_icons', array(
            'type' => 'checkbox',
            'section' => 'taproot_post_box',
            'label' => esc_html__( 'Use Meta Icons', 'taproot' ),
        ));


        // Setting: Meta Size
        $wp_customize->add_setting( 'taproot_post_box_meta_size', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_post_box_meta_size', array(
            'type' => 'range',
            'section' => 'taproot_post_box',
            'label' => esc_html__( 'Meta Size', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0.6,
                'max'  => 1.6,
                'step' => 0.01
            ),     
        )));  


        // Color Setting: Meta Color
        taproot_customizer_color( $wp_customize, 'taproot_post_box_meta_color', array(
            'label'   => esc_html__( 'Meta Color', 'taproot' ),
            'section' => 'taproot_post_box',  
        ));


        // Color Setting: Meta Icon Color
        taproot_customizer_color( $wp_customize, 'taproot_post_box_meta_icon_color', array(
            'label'   => esc_html__( 'Meta Icon Color', 'taproot' ),
            'section' => 'taproot_post_box',  
        ));


        // Setting: Excerpt length
        $wp_customize->add_setting( 'taproot_post_box_excerpt_length', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_post_box_excerpt_length', array(
            'type' => 'range',
            'section' => 'taproot_post_box',
            'label' => esc_html__( 'Excerpt Length', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 225,
                'step' => 1
            ),     
        )));  


        // Link Style
        $wp_customize->add_setting( 'taproot_post_box_link_style', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_post_box_link_style', array(
            'type' => 'select',
            'section' => 'taproot_post_box',
            'label' => esc_html__( 'Post Link Style', 'taproot' ),
            'choices' => array(
                'none' => esc_html__('None', 'taproot'),
                'inline' => esc_html__('Inline', 'taproot'), 
                'link' => esc_html__('Link', 'taproot'),
                'button' => esc_html__('Button', 'taproot'),
            ),       
        ));


        // Link Style
        $wp_customize->add_setting( 'taproot_post_box_link_position', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_post_box_link_position', array(
            'type' => 'select',
            'section' => 'taproot_post_box',
            'label' => esc_html__( 'Post Link Position', 'taproot' ),
            'choices' => array(
                'right' => esc_html__('Right', 'taproot'),
                'left' => esc_html__('Left', 'taproot'),
                'hard-left' => esc_html__('Hard Left', 'taproot'),                    
            ),      
        ));


        // Setting: Post Box read more text
        $wp_customize->add_setting( 'taproot_post_box_link_text', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
            'default' => esc_html__('read more', 'taproot'),
        ));

        $wp_customize->add_control( 'taproot_post_box_link_text', array(
            'type' => 'text',
            'section' => 'taproot_post_box',
            'label' => esc_html__( 'Read More Text', 'taproot' ),      
        ));


        // Color Setting: Post Link Color
        taproot_customizer_color( $wp_customize, 'taproot_post_box_link_color', array(
            'label'   => esc_html__( 'Post Link Color', 'taproot' ),
            'section' => 'taproot_post_box',  
        ));


    // Section: Single Post Defaults
    $wp_customize->add_section( 'taproot_single_post_defaults', array(
        'title' => esc_html__( 'Single Post Defaults', 'taproot' ),
        'panel' => 'taproot_posts'
    ));

        // Setting: Single Post Layout
        $wp_customize->add_setting( 'taproot_single_layout', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_single_layout', array(
            'type' => 'select',
            'section' => 'taproot_single_post_defaults',
            'label' => esc_html__( 'Post Layout', 'taproot' ),
            'choices' => array(
                'right' => esc_html__( 'Right Sidebar', 'taproot' ),
                'left' => esc_html__( 'Left Sidebar', 'taproot' ),
                'full' => esc_html__( 'Full Width', 'taproot' ),
            ),       
        ));


        // Setting: Single Post Sidebar
        $wp_customize->add_setting( 'taproot_single_sidebar', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_single_sidebar', array(
            'type' => 'select',
            'section' => 'taproot_single_post_defaults',
            'label' => esc_html__( 'Post Sidebar', 'taproot' ),
            'choices' => $taproot_sidebars,       
        ));


        // Setting: Enable Post Title
        $wp_customize->add_setting( 'taproot_post_title', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_post_title', array(
            'type' => 'select',
            'section' => 'taproot_single_post_defaults',
            'label' => esc_html__( 'Post Title Display', 'taproot' ),
            'choices' => array(
                'content' => esc_html__( 'Show', 'taproot' ),
                'hide' => esc_html__( 'Hide', 'taproot' ),
            ),      
        ));


    // Setting:   
    $wp_customize->add_setting( 'taproot_featured_image_size', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control( 'taproot_featured_image_size', array(
        'type' => 'select',
        'section' => 'taproot_single_post_defaults',
        'label' => esc_html__( 'Featured Image Size', 'taproot' ),
        'choices' => array(
            'full' => esc_html__( 'Full Size', 'taproot' ),
            'large' => esc_html__( 'Large', 'taproot' ),
            'medium' => esc_html__( 'Medium', 'taproot' ),
            'taproot-small' => esc_html__( 'Small', 'taproot' ),
            'thumbnail' => esc_html__( 'Thumbnail', 'taproot' ),
            'taproot-tiny' => esc_html__( 'Tiny', 'taproot' ),                
        ),     
    ));


    // Setting:
    $wp_customize->add_setting( 'taproot_featured_image_location', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control( 'taproot_featured_image_location', array(
        'type'    => 'select',
        'section' => 'taproot_single_post_defaults',
        'label'   => esc_html__( 'Featured Image Location', 'taproot' ),
        'choices' => array(
            'before-title' => esc_html__( 'Before Title', 'taproot' ),
            'after-title' => esc_html__( 'After Title', 'taproot' ),
            'hide' => esc_html__( 'Hide Featured Image', 'taproot' ),
        ),     
    ));


    // Setting:
    $wp_customize->add_setting( 'taproot_featured_image_position', array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control( 'taproot_featured_image_position', array(
        'type'    => 'select',
        'section' => 'taproot_single_post_defaults',
        'label'   => esc_html__( 'Featured Image Align', 'taproot' ),
        'choices' => array(
            'none' => esc_html__( 'None', 'taproot' ),
            'center' => esc_html__( 'Center', 'taproot' ),
            'left' => esc_html__( 'Float Left', 'taproot' ),
            'right' => esc_html__( 'Float Right', 'taproot' ),
        ),    
    ));


    // Rootstrap Tabs: Top Post Nav
    rootstrap_tabs( $wp_customize, 'taproot_post_navigation[top]', array(
        'priority' => 500,
        'panel' => 'taproot_posts',
        'title' => esc_html__( 'Post Navigation', 'taproot' ),
        'tabs' => array(
            'taproot_post_navigation[top]' => 'Top',
            'taproot_post_navigation[bottom]' => 'Bottom',
        ),
    ));


        // Setting: Enable Top Post Navigation
        $wp_customize->add_setting( 'taproot_enable_top_post_nav', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( 'taproot_enable_top_post_nav', array(
            'type' => 'checkbox',
            'section' => 'taproot_post_navigation[top]',
            'label' => esc_html__( 'Enable Top Post Nav', 'taproot' ),      
        ));


        // Color Setting: Navigation Bar Postnav Link Color
        taproot_customizer_color( $wp_customize, 'taproot_top_post_navigation_link_color', array(
            'label'   => esc_html__( 'Post Nav Link Color', 'taproot' ),
            'section' => 'taproot_post_navigation[top]',  
        ));


        // Color Setting: Navigation Bar Post Nav Link Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_top_post_navigation_link_color_hover', array(
            'label'   => esc_html__( 'Post Nav Link Color: Hover', 'taproot' ),
            'section' => 'taproot_post_navigation[top]',  
        ));


        // Setting: Post Navigation Font Size
        $wp_customize->add_setting( 'taproot_top_post_navigation_link_size', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_top_post_navigation_link_size', array(
            'type' => 'range',
            'section' => 'taproot_post_navigation[top]',
            'label' => esc_html__( 'Post Nav Font Size', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 2,
                'step' => 0.1
            ),       
        )));


        // Setting: Enable Post Navigation Separators
        $wp_customize->add_setting( 'taproot_enable_top_post_nav_separators', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_enable_top_post_nav_separators', array(
            'type' => 'checkbox',
            'section' => 'taproot_post_navigation[top]',
            'label' => esc_html__( 'Enable Separators', 'taproot' ),
        ));


        // Setting: Enable Bottom Post Navigation
        $wp_customize->add_setting( 'taproot_enable_bottom_post_nav', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_enable_bottom_post_nav', array(
            'type' => 'checkbox',
            'section' => 'taproot_post_navigation[bottom]',
            'label' => esc_html__( 'Enable Bottom Post Nav', 'taproot' ),
        ));


        // Color Setting: Navigation Bar Postnav Link Color
        taproot_customizer_color( $wp_customize, 'taproot_bottom_post_navigation_link_color', array(
            'label'   => esc_html__( 'Post Nav Link Color', 'taproot' ),
            'section' => 'taproot_post_navigation[bottom]',  
        ));


        // Color Setting: Navigation Bar Post Nav Link Color: Hover
        taproot_customizer_color( $wp_customize, 'taproot_bottom_post_navigation_link_color_hover', array(
            'label'   => esc_html__( 'Post Nav Link Color: Hover', 'taproot' ),
            'section' => 'taproot_post_navigation[bottom]',  
        ));


        // Setting: Post Navigation Font Size
        $wp_customize->add_setting( 'taproot_bottom_post_navigation_link_size', array(
            'sanitize_callback' => 'taproot_sanitize_range_slider_value',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, 'taproot_bottom_post_navigation_link_size', array(
            'type' => 'range',
            'section' => 'taproot_post_navigation[bottom]',
            'label' => esc_html__( 'Post Nav Font Size', 'taproot' ),
            'input_attrs' => array(
                'min'  => 0,
                'max'  => 2,
                'step' => 0.1
            ),     
        )));  


        // Setting: Enable Post Navigation Separators
        $wp_customize->add_setting( 'taproot_enable_bottom_post_nav_separators', array(
            'sanitize_callback' => 'taproot_sanitize_checkbox',
            'transport' => 'postMessage',
        ));

        $wp_customize->add_control( 'taproot_enable_bottom_post_nav_separators', array(
            'type' => 'checkbox',
            'section' => 'taproot_post_navigation[bottom]',
            'label' => esc_html__( 'Enable Separators', 'taproot' ),
        ));


        // Setting: Post Navigation "prev" content
        $wp_customize->add_setting( 'taproot_post_nav_prev_label_text', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( 'taproot_post_nav_prev_label_text', array(
            'type' => 'text',
            'section' => 'taproot_post_navigation[bottom]',
            'label' => esc_html__( 'Previous Post Label', 'taproot' ),       
        ));      


        // Setting: Post Navigation "next" content
        $wp_customize->add_setting( 'taproot_post_nav_next_label_text', array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'refresh',
        ));

        $wp_customize->add_control( 'taproot_post_nav_next_label_text', array(
            'type' => 'text',
            'section' => 'taproot_post_navigation[bottom]',
            'label' => esc_html__( 'Next Post Label', 'taproot' ),      
        ));    


    // Section: Search Results Page Settings
    $wp_customize->add_section( 'taproot_search_results_settings' , array(
        'panel' => 'taproot_posts',
        'title' => esc_html__( 'Search Results Page', 'taproot' ),
        'priority' => 510,
    ));

        // Setting: Blog Page Layout
        $wp_customize->add_setting( 'taproot_search_results_page_layout', array(
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 0             
        ));

        $wp_customize->add_control( 'taproot_search_results_page_layout', array(
            'type' => 'select',
            'section' => 'taproot_search_results_settings',
            'label' => esc_html__( 'Search Results Page Layout', 'taproot' ),
            'choices' => array(
                0 => esc_html__( 'Select a layout', 'taproot' ),                
                'right' => esc_html__( 'Right Sidebar', 'taproot' ),
                'left' => esc_html__( 'Left Sidebar', 'taproot' ),
                'full' => esc_html__( 'Full Width', 'taproot' ),
            ),      
        ));



        // Setting: Search Results Page Sidebar
        $wp_customize->add_setting( 'taproot_search_results_page_sidebar', array(
            'sanitize_callback' => 'sanitize_text_field',
            'default' => 0            
        ));

        $wp_customize->add_control( 'taproot_search_results_page_sidebar', array(
            'label' => esc_html__( 'Search Results Page Sidebar', 'taproot' ),
            'section' => 'taproot_search_results_settings',
            'type' => 'select',
            'choices' => $taproot_sidebars,
        ));
