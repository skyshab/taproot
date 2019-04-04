<?php
/**
 * SVG Icon functionality
 *
 * @package Taproot
 * @since 1.0.0
 */

 namespace Taproot\Template\Icons;


/**
 * Class that handles SVG icons.
 *
 * @since 1.0.0
 */
class SVG extends Icons {


    /**
     * Stores the url to the SVG sprite file.
     * 
     * @since 1.0.0
     * @var string
     */
    public $url = false;


    /**
     * Define file location
     * 
     * @since 1.0.0
     */
    public function __construct() {

        $child_theme_file = '/img/theme-icons.svg';
        $child_theme_path = get_stylesheet_directory() . $child_theme_file;
        $child_theme_url = get_stylesheet_directory_uri() . $child_theme_file;

        $parent_theme_file = '/resources/img/theme-icons.svg';
        $parent_theme_path = get_parent_theme_file_path( $parent_theme_file );
        $parent_theme_url = get_parent_theme_file_uri( $parent_theme_file );

        if( file_exists( $child_theme_path ) ) {
            $this->url = $child_theme_url;
        }
        elseif( file_exists( $parent_theme_path ) ) {
            $this->url = $parent_theme_url;			
        }
    }


    /**
     * Get SVG icon markup
     * 
     * @since 1.0.0
     * 
     * @param array $args - attributes used to construct the SVG
     * @return string - Returns SVG markup
     */
    public function get( $args = [] ) {

        // if just passed the icon id, create an array
        if( $args && !is_array( $args ) ) $args = array('icon' => $args);
        
        // Define an icon.
        if( false === array_key_exists( 'icon', $args ) ) 
            return esc_html__( 'Please define an icon name.', 'taproot' );

        // Parse args.
        $args = wp_parse_args( $args, $this->defaults );

        // Set aria hidden.
        $aria_hidden = '';

        if( true === $args['aria_hidden'] ) 
            $aria_hidden = 'true';

        // Set ARIA.
        $aria_labelledby = '';

        if( $args['title'] && $args['desc'] ) 
            $aria_labelledby = 'title desc';

        // Begin SVG markup.
        $svg = sprintf( '<svg class="taproot-icon taproot-icon--%s %s" role="presentation" aria-hidden="%s" aria-labelledby="%s" alt="">', esc_attr( $args['icon'] ), esc_attr( $args['class'] ), esc_attr( $aria_hidden ), esc_attr( $aria_labelledby ) );

        // If there is a title, display it.
        if( $args['title'] ) 
            $svg .= '<title>' . esc_html( $args['title'] ) . '</title>';

        // If there is a description, display it.
        if( $args['desc'] ) 
            $svg .= '<desc>' . esc_html( $args['desc'] ) . '</desc>';

        // Generate use element to point to sprite in the main icon file
        $svg .= '<use xlink:href="' . esc_url( $this->url ) . '#icon-' . esc_attr( $args['icon'] ) . '"></use>';

        // Close svg markup
        $svg .= '</svg>';

        return $svg;
    }
}
