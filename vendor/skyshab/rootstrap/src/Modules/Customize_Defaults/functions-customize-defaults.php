<?php
/**
 * Customize Defaults functions.
 *
 * Helper functions and template tags related to Customizer Defaults.
 *
 * @package   Rootstrap
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/rootstrap
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Rootstrap\Modules\Customize_Defaults;

use function Rootstrap\rootstrap;


/**
 * Returns a Customize_Defaults object.
 *
 * @since  1.0.0
 * @access public
 * @return object
 */
function customize_defaults() {
    return rootstrap()->get_instance( 'Customize_Defaults');
}


/**
 * Add a customize_default
 *
 * @since  1.0.0
 * @access public
 * @param  string   $id
 * @param  mixed    value
 * @return void
 */
function add_customize_default( $id, $value ) {
    customize_defaults()->add( $id, $value );
}


/**
 * Get a single Customize_Default
 *
 * @since  1.0.0
 * @access public
 * @param  string   $id
 * @return object
 */
function get_customize_default( $id ) {
    return customize_defaults()->get( $id );
}


/**
 * Get Customize_Default value
 *
 * @since  1.0.0
 * @access public
 * @param  string   $id
 * @return mixed
 */
function get_customize_default_value( $id ) {
    return get_customize_default( $id )->value();
}


/**
 * Get all Customize_Defaults
 *
 * @since  1.0.0
 * @access public
 * @return array
 */
function get_customize_defaults() {
    return customize_defaults()->all();
}
