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
 * Action for outputting breadcrumbs
 *
 * @since  1.0.0
 * @access public
 * @param  array  $args
 * @return void
 */
function breadcrumbs( $args = [] ) {
    do_action( 'taproot/template/breadcrumbs', $args );
}
