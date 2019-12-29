<?php
/**
 * Image functions.
 *
 * This class contains helper functions for images.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2019, Sky Shabatura
 * @link      https://github.com/skyshab/taproot
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

namespace Taproot\Components\Images;

/**
 * Image functions class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Displays the featured image.
     *
     * @since  2.0.0
     * @param  array   $args
     * @param  string  $type
     * @return void
     */
    public static function display( $args = [], $type = '' ) {

        // Filter to determine whether we should display the featured image
        if( ! apply_filters( 'featured-image/display', TRUE, $type ) ) {
            return;
        }

        $post_id = get_the_ID();

        if( has_post_thumbnail( $post_id ) ) {

            $args = wp_parse_args( $args, [
                'size' => 'full',
                'link' => false,
                'class' => ''
            ]);

            $html = get_the_post_thumbnail( $post_id, $args['size'], ['class' => $args['class']] );

            if( $args['link'] ) {
                $html = sprintf( '<a href="%s" title="%s">%s</a>', get_permalink( $post_id ), get_the_title(), $html );
            }

            echo $html;
        }
    }
}
