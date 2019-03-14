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

namespace Rootstrap\Modules\Screens;

use function Rootstrap\rootstrap;


/**
 * Get main Screens instance.
 *
 * @since  1.0.0
 * @access public
 * @return Screens
 */
function screens() {
    return rootstrap()->get_instance( 'Screens');
}


/**
 * Add a screen
 *
 * @since  1.0.0
 * @access public
 * @param  string            $name
 * @param  array             $args
 * @return void
 */
function add_screen( $name, $args ) {
    screens()->add( $name, $args );
}


/**
 * Get a Screen
 *
 * @since  1.0.0
 * @access public
 * @param  string            $name
 * @return void
 */
function get_screen( $name ) {
    return screens()->get( $name );
}


/**
 * Get all Screens
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function get_screens() {
    return screens()->all();
}


/**
 * Get Screens Array
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function get_screens_array() {
    $array = [];
    foreach( get_screens() as $name => $device ) {
        $array[$name]['min'] = $device->min();
        $array[$name]['max'] = $device->max();        
    }
    return $array;
}
