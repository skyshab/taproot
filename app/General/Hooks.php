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

namespace Taproot\General;

use Hybrid\Contracts\Bootable;

/**
 * Handles component logic
 *
 * @since  2.0.0
 * @access public
 */
class Hooks implements Bootable {

    /**
     * Initiate component actions.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {
        add_action( 'taproot/customize/customize-register-after', [ $this, 'customize_register_after' ] );
    }

    /**
     * Move title tagline and static front page controls to the General panel.
     *
     * @since 2.0.0
     * @access public
     * @param object $manager
     * @return void
     */
    public function customize_register_after( $manager ) {

        // Rename site icon section
        if( $manager->get_section( 'title_tagline' ) ) {
            $manager->get_section( 'title_tagline' )->title = __('Site Icon', 'taproot');
            $manager->get_section( 'title_tagline' )->panel = 'general';
        }

        // move to the general settings panel
        if( $manager->get_section( 'static_front_page' ) ) {
            $manager->get_section( 'static_front_page' )->panel = 'general';
        }
    }
}
