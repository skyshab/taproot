<?php
/**
 * Functions for interacting with rootstrap
 *
 * @package wp-rootstrap
 * @since 0.8.0
 */

/**
 * Get default rootstrap setting value
 *
 * @since 0.8.0
 * @return string - Returns rootstrap default value
 */
if( !function_exists('rootstrap_get_default') )
{
	function rootstrap_get_default( $id ) 
	{
		global $rootstrap;
	    return $rootstrap->get_default( $id );
	}
}


/**
 * Get rootstrap post value
 *
 * @since 0.8.0
 * @return string - Returns rootstrap post value
 */
if( !function_exists('rootstrap_post_meta') )
{
    function rootstrap_post_meta( $id, $default = false )
    {
        return ( get_post_meta( get_the_ID(), $id, true ) ) ?: $default;
    }
}


/**
 * Get Rootstrap Config
 *
 * @since 0.8.0
 * @return array - returns rootstrap configuration
 */
if( !function_exists('rootstrap_get_config') )
{
    function rootstrap_get_config() 
    {
        global $rootstrap;
        return $rootstrap->get_config();
    }
}


/**
 *  Get Array of Default Sidebars
 *
 * @since 0.8.0
 * @return array - Returns array of default sidebars
 */
if( !function_exists('get_rootstrap_default_sidebars') )
{
    function get_rootstrap_default_sidebars()
    {
        global $rootstrap;
        return ( $defaults = $rootstrap->get_default_sidebars() ) ? $defaults : array();
    }
}


/**
 *  Create customizer control for disabling style output
 *
 * @since 0.8.0
 * @return void
 */
if( !function_exists('rootstrap_disable_customizer_styles_control') )
{
    function rootstrap_disable_customizer_styles_control( $wp_customize, $section )
    {        
        // Setting: Disable Customizer Styles
        $wp_customize->add_setting( 'rootstrap_disable_customizer_styles', array(

            // need to change this cb to something not specific to taproot
            'sanitize_callback' => 'taproot_sanitize_checkbox',
        ));

        $wp_customize->add_control( 'rootstrap_disable_customizer_styles', array(
            'type' => 'checkbox',
            'section' => $section,
            'label' => esc_html__( 'Disable Customizer Styles', 'taproot' ),
        ));
    }
}


/**
 *  Callback to see if customizer styles are disabled
 *
 * @since 0.8.0
 * @return bool
 */
if( !function_exists('rootstrap_is_customizer_styles_disabled') )
{
    function rootstrap_is_customizer_styles_disabled()
    {
        $customizer_output_disabled = get_theme_mod( 'rootstrap_disable_customizer_styles' );
        return ( $customizer_output_disabled ) ? true : false;
    }
}
