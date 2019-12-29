<?php
/**
 * Blog Title
 *
 * This class handles the default WordPress blogname control.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Header\Customize\Title;

use Taproot\Customize\Controls\Control\Control;

/**
 * Class for color controls
 *
 * @since  2.0.0
 * @access public
 */
class Blog_Name extends Control {

    /**
     * Control name
     *
     * @since 2.0.0
     * @var string
     */
    public $id = 'blogname';

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
            // when the core WP blogname setting is changed.
            $manager->selective_refresh->add_partial( 'blogname', [
                'selector' => '.app-header__title-link',
                'render_callback' => function() {
                    return get_bloginfo( 'name', 'display' );
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
