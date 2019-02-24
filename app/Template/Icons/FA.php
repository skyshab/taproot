<?php
/**
 * Theme Icon functionality
 *
 * @package Taproot/Template
 * @since 1.0.0
 */


namespace Taproot\Template\Icons;


/**
 * Class that handles Font Awesome icons.
 *
 * @since 1.0.0
 */
class FA extends Icons {


    /**
     * Get Font Awesome icon markup
     * 
     * @since 1.0.0
     * 
     * @param array $args - attributes used to construct the icon output
     * @return string - Returns icon markup
     */
    public function get( $args = array() ) {

        // if just passed the icon id, create an array
        if( $args && !is_array( $args ) ) $args = array('icon' => $args);
        
        // Define an icon.
        if( false === array_key_exists( 'icon', $args ) ) 
            return esc_html__( 'Please define an icon name.', 'taproot' );        

        // Parse args.
        $args = wp_parse_args( $args, $this->defaults );

        $aria_hidden = '';

        if( true === $args['aria_hidden'] ) 
            $aria_hidden = ' aria-hidden="true"';

        return sprintf( '<i class="taproot-icon taproot-icon--%s fa fa-%s %s" %s></i>', esc_attr( $args['icon'] ), esc_attr( $args['icon'] ), esc_attr( $args['class'] ),  esc_attr( $aria_hidden ) );
    }    

} 
