<?php
/**
 * This file contains functions and callbacks for the Customizer functionality of our application
 *
 * @package taproot/customizer
 * @since 0.8.0
 */


/* Callbacks for customizer controls */


    /**
     * Callback to hide a customizer control. 
     *
     * @since 0.8.0
     * 
     * @return bool false
     */
    function taproot_hide_that_stuff()
    {
        return false;
    }


    /**
     * Is title being displayed? 
     *
     * @since 0.8.0
     * 
     * @return bool
     */
    function taproot_has_title()
    {
        return ( get_theme_mod( 'taproot_display_title', true ) ) ? true : false;
    }


    /**
     * Is tagline being displayed? 
     *
     * @since 0.8.0
     * 
     * @return bool
     */
    function taproot_has_tagline()
    {
        return ( get_theme_mod( 'taproot_display_tagline', true ) ) ? true : false;
    }


    /**
     * Is logo being displayed? 
     *
     * @since 0.8.0
     * 
     * @return bool
     */
    function taproot_has_logo()
    {
        return ( get_theme_mod( 'custom_logo', false ) ) ? true : false;
    }


    /**
     * Is boxed layout enabled? 
     *
     * @since 0.8.0
     * 
     * @return bool
     */
    function taproot_is_boxed_layout()
    {
        return ( get_theme_mod( 'taproot_boxed_layout', false ) ) ? true : false;
    }


    /**
     * Show logo controls on laptop? 
     *
     * @since 0.8.0
     * 
     * @return bool
     */
    function taproot_show_logo_laptop()
    {
        if( !taproot_has_logo() ) return false;
        return ( get_theme_mod( 'taproot_hide_logo_laptop_fixed', false ) ) ? false : true;
    }


    /**
     * Show logo controls on desktop? 
     *
     * @since 0.8.0
     * 
     * @return bool
     */
    function taproot_show_logo_desktop()
    {
        if( !taproot_has_logo() ) return false;
        return ( get_theme_mod( 'taproot_hide_logo_desktop_fixed', false ) ) ? false : true;
    }


    /**
     * Show title controls on laptop? 
     *
     * @since 0.8.0
     * 
     * @return bool
     */
    function taproot_show_title_laptop()
    {
        if( !taproot_has_title() ) return false;
        return ( get_theme_mod( 'taproot_hide_site_title_laptop_fixed', false ) ) ? false : true;
    }


    /**
     * Show title controls on desktop? 
     *
     * @since 0.8.0
     * 
     * @return bool
     */
    function taproot_show_title_desktop()
    {
        if( !taproot_has_title() ) return false;
        return ( get_theme_mod( 'taproot_hide_site_title_desktop_fixed', false ) ) ? false : true;
    }


    /**
     * Show tagline controls on laptop? 
     *
     * @since 0.8.0
     * 
     * @return bool
     */
    function taproot_show_tagline_laptop()
    {
        if( !taproot_has_tagline() ) return false;
        return ( get_theme_mod( 'taproot_hide_site_tagline_laptop_fixed', false ) ) ? false : true;
    }


    /**
     * Show tagline controls on desktop? 
     *
     * @since 0.8.0
     * 
     * @return bool
     */
    function taproot_show_tagline_desktop()
    {
        if( !taproot_has_tagline() ) return false;
        return ( get_theme_mod( 'taproot_hide_site_tagline_desktop_fixed', false ) ) ? false : true;
    }


