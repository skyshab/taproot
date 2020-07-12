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

namespace Taproot\Components\Header\Customize\Image;

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

            $manager->selective_refresh->add_partial( $this->id, [
                'selector'            => '.app-header--has-header-image--default #wp-custom-header',
                'render_callback'     => 'Taproot\Components\Header\Template::get_the_custom_header',
                'container_inclusive' => true,
                'fallback_refresh'    => false
            ]);
        }
    }

    /**
     * Preview Styles
     *
     * @since  2.0.0
     * @access public
     * @return string
     */
    public function previewStyles() {

        return <<< JS
        wp.customize( "{$this->id}", function( value ) {
            value.bind( function( to ) {
                const header = document.querySelector( '.app-header' );
                if( header.classList.contains('app-header--has-header-image--default') ) {
                    if( ! to || '' === to || 'remove-header' === to ) {
                        header.classList.remove('app-header--has-header-image');
                    } else {
                        header.classList.add('app-header--has-header-image');
                    }
                }
            });
        });
JS;
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
