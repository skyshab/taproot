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

namespace Taproot\Template\Postnav;

use Hybrid\Proxies\App;


/**
 * Get New Post Navigation object
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function postnav() {
    return new Postnav();
}


/**
 * Get Post Navigation
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function render( $context = 'default', $args = [] ) {
    return postnav()->render( $context, $args );
}



/**
 * Print Post Navigation
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function display( $context = 'default', $args = [] ) {
    postnav()->display( $context, $args );
}
