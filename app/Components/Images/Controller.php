<?php
/**
 * Controller class.
 *
 * This file contains actions and callbacks for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright 2019 Sky Shabatura
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://taproot-theme.com
 */

namespace Taproot\Components\Images;

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

        add_action( 'after_setup_theme', [ $this, 'setup' ] );
        add_filter( 'image_size_names_choose', [ $this, 'image_size_names_choose' ] );
    }

    /**
     * Theme setup
     *
     * @since  2.0.0
     * @access public
     * @return voide
     */
    public function setup() {

        // Adds featured image support.
        add_theme_support( 'post-thumbnails' );
    }

    /**
     * Add the "medium large" image size in the list of sizes to choose from.
     * We are returning the entire list here to be able to output in a logical order.
     *
     * @since  2.0.0
     * @access public
     * @param array $sizes
     * @return array
     */
    public function image_size_names_choose( $sizes ) {

        $new_sizes = [
            'thumbnail'     => __( 'Thumbnail', 'taproot' ),
            'medium'        => __( 'Medium', 'taproot' ),
            'medium_large'  => __( 'Medium Large', 'taproot' ),
            'large'         => __( 'Large', 'taproot' ),
            'full'          => __( 'Full', 'taproot' ),
        ];

        return array_merge( $new_sizes, $sizes );
    }
}
