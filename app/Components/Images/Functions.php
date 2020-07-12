<?php
/**
 * Component functions.
 *
 * This class contains helper functions for the component.
 *
 * @package   Taproot
 * @author    Sky Shabatura <theme@sky.camp>
 * @copyright Copyright (c) 2020, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Images;

use function Taproot\Tools\get_the_single_id;

/**
 * Functions class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Hide the post featured image?
     *
     * @since  2.0.0
     * @return bool
     */
    public static function hide_the_post_featured_image() {

        $post_id = get_the_single_id();

        if( $post_id && get_post_meta( $post_id, '_taproot_post_featured_image_hide', true ) ) {
            return true;
        }

        return false;
    }
}
