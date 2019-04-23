<?php
/**
 * Template tags.
 *
 * This file holds template tags for the theme. Template tags are PHP functions
 * meant for use within theme templates.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Template;


/**
 * Get Mobile Menu Toggle
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function menu_toggle( $location ) {
    echo apply_filters( 'taproot/template/menu-toggle', $location );
}
