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

namespace Taproot\Components\Post;

use function Taproot\Tools\post_type_mod;

/**
 * Functions class.
 *
 * @since  2.0.0
 * @access public
 */
class Functions {

    /**
     * Should post entry display excerpt?
     *
     * @since  2.0.0
     * @return bool
     */
    public static function use_excerpt() {

        $post_type = get_post_type();

        if( ! $post_type ) {
            return false;
        }

        $use_excerpt = post_type_mod( 'entry--excerpt--length--enable'  );

        return apply_filters("taproot/{$post_type}/entry/use-excerpt", $use_excerpt, $post_type );
    }

    /**
     * Get custom entry excerpt length
     *
     * @since  2.0.0
     * @return mixed
     */
    public static function get_entry_excerpt_length() {
        return post_type_mod( 'entry--excerpt--length' );
    }

    /**
     * Get entry link text
     *
     * @since  2.0.0
     * @return mixed
     */
    public static function get_entry_link_text() {
        return post_type_mod( 'entry--link--readmore' );
    }

    /**
     * Get entry link position
     *
     * @since  2.0.0
     * @return mixed
     */
    public static function get_entry_link_position() {
        return post_type_mod( 'entry--link--position' );
    }

    /**
     * Get entry link type
     *
     * @since  2.0.0
     * @return mixed
     */
    public static function get_entry_link_type() {
        return post_type_mod( 'entry--link--type' );
    }
}
