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

namespace Taproot\Components\Images;

use Hybrid\Contracts\Bootable;
use function Hybrid\app;

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

        add_action( 'after_setup_theme',       [ $this, 'setup' ] );
        add_filter( 'image_size_names_choose', [ $this, 'image_size_names_choose' ] );
        add_filter( 'taproot/featured-image',  [ $this, 'featured_image' ] );
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

    /**
     * Featured Image display.
     *
     * Don't display the featured image when disabled.
     *
     * @since 2.0.0
     * @param string $image - the image markup
     * @return string
     */
    public function featured_image( $image ) {
        return ( app('images/functions')->hide_the_post_featured_image() ) ? '' : $image;
    }
}
