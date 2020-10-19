<?php
/**
 * Blog Description
 *
 * This class handles the default WordPress blogdescription control.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Header\Customize\Tagline;

use Taproot\Customize\Controls\Control\Control;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Blog_Description extends Control {

    /**
     * Control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'blogdescription';

    /**
     * Transport method
     *
     * @since 2.0.0
     * @var string
     */
    public $transport = 'postMessage';

    /**
     * Register controls
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function controls($manager) {

        // Move the blogdescription control to our custom section
        if( $manager->get_control( $this->id ) ) {
            $manager->get_control( $this->id )->section = $this->section;
            $manager->get_setting( $this->id )->transport = $this->transport;
        }
    }

    /**
     * Customize Partials
     *
     * @since  2.0.0
     * @access public
     * @return void
     */
    public function partials($manager) {

        // If the selective refresh component is available
        if ( isset( $manager->selective_refresh ) ) {

            // Selectively refreshes the title in the header
            // when the core WP blogdescription setting is changed.
            $manager->selective_refresh->add_partial( 'blogdescription', [
                'selector'        => '.app-header__description',
                'render_callback' => function() {
                    return get_bloginfo( 'description', 'display' );
                }
            ]);
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
}