/* Sanitization Functions */


    /**
     * Sanitize checkbox value
     *
     * @since 0.8.0
     * 
     * @param string $input
     * @return int 1 if checked, empty string if not
     */
    function taproot_sanitize_checkbox( $input )
    {
        return ( $input == 1 ) ? 1 : '';
    }


    /**
     * Sanitize numeric range slider value
     *
     * @since 0.8.0
     * 
     * @param mixed $input
     * @return int
     */    
    function taproot_sanitize_range_slider_value( $input )
    {
        return filter_var( $input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION );
    }


    /**
     * Sanitize enable mobile bar checkbox value
     *
     * @since 0.8.0
     * 
     * @param string $input
     * @return int 1 if checked, empty string if not
     */
    function taproot_sanitize_enable_mobilebar_mobile_checkbox( $input )
    {
        return ( $input == 1 || 'stacked' == et_get_option( 'taproot_branding_layout_mobile', 'stacked' ) ) ? 1 : '';
    }


    /**
     * Sanitize color value
     *
     * @since 0.8.0
     * 
     * @param string $color
     * @return string
     */
    function taproot_sanitize_color_value( $color )
    {
        // Trim whitespace
        $color = str_replace( ' ', '', $color );

        // Hex
        if( 1 === preg_match( '|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
        {
            return $color;
        }

        // RGB
        elseif( 'rgb(' === substr( $color, 0, 4 ) )
        {
            sscanf( $color, 'rgb(%d,%d,%d)', $red, $green, $blue );

            if( ( $red >= 0 && $red <= 255 ) &&
                 ( $green >= 0 && $green <= 255 ) &&
                 ( $blue >= 0 && $blue <= 255 )
                ) {
                return "rgb({$red},{$green},{$blue})";
            }
        }

        // RGBA
        elseif( 'rgba(' === substr( $color, 0, 5 ) )
        {
            sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );

            if( ( $red >= 0 && $red <= 255 ) &&
                 ( $green >= 0 && $green <= 255 ) &&
                 ( $blue >= 0 && $blue <= 255 ) &&
                   $alpha >= 0 && $alpha <= 1
            ) {
                return "rgba({$red},{$green},{$blue},{$alpha})";
            }
        }

        // nothing matched
        return '';

    } // end color sanitizer    


/* Partial refresh callbacks */


    /**
     * Render the site logo for the selective refresh partial.
     *
     * @since 0.8.0
     * 
     * @return void
     */
    function taproot_customize_partial_logo() 
    {
        $taproot_logo  = get_theme_mod( 'taproot_custom_logo', false );

        if( ! $taproot_logo ) return;

        printf( '<img id="logo" src="%s" alt="%s"/>', esc_url( $logo_option ), esc_attr( bloginfo( 'name' ) ) );
    }


    /**
     * Render the site title for the selective refresh partial.
     *
     * @since 0.8.0
     * 
     * @return void
     */
    function taproot_customize_partial_blogname() 
    {
    	bloginfo( 'name' );
    }


    /**
     * Render the site tagline for the selective refresh partial.
     *
     * @since 0.8.0
     * 
     * @return void
     */
    function taproot_customize_partial_blogdescription() 
    {
    	bloginfo( 'description' );
    }


    /**
     * Render the phone info for the selective refresh partial.
     *
     * @since 0.8.0
     * 
     * @return void
     */
    function taproot_customize_partial_phone_info() 
    {
        $phone  = get_theme_mod( 'taproot_topnav_info_phone', false );

        if( ! $phone ) return;

        printf( '<span class="info-phone topnav-info">%s</span>', esc_html( $phone ) );
    }


    /**
     * Render the phone info for the selective refresh partial.
     *
     * @since 0.8.0
     * 
     * @return void
     */
    function taproot_customize_partial_email_info() 
    {
        $email  = get_theme_mod( 'taproot_topnav_info_email', false );

        if( ! $email ) return;

        printf( '<a href="mailto:%1$s" class="info-email topnav-info">%1$s</a>', esc_html( $email ) );
    }


    /**
     * Render the bottom bar content for the selective refresh partial.
     *
     * @since 0.8.0
     * 
     * @return void
     */
    function taproot_customize_partial_bottom_bar_content() 
    {
        $bb_content  = get_option( 'taproot_bottom_bar_content', false );

        if( ! $bb_content ) return;

        echo wp_kses_post( $bb_content );
    }   


/* Utility functions */


    /**
     * Create Taproot Customizer Setting and Control
     *
     * @since 0.8.0
     * 
     * @param object $wp_customize 
     * @param string $id 
     * @param array $args - control and settings args
     */  
    function taproot_setting( $wp_customize, $id, $args )
    {
        // setting
        $setting_args = array();

        // define default args
        $setting_defaults = array(
            'sanitize_callback' => 'sanitize_text_field',
            'transport' => 'postMessage',
        );    

        if( isset( $args['setting'] ) && is_array( $args['setting'] ) )
        {
            // replace the empty args with incoming args
            $setting_args = $args['setting'];
        }

        // combine defaults and args being passed in
        $setting_args = wp_parse_args( $setting_args, $setting_defaults );

        // register the setting
        $wp_customize->add_setting( $id, $setting_args );

        // control
        if( isset( $args['control'] ) && is_array( $args['control'] ) )
        {
            if( isset( $args['control']['type'] ) && 'range' === $args['control']['type'] && class_exists('Taproot_Range_Option') )
            {
                $wp_customize->add_control( new Taproot_Range_Option( $wp_customize, $id, $args['control'] ));    
            } 
            elseif( isset( $args['control']['type'] ) && 'image' === $args['control']['type'] ) 
            {
                $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $id, $args['control'] ));    
            }
            elseif( isset( $args['control']['type'] ) && 'font_styles' === $args['control']['type']  && class_exists('Taproot_Font_Styles') ) 
            {
                $wp_customize->add_control( new Taproot_Font_Styles( $wp_customize, $id, $args['control'] ));    
            }  
            elseif( isset( $args['control']['type'] ) && 'color' === $args['control']['type'] ) 
            {
                $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, $args['control'] ));    
            }  
            else 
            {
                // register the control
                $wp_customize->add_control( $id, $args['control'] );          
            }  
        }   
    }


    /**
     * Helper Function for adding section titles in the Customizer.
     * 
     * @since 0.8.0
     *
     * @param object $wp_customize
     * @param array $args - the control args
     */
    function taproot_customizer_section_title( $wp_customize, $args )
    {
        $wp_customize->add_setting( $args['id'], array('sanitize_callback' => 'sanitize_text_field') );
        $wp_customize->add_control( new Taproot_Option_Group( $wp_customize, $args['id'], array(
            'label' => $args['label'],
            'section' => $args['section'],
            'type' => 'taproot-option-group',
        )));
    }


    /**
     * Get a screen from breakpoint data
     *
     * @since 0.8.0
     * 
     * @param string $bp
     * @param bool $mobile
     * @return string
     */
    function taproot_get_screen_from_bp( $bp = 'bp-t', $mobile = true )
    {
        if( $mobile )
        {
            $screens = array(
                'bp-none' => false,
                'bp-m' => 'mobile',
                'bp-ml' => 'mobile-landscape-and-under',
                'bp-t' => 'tablet-and-under',
                'bp-l' => 'laptop-and-under',
                'bp-always' => 'default'
            );
        }
        else
        {
            $screens = array(
                'bp-none' => 'default',
                'bp-m' => 'mobile-landscape-and-up',
                'bp-ml' => 'tablet-and-up',
                'bp-t' => 'laptop-and-up',
                'bp-l' => 'desktop',
                'bp-always' => false
            );
        }

        return ( isset($screens[$bp]) && $screens[$bp] ) ? $screens[$bp] : false;
    } 


    /**
     * Get Font Styles
     *
     * @since 0.8.0
     * 
     * @param array $styles
     * @return string
     */
    function taproot_get_font_styles( $styles = false )
    {
        if( !$styles ) return false;

        $font_styles = '';
        $styles_array = explode( '|', $styles );

        // Font weight
        if( in_array( 'bold', $styles_array ) )
        {
            $font_styles .= 'font-weight: bold; ';
        }

        // Font style
        if( in_array( 'italic', $styles_array ) )
        {
            $font_styles .= 'font-style: italic; ';
        }

        // Uppercase
        if( in_array( 'uppercase', $styles_array ) )
        {
            $font_styles .= 'text-transform: uppercase; ';
        }

        // Capitalize
        if( in_array( 'capitalize', $styles_array ) )
        {
            $font_styles .= 'text-transform: capitalize; ';
        }

        return esc_html( $font_styles );
    }


    /**
     * Get Font Choices
     *
     * @since 0.8.0
     * 
     * @return array
     */
    function taproot_get_font_choices()
    {
        $font_code = get_theme_mod( 'taproot_google_fonts' );
        $fonts = explode("|", $font_code);
        $font_choices = array('default' => 'Default');
        foreach( $fonts as $font )
        {
            $font_id = strstr($font, ':', true) ?: $font;
            $font_name = str_replace( '+', ' ', $font_id );
            $font_choices[$font_name] = $font_name;
        }

        return $font_choices;
    }


    /**
     * Get Font Family if not set to default
     *
     * @since 0.8.0
     * 
     * @param string $font
     * @return string
     */
    function taproot_get_font_family( $font )
    {
        if( 'default' === $font )
        {
            return false;
        }
        else
        {
            return $font;
        }
    }


    /**
     * Get Heading Font Sizes
     *
     * @since 0.8.0
     * 
     * @param string $heading
     * @param int $base
     * @return int
     */
    function taproot_heading_styles( $heading, $base )
    {
        switch( $heading )
        {
            case 'h1':
                return $base;

            case 'h2':
                return ($base * .86);

            case 'h3':
                return ($base * .73);

            case 'h4':
                return ($base * .60);

            case 'h5':
                return ($base * .53);

            case 'h6':
                return ($base * .47);

            default:
               return false;
        }
    }


    /**
     * Get default bottom bar content. 
     *
     * @since 0.8.0
     * @return string
     */  
    function taproot_bottom_bar_default_content()
    {
        return esc_html__( '&#169;2017, My Awesome Site', 'taproot' );
    }    
