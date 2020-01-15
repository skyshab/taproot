<?php
/**
 * Taproot Mod
 *
 * This class handles the getting theme mod values with fallback.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Tools;

use Hybrid\App;

/**
 * Theme mod class.
 *
 * @since  2.0.0
 * @access public
 */
class Mod {

    /**
     * Returns a theme mod value.
     *
     * @since  2.0.0
     * @access public
     * @param  string  $name
     * @param  mixed   $default
     * @return mixed
     */
    public static function get( $name, $default = '' ) {
        $fallback = static::fallback( $name );
        return theme_mod(
            $name,
            ! $default && ! is_null( $fallback ) ? $fallback : $default
        );
    }

    /**
     * Returns a default theme mod.
     *
     * @since  2.0.0
     * @access public
     * @param  string  $name
     * @return mixed
     */
    public static function fallback( $name ) {

        $defaults = App::resolve( 'rootstrap/defaults' );

        if ( $defaults->has($name) ) {
            return $defaults->get( $name )->value() instanceof \Closure
                   ? $defaults->get( $name )->value()->__invoke()
                   : $defaults->get( $name )->value();
        }
        return null;
    }
}