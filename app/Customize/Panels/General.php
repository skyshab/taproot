<?php
/**
 * General Customizer panel class.
 *
 * This file contains functionality for managing the "general" panel in the customizer.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2020 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Customize\Panels;

use Taproot\Customize\Abstracts\Panel;

/**
 * Class to handle component actions.
 *
 * @since  2.0.0
 * @access public
 */
class General extends Panel {

    /**
     * Create general panel and move some core sections inside it.
     *
     * @since  2.0.0
     * @access public
     * @param  object  $manager  Instance of the customize manager.
     * @return void
     */
    public function customize_register_after( $manager ) {

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
