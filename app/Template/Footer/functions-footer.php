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
 * Outputs Footer Widgets
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function footer_widgets() {
    do_action('taproot/footer-widgets');
}


/**
 * Outputs Additional Footer Content
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function footer_additional_content() {
    do_action('taproot/footer-additional-content');
}


/**
 * Outputs Footer Credits
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function footer_credits() {
    do_action('taproot/footer-credits');
}


/**
 * Outputs Bottom Bar Additional Content
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function bottom_bar_additional_content() {
    do_action('taproot/bottom-bar-additional-content');
}
