<?php
/**
 * Screens functions.
 *
 * Helper functions related to screens.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Styles;

use function Rootstrap\Screens\screens;


/**
 * Register theme stylesheet
 *
 * Registers stylesheet and adds mechanism for storing styles
 * rendered from theme mods for caching
 *
 * @since   1.0.0
 * @param   string  $handle - the stylesheet handle
 * @param   string  $src - location of the stylesheet
 * @param   array   $deps - does this depend on other styles?
 * @param   string  $ver - stylesheet version
 * @return  void
 */
function register( $handle, $src = '', $deps = [], $ver = false  ) {

    // enqueue the stylesheet
    wp_enqueue_style( $handle, $src, $deps, $ver );

    // When customize preview
    if ( is_customize_preview() ) {

        // Filter to pass in style object
        $styles = apply_filters( 'rootstrap/styles/public', null );

        // if a style object passed in, get preview styles
        $output = ( $styles ) ? $styles->get_customize_preview() : null;

        add_action( 'wp_head', function() use( $output ) {
            echo $output;
        });
    }
    else {

        // Get the theme_mod from the database
        $output = get_theme_mod( 'rootstrap-theme-mods' );

        // If styles not cached yet, save them
        if ( !$output ) {

            // Filter to pass in style object
            $styles = apply_filters( 'rootstrap/styles/public', null );

            // if a style object passed in, get public styles
            $output = ( $styles ) ? $styles->get_styles() : null;

            // Store cached styles in theme mod
            set_theme_mod( 'rootstrap-theme-mods',  $output );
        }

        // Add the mods
        wp_add_inline_style( $handle, $output );
    }

    // Create  hook for adding singular styles
    if( is_singular() ) {

        $singular_styles = apply_filters('rootstrap/styles/singular', new Styles( screens() ) );

        if($singular_styles) {
            wp_add_inline_style( $handle, $singular_styles->get_styles() );
        }
    }

}



/**
 * Is stylesheet cached?
 *
 * Checks if the front end styles are cached.
 * Used to determine whether to load resources.
 *
 * @since   1.0.0
 * @return  bool
 */
function is_cached() {
    return(  get_theme_mod( 'rootstrap-theme-mods' ) ) ? true : false;
}