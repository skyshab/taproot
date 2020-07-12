<?php
/**
 * Taproot Functions.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Tools;

use Hybrid\App;

/**
 * Replacement for the "get_theme_mod" function.
 * Adds separate filter for fallback.
 *
 * @since   2.0.0
 * @param   string $id - the theme mod id
 * @param   mixed  $fallback - the fallback value to use
 * @return  string - outputs the value for the mod
 */
function theme_mod( $id, $fallback = null ) {

    // Filter for fallback value
    $fallback = apply_filters( "taproot/mods/{$id}/fallback", $fallback, $id );

    // Get theme mod
    return \get_theme_mod( $id, $fallback );
}

/**
 * Get post type specific setting
 *
 * @since  2.0.0
 * @param string $setting
 * @param mixed $default
 * @param string $post_type
 * @return mixed
 */
function post_type_mod( $setting, $default = false, $post_type = false  ) {

    if( ! $post_type ) {
        $post_type = get_post_type();
    }

    return Mod::get( "{$post_type}--{$setting}", $default );
}

/**
 * Helper function for outputting an asset URL in the theme. This integrates
 * with Laravel Mix for handling cache busting. If used when you enqueue a script
 * or style, it'll append an ID to the filename.
 *
 * @link   https://laravel.com/docs/5.6/mix#versioning-and-cache-busting
 * @since  2.0.0
 * @access public
 * @param  string  $path  A relative path/file to append to the `dist` folder.
 * @return string
 */
function asset( $path ) {

    // Get the Laravel Mix manifest.
    $manifest = App::resolve( 'taproot/mix' );

    // Make sure to trim any slashes from the front of the path.
    $path = '/' . ltrim( $path, '/' );

    if ( $manifest && isset( $manifest[ $path ] ) ) {
        $path = $manifest[ $path ];
    }

    return get_theme_file_uri( 'dist' . $path );
}

/**
 * Get the single ID.
 *
 * Single "home" page does not work reliably with get_the_ID.
 * This function will return the single ID instead of the id
 * of the first post in the loop.
 *
 * @since  2.0.0
 * @access public
 * @return int
 */
function get_the_single_id() {

    if( is_front_page() && is_home() ) {

        // Front Page and Blog Page
        return false;

    } elseif( is_front_page() ) {

        // Static Front Page
        $post_id = get_option( 'page_on_front' );

    } elseif( is_home() ) {

        // Static Blog Page
        $post_id = get_option( 'page_for_posts' );

    } elseif( is_singular() ) {

        // Single pages, posts, cpts, etc
        $post_id = get_the_ID();

    } else {

        // Everything else
        return false;
    }

    return $post_id;
}
