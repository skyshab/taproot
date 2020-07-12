<?php
/**
 * Image template functions.
 *
 * This class contains helper functions for images to use in theme templates.
 *
 * @package   Taproot
 * @author    Sky Shabatura
 * @copyright Copyright (c) 2020, Sky Shabatura
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
class Template {

    /**
     * Get the featured image markup.
     *
     * @since  2.0.0
     * @param  array $args
     * @return string
     */
    public static function get_the_featured_image( array $args ) {

        $image = '';

        $args = wp_parse_args( $args, [
            'size' => 'full',
            'link' => false,
            'class' => '',
            'post_id' => get_the_ID(),
            'before' => '',
            'after' => ''
        ]);

        if( isset( $args['post_id'] ) && has_post_thumbnail( $args['post_id'] ) ) {

            $image = get_the_post_thumbnail( $args['post_id'], $args['size'], ['class' => $args['class']] );

            if( $args['link'] ) {
                $image = sprintf( '<a href="%s" title="%s" class="featured-image-link">%s</a>', get_permalink(  $args['post_id'] ), get_the_title(), $image );
            }
        }

        if( $image && '' !== $image ) {
            $image = $args['before'] . $image . $args['after'];
        }

        return apply_filters( 'taproot/featured-image', $image, $args );
    }

    /**
     * Get the featured image markup.
     *
     * @since  2.0.0
     * @param  array $args
     * @return void
     */
    public static function the_featured_image( array $args ) {
        echo static::get_the_featured_image( $args );
    }
}
