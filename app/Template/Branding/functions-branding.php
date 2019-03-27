<?php
/**
 * Template tags.
 *
 * This file holds template tags for the theme. Template tags are PHP functions
 * meant for use within theme templates.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2018 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template;


/**
 * Returns Branding classes.
 *
 * @since  1.0.0
 * @access public
 * @param  string  $primary  element classes
 * @return string
 */
function branding_class( $class ) {
    $class_array = explode(' ', $class );
    $classes = apply_filters( 'taproot/branding/class', $class_array );
    printf( 'class="%s"', implode(' ', esc_attr( $classes ) ) );
}
