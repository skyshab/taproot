<?php
/**
 * Controller class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\General;

use WP_Customize_Manager;
use Hybrid\Contracts\Bootable;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class Controller implements Bootable {

    /**
     * Adds actions on the appropriate customize action hooks.
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function boot() {

        // Load our controls, callbacks, adjustments and utility functions
        add_action( 'rootstrap/customize-register', [ $this, 'customizeRegister' ] );
    }

    /**
     * Callback for customize register.
     *
     * Create general panel and move some core sections inside it.
     *
     * @since  2.0.0
     * @access public
     * @param  WP_Customize_Manager  $manager  Instance of the customize manager.
     * @return void
     */
    public function customizeRegister( WP_Customize_Manager $manager ) {

        // Create panel for General
        $manager->add_panel( 'general', [
            'title'     => __( 'General', 'taproot' ),
            'priority'  => 10,
        ]);

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
