<?php
/**
 * Hooks class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Comments;

use Hybrid\Contracts\Bootable;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Hooks implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_action( 'wp_enqueue_scripts', [$this, 'enqueue_scripts'] );
    }

    /**
     * Load WordPress' comment-reply script where appropriate.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function enqueue_scripts() {

        if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
}
