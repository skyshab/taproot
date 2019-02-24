<?php
/**
 * Theme icon functions.
 *
 * This file contains functions for outputing icons in theme templates
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template\Icons;

use Hybrid\Proxies\App;


/**
 * Get icon instance
 *
 * @since  1.0.0
 * @access public
 * @return object
 */
function icons() {
    return App::resolve( 'Taproot\Template\Icons' );
}


/**
 * Get icon by location
 *
 * @since  1.0.0
 * @access public
 * @param string - required
 * @param array - optional
 * @return string
 */
function location( $location, $args = [] ) {
    return icons()->location( $location, $args );
}


/**
 * Print icon at specific location
 *
 * @since  1.0.0
 * @access public
 * @param string - required
 * @param array - optional
 * @return string
 */
function render_location( $location, $args = [] ) {
    echo location( $location, $args );
}



/**
 * Get icon by name or args
 *
 * @since  1.0.0
 * @access public
 * @param string/array
 * @return string
 */
function get( $icon ) {
    return icons()->get( $icon );
}


/**
 * Print icon 
 * 
 * Accepts the name of the icon to render
 * or an array of attributes. The array
 * must include the "name" attribute
 *
 * @since  1.0.0
 * @access public
 * @param string/array
 * @return void
 */
function render( $icon ) {
    echo icons()->get( $icon );
}