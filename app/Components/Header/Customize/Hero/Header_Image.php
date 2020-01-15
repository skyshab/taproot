<?php
/**
 * Header Image.
 *
 * This class handles the default WordPress Header Image control.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Hero;

use Taproot\Customize\Controls\Control\Control;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Header_Image extends Control {

    /**
     * Control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'header_image';

    /**
     * Partials
     *
     * @since  2.0.0
     * @access public
     * @param  array - $manager
     * @return void
     */
    public function partials($manager) {

        // Move control to our custom section, change transport method
        if( $manager->get_setting( $this->id ) ) {
            $manager->get_control( $this->id )->section = $this->section;
            $manager->get_setting( $this->id )->transport = $this->transport;
            $manager->get_setting( 'header_image_data' )->transport = $this->transport;
        }

        // If the selective refresh component is available
        if ( isset( $manager->selective_refresh ) ) {

            // Selectively refreshes the custom header if it doesn't support
            // videos. Core WP won't properly refresh output from its own
            // `the_custom_header_markup()` function unless video is supported.
            if ( ! current_theme_supports( 'custom-header', 'video' ) ) {
                $manager->selective_refresh->add_partial( $this->id, [
                    'selector'            => '#wp-custom-header',
                    'render_callback'     => 'the_custom_header_markup',
                    'container_inclusive' => true,
                    'fallback_refresh'    => false
                ]);
            }
        }
    }

    /**
     * Register settings
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function settings($manager) {}

    /**
     * Register controls
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function controls($manager) {}

}
