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

namespace Taproot\Post_Types\Post;

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

        // This is the value of the "enable" checkbox for the range control
        $use_excerpt = post_type_mod( 'entry--excerpt--length--enable'  );

        $use_excerpt = apply_filters( 'taproot/entry/use-excerpt', $use_excerpt );

        return $use_excerpt;
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
