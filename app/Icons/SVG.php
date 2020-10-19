<?php
/**
 * SVG Icon functionality
 *
 * @package Taproot
 * @since 2.0.0
 */

namespace Taproot\Icons;

/**
 * Class that handles SVG icons.
 *
 * @since 2.0.0
 */
class SVG extends Icons {

    /**
     * Stores the url to the SVG sprite file.
     *
     * @since 2.0.0
     * @var string
     */
    public $url = false;

    /**
     * Define file location
     *
     * @since 2.0.0
     */
    public function __construct() {

        $child_theme_file = '/svg/theme-icons.svg';
        $child_theme_path = get_stylesheet_directory() . $child_theme_file;
        $child_theme_url = get_stylesheet_directory_uri() . $child_theme_file;

        $parent_theme_file = '/dist/svg/theme-icons.svg';
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
     * @since 2.0.0
     *
     * @param mixed $args - attributes used to construct the SVG
     * @return string - Returns SVG markup
     */
    public function render( $args = [] ) {

        // if just passed the icon id, create an array
        if( $args && ! is_array( $args ) ) {
            $args = ['icon' => $args];
        }

        // Define an icon.
        if( false === array_key_exists( 'icon', $args ) ) {
            return esc_html__( 'Please define an icon name.', 'taproot' );
        }

        // Parse args.
        $args = wp_parse_args( $args, $this->defaults );

        // Set aria hidden.
        $aria_hidden = '';

        if( true === $args['aria_hidden'] ) {
            $aria_hidden = 'true';
        }

        // Set ARIA.
        $aria_labeledby = '';

        if( $args['title'] && $args['desc'] ) {
            $aria_labeledby = 'title desc';
        }

        // Begin SVG markup.
        $svg = sprintf( '<svg class="taproot-icon taproot-icon--%s %s" role="presentation" aria-hidden="%s" aria-labeledby="%s" alt="">', esc_attr( $args['icon'] ), esc_attr( $args['class'] ), esc_attr( $aria_hidden ), esc_attr( $aria_labeledby ) );

        // If there is a title, display it.
        if( $args['title'] ) {
            $svg .= '<title>' . esc_html( $args['title'] ) . '</title>';
        }

        // If there is a description, display it.
        if( $args['desc'] ) {
            $svg .= '<desc>' . esc_html( $args['desc'] ) . '</desc>';
        }

        // Generate use element to point to sprite in the main icon file
        $svg .= '<use xlink:href="' . esc_url( $this->url ) . '#icon-' . esc_attr( $args['icon'] ) . '"></use>';

        // Close svg markup
        $svg .= '</svg>';

        return $svg;
    }

    /**
     * Print icon markup
     *
     * @since 2.0.0
     * @param mixed $args - attributes used to construct the icon
     * @return void
     */
    public function display( $args = [] ) {
        echo $this->render( $args );
    }
}
