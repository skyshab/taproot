<?php
/**
 * Taproot Functions.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
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
